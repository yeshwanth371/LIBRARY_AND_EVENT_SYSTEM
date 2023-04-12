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
            <li style="float: right;"><a href="deleteEvent.html">Delete Event</a></li>
            <li style="float: right;"><a href="announceEvent.html">Announce Event</a></li>
            <li style="float: left;"><a href="Home.php">Home</a></li>
        </ul>
        <?php
            include("DB_connect.php");
            // Retrieve the list of events from the database
            $sql = "SELECT * FROM events";
            $result = $conn->query($sql);

            // Display each event in a box with a "Read more" link
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $location= $row['location'];
                    $description = $row['description'];
                    $date = $row['date'];
                    $time = $row['time'];
                    ?>
                       <div class="event">
                            <h2><?php echo $title; ?></h2>
                            <div class="date">
                                <?php echo $date; ?> - <?php echo $time; ?>
                            </div>
                            <p><strong>Venue: </strong><?php echo $location; ?></p>
                            <div class="description" data-description="<?php echo htmlspecialchars($description); ?>">
                                <?php echo substr($description, 0, 100); ?>...
                            </div>
                            <a class="read-more" href="#">Read more</a>
                        </div>
                    <?php
                }
            } else {
                // If there are no events, display a message using an alert box
                echo '<script>alert("No events found")</script>';
            }
        ?>
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

        .event {
            border: 1px solid black;
            background-color: white;
            box-shadow:  0 10px 25px rgba(92, 99, 105, .2);
            margin-bottom: 20px;
            padding: 10px;
            margin: 25px;
            border-radius: 8px;
            
        }
        .hidden {
            display: none;
        }
    </style>
    <script>
        // Get all "Read more" links
        var readMoreLinks = document.querySelectorAll('.read-more');

        // Attach click event listener to each link
        readMoreLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Get the corresponding event description element and its full description
            var descriptionElem = this.parentNode.querySelector('.description');
            var fullDescription = descriptionElem.dataset.description;

            // Toggle the visibility of the full description
            if (descriptionElem.classList.contains('hidden')) {
            descriptionElem.textContent = fullDescription;
            descriptionElem.classList.remove('hidden');
            this.textContent = 'Read less';
            } else {
            descriptionElem.textContent = fullDescription.substring(0, 100) + '...';
            descriptionElem.classList.add('hidden');
            this.textContent = 'Read more';
            }
        });
        });

    </script>
</html>


