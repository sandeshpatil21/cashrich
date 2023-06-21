<?php
    session_start();
    
    include "conn.php";
    
    $email = $_GET['email'];
    $password = $_GET['password'];
    
    $sql = "SELECT * FROM users where email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)>0){
        echo "Login Success";
    }else{
        echo "Email Id & password doesnt match";
    }

?>