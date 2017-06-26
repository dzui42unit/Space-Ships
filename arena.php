<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <title>Battle Arena</title>
    <style>
        .cell {
            width: 6px;
            height: 8px;
            border: 1px solid lightsteelblue;
        }
        #field
        {
            margin-left: 15%;
        }
        body
        {
            background-image: url(http://www.storywarren.com/wp-content/uploads/2016/09/space-1.jpg);
        }
        #name_1
        {
            color: Whitesmoke;
            font-size: 50px;
            margin-left: 5%;
            display: inline-block;
        }
        #name_2
        {
            color: Whitesmoke;
            font-size: 50px;
            float: right;
            margin-right: 5%;
            display: inline-block;
        }
        #pl_1
        {
            width: 6px;
            height: 8px;
            border: 1px solid greenyellow;
            background-color: greenyellow;
        }
        #active_1
        {
            width: 6px;
            height: 8px;
            border: 1px solid #FF3E15;
            background-color: greenyellow;
        }
        #active_2
        {
            width: 6px;
            height: 8px;
            border: 1px solid #FF3E15;
            background-color: yellow;
        }
        #pl_2
        {
            width: 6px;
            height: 8px;
            border: 1px solid yellow;
            background-color: yellow;
        }
        #aster
        {
            width: 6px;
            height: 8px;
            border: 1px solid #FF3E15;
            background-color: #FF3E15;
        }
        #button_l
        {
            display: inline-block;
            margin-left: 15%;
        }
        #button_r
        {
            display: inline-block;
            margin-left: 9%;
        }
        #button_u
        {
            display: inline-block;
            margin-left: 9%;
        }
        #button_d
        {
            display: inline-block;
            margin-left: 9%;
        }

        #shoot
        {
            display: inline-block;
            margin-left: 9%;
        }

        #move
        {
            display: inline-block;
            margin-left: 9%;
        }
        #finish
        {
            display: inline-block;
            margin-left: 9%;
        }
        .but
        {
            width: 60px;
            height: 25px;
            font-size: 15px;
            background-color: Whitesmoke;
            text-align: center;
        }
        #turn
        {
            margin-left: 35%;
            text-align: center;
            font-size: 40px;
            color: whitesmoke;
        }
        #pp
        {
            margin-left: 5%;
            text-align: center;
            font-size: 40px;
            color: whitesmoke;
            display: inline-block;
        }
        .Stats
        {
            color: Whitesmoke;
            font-size: 35px;
            margin-left: 20%;
        }

        #shoot_1
        {
            width: 6px;
            height: 8px;
            border: 1px solid Whitesmoke;
            background-color: darkgoldenrod;
            border-color: darkgoldenrod;
        }

        #shoot_2
        {
            width: 6px;
            height: 8px;
            border: 1px solid Whitesmoke;
            background-color: darkred;
            border-color: darkred;
        }
    </style>
</head>

<?php

    require_once 'Player.class.php';
    require_once 'Ships.class.php';
    require_once 'Asteroid.class.php';

    session_start();

    $coord_1 = $_SESSION['pl_1']->get_coord();
    $coord_2 = $_SESSION['pl_2']->get_coord();

    $fleet_1 = $_SESSION['pl_1']->get_fleet();
    $fleet_2 = $_SESSION['pl_2']->get_fleet();

    $counter = 0;
    foreach ($fleet_1 as $value)
    {
        if ($value->get_hp() <= 0)
        {
            array_splice($fleet_1, $counter, 1);
            array_splice($coord_1, $counter, 1);
            $_SESSION['pl_1']->set_ships($fleet_1);
            $_SESSION['pl_1']->set_coord($coord_1);
            $_SESSION['pl_1']->set_active_ship(0);
        }
        $counter++;
    }

    $counter = 0;
    foreach ($fleet_2 as $value)
    {
        if ($value->get_hp() <= 0)
        {
            array_splice($fleet_2, $counter, 1);
            array_splice($coord_2, $counter, 1);
            $_SESSION['pl_2']->set_ships($fleet_2);
            $_SESSION['pl_2']->set_coord($coord_2);
            $_SESSION['pl_2']->set_active_ship(0);
        }
        $counter++;
    }

    if (empty($_SESSION['pl_1']->get_fleet()) || empty($_SESSION['pl_2']->get_fleet()))
        header('Location: winner.php');
    if ($_SESSION['turn'] == 1)
    {
        echo "<a id='turn' style='color: lightgreen'>"."TURN: ".$_SESSION['pl_1']->get_name()."</a>";
        $nb = $_SESSION['pl_1']->get_active_ship();
        $ships = $_SESSION['pl_1']->get_fleet();
        $ship = $ships[$nb];
        $pp = $ship->get_power_point();
        echo "<a id='pp' style='color: lightgreen'>"."Power Points: ".$pp."</a><br>";
    }
    if ($_SESSION['turn'] == 0)
    {
        echo "<a id='turn' style='color: #f4c242'>"."TURN: ".$_SESSION['pl_2']->get_name()."</a>";
        $nb = $_SESSION['pl_2']->get_active_ship();
        $ships = $_SESSION['pl_2']->get_fleet();
        $ship = $ships[$nb];
        $pp = $ship->get_power_point();
        echo "<a id='pp' style='color: #f4c242'>"."Power Points: ".$pp."</a><br>";
    }
    echo "<a id='name_1' style='color: lightgreen'>".$_SESSION['pl_1']->get_name()."</a>";
    if ($_SESSION['turn'])
    {
        $fleet = $_SESSION['pl_1']->get_fleet();
        echo "<a class='Stats' style='color: lightgreen'>"."| Name: ".$fleet[$_SESSION['pl_1']->get_active_ship()]->get_name()." | HP: ".$fleet[$_SESSION['pl_1']->get_active_ship()]->get_hp()." | Range: ";
        echo $fleet[$_SESSION['pl_1']->get_active_ship()]->get_range()." | Damage: ".$fleet[$_SESSION['pl_1']->get_active_ship()]->get_damage()." | Shoot energy: ".$fleet[$_SESSION['pl_1']->get_active_ship()]->get_shoot_energy()." | Direction: ".$_SESSION['pl_1']->get_direction()." |";
    }
    else
    {
        $fleet = $_SESSION['pl_2']->get_fleet();
        echo "<a class='Stats'  style='color: #f4c242'>"."| Name: ".$fleet[$_SESSION['pl_1']->get_active_ship()]->get_name()." | HP: ".$fleet[$_SESSION['pl_2']->get_active_ship()]->get_hp()." | Range: ";
        echo $fleet[$_SESSION['pl_2']->get_active_ship()]->get_range()." | Damage: ".$fleet[$_SESSION['pl_2']->get_active_ship()]->get_damage()." | Shoot energy: ".$fleet[$_SESSION['pl_2']->get_active_ship()]->get_shoot_energy()." | Direction: ".$_SESSION['pl_2']->get_direction()." |";
    }

    $shoot_coord = array();

    echo "<a id='name_2' style='color: #f4c242'>".$_SESSION['pl_2']->get_name()."</a><br>";
    echo "<form id='button_l' action='set_direction.php' method='get'><button class='but' name=\"turn\" type=\"submit\" value=\"Left\">left</button></form>";
    echo "<form id='button_r' action='set_direction.php' method='get'><button class='but' name=\"turn\" type=\"submit\" value=\"Right\">right</button></form>";
    echo "<form id='button_u' action='set_direction.php' method='get'><button class='but' name=\"turn\" type=\"submit\" value=\"Up\">up</button></form>";
    echo "<form id='button_d' action='set_direction.php' method='get'><button class='but' name=\"turn\" type=\"submit\" value=\"Down\">down</button></form>";
    echo "<form id='shoot' action='shoot.php' method='get'><button class='but' name=\"turn\" type=\"submit\" value=\"shoot\">shoot</button></form>";
    echo "<form id='move' action='move.php' method='get'><button class='but' name=\"turn\" type=\"submit\" value=\"Ok\">move</button></form>";
    echo "<form id='finish' action='finish_move.php' method='get'><button class='but' name=\"turn\" type=\"submit\" value=\"Ok\">finish</button></form>";
    echo "<table id='field'>";

    for ($i = 0; $i < 100; $i++)
    {
        echo "<tr>";
        for ($j = 0; $j < 150; $j++)
        {
            $found = 0;
            $nb = 0;
            foreach ($coord_1 as $value)
            {
                if ($i == $value[0] && $j == $value[1] && $nb == $_SESSION['pl_1']->get_active_ship())
                {
                    echo "<td id='active_1'></td>";
                    $found = 1;
                }
                if ($i == $value[0] && $j == $value[1] && $nb != $_SESSION['pl_1']->get_active_ship())
                {
                    echo "<td id='pl_1'></td>";
                    $found = 1;
                }
                $nb++;
            }
            $nb = 0;
            foreach ($coord_2 as $value)
            {
                if ($i == $value[0] && $j == $value[1] && $nb == $_SESSION['pl_2']->get_active_ship())
                {
                    echo "<td id='active_2'></td>";
                    $found = 1;
                }
                if ($i == $value[0] && $j == $value[1] && $nb != $_SESSION['pl_2']->get_active_ship())
                {
                    echo "<td id='pl_2'></td>";
                    $found = 1;
                }
                $nb++;
            }
            foreach ($_SESSION['shoot'] as $value)
            {
                if ($i == $value[0] && $j == $value[1] && $_SESSION['turn'])
                {
                    echo "<td id='shoot_1'></td>";
                    $found = 1;
                }
                if ($i == $value[0] && $j == $value[1] && !$_SESSION['turn'])
                {
                    echo "<td id='shoot_2'></td>";
                    $found = 1;
                }
            }
            foreach ($_SESSION['asteroids'] as $value)
            {
                $x = $value->get_x_pos();
                $y = $value->get_y_pos();
                if ($i == $x && $j == $y)
                {
                    echo "<td id='aster'></td>";
                    $found = 1;
                }
            }
            if (!$found)
                echo "<td class='cell'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    array_splice($_SESSION['shoot'], 0, count($_SESSION['shoot']));

?>

</html>


