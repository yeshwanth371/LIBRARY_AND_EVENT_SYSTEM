<!DOCTYPE html>
<html>
    <head>
        <title>view books</title>

    </head>
    <body>
        <div class="head">
        <h1>Books available in Library</h1>
        </div>
        
            <?php
            session_start();
            if (!isset($_SESSION['regno'])) {
                // Redirect to login page
                header("Location: login.php");
                exit();
            }
            include("DB_connect.php");
            $sql = "SELECT * FROM books ORDER BY 'bookname' DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            echo "<table>";
            echo"<tr>
                <th>Book Id</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Edition</th>
            </tr>";
                while($row = $result->fetch_assoc()) {

                    echo "<tr><td>" . $row["bid"]. "</td><td>" . $row["bname"] . "</td><td>". $row["author"]. "</td><td>". $row["edition"]. "</td></tr>";
                }
                echo "</table>";
            } else { echo "<script>if(window.confirm('Books are Not available in the Library.....')){
                window.location.href = 'Home.html'}else{}</script>"; }
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