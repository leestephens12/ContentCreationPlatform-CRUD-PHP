<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editing...</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
    </head>
    <body>
<?php
    $oldUsername = $_GET['oldUsername'];
    $oldEmail = $_GET['oldEmail'];
    $newUsername = $_GET['newUsername'];
    $newEmail = $_GET['newEmail'];

    try {
        $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');
        //Deleting the page from database
        $sql = "UPDATE user_info SET username = :newUsername, email = :newEmail WHERE username = :oldUsername";
        //execute sql query
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':newUsername', $newUsername, PDO::PARAM_STR, 100);
        $cmd->bindParam(':oldUsername', $oldUsername, PDO::PARAM_STR, 100);
        $cmd->bindParam(':newEmail', $newEmail, PDO::PARAM_STR, 100);
        $cmd->execute();
        //redirect user back to the editor
        header('location:admins.php');

        $db = null;
    }
    catch(exception $e) {
        header('location:error.php');
    }
?>
        <main>
    </body>
</html