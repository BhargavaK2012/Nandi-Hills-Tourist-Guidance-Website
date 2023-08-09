<?php

if (isset($_POST["submit"])) {



    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $file_name);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'heic');

    if (in_array($fileActualExt, $allowed)) {

        if ($fileError === 0) {

            if ($fileSize < 1000000) {

                $folder = "gallery/" . $fileName;

                move_uploaded_file($fileTmpName, $folder);

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