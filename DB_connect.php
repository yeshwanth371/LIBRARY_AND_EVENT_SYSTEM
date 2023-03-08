<?php
$hostname = "localhost:3307";
$username = "root";
$password = '';
$database = "library";
$conn = new mysqli($hostname,$username,$password,$database);
if(! $conn){
    die("connection failed".$conn->connect_error);
}
?>