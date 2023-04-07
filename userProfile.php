<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    </head>
    <body>
    <?php
        
        session_start();
        if (!isset($_SESSION['regno'])) {
            // Redirect to login page
            header("Location: login.html");
            exit();
        }else{
            include('DB_connect.php');
            $regno = $_SESSION['regno'];
            $sql = "SELECT * FROM users WHERE regno = '$regno'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $regno = $row['regno'];
                    $email = $row['email'];
                    $phoneno = $row['phoneno'];
                    $username = $row['username'];
                    $password = $row['password'];
        
                }
            
            }else{
                echo "No results found";
            }
            
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $phoneno = mysqli_real_escape_string($conn, $_POST['phoneno']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

                // Check if password and confirm password match
                if ($password !== $confirm_password) {
                    die("Passwords do not match");
                }

                $sql = "UPDATE users SET phoneno = '$phoneno', password = '$password' WHERE regno = '$regno'";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>if(window.confirm('Profile Updated Successfully !!!!!!')){
                        window.location.href = 'userProfile2.php'
                    }else{}</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
    ?>
        <div class="signupFrm">
            <form action="userProfile2.php" method="POST" class="form" name="profileForm" ">
            <h1 class="title">Profile</h1>
            
            <div class="inputContainer">
                <input type="text" class="input" id="regno" name="regno" value="<?php echo $regno; ?>" readonly required>
                <label for="regno" class="label">Registration Number</label>
            </div>

            <div class="inputContainer">
                <input type="email" class="input" id="email" name="email" value="<?php echo $email; ?>" readonly required>
                <label for="email" class="label">Email</label>
            </div>

            <div class="inputContainer">
                <input type="phoneno" class="input" id="phoneno" name="phoneno" value="<?php echo $phoneno; ?>" required>
                <label for="phoneno" class="label">Phone Number</label>
            </div>
            
            <div class="inputContainer">
                <input type="text" class="input" id="username" name="username" value="<?php echo $username; ?>" readonly required>
                <label for="username" class="label">Name</label>
            </div>
        
            <div class="inputContainer">
                <input type="password" class="input" id="password" name="password" value="<?php echo $password; ?>" required>
                <label for="password" class="label">Password</label>
            </div>

            <div class="inputContainer">
                <input type="password" class="input" id="confirm_password" name="confirm_password" required>
                <label for="password" class="label">Confirm Password</label>
            </div>

            
            <input type="submit" class="submitBtn" value="Update">
            </form>
        </div>
    </body>
    <script>
        function validateForm(){
            
            var phoneno = document.getElementById("phoneno").value;
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            
            phone_number = phoneno.replace(/\D/g,'');
  
            // Check if phone number is valid
            re3 = /^\d{10}$/;
            if (!re3.test(phone_number)) {
                alert("Invalid Phone Number")
                return false;
            }

            // Check if password is valid
            if (password.length < 8) {
                alert("Password must be at least 8 characters long");
                return false;
            }

            if(password.search(/[a-z]/i) < 0) {
                alert("Password must contain at least one letter.");
                return false;
            }

            if(password.search(/[0-9]/) < 0) {
                alert("Password must contain at least one digit.");
                return false;
            }

            if(password.search(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/) < 0) {
                alert("Password must contain at least one special character.");
                return false;
            }

            if(password.search(/[A-Z]/) < 0) {
                alert("Password must contain at least one capital letter.");
                return false;
            }

            if(password.length > 20) {
                alert("Password must be less than 20 characters long.");
                return false;
            }
            
            // Check if confirm password matches password
            if (confirm_password != password) {
                alert("Confirm password does not match password");
                return false;
            }
        }
    </script>
    
    <style>
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            background-color: rgb(240, 238, 238);
            font-family: "lato", sans-serif;
        }

        .signupFrm {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form {
            background-color: white;
            width: 400px;
            border-radius: 8px;
            padding: 20px 40px;
            box-shadow: 0 10px 25px rgba(92, 99, 105, .2);
        }
        
        .title {
            font-size: 50px;
            margin-bottom: 50px;
        }

        .inputContainer {
            position: relative;
            height: 45px;
            width: 90%;
            margin-bottom: 17px;
        }

        .input {
            position: absolute;
            top: 0px;
            left: 0px;
            height: 100%;
            width: 100%;
            border: 1px solid #878788;
            border-radius: 7px;
            font-size: 16px;
            padding: 0 20px;
            outline: none;
            background: none;
            z-index: 1;
        }
        

        
        ::placeholder {
            color: transparent;
        }

        .label {
            position: absolute;
            top: 15px;
            left: 15px;
            padding: 0 4px;
            background-color: white;
            color: #878788;
            font-size: 16px;
            transition: 0.5s;
            z-index: 0;
        }

        .submitBtn {
            display: block;
            margin-left: auto;
            padding: 15px 30px;
            border: none;
            background-color: #447064;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 30px;
        }
        
        .submitBtn:hover {
            background-color: #a7b8b5;
            color: black;
            transform: translateY(-2px);
        }

        .input:focus + .label {
        top: -7px;
        left: 3px;
        z-index: 10;
        font-size: 14px;
        font-weight: 600;
        color: rgb(5, 4, 5);
        }

        .input:focus {
        border: 2px solid rgb(5, 4, 5);
        }

        .input:not(:placeholder-shown)+ .label {
        top: -7px;
        left: 3px;
        z-index: 10;
        font-size: 14px;
        font-weight: 600;
        }

    </style>
</html>