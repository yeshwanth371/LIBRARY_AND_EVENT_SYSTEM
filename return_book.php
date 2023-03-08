<?php
session_start();
if(!isset($_SESSION['regno'])){
    header('Location: login.html');
    exit();
}

include('DB_connect.php');
$bid = mysqli_real_escape_string($conn, $_POST['bid']);
$regno = mysqli_real_escape_string($conn, $_POST['regno']);
$returndate = mysqli_real_escape_string($conn, $_POST['returndate']);


$sql = "SELECT * FROM issuedbooks WHERE bid = '$bid' AND regno = '$regno'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    $status = 'inactive';
    $sql1 = "UPDATE `issuedbooks` SET `status`='inactive',`returndate`='$returndate' WHERE bid = '$bid' AND regno = '$regno'";
    $result1 = mysqli_query($conn, $sql1);
    header('Location: issue_book.html');
}else{        
    echo "error";
    
}

?>