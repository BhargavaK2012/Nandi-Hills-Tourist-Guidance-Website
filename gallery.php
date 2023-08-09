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
    <link rel="stylesheet" href="css/gallery.css">

    <style>
        a {
            margin: 4%;
            color: white;
            font-weight: bold;
            text-shadow: .3px .3px #000000;
            font-size: large;

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



    <form action="" method="POST" enctype="multipart/form-data">

        <div class="container" style="background-color: rgb(77, 117, 42);">
            <h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; color: white;">Upload
                your best Nandi Hills captures :</h2>
            <label for="file">Upload Image : </label>
            <input type="file" name="file">

            <br>
            <label for="description">Description : </label>
            <input type="text" name="description">

            <input type="submit" name="submit" value="Upload File">
        </div>





    </form>

    <?php

    if (isset($_POST["submit"])) {

        $description = $_POST['description'];

        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);

        $fileActualExt = strtolower(end($fileExt));


        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {

            if ($fileError === 0) {

                if ($fileSize < 10000000) {

                    $fileNewName = uniqid('', true) . "." . $fileActualExt;

                    $folder = "css/gallery/" . $fileNewName;

                    move_uploaded_file($fileTmpName, $folder);

                    $image_info_upload = mysqli_query($conn, "INSERT INTO gallery VALUES ('$folder','$description')");

                    header("Location: gallery.php? Upload Successful");

                } else {
                    echo "<script> alert('File size too large'); </script>";
                }

            } else {
                echo "<script> alert('Error in file'); </script>";
            }


        } else {

            echo "<script> alert('Unsupported File type'); </script>";
        }



    }



    ?>

    <div style="margin=auto;">

        <table border="0.5%">
            <h2
                style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; color: white;margin-left:45%;margin-top:5%;">
                <u>GALLERY</u>
            </h2>
            <?php
            $r = mysqli_query($conn, "SELECT * FROM gallery");
            while ($printImg = mysqli_fetch_assoc($r)) {
                echo " 

            <tr>
 
                <td> <img src='" . $printImg['image'] . "'</td>
                <td>" . $printImg['Description'] . "</td>
               
                
            </tr>";
            }

            ?>
        </table>
    </div>













</body>

</html>