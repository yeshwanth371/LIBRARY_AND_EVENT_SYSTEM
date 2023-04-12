<?php
session_start();
if(!isset($_SESSION['regno'])){
    header('Location: login.html');
    exit();
}

include('DB_connect.php');
$regno = $_SESSION['regno'];
$id = mysqli_real_escape_string($conn, $_POST['id']);
$sql = "SELECT * FROM events WHERE id = '$id' and regno = '$regno'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >= 1){
    $sql1 = "DELETE FROM `events` WHERE id = '$id' and regno = '$regno'";
    $result = mysqli_query($conn, $sql1);
    if(! $result){
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }else{
        header('Location: deleteEvent.html');
    }
}else{
    echo "<script>if(window.confirm('Event with this ID Does not Exist..')){
        window.location.href = 'deleteEvent.html'
    }else{}</script>";
    exit();
}

?>