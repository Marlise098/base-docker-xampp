<?php
$servername = "mysql_db";
$username = "root";
$password = "root";
$dbname = "streamflix";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
