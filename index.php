<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Content View</title>
        <link rel="stylesheet" href="css/editorStyle.css">
    </head>
    <body>
    <header>
<?php
    //terminate the users session so no left over data is left behind
    session_start();
    session_unset();
    session_destroy();
    // file name
    //connecting to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');
    
    $sql = "SELECT logo FROM user_info";
    $cmd = $db->prepare($sql);
    $cmd->execute();
    $logos = $cmd->Fetch();
    $logo = $logos[0];
    echo ('<img src="images/'.$logo.'" alt="movie poster" width="150" height="100">');
    
?>
        <!--<a class="mainHeader" id="admin" href="admins.php">Administrators</a>
        <a class="mainHeader" id="pages" href="editor.php">Pages</a>
        <a class="mainHeader" id="logo" href="logo.php">Logo</a>
        <a class="mainHeader" id="public" href="index.php">Public Site</a>
        <a class="mainHeader" id="account" href="accountMain.php">Control Panel</a>
        <a class="mainHeader" id="logout" href="logout.php">Log Out</a>-->
<?php
if(isset($username)){
    $username = $_GET['username'];
    //Selecting info from web pages table
    $sql = "SELECT * FROM web_pages WHERE username = :username";
    //execute sql query
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $cmd->execute();
    //get info into variable students
    $infos = $cmd->fetchAll();
    foreach($infos as $info) {
        echo($info['title']);
    }
}

?>
    </header>

    <main>
<?php
    if(empty($username)) {
        echo '<h1>Please input a username querystring into the url bar</h1>';
    }
$db = null;
?>
    </main>
    </body>
</html>