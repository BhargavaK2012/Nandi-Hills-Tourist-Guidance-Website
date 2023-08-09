<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Exo+2:wght@500&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Nandi Hills</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="style.css">


    <style>
        hr {
            display: block;
            border: none;
            color: white;
            height: 1px;
            background: black;
            background: -webkit-gradient(radial, 50% 50%, 0, 50% 50%, 700, from(white), to(green));

        }

        h2,
        h4,
        h5 {
            color: white;
            text-align: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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

    <div class="container">
        <div class="wrapper">
            <div class="title">NANDI CHAT BOT</div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                        <p>Hello there, how can I help you?</p>
                    </div>
                </div>
            </div>
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Type something here.." required>
                    <button id="send-btn">Send</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#send-btn").on("click", function () {
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text=' + $value,
                    success: function (result) {
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>

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