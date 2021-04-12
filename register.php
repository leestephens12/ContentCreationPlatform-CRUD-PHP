<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Registration</title>
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
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <header>
            <h1>Editor+ Premium Package</h1>
            <h2>Log-In</h2>
        </header>
        <!--form to capture username, password, password confirm and email-->
        <form method="post" action="uploadUserRegistration.php">
        <div class="username">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" placeholder="username" required>
            <p id="userExists"></p>
        </div>
        <div class="password">
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" placeholder="password" required>
        </div>
        <div class="confirmPass">
            <label for="confirmPass">Confrim Password: </label>
            <input type="password" id="confirmPass" name="confirmPass" placeholder="Confirm Password" required>
            <p id="passNoMatch"></p>
        </div>
        <div class="email">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="bobsmith@gmail.com" required>
            <p id="emailExists"></p>
        </div>

            <input id="submit" type="submit" Value="Submit">
            <button><a href="login.php">Back</a></button>
<?php
    //if the username input alreayd exists leave warning message and style it red
    if(!empty($_GET['usernameExists'])) {
        echo('<style>
                .username{background-color: red;}
            </style>');
        echo('<script>
                document.getElementById("userExists").innerHTML = "This username already exists select a new one";
            </script>');
    }
    //if email is already in use leave warning message and style it red
    if(!empty($_GET['emailExists'])) {
        echo('<style>
                .email{background-color: red;}
            </style>');
        echo('<script>
                document.getElementById("emailExists").innerHTML = "This email is already in use";
            </script>');
    }
    //if the passswords input do not match style red and leave warning message
    if(!empty($_GET['passNoMatch'])) {
        echo('<style>
                .confirmPass{background-color: red;}
            </style>');
        echo('<script>
                document.getElementById("passNoMatch").innerHTML = "Passwords do not match";
            </script>');
    }
?>
        </form>
    </body>
</html>