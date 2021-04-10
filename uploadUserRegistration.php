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
    $confirmPass = $_POST['confirmPass'];
    $email = $_POST['email'];
    //hashing the password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $confirmPass = password_hash($confirmPass, PASSWORD_DEFAULT);

    //connecting to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');
    //selecting all the data from the table where the usernames match
    $sql = "SELECT * FROM user_info WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $cmd->execute();
    $userId = $cmd->Fetch();
    //if the user name already exists redirect to register page
    if($userId) {
        $db = null;
        header('location:register.php?usernameExists=true');
    }
    //if it doesnt exist already we check to see if email is already in use
    else {
        $sql = "SELECT * FROM user_info WHERE email = :email";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR, 30);
        $cmd->execute();
        $userEmail = $cmd->Fetch();
        // if the emailk is already in use redirect to register page
            if($userEmail){
                header('location:register.php?emailExists=true');
            }
            //if its not  and the passswords both match insert all the variables into the database
            else {
                if($password = $confirmPass) {
                    $sql = "INSERT INTO user_info(username, password, email) VALUES(:username, :password, :email)";

                    $cmd = $db->prepare($sql);
                    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 25);
                    $cmd->bindParam(':password', $password, PDO::PARAM_STR, 300);
                    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 30);
                    $cmd->execute();
                    
                    $db = null;
                    //redirect user back tot he login oage so they can now sign in 
                    header('location:login.php?register=true');
                }
                else {
                    // if the passwords do not match redirect user back to register page
                    header('location:register.php?passNoMatch=true');
                }
            }
    }
   
    

?>
    </body>
</html>