<html>
    <header>
        <title>Error</title>

        <style>
            body
            {
                background-image: url(http://www.storywarren.com/wp-content/uploads/2016/09/space-1.jpg);
            }
            #error
            {
                border-radius: 100%;
                width: 500px;
                height: 500px;
                margin-top: 5%;
                margin-left: 40%;
            }
            p
            {
                margin-top: 5%;
                color: Whitesmoke;
                font-size: 70px;
                text-align: center;
            }
            button
            {
                width: 400px;
                height: 200px;
                font-size: 50px;
                border-radius: 70px;
                margin-left: 42%;
                margin-top: 5%;
            }
        </style>

    </header>
    <body>
    <p>
        <?php
            echo $_GET["error"];
            $GLOBALS["error"] = "";?>
        </p>
        <img  id="error" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Dialog-error-round.svg/2000px-Dialog-error-round.svg.png">
        <form action="index.php">
            <button type="submit">Main Page</button>
        </form>
    </body>
</html>