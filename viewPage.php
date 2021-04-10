<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editor +</title>
        <link rel="stylesheet" href="css/pageView.css" />
    </head>
    <body>
        <header>
            <a href="logout.php">Log Out</a>
            <br><br>
            <a href="editor.php">Back to Editor</a>
        </header>
        <main>
<?php
    //if the variabel is passed that there is a title output the users content to the screen
    if(!empty($_GET['title'])) {
        $title = $_GET['title'];
        $content = $_GET['content'];

        echo('<h1>'.$title.'</h1>');
        echo('<p>'.$content.'</p>');
    }
?>
        </main>
    </body>
</html>