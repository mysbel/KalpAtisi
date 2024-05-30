<?php
$hostname = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "mémoire";

$conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed : " . mysqli_connect_error()); 
}

$query = "INSERT INTO login (nom, password) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $query);
?>
