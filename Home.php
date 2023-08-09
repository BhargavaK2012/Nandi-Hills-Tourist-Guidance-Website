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
        .home {
            margin: auto;
            border-style: solid;
            border-radius: 2%;
            color: white;
            padding: 2%;
            font-size: 30px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin-bottom: 5%;
            margin-top: 1%;
            background-color: rgb(77, 117, 42);

        }

        #maps {
            margin: auto;
            border-style: solid;
            border-radius: 2%;
            color: white;
            padding: 2%;
            font-size: 30px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: rgb(77, 117, 42);
        }


        .address {

            color: white;
        }

        hr {
            display: block;
            border: none;
            color: white;
            height: 1px;
            background: black;
            background: -webkit-gradient(radial, 50% 50%, 0, 50% 50%, 700, from(white), to(green));

        }

        h2 {
            font-size: 30px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        h2,
        h4,
        h5 {
            text-align: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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

    <div class='home'>

        <h2><strong><u>ABOUT</u></strong></h2>
        <p>Nandi Hills, a small albeit beautiful town, is just 60 km away from the city of Bangalore and has emerged as
            the perfect weekend getaway for its people. Even though it is most well-known for its viewpoints and its
            greenery, Nandi Hills is also a popular historical fortress that is home to a number of temples, monuments
            and shrines.
            <br><br>
            The place was previously used by the famous ruler Tipu Sultan as a summer retreat, and several traces of the
            Sultan’s life and legacy can be found in the area. His summer residence can still be found in Nandi Hills.
            The house was called Tashk-e-Jannat, whose painted walls, intricate archways, high pillars and artfully
            crafted ceilings attract tourists and visitors even today. Nandi Hills is also home to some famous temples
            and shrines such as the Bhoga Nandeeshwara Temple, dedicated to Lord Shiva and his companions- Parvati and
            Nandi.
            <br><br>
            This temple is also an architectural wonder and pilgrimage spot because it is one of the oldest temples in
            the area. Apart from its historical sites and heritage monuments, Nandi Hills is also famous for its
            trekking trails, cycling routes and adventure sports such as paragliding. It is truly the perfect place to
            enjoy a peaceful retreat from life in the city and take in some of the best views the countryside has to
            offer.
        </p>

    </div>


    <div class='home'>
        <h2><strong><u>HIGHLIGHTS</u></strong></h2>

        <ul>

            <li> Hike up to the Nandi Hills through the trails covered with natural scenic beauty.</li>
            <li>Visit the incredible Jaramadagu falls encircled by lush, in the Chikkaballapur region.</li>
            <li>Get a chance to cycle along the hills on the natural pathway.</li>
            <li> Visit the Amaranarayana Temple and get spiritual insights and vibes and witness the marvelous</li>
            <li>Tashk-e-jannat, a palace brilliantly carved pillars and beautifully painted walls.</li>
            <li> Seek peace and quiet away from the chaotic world at the cave near the spot and get a chance to be
                amidst the
                clouds at the ‘envy of the heavens'.</li>
            <li>Nandi Hills is one of the best vantage points from where one can enjoy the glistening sunrises and
                sunsets.</li>





        </ul>



    </div>




    <div id="maps">

        <h2><strong><u>HOW TO REACH ?</u></strong></h2>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31051.7944554962!2d77.64841721853688!3d13.382930916674852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bb1e445ebfcea17%3A0x1639f72959196608!2sNandi%20Hills%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1688472121289!5m2!1sen!2sin"
            width="100%" height="450" style="border-radius:2%;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <br><br><br>

    <hr>

    <footer>



        <div class="address">

            <h2><u>GET IN TOUCH WITH US</u></h2>

            <h4>Email: <br><a
                    href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCKCBkGRwVGfJWtRZTSvxjLQrFPwSSjFPXXNkNmKZPGZtlgWmDhqCPfTSngmcdTtctcKMmkg">nandihills@gmail.com</a>
            </h4>
            <h4>Contact Number : 9834152411</h4>

            <h5>COPYRIGHTS @2023 NANDI HILLS</h5>

        </div>
    </footer>


</body>

</html>