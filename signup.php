<?php
include("DB_connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $regno = mysqli_real_escape_string($conn, $_POST['regno']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneno = mysqli_real_escape_string($conn, $_POST['phoneno']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
    die("Passwords do not match");
    }
    
    $sql1 = "SELECT * FROM users WHERE regno = '$regno' OR email = '$email'";
    $result = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result) >= 1){
        echo "<script>if(window.confirm('Credentials Already Exists..')){
            window.location.href = 'signup.html'
        }else{}</script>";
        exit();
    }else{

    // Insert user information into database
    $sql = "INSERT INTO users (regno,email,phoneno,username,  password) VALUES ( '$regno','$email','$phoneno','$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>if(window.confirm('Account Created Successfully !!!!!!')){
            window.location.href = 'login.html'
        }else{}</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
}

?>