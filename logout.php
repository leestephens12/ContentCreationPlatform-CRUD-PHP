<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Loging Out...</title>
        <link href="css/registration.css" rel="stylesheet">
    </head>
    <body>
<?php
//terminate the users session so no left over data is left behind
    session_start();
    session_unset();
    session_destroy();
    header('location:login.php');
?>
    </body>
</html>