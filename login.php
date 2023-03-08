<?php
include("DB_connect.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regno = mysqli_real_escape_string($conn, $_POST['regno']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Retrieve user information from database
    $sql = "SELECT * FROM users WHERE regno='$regno' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    // Check if user exists
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['regno'] = $user['regno'];
        $test = $_SESSION['regno'];
        if($test == 'admin'){
            header("Location: adminHome.html");
            exit();
        }
        header("Location: Home.html");
    } else {
        echo "<script>if(window.confirm('Invalid Credentials')){
            window.location.href = 'login.html'
        }else{}</script>";
    }
    } 

?>