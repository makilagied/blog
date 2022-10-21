<?php
include('database.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kim_blog";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$title=$_POST["title"];
$file=$_POST["img"];
$exp=$_POST["explain"];

$sql = "INSERT INTO posts (Title, Document, Explanations)
VALUES ('$title', '$file', '$exp')";

if (mysqli_query($connection, $sql)) {
    // header('location: ../posts.html');
    echo"
    <script>window.alert('records added' )</script>"; 
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>
