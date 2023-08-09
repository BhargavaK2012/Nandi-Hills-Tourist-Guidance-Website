<?php

require "config.php";

if (!($_SESSION["id"] == 998822)) {


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
    <link rel="stylesheet" href="css/admin_view.css">



    <style>
        .container {

            border-style: solid;
            border-radius: 4%;
            background-color: rgb(77, 117, 42);
            color: white;
        }

        .container2 {

            border-style: solid;
            border-radius: 4%;
            background-color: rgb(77, 117, 42);
            color: white;
            margin-top: 3%;
            margin-bottom: 3%;
        }


        table.user {
            margin: 2% 10%;
            width: 80%;
        }

        nav.admin_nav {
            margin: 20px 10px;
            background-color: rgb(77, 117, 42);
        }

        input[type=text] {
            width: 80%;
            padding: 0.5%;

        }

        form {

            margin: 2% 10%;
        }

        input[type=submit] {
            width: 10%;
            padding: 0.9%;
            border-radius: 50%;
            border: none;
            background-color: yellowgreen;
            margin-left: 1%;
        }

        h2.display {
            text-align: center;
        }

        h2.display2 {

            margin: 2% 40%;
        }


        table.event {
            margin: 2% 10%;
            width: 80%;


        }
    </style>


</head>


<body>



    <a style="margin-left:95%; margin-bottom:0%;" href="logout.php">Logout</a>

    <header>

        <h1 id="main_heading">NANDI HILLS</h1>

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

    <nav class="admin_nav">
        <h2 class="display2"> <a href="#user">User Details</a> <a href="#event">Event
                Info</a></h2>
    </nav>


    <div class="container">


        <h2 style="text-align:center; font-size:30px;"> <U><strong>Search User Details</strong></U></h2>



        <form action="" method=post>

            <label for="search">Search : </label>
            <input type="text" name="search" placeholder="Username/Email/phone no.">

            <input type="submit" name="submit">
        </form>


        <?php

        if (isset($_POST['submit'])) {

            $name = $_POST['search'];

            $query1 = "SELECT * FROM user_data WHERE username='$name' or email='$name' or phone_no='$name';";
            $result1 = mysqli_query($conn, $query1);


            ?>
            <table border="2" class="user" id="user">

                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Reward Points</th>
                </tr>
                <tr>
                    <th> ~</th>
                    <th> ~</th>
                    <th> ~</th>
                    <th> ~</th>
                </tr>

                <?php


                while ($row1 = mysqli_fetch_assoc($result1)) {

                    echo " <tr>
                <td>" . $row1['username'] . "</td>
                <td>" . $row1['email'] . "</td>
                <td>" . $row1['phone_no'] . "</td>
                <td>" . $row1['reward_points'] . "</td>
       

                </tr>
                 ";
                }
        }

        ?>


            <table border="2" class="user" id="user">
                <h2 class="display2" style="text-align:center; font-size:30px; margin-top:6%;"> <U><strong>User
                            Details</strong></U></h2>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Reward Points</th>
                </tr>
                <tr>
                    <th> ~</th>
                    <th> ~</th>
                    <th> ~</th>
                    <th> ~</th>
                </tr>

                <?php
                $query = "SELECT * FROM USER_DATA";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo " <tr>
                <td>" . $row['username'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['phone_no'] . "</td>
                <td>" . $row['reward_points'] . "</td>
       

                </tr>
                 ";

                }



                $query2 = "SELECT COUNT(username) as total FROM user_data;";
                $result2 = mysqli_query($conn, $query2);

                $res2 = mysqli_fetch_assoc($result2);
                $query3 = "SELECT username, MAX(reward_points) as max_points FROM user_data;";
                $result3 = mysqli_query($conn, $query3);
                $res3 = mysqli_fetch_assoc($result3);

                ?>
            </table>


            <h2 class="display"> Total Number of Registered Users :
                <?php echo $res2['total'] ?>
            </h2>
            <h2 class="display"> Username with highest rewards:
                <?php echo $res3['username'] ?>
            </h2>
            <h2 class="display">
                Rewards :
                <?php echo $res3['max_points'] ?>
            </h2>





    </div>


    <div class="container2">

        <h2 class="display2" style="text-align:center; font-size:25px; margin-top:6%;"> <U><strong>Event Registration
                    Details</strong></U></h2>

        <table border="2" class="event" id="event">

            <tr>

                <th>Event Name</th>
                <th>Event Date</th>
                <th>Total Number of Participants</th>
                <th>Total Number of Male Participants</th>
                <th>Total Number of Female Participants</th>
            </tr>


            <?php


            //--------------------- NANDI HILLS BIRD WATCHING ------------------------
            
            $query_event_1 = "SELECT COUNT(event_name) FROM `event_info` WHERE event_name='Nandi Hills Bird Watching'; ";
            $query_male_1 = "SELECT COUNT(event_name) FROM `event_info` WHERE gender='male' and event_name='Nandi Hills Bird Watching';";
            $query_female_1 = "SELECT COUNT(event_name) FROM `event_info` WHERE gender='female' and event_name='Nandi Hills Bird Watching'";


            $result_event_1 = mysqli_query($conn, $query_event_1);
            $result_male_1 = mysqli_query($conn, $query_male_1);
            $result_female_1 = mysqli_query($conn, $query_female_1);



            $row_event_1 = mysqli_fetch_assoc($result_event_1);
            $row_male_1 = mysqli_fetch_assoc($result_male_1);
            $row_female_1 = mysqli_fetch_assoc($result_female_1);


            echo "
                <tr>
                <td>Nandi Hills Bird Watching</td>
                <td></td>
                <td>" . $row_event_1['COUNT(event_name)'] . "</td>
                <td>" . $row_male_1['COUNT(event_name)'] . "</td>
                <td>" . $row_female_1['COUNT(event_name)'] . "</td>
            </tr>
                
                ";

            //--------------------- Go Green Cycling Rally ------------------------
            
            $query_event_1 = "SELECT COUNT(event_name) FROM `event_info` WHERE event_name='Go Green Cycling Rally'; ";
            $query_male_1 = "SELECT COUNT(event_name) FROM `event_info` WHERE gender='male' and event_name='Go Green Cycling Rally';";
            $query_female_1 = "SELECT COUNT(event_name) FROM `event_info` WHERE gender='female' and event_name='Go Green Cycling Rally'";


            $result_event_1 = mysqli_query($conn, $query_event_1);
            $result_male_1 = mysqli_query($conn, $query_male_1);
            $result_female_1 = mysqli_query($conn, $query_female_1);



            $row_event_1 = mysqli_fetch_assoc($result_event_1);
            $row_male_1 = mysqli_fetch_assoc($result_male_1);
            $row_female_1 = mysqli_fetch_assoc($result_female_1);


            echo "
                <tr>
                <td>Go Green Cycling Rally</td>
                <td></td>
                <td>" . $row_event_1['COUNT(event_name)'] . "</td>
                <td>" . $row_male_1['COUNT(event_name)'] . "</td>
                <td>" . $row_female_1['COUNT(event_name)'] . "</td>
            </tr>
                
                ";


            //--------------------- Nandi Marathon ------------------------
            
            $query_event_1 = "SELECT COUNT(event_name) FROM `event_info` WHERE event_name='Nandi Marathon'; ";
            $query_male_1 = "SELECT COUNT(event_name) FROM `event_info` WHERE gender='male' and event_name='Nandi Marathon';";
            $query_female_1 = "SELECT COUNT(event_name) FROM `event_info` WHERE gender='female' and event_name='Nandi Marathon'";


            $result_event_1 = mysqli_query($conn, $query_event_1);
            $result_male_1 = mysqli_query($conn, $query_male_1);
            $result_female_1 = mysqli_query($conn, $query_female_1);



            $row_event_1 = mysqli_fetch_assoc($result_event_1);
            $row_male_1 = mysqli_fetch_assoc($result_male_1);
            $row_female_1 = mysqli_fetch_assoc($result_female_1);


            echo "
                <tr>
                <td>Nandi Marathon</td>
                <td></td>
                <td>" . $row_event_1['COUNT(event_name)'] . "</td>
                <td>" . $row_male_1['COUNT(event_name)'] . "</td>
                <td>" . $row_female_1['COUNT(event_name)'] . "</td>
            </tr>
                
                ";


            ?>
        </table>
    </div>






</body>

</html>