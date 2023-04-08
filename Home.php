<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Home</title>
    </head>
    <body>
        <header style="background-color: white;">
            <table align="center">
                <tr>
                    <td><img src="https://upload.wikimedia.org/wikipedia/en/3/36/NIT_Andhra_Pradesh.png" alt="logo" width="120" height="120"></td>
                    <td>
                        <h2 style="color: rgb(27, 19, 83); text-shadow: 2px;">NATIONAL INSTITUTE OF TECHNOLOGY ANDHRA PRADESH <br>
                            <h4 style="color: rgb(27, 19, 83); text-shadow: 2px;">( An autonomous Institute under the aegis of Ministry of Education, Govt. of India )</h4>
                        </h2>
                    </td>
                </tr>   
            </table>
        </header>
        <ul>
            <li style="float: right;"><a href="logout.php">Logout</a></li>
            <li style="float: right;"><a href="userProfile.php">Profile</a></li>
            <li style="float: right;"><a href="borrowed_books_user.php">History</a></li>
            <li style="float: right;"><a href="view_books.php">View Books</a></li>
            <li style="float: left;"><a href="events.php">Events</a></li>
        </ul>
        
    </body>
    <style>
        body{
            background-color: whitesmoke;
            margin: 0%;
        }
        ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: darkcyan;
            box-shadow: 0 10px 25px rgba(92, 99, 105, .2);
        }
        li{
            float: left;
            border-right: 1px solid #bbb;
        }
        li:last-child{
            border-right: none;
        }
        li a{
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li a:hover:not(.active){
            background-color: ivory;
            color: darkcyan;
        }
    </style>
</html>


