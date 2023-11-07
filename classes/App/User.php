<?php namespace App;

/**
 * Created by PhpStorm.
 * User: henno
 * Date: 29/10/16
 * Time: 22:24
 */
class User
{
    // To hold the logged-in user data
    public static $data;

    static function register($userName, $userEmail, $userPassword, $userIsAdmin = 0)
    {
        // Get data to be inserted from function argument list
        $data = get_defined_vars();

        // Hash the password
        $data['userPassword'] = password_hash($userPassword, PASSWORD_DEFAULT);

        // Insert user into database
        $userId = Db::insert('users', $data);

        // Return new user's ID
        return $userId;
    }

    public static function get($criteria = null, $orderBy = null)
    {

        $criteria = $criteria ? 'AND ' . implode("AND", $criteria) : '';
        $orderBy = $orderBy ? $orderBy : 'userName';
        return Db::getAll("
            SELECT userId, userName, userEmail, userIsAdmin 
            FROM users
            WHERE userDeleted=0 $criteria 
            ORDER BY $orderBy");
    }

    public static function login($userId)
    {
        Activity::create(ACTIVITY_LOGIN, $userId);
        $_SESSION['userId'] = $userId;
    }

    public static function edit(int $userId, array $data)
    {
        if (!is_numeric($userId) || $userId < 0) {
            throw new \Exception('Invalid userId');
        }

        Db::update('users', $data, "userId = $userId");
    }

    public static function delete(int $userId)
    {
        if (!is_numeric($userId) || $userId < 0) {
            throw new \Exception('Invalid userId');
        }

        // Attempt to delete user from the database (works if user does not have related records in other tables)
        try {
            Db::delete('users', 'userId = ?', [$userId]);
        } catch (\Exception $e) {
            // If removing user did not work due to foreign key constraints then mark the user as deleted
            Db::update('users', [
                'userDeleted' => 1
            ], "userId=$userId");
        }
    }


    /**
     * @throws \Exception if user is not logged in
     */
    public static function isAdmin(): bool
    {
        // Ensure that user data is loaded
        self::ensureUserDataLoaded();

        // Return true if user is an admin, false otherwise
        return (bool)self::$data['userIsAdmin'];
    }

    /**
     * @throws \Exception
     */
    private static function ensureUserDataLoaded(): void
    {
        if (!isset(self::$data)) {
            self::loadUserData();
        }
    }

    /**
     * @throws \Exception
     */
    private static function loadUserData(): void
    {
        if (!isset($_SESSION['userId'])) {
            throw new \Exception('User is not logged in');
        }

        self::$data = Db::getFirst("
            SELECT userId, userName, userEmail, userIsAdmin, clientId
            FROM users
            WHERE userId = ?", [$_SESSION['userId']]);
    }

    /**
     * @throws \Exception if user is not logged in
     */
    public static function getClientId()
    {
        // Ensure that user data is loaded
        self::ensureUserDataLoaded();

        // Return clientId
        return self::$data['clientId'];
    }

}