<?php

include "conn.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: login.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: logout.php');
}

?>

<!DOCTYPE html>

<html>
    <head>
    <link rel="stylesheet" href="styles.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
</head>
<body>
<form action="main_blueray2.php" method="post"> 
<div class="lables">
    <label>Movie Title</label>                 
    <input type="text" name="title" placeholder="Enter Movie Title">
    <label>Year</label>                 
    <input type="text" name="year" placeholder="Enter The Year The Movie Was Released">
    <label>Genre</label>                 
    <input type="text" name="genre" placeholder="Enter Movie Genre">
    <label>Movie Rating</label>                 
    <input type="text" name="rating" placeholder="Enter IMDb Rating">
                
    <input type="submit" name="submit" value="Submit" class="button">   
    <p><a href="logout.php">Logout</a></p>
    </form>
    </body>
</html>