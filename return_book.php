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
    if(!$result1){
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }else{
        $sql5 = "SELECT * FROM books WHERE bid = '$bid'";
        $result5 = mysqli_query($conn,$sql5);
        $row = mysqli_fetch_assoc($result5);
        $row['count'] = $row['count'] + 1;
        $count = $row['count'];
        $sql2 = "UPDATE books  SET count = '$count' WHERE bid = '$bid'";
        $result1 = mysqli_query($conn,$sql2);
        if(! $result1){
            echo "Error:" . $sql . "<br>" . mysqli_error($conn);
        }

        header('Location: return_book.html');
    }
    
    
}else{ 

    echo "<script>if(window.confirm('Invalid Details..')){
        window.location.href = 'return_book.html'
    }else{}</script>";
    
}

?>