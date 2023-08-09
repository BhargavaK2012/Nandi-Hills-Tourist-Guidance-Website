<?php

require "config.php";

if (!empty($_SESSION["id"])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM user_data WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

} else {

    header("Location: login.php");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Exo+2:wght@500&display=swap"
        rel="stylesheet">
    <title>Nandi Hills</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="css/event.css">

    <style>
        h2.notice {
            text-align: center;
            color: rgb(237, 255, 76);
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>



</head>


<body>


    <a style="margin-left:95%; margin-bottom:0%;" href="logout.php">Logout</a>

    <header>

        <h1 id="main_heading">NANDI HILLS</h1>
        <div>

            <h2 id="welcome">Welcome
                <?php echo $row['username']; ?>
                <span style="margin-left:55%;">Your Reward Points :</span>

                <?php echo $row['reward_points']; ?>
            </h2>
        </div>
    </header>

    <nav>
        <a href="Home.php">Home</a>
        <a href="">Nandi Guide</a>
        <a href="thingsToDo.php">Things to do</a>
        <a href="event.php">Events</a>
        <a href="gallery.php">Gallery/Review</a>
        <a href="nandi_bot.php">Contact</a>
        <a href="profile.php">Profile</a>

    </nav>
    <br>

    <h2 class="notice"><b>!! PARTICIPATE IN EVENTS TO EARN POINTS AND WIN EXCITING GOODIES !!</b></h2>
    <div class="main_container">

        <div class="containers">

            <h2 class="container_heading"><u>
                    <center>Go Green Cycling Rally </center>
                </u></h2>
            <img src="css/Images/cycling.jpg" alt="" height="250px" width="400px" style="border-radius:10%; padding:2%">

            <form action="event_register.php">
                <button>Register</button>
            </form>

        </div>
        <div class="containers">

            <h2 class="container_heading"><u>
                    <center>Nandi Marathon</center>
                </u></h2>
            <img src="css/Images/marathon.jpg" alt="" height="250px" width="400px"
                style="border-radius:10%; padding:2%">

            <form action="event_register.php">
                <button>Register</button>
            </form>

        </div>
        <div class="containers">
            <h2 class="container_heading"><u>
                    <center>Nandi Hills Bird Watching </center>
                </u></h2>
            <img src="css/Images/bird_watch.jpg" alt="" height="250px" width="400px"
                style="border-radius:10%; padding:2%">

            <form action="event_register.php">
                <button>Register</button>
            </form>

        </div>
    </div>









</body>

</html>