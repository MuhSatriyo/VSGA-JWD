<?php
    include "service/database.php";

    if(isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "INSERT INTO users(username, password) VALUES('$username', '$password')";

        if($db->query($sql)) {
            echo "SUKSES Registrasi";
        } else {
            echo "GAGAL Registrasi";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
        <input type="text" name="username" placeholder="username"><br>
        <input type="text" name="password" placeholder="password"><br>
        <button type="submit" name="login">Registrasi</button><br>
        <a href="login.php">Back To Login</a>
    </form>
</body>
</html>