<?php
    include "conn.php";
    
    $email = $_GET['email']; 
    
    $sql="SELECT * FROM users where email='$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        //Already added
        echo "Email Already Added!";
    }else{
        //Not added in database
        echo "Username Available!";
    }
?>