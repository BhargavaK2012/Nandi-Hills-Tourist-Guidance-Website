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
            margin: 7% 30%;
            border-radius: 8%;
            border-style: solid;
            background-color: rgb(77, 117, 42);
            color: white;

        }

        input[type=email] {

            padding: 1%;
            width: 80%;
            margin: 2% 8%;
        }

        input[type=submit] {
            margin: 2% 10%;
            padding: 1%;
            width: 80%;
            background-color: yellow;
            color: brown;
            border: none;
            cursor: pointer;
            border-radius: 100px;
            font-size: 10px;
        }

        h3 {

            margin: 1% 29%;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: 25px;
        }

        form {
            padding: 2%;
        }

        a {

            margin: 2% 90%;
            color: white;
        }

        h2 {

            margin: 4% 28%;
            color: red;
            font-size: 20px;
            font-style: bold;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>


</head>


<body>


    <h1 id="main_heading">NANDI HILLS</h1>
    <br>


    <div class="container">
        <h2>EMAIL ID DOES NOT EXIST !</h2>

        <form action="password_reset.php" method="post">

            <h3>ENTER YOUR EMAIL ID : </h3>


            <input type="email" name="email" placeholder="example@gmail.com">
            <br>
            <input type="submit" name="submit" id="submit">

            <a href="login.php">Back</a>
        </form>

    </div>






</body>

</html>