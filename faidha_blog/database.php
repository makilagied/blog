

<?php

$connection=mysqli_connect("localhost","root","");
if($connection == false){
    die("Couldn't connect". mysqli_connect_error());
}
$connection->query("CREATE DATABASE IF NOT EXISTS `kim_blog`"); // this line checks if the database has been created if not it create a database

mysqli_select_db($connection,"kim_blog"); //this line select the created database
$stable="CREATE TABLE IF NOT EXISTS Administrator ( 
Firstname varchar(30)NOT NULL,
Sirname varchar(30)NOT NULL,
Username varchar(30)NOT NULL,
Passwords varchar(30)NOT NULL,
Email varchar(30)NOT NULL )";
$connection->query($stable); //the above lines create table and its columns if not available in the server

$stable1="CREATE TABLE IF NOT EXISTS posts ( 
Title varchar(300)NOT NULL,
Document BLOB NOT NULL,
Explanations Varchar(30)NOT NULL )";
$connection->query($stable1); //the above lines create table and its columns if not available in the server

// $sql = "SELECT * FROM Administrator";
// $result=mysqli_query($connection,$sql);
// // $count = mysql_num_rows($result);
// // if ($count==0){
//     $enter="INSERT INTO Administrator(Username,Passwords)VALUES('Admin','Admin')";
//     $connection->query($enter);
// // }
?>

