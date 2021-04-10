<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editor +</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
    </head>
    <body>
        <header>
            <h1>Edit User</h1>
            <a href="logout.php">Log Out</a>
        </header>
        <main>
        <form method="GET" action="editingUser.php">
            <label for="oldUsername">Old Username: </label>
            <input type="text" id="oldUsername" name="oldUsername">

            <label for="newUsername">New Username: </label>
            <input type="text" id="newUsername" name="newUsername">
    
            <label for="oldEmail">Old email: </label>
            <input type="email" id="oldEmail" name="oldEmail">

            <label for="newEmail">New email: </label>
            <input type="email" id="newEmail" name="newEmail">
            <input id="submit" type="submit" value="Submit">
            </form>
            <a href="admins.php"><button>Back</button></a>
        <main>
    </body>
</html