<?php

    require_once 'Player.class.php';
    require_once 'Ships.class.php';
    require_once 'Asteroid.class.php';

    session_start();

    function    check_asteroid($ship_1, $ship_2)
    {
        foreach ($_SESSION['asteroids'] as $value)
        {
            $x = $value->get_x_pos();
            $y = $value->get_y_pos();
            if ($ship_1 == $x && $ship_2 == $y)
                return (true);
        }
        return (false);
    }

    function    check_own_ships($player, $ship_1, $ship_2, $nb)
    {
        $coord = $player->get_coord();
        $fleet = $player->get_fleet();
        for ($i = 0; $i < count($fleet); $i++)
        {
            if ($ship_1 == $coord[$i][0] && $ship_2 == $coord[$i][1] && $i != $nb)
            {
                    array_splice($fleet, $nb, 1);
                    array_splice($coord, $nb, 1);
                    $player->set_coord($coord);
                    $player->set_ships($fleet);
                    array_splice($fleet, $i - 1,  1);
                    array_splice($coord, $i - 1, 1);
                    $player->set_coord($coord);
                    $player->set_ships($fleet);
                    $player->set_active_ship(0);
                    change_turn();
            }
        }
    }

    function    check_enemy_ships()
    {
        $coord_1 = $_SESSION['pl_1']->get_coord();
        $coord_2 = $_SESSION['pl_2']->get_coord();
        $fleet_1 = $_SESSION['pl_1']->get_fleet();
        $fleet_2 = $_SESSION['pl_2']->get_fleet();

        for ($i = 0; $i < count($fleet_1); $i++)
        {
            for ($j = 0; $j < count($fleet_2); $j++)
            {
                if ($coord_1[$i][0] == $coord_2[$j][0] && $coord_1[$i][1] == $coord_2[$j][1])
                {
                    array_splice($fleet_1, $i, 1);
                    array_splice($fleet_2, $j, 1);
                    array_splice($coord_1, $i, 1);
                    array_splice($coord_2, $j, 1);
                    $_SESSION['pl_1']->set_ships($fleet_1);
                    $_SESSION['pl_2']->set_ships($fleet_2);
                    $_SESSION['pl_1']->set_coord($coord_1);
                    $_SESSION['pl_2']->set_coord($coord_2);
                    $_SESSION['pl_1']->set_active_ship(0);
                    $_SESSION['pl_2']->set_active_ship(0);
                    change_turn();
                }
            }
        }
    }

    function    change_turn()
    {
        $_SESSION['turn'] = !$_SESSION['turn'];
        header('Location: arena.php');
    }

    if ($_SESSION['turn'] == 1)
    {
        $player = $_SESSION['pl_1'];
        $nb = $_SESSION['pl_1']->get_active_ship();
        $ships = $_SESSION['pl_1']->get_fleet();
        $ship = $ships[$nb];
        $coord = $_SESSION['pl_1']->get_coord();
        $dir = $_SESSION['pl_1']->get_direction();
    }

    else
    {
        $player = $_SESSION['pl_2'];
        $nb = $_SESSION['pl_2']->get_active_ship();
        $ships = $_SESSION['pl_2']->get_fleet();
        $ship = $ships[$nb];
        $coord = $_SESSION['pl_2']->get_coord();
        $dir = $_SESSION['pl_2']->get_direction();
    }

    if ($dir == 'Left')
    {
        $coord[$nb][1] = $coord[$nb][1] - 1;
        if ($coord[$nb][1] < 0)
        {
            array_splice($ships, $nb, 1);
            array_splice($coord, $nb, 1);
            $player->set_coord($coord);
            $player->set_ships($ships);
            $player->set_active_ship(0);
            change_turn();
        }
        $player->set_coord($coord);
        $ship->set_power(1);
    }

    if ($dir == 'Right')
    {
        $coord[$nb][1] = $coord[$nb][1] + 1;
        if ($coord[$nb][1] > 149)
        {
            array_splice($ships, $nb,  1);
            array_splice($coord, $nb, 1);
            $player->set_coord($coord);
            $player->set_ships($ships);
            $player->set_active_ship(0);
            change_turn();
        }
        $player->set_coord($coord);
        $ship->set_power(1);
    }

    if ($dir == 'Up')
    {
        $coord[$nb][0] = $coord[$nb][0] - 1;
        if ($coord[$nb][0] < 0)
        {
            array_splice($ships, $nb,  1);
            array_splice($coord, $nb, 1);
            $player->set_coord($coord);
            $player->set_ships($ships);
            $player->set_active_ship(0);
            change_turn();
        }
        $player->set_coord($coord);
        $ship->set_power(1);
    }

    if ($dir == 'Down')
    {
        $coord[$nb][0] = $coord[$nb][0] + 1;
        if ($coord[$nb][0] > 99)
        {
            array_splice($ships, $nb,  1);
            array_splice($coord, $nb, 1);
            $player->set_coord($coord);
            $player->set_ships($ships);
            $player->set_active_ship(0);
            change_turn();
        }
        $player->set_coord($coord);
        $ship->set_power(1);
    }

    if (check_asteroid($coord[$nb][0], $coord[$nb][1]))
    {
        array_splice($ships, $nb,  1);
        array_splice($coord, $nb, 1);
        $player->set_coord($coord);
        $player->set_ships($ships);
        $player->set_active_ship(0);
        change_turn();
    }
    check_own_ships($player, $coord[$nb][0], $coord[$nb][1], $nb);
    check_enemy_ships();
    if ($ship->get_power_point() <= 0)
    {
        $ship->set_init_power();
        $player->set_active_ship(1);
        $player->set_direction("");
        $_SESSION['turn'] = !$_SESSION['turn'];
    }
    header('Location: arena.php');
?>


