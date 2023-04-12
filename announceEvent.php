<?php
session_start();
if(! isset($_SESSION['regno'])){
    header('Location: login.html');
    exit();
}
include('DB_connect.php');
$regno = $_SESSION['regno'];
$title = mysqli_real_escape_string($conn, $_POST['title']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$time = mysqli_real_escape_string($conn, $_POST['time']);
$sql = "SELECT * FROM events WHERE title = '$title'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >= 1){
    echo "<script>if(window.confirm('Event with this title Already Exists..')){
        window.location.href = 'announceEvent.html'
    }else{}</script>";
    exit();
}else{
    $sql1 = "INSERT INTO events(regno,title,location,description,date,time) VALUES ('$regno','$title','$location','$description','$date','$time')";
    $result = mysqli_query($conn, $sql1);
    if(! $result){
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }else{
        echo "<script>if(window.confirm('Event Announced Successfully..')){
            window.location.href = 'announceEvent.html'
        }else{}</script>";
    }
}
?>