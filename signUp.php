<?php

$error = 0;

$message = "";

if ($_POST["login"] != '' && $_POST["login"] != '')
{
    if(strlen($_POST["login"]) < 10 &&  strlen($_POST["password"]) < 10)
    {
        $db = unserialize(file_get_contents("private/db"));
        if ($db != null)
            foreach ($db as $value)
            {
                if ($value["login"] == $_POST["login"])
                {
                    $error = 1;
                    $message = "user allready exist";
                }
            }
        if($error != 1)
        {
            $user["password"] = hash("whirlpool", $_POST["password"]);
            $user["login"] = $_POST["login"];
            $db[] = $user;
            $db = serialize($db);
            file_put_contents("private/db",$db);
            header('Location: index.php');
        }

    }
}
?>

<html>
<head>
    <style>

        html {
            background: url(http://www.storywarren.com/wp-content/uploads/2016/09/space-1.jpg);
        }

        body
        {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        form
        {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1
        {
            margin-bottom: 25px;
            color: white;
        }

        h3
        {
            color: white;

        }

        form input
        {
            display: flex;
            justify-content: space-around;
            font-size: 20px;
        }

        form #submit
        {
            background: white;
            border-radius: 28px;
            color: black;
            font-size: 20px;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
            margin-top: 25px;
        }

        #error
        {
            background: white;
            color: red;
            text-align: center;
        }




    </style>
</head>

<body>

<h1>Create Acount</h1>
<div class="form_wrapper">

    <form method="post" action="signUp.php">
        <h3>Login</h3>
        <input type="text" class="login" name="login" maxlength="10"/>
        <h3>Password</h3>
        <input type="text" class="password" name="password" maxlength="10"/>
        <nav>
            <input id="submit" type="submit" value="Sign Up"/>
        </nav>
    </form>
</div>

<div id="error">
    <?php
    if ($error == 1)
        echo $message;
    ?>
</div>

</body>

</html>


