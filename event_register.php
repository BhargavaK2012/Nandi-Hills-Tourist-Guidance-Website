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
        .container {

            color: white;
            padding: 4%;
            border-style: solid;
            border-radius: 4%;
            text-align: center;
            width: 60%;
            margin: 5% 15%;
            background-color: rgb(77, 117, 42);


        }


        input[type=text],
        input[type=number] {
            width: 30%;
            margin: 2%;

        }



        select {
            margin: 2%;
            width: 30%;
            height: 20px;
        }

        h2 {
            font-size: 50px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-style: italic;
        }

        /* Set a style for all buttons */
        input[type=submit] {
            border-radius: 100px;
            background-color: #18c385;
            color: white;
            padding: 10px 15px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 20%;
            margin-top: 20px;
        }

        /* Add a hover effect for buttons */
        input[type=submit]:hover {
            opacity: 0.8;
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


    <div class="container">

        <form action="" method="post">

            <h2><u>Registration Form</u></h2>

            <label for="name">Participant Name :</label>
            <input type="text" name="name" id="name" required>

            <br>


            <label for="gender">Gender : </label>
            <select name="gender" id="gender">

                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>

            <br>

            <label>Event : </label>
            <select name="event" id="event">

                <option value="Go Green Cycling Rally">Go Green Cycling Rally</option>
                <option value="Nandi Marathon">Nandi Marathon</option>
                <option value="Nandi Hills Bird Watching">Nandi Hills Bird Watching</option>
            </select>
            <br>

            <label for="age">Age : </label>
            <input type="number" name="age" id="age" min="5" max="100">

            <br>
            <input type="submit" name="submit">







        </form>
    </div>


    <?php


    if (isset($_POST["submit"])) {

        $username = $row['username'];
        $parti_name = $_POST['name'];
        $gender = $_POST['gender'];
        $event_name = $_POST['event'];
        $age = $_POST['age'];

        mysqli_query($conn, "INSERT INTO EVENT_INFO VALUES('$username','$parti_name','$gender','$event_name','$age');");

        mysqli_query($conn, "UPDATE user_data SET `reward_points`=reward_points+50 WHERE username='$username'");

        header("Location: profile.php");


    }



    ?>






</body>

</html>