<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel = "stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        
        <div class="head">
            <h1>Borrowed Books</h1>
        </div>
        <?php
            session_start();
            if (!isset($_SESSION['regno'])) {
                // Redirect to login page
                header("Location: login.php");
                exit();
            }else{
                $regno = $_SESSION['regno'];
                include("DB_connect.php");
                if($regno == 'admin'){
                    $sql1 = "SELECT * FROM issuedbooks ORDER BY 'issueddate' DESC";
                    $result = $conn->query($sql1);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        echo "<table>";
                        echo"<tr>
                            <th>Book Id</th>
                            <th>Borrowed Date</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                        </tr>";
                            while($row = $result->fetch_assoc()) {
            
                                echo "<tr><td>" . $row["bid"]. "</td><td>" . $row["regno"]. "</td><td>". $row["issueddate"]. "</td><td>" . $row["returndate"] . "</td></tr>";
                            }
                            echo "</table>";
                    } 
                    else { 
                        echo "<script>if(window.confirm('Transactions not happened yet......')){
                            window.location.href = 'adminHome.html'
                        }else{}</script>";
                    }
                }
                
            }
            
        ?>
        
        
    </body>
    <style>
        h1{
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            
        }
        .head{
            text-align: center;
        }
        body{
            
            background: rgb(241, 241, 241);
            background-size: cover;
        }
        table {
            margin: auto;
            font-size: medium;
            border: 1px solid black;
            text-align: center;
            width: 70%;
        }
        td{
           
            padding: 10px;
        }
        
        th {
            background-color: #588c7e;
            padding: 10px;
            color: white;
        }
        tr:nth-child(even) {background-color: #ecf8f5}
        
    </style>
</html>