<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Deleting Page...</title>
    </head>
    <body>
<?php
    $title = $_GET['title'];
    
    try {
        //connecting to database
        $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');
        //Deleting the page from database
        $sql = "DELETE FROM web_pages WHERE title = :title";
        //execute sql query
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
        $cmd->execute();
        //redirect user back to the editor
        header('location:editor.php');
    }
    catch(exception $e) {
        header('location:error.php');
    }
?>
    </body>
</html>