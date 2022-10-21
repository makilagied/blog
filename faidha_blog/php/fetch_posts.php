<?php
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

$sql = "SELECT * FROM posts";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo  " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($connection);
?>