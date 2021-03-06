<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Content View</title>
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

    $counter = 0;
    //Selecting info from web pages table
    $sql = "SELECT title FROM web_pages";
    //execute sql query
    $cmd = $db->prepare($sql);
    $cmd->execute();
    //get info into variable students
    $pages = $cmd->fetchAll();
    foreach($pages as $page) {
        $counter++;
        echo('<a class="mainHeader" href="index.php?page_id='.$counter.'">'.$page['title'].'</a>');
    }
?>
        <a class="mainHeader" href="login.php">Login</a>
    </header>
    <main id="main">
<?php
    if(isset($_GET['page_id'])) {
        $page_id = $_GET['page_id'];
        //Selecting info from web pages table
        $sql = "SELECT title, content, background_color, font_color FROM web_pages";
        //execute sql query
        $cmd->bindParam(':page_id', $page_id, PDO::PARAM_INT);
        $cmd = $db->prepare($sql);
        $cmd->execute();
        //get info into variable students
        $webPages = $cmd->fetchAll();
        echo('<h1>'.$webPages[$page_id - 1]['title'].'</h1>');
        echo('<p>'.$webPages[$page_id - 1]['content'].'</p>');
        echo('<script>document.getElementbyId("main")</script>');
        echo('<script>main.style.setProperty("background-color", "'.$webPages[$page_id - 1]['background_color'].'");</script>');
        echo('<script>main.style.setProperty("color", "'.$webPages[$page_id - 1]['font_color'].'");</script>');
    }
    $db = null;
?>
    </main>
    </body>
</html>