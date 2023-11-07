<?php namespace App;

class halo extends Controller
{
    public $requires_auth = true;
    public $requires_admin = true;
    public $template = 'master';

    function index()
    {
        try {
            $this->controllers_folder_is_writable = is_writable('controllers') ? true : false;
            $this->views_folder_is_writable = is_writable('views') ? true : false;
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    function POST_index()
    {

        // Check if the controller's table already exists in the database
        // $table_names_are_singular = true; # currently plural names are not supported
        $name_plural = $_POST['name_plural'];
        $name_singular = $_POST['name_singular'];
        $table_name = $name_plural;
        $table_prefix = $name_singular;
        $name_plural_esc = addslashes($name_plural);
        $name_singular_esc = addslashes($name_singular);

        if (!empty(Db::getAll("SHOW TABLES LIKE '$table_name'"))) {

            // Show error
            echo '<div class="alert alert-danger">' . "The table $name_plural already existed. Aborting." . '</div>';

        } else {

            // Add table to database
            Db::q("CREATE TABLE `$name_plural_esc` (
             `{$name_singular_esc}_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Autocreated',
             `{$name_singular_esc}_name` varchar(50) NOT NULL COMMENT 'Autocreated',
             PRIMARY KEY (`{$name_singular_esc}_id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=1");

            // Print banner

            // Add 2 rows to database
            Db::insert($table_name, array($table_prefix . '_name' => $name_singular . " #1"));
            Db::insert($table_name, array($table_prefix . '_name' => $name_singular . " #2"));

            // Add controller from template (substituting module for controller's name)
            $content = file_get_contents('system/scaffolding/controller_template.php');
            $content = $this->replace_preserving_case("modules", $name_plural, $content);
            $content = $this->replace_preserving_case("module", $name_singular, $content);
            $controller_file = "controllers/$name_plural.php";
            $fp = fopen($controller_file, "wb");
            fwrite($fp, $content);
            fclose($fp);

            chmod($controller_file, 0666);

            /** Add views **/
            $views = ['index', 'view'];

            // Create views directory
            $dirname = "views/$name_plural";
            if (!is_dir($dirname)) {
                mkdir($dirname, 0755);
            }

            // Create each view
            foreach ($views as $view) {
                $content = file_get_contents("system/scaffolding/view_{$view}_template.php");
                $content = $this->replace_preserving_case("modules", $name_plural, $content);
                $content = $this->replace_preserving_case("module", $name_singular, $content);
                $view_file = "views/$name_plural/{$name_plural}_$view.php";
                $fp = fopen($view_file, "wb");
                fwrite($fp, $content);
                fclose($fp);
                chmod($view_file, 0666);

            }


            // Add files to git
            exec("git add controllers/*");
            exec("git add views/*");


            // Prevent git running under developer's user account having permission issues when commiting this file
            exec("chmod -R a+rwX *");


            echo '<div class="alert alert-success">' . 'The module <a href="' . BASE_URL . $table_name . '">' . $table_name . '</a> was created.</div>';
        }

    }

    private function replace_preserving_case($needle, $replacement, $haystack)
    {
        if (preg_match_all("/$needle/i", $haystack, $matches) !== FALSE) {
            foreach ($matches[0] as $match) {

                // Lowercase
                if ($match == strtolower($match)) {
                    $haystack = preg_replace("/$match/", strtolower($replacement), $haystack);
                }

                // Capitalized
                if ($match == ucfirst($match)) {
                    $haystack = preg_replace("/$match/", ucfirst($replacement), $haystack);
                }

                // All caps
                if ($match == strtoupper($match)) {
                    $haystack = preg_replace("/$match/", strtoupper($replacement), $haystack);
                }

            }
        }

        return $haystack;
    }

    function generate_password_hash(){
        exit( password_hash($_POST['password'], PASSWORD_DEFAULT) );
    }

    function fkcheck()
    {

        $tables = [];
        $database = DATABASE_DATABASE;
        $rows = Db::getAll("SELECT * FROM information_schema.`COLUMNS` WHERE TABLE_SCHEMA = '$database' AND COLUMN_NAME LIKE '%_id'");
        foreach ($rows as $row) {
            $tables[$row['TABLE_NAME']][$row['COLUMN_NAME']] = $row;
        }

        foreach ($tables as $table_name => $columns) {

            foreach ($columns as $column_name => $column) {

                $rows = Db::getAll("
                    SELECT *
                    FROM information_schema.`KEY_COLUMN_USAGE` kcu
                             JOIN information_schema.`TABLE_CONSTRAINTS` tc
                                  ON kcu.TABLE_NAME = tc.TABLE_NAME AND kcu.CONSTRAINT_NAME = tc.CONSTRAINT_NAME AND
                                     kcu.TABLE_SCHEMA = tc.TABLE_SCHEMA
                    WHERE kcu.TABLE_SCHEMA = '$database'
                      AND kcu.TABLE_NAME = '$table_name'
                      AND kcu.COLUMN_NAME = '$column_name'");

                if (empty($rows)) {
                    $results[] = '<span class="bad">' . $table_name . '.' . $column_name . ' does not reference other columns' . '</span>';
                } else {
                    foreach ($rows as $row) {
                        if ($row['CONSTRAINT_TYPE'] == 'FOREIGN KEY') {
                            $results[] = '<span class="good">' . $row['TABLE_NAME'] . '.' . $row['COLUMN_NAME'] . ' has a ' . $row['CONSTRAINT_TYPE'] . ' constraint with ' . $row['REFERENCED_TABLE_NAME'] . '.' . $row['REFERENCED_COLUMN_NAME'] . '</span>';
                        }
                    }
                }
            }
        }
        $this->results = $results;

    }

}