<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrators</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="css/editor.css">
    </head>
    <body>
    <!--header and my log out so it will terminate users session-->
    <header>
        <a href="logout.php">Log Out</a>
    </header>
    <main>
<?php
    //because i stored my username in a session start variable i am able to retrive and use it to greeet customer
    session_start();
    $username = $_SESSION['username'];
    echo('<h1>Welcome '.$username.'</h1>');


    //connecting to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');
    //Selecting info from web pages table
    $sql = "SELECT username, email FROM user_info";
    //execute sql query
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 100);
    $cmd->execute();
    //get info into variable students
    $infos = $cmd->fetchAll();

    //creating a table that stores all current webpages so student can add, edit, delete easily
    echo('<table class="table table-hover">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>');
    //importing all my data from database into table
    foreach($infos as $info) {
        echo('<tr><td>'.$info['username'].'</td><td>'.$info['email'].'</td><td><a href="editUser.php?username='.$info['username'].'&email='.$info['email'].'">Edit</a></td><td><a href="deleteUser.php?username='.$info['username'].'">Delete</a></td></tr>');
    }
    //close table
    echo('</table>');

    //dsiconnect db
    $db = null;
?>
            <!--button allows you to go to add page file-->
            <a href="accountMain.php"><button>Back</button></a>
        </main>
    </body>
</html>