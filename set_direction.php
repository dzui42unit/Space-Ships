<?php

    require_once 'Player.class.php';
    require_once 'Ships.class.php';
    require_once 'Asteroid.class.php';

    session_start();

    if ($_SESSION['turn'])
        $player = $_SESSION['pl_1'];
    else
        $player = $_SESSION['pl_2'];

    if ($_GET['turn'] == 'Left')
        $player->set_direction('Left');
    if ($_GET['turn'] == 'Right')
        $player->set_direction('Right');
    if ($_GET['turn'] == 'Up')
        $player->set_direction('Up');
    if ($_GET['turn'] == 'Down')
        $player->set_direction('Down');
    echo $player->get_direction()."\n";
    header('Location: arena.php');
?>