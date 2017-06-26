<html>

<head>
    <title>Fleet Info</title>
    <style>
        #header
        {
            text-align: center;
            margin-top: 2%;
            font-family: "Times New Roman";
            font-style: oblique;
            font-size: 70px;
        }
        body
        {
            background-image: url(http://www.storywarren.com/wp-content/uploads/2016/09/space-1.jpg);*/
        }
        a
        {
            color: Whitesmoke;
            font-style: oblique;
            font-size: 30px;
            margin-left: 45%;
        }
        #go
        {
            text-align: center;
        }
        #go_but
        {
            width: 200px;
            height: 70px;
            font-size: 50px;
            text-align: center;
            background-color: white;
        }
    </style>
</head>

<body>
    <h1 id="header" style="color: Whitesmoke;">Information about players:</h1>
    <h1 id="header" style="color: Whitesmoke;">Each of you has:</h1>
    <?php

        require_once 'Player.class.php';
        require_once 'Ships.class.php';

        session_start();

        $player_1 = $_SESSION['pl_1'];
        $player_2 = $_SESSION['pl_2'];

        if (!file_exists("private/stat"))
        {
            $player = $player_1->get_name() . "," . 0 . "," . 0 . "," . 0 . "," . 0 . "\n";
            $player2 = $player_2->get_name() . "," . 0 . "," . 0 . "," . 0 . "," . 0 . "\n";
            file_put_contents("private/stat", $player . $player2);
        }
        else
        {
            $stat = file_get_contents("private/stat");
            $players = explode("\n", $stat);
            $find1 = 0;
            $find2 = 0;
            foreach ($players as $value)
            {
                $temp = explode("," , $value);
                if ($temp[0] == $player_1->get_name())
                    $find1 = 1;
                if ($temp[0] == $player_2->get_name())
                    $find2 = 1;
            }
            if ($find1 == 0)
            {
                $player = $player_1->get_name() . "," . 0 . "," . 0 . "," . 0 . "," . 0 . "\n";
                file_put_contents("private/stat", $stat . $player);
            }
            if ($find2 == 0)
            {
                $player = $player_2->get_name() . "," . 0 . "," . 0 . "," . 0 . "," . 0 . "\n";
                file_put_contents("private/stat", file_get_contents("private/stat") . $player);
            }
        }

                $fleet_1 = $player_1->get_fleet();
                $fleet_2 = $player_2->get_fleet();
                $coord_1 = $player_1->get_coord();
                $coord_2 = $player_2->get_coord();
                $ship_1 = new Ship("Honorable Duty", 10, 100, 20, 2, 1, 35, 7);
                $ship_2 = new Ship("Honorable Duty", 10, 100, 20, 98, 148, 35, 7);
                array_push($fleet_1, $ship_1);
                array_push($fleet_2, $ship_2);
                $player_1->set_fleet($fleet_1);
                $player_2->set_fleet($fleet_2);
                $coord_1[0][0] = $ship_1->get_x_pos();
                $coord_1[0][1] = $ship_1->get_y_pos();
                $coord_2[0][0] = $ship_2->get_x_pos();
                $coord_2[0][1] = $ship_2->get_y_pos();
                $player_1->set_coord($coord_1);
                $player_2->set_coord($coord_2);
                echo "<a>Name: ".$ship_1->get_name()."</a><br>";
                echo "<a>Range ".$ship_1->get_range()."</a><br>";
                echo "<a>Health ".$ship_1->get_hp()."</a><br>";
                echo "<a>Power points ".$ship_1->get_power_point()."</a><br>";

                echo "<br>";
                $fleet_1 = $player_1->get_fleet();
                $fleet_2 = $player_2->get_fleet();
                $coord_1 = $player_1->get_coord();
                $coord_2 = $player_2->get_coord();
                $ship_1 = new Ship("Hand Of The Emperor", 12, 150, 25, 4, 1, 55, 9);
                $ship_2 = new Ship("Hand Of The Emperor", 12, 150, 25, 98, 146, 55, 9);     array_push($fleet_1, $ship_1);
                array_push($fleet_2, $ship_2);
                $player_1->set_fleet($fleet_1);
                $player_2->set_fleet($fleet_2);
                $coord_1[1][0] = $ship_1->get_x_pos();
                $coord_1[1][1] = $ship_1->get_y_pos();
                $coord_2[1][0] = $ship_2->get_x_pos();
                $coord_2[1][1] = $ship_2->get_y_pos();
                $player_1->set_coord($coord_1);
                $player_2->set_coord($coord_2);
                echo "<a>Name: ".$ship_1->get_name()."</a><br>";
                echo "<a>Range ".$ship_1->get_range()."</a><br>";
                echo "<a>Health ".$ship_1->get_hp()."</a><br>";
                echo "<a>Power points ".$ship_1->get_power_point()."</a><br>";

                echo "<br>";
                $fleet_1 = $player_1->get_fleet();
                $fleet_2 = $player_2->get_fleet();
                $coord_1 = $player_1->get_coord();
                $coord_2 = $player_2->get_coord();
                $ship_1 = new Ship("Imperator Deus", 15, 170, 25, 6, 1, 60, 10);
                $ship_2 = new Ship("Imperator Deus", 15, 170, 25, 98, 144, 60, 10);
                array_push($fleet_1, $ship_1);
                array_push($fleet_2, $ship_2);
                $player_1->set_fleet($fleet_1);
                $player_2->set_fleet($fleet_2);
                $coord_1[2][0] = $ship_1->get_x_pos();
                $coord_1[2][1] = $ship_1->get_y_pos();
                $coord_2[2][0] = $ship_2->get_x_pos();
                $coord_2[2][1] = $ship_2->get_y_pos();
                $player_1->set_coord($coord_1);
                $player_2->set_coord($coord_2);
                echo "<a>Name: ".$ship_1->get_name()."</a><br>";
                echo "<a>Range ".$ship_1->get_range()."</a><br>";
                echo "<a>Health ".$ship_1->get_hp()."</a><br>";
                echo "<a>Power points ".$ship_1->get_power_point()."</a><br>";

                echo "<br>";
                $fleet_1 = $player_1->get_fleet();
                $fleet_2 = $player_2->get_fleet();
                $coord_1 = $player_1->get_coord();
                $coord_2 = $player_2->get_coord();
                $ship_1 = new Ship("Orktobre Roug", 18, 200, 27, 8, 1, 65, 12);
                $ship_2 = new Ship("Orktobre Roug", 18, 200, 27, 98, 142, 65, 12);
                array_push($fleet_1, $ship_1);
                array_push($fleet_2, $ship_2);
                $player_1->set_fleet($fleet_1);
                $player_2->set_fleet($fleet_2);
                $coord_1[3][0] = $ship_1->get_x_pos();
                $coord_1[3][1] = $ship_1->get_y_pos();
                $coord_2[3][0] = $ship_2->get_x_pos();
                $coord_2[3][1] = $ship_2->get_y_pos();
                $player_1->set_coord($coord_1);
                $player_2->set_coord($coord_2);
                echo "<a>Name: ".$ship_1->get_name()."</a><br>";
                echo "<a>Range ".$ship_1->get_range()."</a><br>";
                echo "<a>Health ".$ship_1->get_hp()."</a><br>";
                echo "<a>Power points ".$ship_1->get_power_point()."</a><br>";

                echo "<br>";
                $fleet_1 = $player_1->get_fleet();
                $fleet_2 = $player_2->get_fleet();
                $coord_1 = $player_1->get_coord();
                $coord_2 = $player_2->get_coord();
                $ship_1 = new Ship("Ork’N’Roll", 20, 250, 15, 10, 1, 70, 5);
                $ship_2 = new Ship("Ork’N’Roll", 20, 250, 15, 98, 140, 70, 5);
                array_push($fleet_1, $ship_1);
                array_push($fleet_2, $ship_2);
                $player_1->set_fleet($fleet_1);
                $player_2->set_fleet($fleet_2);
                $coord_1[4][0] = $ship_1->get_x_pos();
                $coord_1[4][1] = $ship_1->get_y_pos();
                $coord_2[4][0] = $ship_2->get_x_pos();
                $coord_2[4][1] = $ship_2->get_y_pos();
                $player_1->set_coord($coord_1);
                $player_2->set_coord($coord_2);
                echo "<a>Name: ".$ship_1->get_name()."</a><br>";
                echo "<a>Range ".$ship_1->get_range()."</a><br>";
                echo "<a>Health ".$ship_1->get_hp()."</a><br>";
                echo "<a>Power points ".$ship_1->get_power_point()."</a><br>";
                $ship_1 = new Ship("Honorable Duty", 10, 30, 20, 98, 138, 0, 0);
                $ship_2 = new Ship("Honorable Duty", 10, 30, 20, 4, 4, 0, 0);
                array_push($fleet_1, $ship_1);
                array_push($fleet_2, $ship_2);
                $player_1->set_fleet($fleet_1);
                $player_2->set_fleet($fleet_2);
                $coord_1[5][0] = $ship_1->get_x_pos();
                $coord_1[5][1] = $ship_1->get_y_pos();
                $coord_2[5][0] = $ship_2->get_x_pos();
                $coord_2[5][1] = $ship_2->get_y_pos();
                $player_1->set_coord($coord_1);
                $player_2->set_coord($coord_2);

        echo "<br><form id='go' action='arena.php''>
            <button id='go_but' type='submit'>GO</button>
        </form>";
    ?>
</body>

</html>

