
<?php

    session_start();

    $_SESSION['turn'] = 1;
?>

<html>

<head>
    <title>Lobby</title>
    <style>
        #header
        {
            text-align: center;
            margin-top: 10%;
            font-family: "Times New Roman";
            font-style: oblique;
        }
        #input
        {
            text-align: center;
            font-family: "Times New Roman";
            font-size: 30px;
            font-style: oblique;

        }
        .info
        {
                width: 600px;
                height: 80px;
                font-size: 60px;
                font-style: oblique;
        }
        #button
        {
            margin-top: 20px;
            width: 300px;
        }
        body
        {
            background-image: url(http://www.storywarren.com/wp-content/uploads/2016/09/space-1.jpg);
        }
        p
        {
            color: Whitesmoke;
        }
        nav
        {
            display: flex;
            justify-content: flex-end;
        }

        nav input
        {
            background: #3498db;
            border-radius: 28px;
            color: #ffffff;
            font-size: 20px;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
        }

        nav input:hover {
            background: #3cb0fd;
            text-decoration: none;
        }


    </style>
</head>

<body>
<nav>
    <form action="signUp.php"><input id="button"type="submit" value="SignUp"></form>
    <form action="stat.php"><input id="button"type="submit" value="General Rank"></form>
</nav>

<h1 id="header" style="color: Whitesmoke;">ENTER INFORMATION:</h1>
    <form id="input"action="create_players.php" method="post" autocomplete="off">
        <p>Player 1 login:</p><input class="info" type="text"  name="p1_name" maxlength="10">
        <p>Player 1 password:</p><input class="info" type="password" name="p1_password" maxlength="10">
        <p>Player 2 login:</p><input class="info" type="text" name="p2_name" maxlength="10"><br>
        <p>Player 2 password:</p><input class="info" type="password" name="p2_password" maxlength="10"><br>
        <input id="button"type="submit" value="Submit">
    </form>
</body>

</html>