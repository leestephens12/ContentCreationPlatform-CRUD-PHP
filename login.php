<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Log-In</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <header>
            <h1>Editor+ Premium Package</h1>
            <h2>Log-In</h2>
        </header>
        <!--Form to capture username, password-->
        <form method="post" action="checkUserInformation.php">
            <div class="username">
                <label for="username">Username: </label>
                <input type="text" id="username" name="username" placeholder="username" required>
                <p id="wrongUser"></p>
            </div>
            <div class="password">
                <label for="password">Password: </label>
                <input type="password" id="password" name="password" placeholder="password" required>
                <p id="wrongPass"></p>
            </div>
            <div class="buttons">
                <input id="submit" type="submit" Value="Submit">
                <button><a href="register.php">Register</a></button>
            </div>
        </form>
<?php
    //if the variable is passed that the password input is wrong style the area read and leave message
    if(!empty($_GET['invalidPass'])) {
        echo('<style>
                .password{background-color: red;}
            </style>');
        echo('<script>
                document.getElementById("wrongPass").innerHTML = "Incorrect Password";
            </script>');
    }
    //if the variable is passed that the username input is wrong style the area read and leave message
    if(!empty($_GET['wrongUser'])) {
        echo('<style>
                .username{background-color: red;}
            </style>');
        echo('<script>
                document.getElementById("wrongUser").innerHTML = "Username Does not exist. Proceed to registration";
            </script>');
    }
    //if the variable is passed that the user just registered their account give them a greeting message and redirect them to logging in
    if(!empty($_GET['register'])) {
        echo('<script>
                alert("Your account has been created succesfully. Now login to begin");
            </script>');
    }
?>
    </body>
</html>