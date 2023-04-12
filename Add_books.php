<?php
session_start();
if(!isset($_SESSION['regno'])){
    header('Location: login.html');
    exit();
}

include('DB_connect.php');
$bid = mysqli_real_escape_string($conn, $_POST['bid']);
$bname = mysqli_real_escape_string($conn, $_POST['bname']);
$author = mysqli_real_escape_string($conn, $_POST['author']);
$edition = mysqli_real_escape_string($conn, $_POST['edition']);
$url = mysqli_real_escape_string($conn, $_POST['url']);
$count = mysqli_real_escape_string($conn,$_POST["count"]);
$sql = "SELECT * FROM books WHERE bid = '$bid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >= 1){
    echo "<script>if(window.confirm('Book with this ID Already Exists..')){
        window.location.href = 'addBooks.html'
    }else{}</script>";
    exit();
}else{
    $sql1 = "INSERT INTO books(bid,bname,author,edition,count) VALUES ('$bid','$bname','$author','$edition','$url','$count')";
    $result = mysqli_query($conn, $sql1);
    if(! $result){
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }else{
        header('Location: addBooks.html');
    }
}

?>