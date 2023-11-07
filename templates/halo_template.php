<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= BASE_URL ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title><?= PROJECT_NAME ?></title>

    <!-- Fomantic core CSS -->
    <link href="node_modules/fomantic-ui-css/semantic.min.css?<?= COMMIT_HASH ?>" rel="stylesheet">
    <!-- Site core CSS -->
    <link href="assets/css/main.css?<?= COMMIT_HASH ?>" rel="stylesheet">

    <!-- jQuery -->
    <script src="node_modules/jquery/dist/jquery.min.js?<?= COMMIT_HASH ?>"></script>

</head>

<body>

<div class="ui inverted menu">
    <a class="header item" href="#">Navbar</a>
    <a class="item" href="#">Back to app...</a>
    <a class="item <?= $action == 'index' ? 'active' : ''?>" href="halo">Module generation</a>
    <a class="item <?= $action == 'fkcheck' ? 'active' : ''?>" href="halo/fkcheck">FK check</a>

    <div class="right menu">
    </div>
</div>

<div class="ui container">
    <?php
    /** @var string $controller set in Application::__construct() */
    /** @var string $action set in Application::__construct() */
    if (!file_exists("views/$controller/{$controller}_$action.php")) {
        error_out('The view <i>views/' . $controller . '/' . $controller . '_' . $action . '.php</i> does not exist. Create that file.');
    }
    @require "views/$controller/{$controller}_$action.php";
    ?>
</div>

<?php require 'templates/partials/error_modal.php'; ?>

<!-- Fomantic core JavaScript -->
<script src="node_modules/fomantic-ui-css/semantic.min.js?<?= COMMIT_HASH ?>"></script>
<script src="assets/js/main.js?<?= COMMIT_HASH ?>"></script>
</body>
</html>

<?php require 'system/error_translations.php' ?>
