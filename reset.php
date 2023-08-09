<?php

require 'config.php';

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $query = "SELECT * from user_data WHERE code='$code'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

    } else {
        header("Location: login.php");
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
    <title>Nandi Hills</title>



    <style>
        body {
            background-color: black;
            background-image: url("css/Images/Nandi_at_Nandi_Hills-1.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }


        #main_heading {

            font-family: 'Bebas Neue', sans-serif;
            font-family: 'Exo 2', sans-serif;
            font-size: 100px;
            text-align: center;
            color: rgb(255, 255, 255);
        }

        .container {
            margin: 6% 30%;
            border-radius: 8%;
            border-style: solid;
            background-color: rgb(77, 117, 42);
            color: white;
            padding: 2%;

        }

        input[type=password] {

            padding: 1%;
            width: 50%;
            margin: 2% 8%;
        }

        input[type=submit] {
            margin: 3% 30%;
            padding: 1%;
            width: 40%;
            background-color: yellow;
            color: brown;
            border: none;
            cursor: pointer;
            border-radius: 100px;
            font-size: 10px;
        }

        h3 {

            margin: 3% 29%;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: 25px;
        }

        form {
            padding: 2%;
        }

        a {

            margin: 1% 90%;
            color: white;
        }
    </style>


</head>


<body>


    <h1 id="main_heading">NANDI HILLS</h1>
    <br>

    <div class="container">

        <form action="" method="post">

            <label for="newpassword">New Password :</label>
            <input type="password" name="newpassword">
            <br>
            <label for="confirmpassword">Confirm Password :</label>
            <input type="password" name="confirmpassword">
            <br>
            <input type="submit" name="submit" id="submit">

            <a href="login.php">Back</a>
        </form>

    </div>


    <?php


    if (isset($_POST['submit'])) {
        $password = $_POST['newpassword'];
        $confirm_password = $_POST['confirmpassword'];

        if ($password == $confirm_password) {
            $query1 = "UPDATE user_data SET password='$password' WHERE code='$code'";
            mysqli_query($conn, $query1);
            header("Location: login_reset_success.php");
        } else {

            echo "<script>alert('Password Does not match')</script>";
        }

    }


    ?>




</body>

</html>