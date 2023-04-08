<!DOCTYPE html>
<html>
    <head>
        <title>view books</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="head">
            <h1>Books available in Library</h1>
        </div>
        <nav>
            <form action="view_books.php" method="post">
                <input type="text" name = 'search' id="search" placeholder="What are you looking for ?">
                <input type="submit" name="submit" value="Search">
            </form>
        </nav>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


        
        <?php
            session_start();
            if (!isset($_SESSION['regno'])) {
                // Redirect to login page
                header("Location: login.php");
                exit();
            }
            include("DB_connect.php");
            if(isset($_POST['submit'])){
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM books WHERE bname LIKE '%$search%' OR author LIKE '%$search%' OR edition LIKE '%$search%' OR bid LIKE '%$search%'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                echo "<table>";
                echo"<tr>
                    <th>Book Id</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Edition</th>
                    <th>E-Book</th>
                </tr>";
                    while($row = $result->fetch_assoc()) {

                        echo "<tr><td>" . $row["bid"]. "</td><td>" . $row["bname"] . "</td><td>". $row["author"]. "</td><td>". $row["edition"]. "</td><td><a href=" . $row['url'] . ">E-Book</a></td></tr>";
                    }
                    echo "</table>";
                } else { echo "<script>if(window.confirm('Book you searched is Not available in the Library.....')){
                    window.location.href = 'view_books.php'}else{}</script>"; }
            }else{
                $sql = "SELECT * FROM books ORDER BY 'bname' DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                echo "<table>";
                echo"<tr>
                    <th>Book Id</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Edition</th>
                    <th>E-Book</th>
                </tr>";
                    while($row = $result->fetch_assoc()) {

                        echo "<tr><td>" . $row["bid"]. "</td><td>" . $row["bname"] . "</td><td>". $row["author"]. "</td><td>". $row["edition"]. "</td><td><a href=" . $row['url'] . ">E-Book</a></td></tr>";
                    }
                    echo "</table>";
                } else { echo "<script>if(window.confirm('Books are Not available in the Library.....')){
                    window.location.href = 'Home.html'}else{}</script>"; }
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

        nav{
            
            float: right;
            word-spacing: 20px;
            padding: 20px;
        }

        nav input[type="text"]{
            width: 200px;
            height: 30px;
            border: 1px solid black;
            border-radius: 5px;
            outline: none;
            padding: 5px;
        }

        nav input[type="text"]:focus{
            border: 1px solid #588c7e;
        }

        nav input[type="submit"]{
            width: 100px;
            height: 30px;
            border: 1px solid black;
            border-radius: 5px;
            outline: none;
            padding: 5px;
            background-color: #588c7e;
            color: white;
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