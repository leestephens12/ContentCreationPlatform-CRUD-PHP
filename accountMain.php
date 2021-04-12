<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account</title>
<?php
    try {
        //connecting to database
        $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');
    
        $sql = "SELECT logo FROM user_info";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $logos = $cmd->Fetch();
        $logo = $logos[0];
        echo ('<link rel="shortcut icon" href="images/'.$logo.'" width="150" height="100">');
        $db = null;
    }
    catch(exception $e) {
        header('location:error.php');
    }
?>
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="css/editorStyle.css">
    </head>
    <body>
    <header>
<?php
    session_start();
    // file name
    $username = $_SESSION['username'];
    try {
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
            <a href="admins.php"><button>Administrators</button></a>
            <a href="editor.php"><button>Pages</button></a>
            <a href="logo.php"><button>Logo</button></a>
            <a href="index.php"><button>Public Site</button></a>
        </main>
    </body>
</html>