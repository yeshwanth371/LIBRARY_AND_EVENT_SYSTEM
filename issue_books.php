<?php
session_start();
if(!isset($_SESSION['regno'])){
    header('Location: login.html');
    exit();
}

include('DB_connect.php');
$bid = mysqli_real_escape_string($conn, $_POST['bid']);
$regno = mysqli_real_escape_string($conn, $_POST['regno']);
$issueddate = mysqli_real_escape_string($conn, $_POST['issueddate']);

$sql = "SELECT * FROM books WHERE bid = '$bid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) <= 0){
    echo "<script>if(window.confirm('Book with this ID Does not Exists..')){
        window.location.href = 'issue_book.html'
    }else{}</script>";
    exit();
}

$sql1 = "SELECT * FROM users WHERE regno = '$regno'";
$result2 = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result2) <=0){
    echo "<script>if(window.confirm('User with this Registration Number Does not Exists..')){
        window.location.href = 'issue_book.html'
    }else{}</script>";
    exit();
}
else{
    $status = 'active';
    $sql1 = "INSERT INTO issuedbooks(bid,regno,issueddate,status) VALUES ('$bid','$regno','$issueddate','$status')";
    $result = mysqli_query($conn, $sql1);
    if(! $result){
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }else{
        
        header('Location: issue_book.html');
    }
}

?>