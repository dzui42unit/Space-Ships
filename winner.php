<html>
<head>
    <title>Result</title>
    <style>

        h1
        {
            color: Whitesmoke;
            text-align: center;
            font-style: oblique;
        }
        #user_task
        {
            text-align: center;
            color: Whitesmoke;
            font-style: oblique;
        }
        body
        {
            background-image: url(http://www.storywarren.com/wp-content/uploads/2016/09/space-1.jpg);
        }
        #draw
        {
            margin-left: 38%;
        }
        .win
        {
            margin-left: 35%;
            height: 500px;
            width: 800px;
        }
        #again
        {
            width: 200px;
            height: 80px;
            font-size: 30px;
            margin-top: 200px;
        }
        #form
        {
            text-align: center;
        }
    </style>
</head>
    <body>
        <h1>THE RESULT OF EPIC BATTLE</h1><br>
        <?php

            require_once 'Player.class.php';
            require_once 'Ships.class.php';

            session_start();

        $stat = file_get_contents("private/stat");
        $players = explode("\n", $stat);

        $draw = 0;
        if (empty($_SESSION['pl_1']->get_fleet()) && empty($_SESSION['pl_2']->get_fleet()))
            {
                echo "<h2 id='user_task'>WHO IS WINNER ?</h2><br>";
                echo "<img  id='draw' src='http://a1.ec-images.myspacecdn.com/images02/39/92867fec08094c86abbafa298c659fab/l.jpg'>";
                $players = saveStat($players, $_SESSION['pl_1']->get_name(), 0);
                $players = saveStat($players, $_SESSION['pl_2']->get_name(), 0);
                $draw = 1;
            }
            if (empty($_SESSION['pl_1']->get_fleet()) && !$draw)
            {
                echo "<h2 id='user_task'>CONGRATULATIONS, ".$_SESSION['pl_2']->get_name()."</h2><br>";
                echo "<img  class='win' src='http://www.winnerwinnernpt.com/images/winner-winner.png'>";
                $players = saveStat($players, $_SESSION['pl_1']->get_name(), -1);
                $players = saveStat($players, $_SESSION['pl_2']->get_name(), 1);
            }
            if (empty($_SESSION['pl_2']->get_fleet()) && !$draw)
            {
                echo "<h2 id='user_task'>CONGRATULATIONS, ".$_SESSION['pl_1']->get_name()."</h2><br>";
                echo "<img  class='win' src='http://www.winnerwinnernpt.com/images/winner-winner.png'>";
                $players = saveStat($players, $_SESSION['pl_1']->get_name(), 1);
                $players = saveStat($players, $_SESSION['pl_2']->get_name(), -1);
            }
            echo "<br><br><br><form id='form' action='index.php''><button id='again' type='submit'>NEW BATTLE</button></form>";


            function saveStat($players, $login, $win)
            {
                foreach ($players as $value)
                {
                    $int = array_search($value, $players);
                    $player = explode(",", $value);
                    if($player[0] == $login)
                    {
                        if ($win == 1)
                        {
                            $player[1] = $player[1] + 1;
                            $player[4] = $player[4] + 1;
                        }
                        if ($win == -1)
                        {
                            $player[2] = $player[2] + 1;
                            $player[4] = $player[4] + 1;
                        }
                        if ($win == 0)
                        {
                            $player[3] = $player[3] + 1;
                            $player[4] = $player[4] + 1;
                        }
                        $players[$int] = implode(",", $player);
                    }
                }
                return $players;
            }
        $players = array_diff($players, array(""));
        $res = '';
        foreach ($players as $value)
        {
            $res = $res . $value . "\n";
        }
        file_put_contents("private/stat", $res);
        ?>
    </body>
</html>