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

    <style>
        .profile {

            margin: 0% 13%;
        }

        .event_display {

            margin: 0% 10%;
        }


        th,
        td {
            padding: 1.5%;
            width: 500px;
            background-color: rgb(77, 117, 42);
            margin: auto;
            color: white;
        }
    </style>


</head>


<body>



    <a style="margin:0% 95%; margin-bottom:0%;" href="logout.php">Logout</a>

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

    <nav style="margin-bottom:1%;">
        <a href="Home.php">Home</a>
        <a href="">Nandi Guide</a>
        <a href="thingsToDo.php">Things to do</a>
        <a href="event.php">Events</a>
        <a href="gallery.php">Gallery/Review</a>
        <a href="nandi_bot.php">Contact</a>
        <a href="profile.php">Refresh</a>

    </nav>

    <br>
    <h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; color: white;text-align:center;">
        YOUR PROFILE DETAILS
    </h2>

    <table border="2" class="profile">
        <tr>
            <th>Username : </th>
            <td>
                <?php echo $row['username']; ?>
            </td>

        </tr>

        <tr>

            <th>Email ID : </th>
            <td>
                <?php echo $row['email']; ?>
            </td>
        </tr>

        <tr>

            <th>Phone Number : </th>
            <td>
                <?php echo $row['phone_no']; ?>
            </td>
        </tr>

        <tr>

            <th>Reward Points : </th>
            <td>
                <?php echo $row['reward_points']; ?>
            </td>
        </tr>
        <tr>

            <th>Referal ID : </th>
            <td>
                <?php echo $row['referral_id']; ?>
            </td>
        </tr>


    </table>
    <br>
    <a style="margin-left:80%;" href="logout.php">LOGOUT</a>
    <br><br>


    <!-- Event Info Table  -->



    <h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; color: white;margin-left:35%;">
        YOUR UPCOMING EVENT DETAILS
    </h2>
    <table border="2" class="event_display">
        <tr>
            <th>Participant Name : </th>
            <th>Event Name : </th>
            <th>Gender</th>
            <th>Age</th>
        </tr>



        <?php
        $user = $row['username'];
        $result1 = mysqli_query($conn, "SELECT * from user_data,event_info where user_data.username='$user' and event_info.username='$user';");
        while ($data = mysqli_fetch_assoc($result1)) {
            echo "
            <tr>

            <td>  " . $data['parti_name'] . " </td>
            <td> " . $data['event_name'] . "  </td>
            <td>   " . $data['gender'] . " </td>
            <td>    " . $data['age'] . "  </td>
            
            </tr>";
        }
        ?>












</body>

</html>