<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>

<?php

    require_once 'Player.class.php';
    require_once 'Asteroid.class.php';
    require_once 'Ships.class.php';

    session_start();

    function check_obstacle($pl_1, $pl_2, $i, $j)
    {

        $coord_1 = $pl_1->get_coord();
        $coord_2 = $pl_2->get_coord();

        foreach ($coord_1 as $value)
        {
            if ($i == $value[0] && $j == $value[1])
            {
                return (true);
            }
        }
        foreach ($coord_2 as $value)
        {
            if ($i == $value[0] && $j == $value[1])
            {
                return (true);
            }
        }
        foreach ($_SESSION['asteroids'] as $value)
        {
            $x = $value->get_x_pos();
            $y = $value->get_y_pos();
            if ($i == $x && $j == $y)
            {
                return (true);
            }
        }
        return (false);
    }

    function    find_ship($coord, $i, $j)
    {
        $counter = 0;
        foreach ($coord as $value)
        {
            if ($value[0] == $i && $value[1] == $j)
                return ($counter);
            $counter++;
        }
        return (-1);
    }

    function    check_enemy_ships($player_1, $player_2, $i, $j)
    {
        $coord_1 = $player_1->get_coord();
        $coord_2 = $player_2->get_coord();
        if ($_SESSION['turn'])
        {
            $nb = find_ship($coord_2, $i, $j);
            echo $nb."\n";
            if ($nb != -1)
            {
                $ship_1 = $player_1->get_fleet()[$player_1->get_active_ship()];
                $ship_2 = $player_2->get_fleet()[$nb];
                $ship_2->set_hp($ship_1->get_damage());
            }
        }
        else
        {
            $nb = find_ship($coord_1, $i, $j);
            if ($nb != -1)
            {
                $ship_2 = $player_1->get_fleet()[$player_2->get_active_ship()];
                $ship_1 = $player_1->get_fleet()[$nb];
                $ship_1->set_hp($ship_2->get_damage());
            }
        }
    }

    $shoot_coord = array();
    if ($_SESSION['turn'] == 1 && $_SESSION['pl_1']->get_direction() != NULL)
        $player = $_SESSION['pl_1'];
    elseif ($_SESSION['turn'] == 0 && $_SESSION['pl_2']->get_direction() != NULL)
        $player = $_SESSION['pl_2'];
    else
        header('Location: arena.php');
    $x_shoot = $player->get_coord()[$player->get_active_ship()][0];
    $y_shoot = $player->get_coord()[$player->get_active_ship()][1];
    $ship = $player->get_fleet()[$player->get_active_ship()];
    $dir = $player->get_direction();
    if ($ship->get_shoot_energy() <= $ship->get_power_point())
    {
        if ($dir == 'Right')
        {
            for ($i = 0; $i < $ship->get_range() - 1 &&  $y_shoot + $i + 1 <= 149; $i++)
            {
                if (check_obstacle($_SESSION['pl_1'], $_SESSION['pl_2'], $x_shoot, $y_shoot + $i + 1) == true)
                {
                    check_enemy_ships($_SESSION['pl_1'], $_SESSION['pl_2'], $x_shoot, $y_shoot + $i + 1);
                    break ;
                }
                $shoot_coord[$i][0] = $x_shoot;
                $shoot_coord[$i][1] = $y_shoot + $i + 1;
            }
        }
        if ($dir == 'Left')
        {
            for ($i = 0; $i < $ship->get_range() - 1 &&  $y_shoot - ($i + 1) >= 0; $i++)
            {
                if (check_obstacle($_SESSION['pl_1'], $_SESSION['pl_2'], $x_shoot, $y_shoot - ($i + 1)))
                {
                    check_enemy_ships($_SESSION['pl_1'], $_SESSION['pl_2'], $x_shoot, $y_shoot - ($i + 1));
                    break ;
                }
                $shoot_coord[$i][0] = $x_shoot;
                $shoot_coord[$i][1] = $y_shoot - ($i + 1);
            }
        }
        if ($dir == 'Up')
        {
            for ($i = 0; $i < $ship->get_range() - 1 &&  $x_shoot - $i - 1 >= 0; $i++)
            {
                if (check_obstacle($_SESSION['pl_1'], $_SESSION['pl_2'], $x_shoot - ($i + 1), $y_shoot))
                {
                    check_enemy_ships($_SESSION['pl_1'], $_SESSION['pl_2'], $x_shoot - ($i + 1), $y_shoot);
                    break ;
                }
                $shoot_coord[$i][0] = $x_shoot - ($i + 1);
                $shoot_coord[$i][1] = $y_shoot;
            }
        }
        if ($dir == 'Down')
        {
            for ($i = 0; $i < $ship->get_range() - 1 &&  $x_shoot + $i + 1 <= 99; $i++)
            {
                if (check_obstacle($_SESSION['pl_1'], $_SESSION['pl_2'], $x_shoot + $i + 1, $y_shoot))
                {
                    check_enemy_ships($_SESSION['pl_1'], $_SESSION['pl_2'], $x_shoot + $i + 1, $y_shoot);
                    break ;
                }
                $shoot_coord[$i][0] = $x_shoot + $i + 1;
                $shoot_coord[$i][1] = $y_shoot;
            }
        }
        $_SESSION['shoot'] = $shoot_coord;
        $ship->set_power($ship->get_shoot_energy());
        if ($ship->get_power_point() <= 0)
        {
            $ship->set_init_power();
            $player->set_active_ship(1);
            $_SESSION['turn'] = !$_SESSION['turn'];
        }
    }

    header('Location: arena.php');

?>

</html>
