<?php

    require_once 'Player.class.php';
    require_once 'Asteroid.class.php';
    require_once 'Ships.class.php';

    session_start();

    if ($_SESSION['turn'])
        $player = $_SESSION['pl_1'];
    else
        $player = $_SESSION['pl_2'];
    $ship = $player->get_fleet()[$player->get_active_ship()];
    $ship->set_init_power();
    $player->set_active_ship(1);
    $_SESSION['turn'] = !$_SESSION['turn'];
    header('Location: arena.php');

?>