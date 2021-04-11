<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Saving Content...</title>
    </head>
    <body>
<?php
    session_start();
    $username = $_SESSION['username'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    //connecting to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');

    //if the user leaves the title empty redirect backj to the add oage section
    if(empty($title)) {
        header('location:addPage.php?titleEmpty=true');
    }
    //if its not thhen see if content is empty
    else {
        if(empty($content)) {
            header('location:addPage.php?contentEmpty=true');
        }
        //if its not then add both to the database
        else {
            try {
                $sql = "INSERT INTO web_pages(username, title, content) VALUES(:username, :title, :content)";

                $cmd = $db->prepare($sql);
                $cmd->bindParam(':username', $username, PDO::PARAM_STR, 25);
                $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
                $cmd->bindParam(':content', $content, PDO::PARAM_STR, 1000);
                $cmd->execute();
                $db = null;
                //redirect user back to the editor page
                header('location:editor.php');
            }
            catch(exception $e) {
                header('location:error.php');
            }
        }
    }
?>
    </body>
</html>
