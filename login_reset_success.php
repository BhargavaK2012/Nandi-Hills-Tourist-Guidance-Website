<?php

require 'config.php';

if (!empty($_SESSION["id"])) {
    header("Location: Home.php");
}

if (isset($_POST["submit"])) {
    $user_email_phone = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM user_data WHERE username='$user_email_phone' OR email='$user_email_phone' OR phone_no='$user_email_phone'");

    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {

        if ($password == $row["password"]) {

            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: Home.php");


        } else {
            echo "<script> alert('Wrong Password'); </script>";
        }

    } else {
        echo "<script> alert('Username or Email or Phone Number Does not exists'); </script>";


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

    <style>
        /* Bordered form */
        form {
            margin: auto;
        }

        /* Full-width inputs */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 14px 5px;
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
            margin-top: 5%;

        }
    </style>


</head>


<body>

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
        <a href="registration.php">Register</a>

    </nav>

    <script>alert("Your Password has been successfully reset")</script>

    <br>

    <form class="" action="" method="post">

        <div class="container">
            <label for="username">Username/Email/Phone No: </label>
            <input type="text" name="username" id="username" required value="">
            <br>
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" required value="">
            <br>
            <a style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size:13px;color:red;"
                href="forgot_password.php">FORGOT PASSWORD ?</a>
            <br>
            <button type="submit" name="submit">Login </button>

            <a style="font-family:arial; font-size:16px; margin-left:40%;" href="registration.php">New User ?
                Register</a>

        </div>



    </form>






</body>

</html>