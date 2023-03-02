<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    $uname = $_POST["uname"];
    $pwd = $_POST["pword"];

    require_once 'conn.php';
    
    $sql = "INSERT INTO `blueraytb`(`blueraytb_id`, `name`, `email`, `username`, `pwd`) 
        VALUES (NULL,'$name','$email','$uname','$pwd');";
    
        if ($conn->query($sql) === TRUE) {
            header('Location: login.php');
        } 
        else {
            echo "Error:".$sql."<br>".$conn->error;
        }
    
    
    $conn->close();
    
    
    