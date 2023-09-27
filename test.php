<?php
function __($phrase, $args = [])
{
    return $phrase;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Semantic UI Responsive Input Boxes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">

</head>
<body>

<div class="ui stackable four column grid container">
    <div class="column">
        <div class="ui fluid input">
            <input type="text" name="userName" placeholder="<?= __('Name') ?>">
        </div>
    </div>
    <div class="column">
        <div class="ui fluid input">
            <input type="text" name="userEmail" placeholder="<?= __('Email') ?>">
        </div>
    </div>
    <div class="column">
        <div class="ui fluid input">
            <input type="password" name="userPassword" placeholder="<?= __('Password') ?>">
        </div>
    </div>
    <div class="column">
        <button class="ui green button">Add</button>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $("#user_password").focus(function(){
        this.type = "text";
    }).blur(function(){
        this.type = "password";
    })
</script>
</body>
</html>
