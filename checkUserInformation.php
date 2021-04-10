<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Saving Information...</title>
    </head>
    <body>
<?php
    //declaring my variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    //connecting to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');

    $sql = "SELECT * FROM user_info WHERE username = :username";

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $cmd->execute();

    //user id gets the username that is outputted from our database search
    $userId = $cmd->Fetch();
    //if there is no username found it will return to login page since user did not input correct username
    if(!$userId) {
        $db = null;
        header('location:login.php?wrongUser=true');
    }
    else{
        //if the user name is found now we check to see if the hashed passswords match up
        if(password_verify($password, $userId['password'])) {
            session_start();
            //stroing my  username in session variable
            $_SESSION['username'] = $username;
            $db = null;
            //redirecting user to the actual website because all their info is correct
            header('location:accountMain.php');
        }
        else {
            $db = null;
            //if the password was incorrect it will redirect back to the login page
            header('location:login.php?invalidPass=true');
        }
    }
    
?>
    </body>
</html>