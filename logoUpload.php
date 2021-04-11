<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
    session_start();
    // file name
    $username = $_SESSION['username'];
    $logo = session_id() . "-" . $_FILES['logo']['name'];
    move_uploaded_file($_FILES['logo']['tmp_name'], "images/$logo");

    try {
        $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');
        //Deleting the page from database
        $sql = "UPDATE user_info SET logo = :logo WHERE username = :username";
        //execute sql query
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':logo', $logo, PDO::PARAM_STR, 100);
        $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
        $cmd->execute();

        $db = null;
        header('location:logo.php');
    }
    catch(exception $e) {
        header('location:error.php');
    }
?>

</body>
</html>