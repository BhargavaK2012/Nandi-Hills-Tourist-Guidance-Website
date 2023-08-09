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
        .sub-head {

            color: white;
            margin-left: 18%;
            padding: 2%;
        }

        img {

            margin-left: 0%;
            margin-bottom: 4%;
            border-style: groove;
            border-width: .2cm;
            width: 300px;
        }

        .adventure,
        .temple,
        .viewpoint {

            display: inline-block;
            width: 380px;
            height: 500px;
            float: left;
            padding: 2%;
            margin: 2% 3%;
            box-sizing: border-box;
            cursor: pointer;
            transition: transform 0.5s;
            background-image: url(css/Images/background.jpg);
            background-repeat: no-repeat;
            background-size: 110% 200%;
            background-position: center;
            border-radius: 4%;

        }


        .adventure:hover,
        .temple:hover,
        .viewpoint:hover {

            transform: translateY(-10px);
        }

        .heading {

            font-size: 40px;
            margin: 1% 40%;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: bold;
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

    <div class="sub-head">

        <h2>Your Interests :
            <a href="#section1">ADVENTURE</a> ->
            <a href="#section2">VIEW POINT</a> ->
            <a href="#section3">TEMPLES</a>
        </h2>
    </div>



    <main>

        <hr>

        <div class="section1" id="section1">

            <div class="heading">ADVENTURE</div>
            <div class="adventure">

                <h2>PARAGLIDING </h2>

                <img src="css/Images/para.jpeg" alt="">

                <p>You cannot visit Nandi Hills without trying your hand at paragliding. There are only a few places in
                    the
                    country where you can try paragliding, and this is one of the most picturesque activities you can
                    engage in
                    when you are there, which involves gliding over lush green valleys and mountains.</p>


            </div>

            <div class="adventure">

                <h2>TREKKING</h2>

                <img src="css/Images/trek.jpeg" alt="">

                <p>If you are an adventure enthusiast and you prefer spending your weekend productively, you can’t visit
                    Nandi
                    Hills without checking out one of its many trekking trails.

                    The green hills, the lush jungles and the gorgeous viewpoints make for some rewarding treks. Some of
                    the
                    most popular treks include the day trek to Horagina Betta and the trek to Channagiri.</p>

            </div>

            <div class="adventure">

                <h2>CYCLING</h2>

                <img src="css/Images/cycling.jpg" alt="">
                <p>People find Nandi Hills almost irresistible because of the ideal conditions for biking and
                    cycling
                    that can
                    be found in the area. The altitude coupled with the scenery and the well-made biking trails make
                    it
                    the
                    perfect place to enjoy biking alone, or with friends.
                </p>
            </div>
        </div>



        <hr>


        <div class="section2">
            <div class="heading">VIEWPOINTS</div>

            <div class="viewpoint" id="section2">

                <h2>TIPU'S DROP</h2>

                <img src="css/Images/tipu_drop.jpeg" alt="">
                <p>A visit to Tipu’s Drop is bound to leave you with goosebumps. It is a steep rock that is located 600m
                    above
                    sea level. However, apart from the view and the climb, what is most remarkable about this cliff is
                    that
                    it
                    was used by Tipu Sultan to punish his prisoners by tossing them from the top of the hill. Even
                    though
                    this
                    place is safely fortified with fences and barricades now, it remains an intriguing attraction.</p>



            </div>

            <div class="viewpoint">

                <h2>CHENNAGIRI TREK</h2>

                <img src="css/Images/eoo1i35lcognh8lpteripa1m0ic3_12.jpg.avif" alt="">
                <p>Trekking is an adventurous outdoor activity that involves hiking and walking on trails or paths,
                    usually in natural and remote environments.

                    Trekking provides an opportunity for individuals to connect with nature, escape the hustle and
                    bustle of city life, and experience breathtaking landscapes, including mountains, forests, valleys,
                    and rivers.
                </p>



            </div>

            <div class="viewpoint">

                <h2>NANDIBETTA SUNRISE</h2>

                <img src="css/Images/64a7b81fe87191.04103552.jpeg" alt="">
                <p>
                    The Nandi Hills viewpoint is one of the main attractions at Nandi Hills, Karnataka, India. It offers
                    visitors a mesmerizing panoramic view of the surrounding landscapes and is especially famous for its
                    stunning sunrise views.
                </p>



            </div>


        </div>



        <div class="section3">
            <hr>
            <div class="heading">TEMPLES</div>
            <div class="temple" id="section3">

                <h2>BHOGA NANDEESHWARA TEMPLE</h2>

                <img src="css/Images/temple1.jpeg" alt="">
                <p>A visit to Tipu’s Drop is bound to leave you with goosebumps. It is a steep rock that is located 600m
                    above
                    sea level. However, apart from the view and the climb, what is most remarkable about this cliff is
                    that it
                    was used by Tipu Sultan to punish his prisoners by tossing them from the top of the hill. Even
                    though this
                    place is safely fortified with fences and barricades now, it remains an intriguing attraction.</p>



            </div>

            <div class="temple">

                <h2> AMRITA SAROVAR </h2>

                <img src="css/Images/amrith_sarovar.jpg" alt="">
                <p>A visit to the Amrita Sarovar is a must if you are in Nandi Hills because of its natural and man-made
                    beauty.
                    It is a perennial spring that has been bound on four sides with steps-like structures and archways.

                    The Amrita Sarovar, or the Lake of Nectar, has been a source of fresh water for the people of Nandi
                    Hills
                    since time immemorial.</p>


            </div>




        </div>



    </main>














</body>

</html>