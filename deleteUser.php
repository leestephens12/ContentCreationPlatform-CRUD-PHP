<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Deleting Page...</title>
    </head>
    <body>
<?php
    $username = $_GET['username'];

    try {
        //connecting to database
        $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');
        //Deleting the page from database
        $sql = "DELETE FROM user_info WHERE username = :username";
        //execute sql query
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
        $cmd->execute();
        //redirect user back to the editor
        header('location:admins.php');

        $db = null;
    }
    catch(exception $e) {
        header('location:error.php');
    }
?>
    </body>
</html>