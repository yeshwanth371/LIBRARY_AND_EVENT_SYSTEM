<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
<div class="topnav" id="myTopnav">
  <a href="adminHome.html" class="active">Home</a>
  <a href="Events.html">Events</a>
  <div class="dropdown">
    <button class="dropbtn">Books 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="view_books.php">View Books</a>
      <a href="addBooks.html">Add book</a>
      <a href="deleteBook.html">Delete Book</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Transactions 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="issue_book.html">Issue Book</a>
      <a href="return_book.html ">Return Book</a>
      <a href="borrowed_books_admin.php">Borrowed Books</a>
    </div>
  </div> 
  <a href="logout.php" style="float: right;">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
<style>
  body {background-color: whitesmoke;margin: 0%;}
  
  .topnav {
    overflow: hidden;
    background-color: darkcyan;
  }
  
  .topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }
  
  .active {
    background-color: darkcyan;
    color: black;
  }
  
  .topnav .icon {
    display: none;
  }
  
  .dropdown {
    float: left;
    overflow: hidden;
  }
  
  .dropdown .dropbtn {
    font-size: 17px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
  }
  
  .topnav a:hover, .dropdown:hover .dropbtn {
    background-color:ivory;
    color: darkcyan;
  }
  
  .dropdown-content a:hover {
    background-color: #ddd;
    color: darkcyan;
  }
  
  .dropdown:hover .dropdown-content {
    display: block;
  }
  
  @media screen and (max-width: 600px) {
    .topnav a:not(:first-child), .dropdown .dropbtn {
      display: none;
    }
    .topnav a.icon {
      float: right;
      display: block;
    }
  }
  
  @media screen and (max-width: 600px) {
    .topnav.responsive {position: relative;}
    .topnav.responsive .icon {
      position: absolute;
      right: 0;
      top: 0;
    }
    .topnav.responsive a {
      float: none;
      display: block;
      text-align: left;
    }
    .topnav.responsive .dropdown {float: none;}
    .topnav.responsive .dropdown-content {position: relative;}
    .topnav.responsive .dropdown .dropbtn {
      display: block;
      width: 100%;
      text-align: left;
    }
  }
  </style>
</html>
