<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="css/editorStyle.css">
    </head>
    <body>
    <header>
<?php
    session_start();
    // file name
    $username = $_SESSION['username'];
    
    //connecting to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');
    
    $sql = "SELECT logo FROM user_info WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 30);
    $cmd->execute();
    $logos = $cmd->Fetch();
    $logo = $logos[0];
    echo ('<img src="images/'.$logo.'" alt="movie poster" width="150" height="150">');
    $db = null;
?>
        <a class="mainHeader" id="admin" href="admins.php">Administrators</a>
        <a class="mainHeader" id="pages" href="editor.php">Pages</a>
        <a class="mainHeader" id="logo" href="logo.php">Logo</a>
        <a class="mainHeader" id="public" href="public-site.php">Public Site</a>
        <a class="mainHeader" id="account" href="accountMain.php">Control Panel</a>
        <a class="mainHeader"id="logout" href="logout.php">Log Out</a>
<?php
    if('location:accountMain.php') {
        echo'<script>
                var account = document.getElementById("account");
                account.style.setProperty("color", "yellow");
                account.style.setProperty("font-size", "135%");
            </script>';
    }
?>
        </header>
        <main>
            <h1>Control Panel</h1>
            <a href="admins.php"><button type="button" class="btn btn-primary btn-lg btn-block">Administrators</button></a>
            <a href="editor.php"><button type="button" class="btn btn-secondary btn-lg btn-block">Pages</button></a>
            <a href="logo.php"><button type="button" class="btn btn-secondary btn-lg btn-block">Logo</button></a>
            <button type="button" class="btn btn-secondary btn-lg btn-block">Public Site</button>
        </main>
    </body>
</html>