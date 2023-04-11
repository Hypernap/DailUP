<?php

include('connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone_no = $_POST['phone_no'];
    $profession = $_POST['profession'];
    $about = $_POST['about'];
    $additional = $_POST['additional'];

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
    } else {
    echo "Error creating database: " . $conn->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS catogories(
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
        FOREIGN KEY (field_id) REFERENCES catogories(id)
        )";

    if ($conn->query($sql) === TRUE) {
    echo "Table  worker_info created successfully";
    } else {
    echo "Error creating table: " . $conn->error;
    }

    $csql = "SELECT * from catogories where field='$profession'";

    $result = mysqli_query($conn,$csql);
        
    if ($result && mysqli_num_rows($result) == 0){
        $sql = "INSERT INTO catogories (field) VALUES ('$profession')";
        if (mysqli_query($conn, $sql)) {
            ;
        } else {
            echo 'Error inserting data: ' . mysqli_error($conn);
        }
    }
    $csql = "SELECT id from catogories where field='$profession'";
    $result = mysqli_query($conn,$csql);
    $fetch = mysqli_fetch_assoc($result);
    $idd = $fetch['id'];

    $sql = "INSERT INTO worker_info (user_name,age,phone,email,about,additional_info,rating,field_id,profile_pic)
            VALUES ('$name','$age','$phone_no','$email','$about','$additional',6.7,'$idd','user.png')";
    if (mysqli_query($conn, $sql)) {
        header('Location:sign-in.php');
    } else {
        echo 'Error inserting data: ' . mysqli_error($conn);
    }
}
?>