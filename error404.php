<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error 404</title>
        <link rel="stylesheet" href="css/editorStyle.css">
    </head>
    <body>
    <header>
<?php
    try {
        session_start();
        // file name
        $username = $_SESSION['username'];
    
        //connecting to database
        $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');
    
        $sql = "SELECT logo FROM user_info";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $logos = $cmd->Fetch();
        $logo = $logos[0];
        echo ('<img src="images/'.$logo.'" alt="movie poster" width="150" height="100">');
        $db = null;
    }
    catch(exception $e) {
        header('location:error.php');
    }
    
?>
            <a class="mainHeader" id="admin" href="admins.php">Administrators</a>
            <a class="mainHeader" id="pages" href="editor.php">Pages</a>
            <a class="mainHeader" id="logo" href="logo.php">Logo</a>
            <a class="mainHeader" id="public" href="index.php">Public Site</a>
            <a class="mainHeader" id="account" href="accountMain.php">Control Panel</a>
            <a class="mainHeader" id="logout" href="logout.php">Log Out</a>
        </header>
        <main>
            <h1>Error</h1>
            <p id="error">There was an error while loading requested page!<br> Page not found!<p>
        </main>
    </body>
</html>