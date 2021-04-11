<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Page</title>
        <link href="css/addPage.css" rel="stylesheet">
    </head>
    <body>
    <!--logout to terminate users session-->
        <header>
            <a href="logout.php">Log Out</a>
        </header>
        <main>
            <h1>Create Page</h1>
            <!--creating a form to pass information along to validate it and input in database-->
            <form method="post" action="validateAddPage.php">
            <div class="title">
                <label for="title">Title: </label>
                <input type="text" id="title" name="title" value="">
            </div>
            <div class="content">
                <label for="content">Content: </label>
                <textarea id="content" name="content" rows="10" cols="50"></textarea>
            </div>
            <div class="tools">
                <label for="backgroundColor">Background Color: </label>
                <select name="backgroundColor" id="backgroundColor">
                    <option value="white">White</option>
                    <option value="red">Red</option>
                    <option value="purple">Purple</option>
                    <option value="black">Black</option>
                    <option value="green">Green</option>
                    <option value="pink">Pink</option>
                    <option value="orange">Orange</option>
                    <option value="blue">Blue</option>
                    <option value="grey">Grey</option>
                </select>

                <label for="fontColor">Font Color: </label>
                <select name="fontColor" id="fontColor">
                    <option value="black">Black</option>
                    <option value="white">White</option>
                    <option value="red">Red</option>
                    <option value="purple">Purple</option>
                    <option value="green">Green</option>
                    <option value="pink">Pink</option>
                    <option value="orange">Orange</option>
                    <option value="blue">Blue</option>
                    <option value="grey">Grey</option>
                </select>
            </div>
            <!--submit button to bring me to my next page and bring over inputs-->
                <input id="submit" type="submit" value="Submit">
            </form>
<?php
    //if there was a title variable in the url it will poplate the title and content inputs so user can edit them
    if(!empty($_GET['title'])) {
        $title = $_GET['title'];
        $content = $_GET['content'];
        $username = $_GET['username'];

        echo('<script>document.getElementById("title").value="'.$title.'"</script>');
        echo('<script>document.getElementById("content").value="'.$content.'"</script>');

        try {
            //connecting to database
            $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');
            //Deleting the page from database
            $sql = "DELETE FROM web_pages WHERE title = :title AND content = :content";
            //execute sql query
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':title', $title, PDO::PARAM_STR, 100);
            $cmd->bindParam(':content', $content, PDO::PARAM_STR, 1000);
            $cmd->execute();

            $db = null;
        }
        catch(exception $e) {
            header('location:error.php');
        }
    }
?>  
        </main>
    </body>
</html>