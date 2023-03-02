<!DOCTYPE html>
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
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
</head>


<?php

$title = $_POST["title"];
$year = $_POST["year"];
$genre = $_POST["genre"];
$rating = $_POST["rating"];

$serverName = "127.0.0.1";
$userName = "root";
$password = "";
$port = "3306"; 
$db = "csc257";
    // 1. Create a connection
$conn = new mysqli($serverName, $userName, $password ,$db, $port);

//$output = '';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `movies`(`id`, `movie_title`, `movie_year`, `movie_genre`, `movie_rating`) 
    VALUES (NULL,'$title','$year','$genre','$rating');";

    if ($conn->query($sql) === TRUE) {
        echo "Data is in";
    } 
    else {
        echo "Error:".$sql."<br>".$conn->error;
    }


$sql = "SELECT `movie_title`, `movie_year`, `movie_genre`, `movie_rating` FROM `movies` WHERE 1;";
$result = $conn->query($sql);
    

if ($result->num_rows > 0) {
    echo "<table><th>Movie Title</th> <th>Year</th> <th>Genre</th> <th>IMDb Rating</th>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["movie_title"]. "</td> <td>" . $row["movie_year"]. "</td> <td>" . $row["movie_genre"]. "</td> <td>" . $row["movie_rating"]. "</td>";
    }
    echo "</table>";
} else {
    echo "0 results";
}



$conn->close();


?>

<body>
    <p><a href="logout.php">Logout</a></p>

</body>

</html>
