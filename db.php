<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dailup";

$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Catogories(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    field VARCHAR(30) NOT NULL
    )";

if ($conn->query($sql) === TRUE) {
  echo "Table Catogories created";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS worker_info  (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    age INT(3) NOT NULL,
    phone INT(9) NOT NULL,
    email VARCHAR(50) NOT NULL,
    about VARCHAR(255) NOT NULL,
    additional_info VARCHAR(255) NOT NULL,
    rating FLOAT(2),
    field_id INT(6) UNSIGNED,
    profile_pic VARCHAR(255) NOT NULL DEFAULT 'user.png',
    FOREIGN KEY (field_id) REFERENCES Catogories(id)
    )AUTO_INCREMENT=000001";

if ($conn->query($sql) === TRUE) {
  echo "Table  worker_info created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO Catogories
VALUES (1,'Teaching')";
if($conn->query($sql)===FALSE) {
  echo $conn->error;
}
else {
  echo "chor catogries";
}

$sql = "INSERT INTO worker_info
VALUES (1,'Ram',18,99999,'ram@gmail.com','i am theif','addition_info de rha hu',5.5,1,'user.png')";
if($conn->query($sql)===FALSE) {
  echo $conn->error;
}
else {
  echo "worker inserted";
}


$conn->close();
?>