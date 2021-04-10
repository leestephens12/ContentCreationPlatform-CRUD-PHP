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
        <a class="mainHeader" id="admin" href="admins.php">Administrators</a>
        <a class="mainHeader" id="pages" href="editor.php">Pages</a>
        <a class="mainHeader" id="logo" href="logo.php">Logo</a>
        <a class="mainHeader" id="public" href="public-site.php">Public Site</a>
        <a class="mainHeader" id="account" href="accountMain.php">Control Panel</a>
        <a class="mainHeader" id="logout" href="logout.php">Log Out</a>
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