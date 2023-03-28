<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$dbname = "dailup";
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$sql = "CREATE TABLE Catogories(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    field VARCHAR(30) NOT NULL
    )";

$sql = "CREATE TABLE worker_info (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    age INT(3) NOT NULL,
    phone INT(9) NOT NULL,
    email VARCHAR(50) NOT NULL,
    about VARCHAR(255) NOT NULL,
    rating FLOAT(2),
    field_id INT(6) UNSIGNED,
    profile_pic VARCHAR(255) NOT NULL DEFAULT 'user.png',
    FOREIGN KEY (field_id) REFERENCES Catogories(id)
    )AUTO_INCREMENT=000001";
    

$conn->close();
?>