<?php

require "config.php";



if (!empty($_SESSION["id"])) {
    header("Location: Home.php");
}

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phoneno = $_POST["phoneno"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $refid = $_POST["refid"];
    $referal_id = $username . '@nandihills';


    $duplicate = mysqli_query($conn, "SELECT * FROM user_data WHERE username = '$username' OR email = '$email' OR phone_no = '$phoneno'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Username or Email or Phone Number Already exists'); </script>";
        header("Location: registration.php");
    } else {

        if ($password == $confirm_password) {

            mysqli_query($conn, "UPDATE user_data SET `reward_points`=reward_points+10 WHERE referral_id='$refid'");
            $query = "INSERT INTO user_data (username, email, phone_no, password, reward_points, referral_id) VALUES ('$username','$email','$phoneno','$password',0,'$referal_id')";
            mysqli_query($conn, $query);
            echo "<script> alert('Registration Successful'); </script>";
            header("Location: logout.php");

        } else {


            echo "<script> alert('Password Does Not Match'); </script>";
        }

    }
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
    <title>Login Nandi Hills</title>
    <link rel="stylesheet" href="home.css">

    <Style>
        <style>

        /* Bordered form */
        form {
            margin: auto;
        }

        /* Full-width inputs */
        input[type=text],
        input[type=password],
        input[type=email],
        input[type=tel] {
            width: 100%;
            padding: 10px 5px;
            margin: auto;
            display: inline-block;
            border: 1px solid;
            box-sizing: border-box;
            margin-bottom: 1%;


        }

        /* Set a style for all buttons */
        button {
            border-radius: 100px;
            background-color: #18c385;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }




        /* Add padding to containers */
        .container {
            width: 700px;
            margin: auto;
            font-size: 20px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: white;
            margin-top: 3%;
            border-radius: 4%;
            border-style: solid;
            padding: 2%;
            background-color: rgb(77, 117, 42);


        }
    </style>
    </Style>



</head>

<body>

    <header>

        <h1 id="main_heading">NANDI HILLS</h1>

    </header>

    <nav>
        <a href="Home.php">Home</a>
        <a href="">Nandi Guide</a>
        <a href="">Things to do</a>
        <a href="event.php">Events</a>
        <a href="gallery.php">Gallery/Review</a>
        <a href="nandi_bot.php">Contact</a>
        <a href="login.php">Login</a>

    </nav>

    <br>

    <form class="" action="" method="post" autocomplete="off">

        <div class="container">

            <label for="username">Username : </label>
            <input type="text" name="username" id="username" required value="">
            <br>
            <label for="email">Email ID : </label>
            <input type="email" name="email" id="email" placeholder="example@gmail.com" value="">
            <br>
            <label for="phoneno">Phone No : </label>
            <input type="tel" name="phoneno" id="phoneno" required value="">
            <br>
            <label for="refid">Referal ID : </label>
            <input type="text" name="refid" id="refid" placeholder="username@nandihills" value="">
            <br>
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" required value="">
            <br>
            <label for="confirm_password">Confirm Password : </label>
            <input type="password" name="confirm_password" id="confirm_password" required value="">
            <br>
            <button type="submit" name="register">Register </button>

            <a style="font-family:arial; font-size:16px; margin-left:40%;" href="login.php">Existing User ? Login</a>



        </div>


    </form>






</body>

</html>