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
$sql = "SELECT * FROM books WHERE bid = '$bid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >= 1){
    $sql1 = "DELETE FROM `books` WHERE bid = '$bid'";
    $result = mysqli_query($conn, $sql1);
    if(! $result){
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }else{
        header('Location: deleteBook.html');
    }
}else{
    echo "<script>if(window.confirm('Book with this ID Does not Exist..')){
        window.location.href = 'deleteBook.html'
    }else{}</script>";
    exit();
}

?>