<?php
    include "conn.php";
    session_start();
    
    $name = $_GET['name'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    
    $sqlinp= "INSERT INTO users (name, email, password) VALUES (?,?,?)";
    if($stmt = mysqli_prepare($conn, $sqlinp)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
        
        
        mysqli_stmt_execute($stmt);
        $_SESSION['login']=1;
        echo "Data added successfully";
    }else{
        echo "Error occured";
    }
?>