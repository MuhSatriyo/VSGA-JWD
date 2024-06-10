<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "daftar";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error) {
    echo "DB Disconnect";
    die("error!");
}

echo "<h2>KONEKSI BERHASIL</h2>";

?>