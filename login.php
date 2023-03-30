<?php
    session_start();
    include('connection.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['username'];
        $pas = $_POST['password'];
        
        $csql = "SELECT * from workers where worker_uname = '$name' or worker_pass = '$pas'";

        $result = mysqli_query($conn,$csql);
        
        if ($result && mysqli_num_rows($result) > 0){
            $user_cred = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user_cred['worker_id'];
            
        }
        else{
            $_SESSION['user_error'] = "User Does Not Exists";
            header('Location:sign-in.php');
        }

    }
?>