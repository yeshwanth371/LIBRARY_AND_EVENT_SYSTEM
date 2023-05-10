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
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) <= 0){
    echo "<script>if(window.confirm('Book with this ID Does not Exists..')){
        window.location.href = 'issue_book.html'
    }else{}</script>";
    exit();
}

$sql3 = "SELECT * FROM users WHERE regno = '$regno'";
$result2 = mysqli_query($conn,$sql3);

if(mysqli_num_rows($result2) <=0){
    echo "<script>if(window.confirm('User with this Registration Number Does not Exists..')){
        window.location.href = 'issue_book.html'
    }else{}</script>";
    exit();
}else{
    $status = 'active';
    $sql4 = "SELECT * FROM issuedbooks WHERE bid = '$bid' AND regno = '$regno' AND status ='$status' ";
    $result4 = mysqli_query($conn,$sql4);
    if(mysqli_num_rows($result4)>=1){
        echo "<script>if(window.confirm('User with this Registration Number has already taken this book..')){
            window.location.href = 'issue_book.html'
        }else{}</script>";
        exit();
    }else{

    
        $sql1 = "INSERT INTO issuedbooks(bid,regno,issueddate,status) VALUES ('$bid','$regno','$issueddate','$status')";
        $result = mysqli_query($conn, $sql1);
        if(! $result){
            echo "Error:" . $sql . "<br>" . mysqli_error($conn);
        }else{
            $sql5 = "SELECT * FROM books WHERE bid = '$bid'";
            $result5 = mysqli_query($conn,$sql5);
            $row = mysqli_fetch_assoc($result5);
            $row['count'] = $row['count'] - 1;
            $count = $row['count'];
            $sql2 = "UPDATE books  SET count = '$count' WHERE bid = '$bid'";
            $result1 = mysqli_query($conn,$sql2);
            if(! $result1){
                echo "Error:" . $sql . "<br>" . mysqli_error($conn);
            }
            
            header('Location: issue_book.html');
            
        }
    }
 
    
}

?>