<?php

    require_once 'Player.class.php';
    require_once 'Asteroid.class.php';

    session_start();

    $GLOBALS["error"] = '';

    function    check_input()
    {
        if ($_POST['p1_name'] == NULL)
            return (false);
        if ($_POST['p2_name'] == NULL)
            return (false);
        return (true);
    }

    function checkLogin()
    {
        $db = unserialize(file_get_contents("private/db"));
        $players = 0;
        foreach ($db as $value)
        {
            if ($value["login"] == trim($_POST["p1_name"]))
            {
                $players++;
                if (hash("whirlpool",$_POST["p1_password"]) != $value["password"])
                {
                    $GLOBALS["error"] = "Invalid password of user 1 <br/>";
                    return false;
                }
            }
            if ($value["login"] == trim($_POST["p2_name"]))
            {
                $players++;
                if (hash("whirlpool",$_POST["p2_password"]) != $value["password"])
                {
                    $GLOBALS["error"] = "Invalid password of user 2 <br/>";
                    return false;
                }
            }
        }
        if ($players != 2)
        {
            $GLOBALS["error"] = "One of user is not registered<br/>";
        }
        return $players == 2;
    }

    if (check_input())
    {
        if(checkLogin())
        {
        $_SESSION['pl_1'] = new Player($_POST['p1_name'], $_POST['fleet']);
        $_SESSION['pl_2'] = new Player($_POST['p2_name'], $_POST['fleet']);
        $_SESSION['fleet'] = $_POST['fleet'];
        $_SESSION['asteroids'] = array();
        $offset_x = 0;
        $offset_y = 0;
        $i = 0;
        $lim_j = 100;
        array_push($_SESSION['asteroids'], new Asteroid(4, 8));
        array_push($_SESSION['asteroids'], new Asteroid(98, 135));
        while ($i < 100)
        {
            $j = 50;
            while ($j < $lim_j)
            {
                if ((mt_rand(25, 113) % 2 == 0) && (mt_rand(25, 75) % 2 != 0) && $i % 4 == 0 && $j % 4 == 0)
                    array_push($_SESSION['asteroids'], new Asteroid($i, $j));
                $j++;
            }
            $i++;
        }
        header('Location: create_fleet.php');
        }else
        {
            header('Location: error.php?error=' . $GLOBALS["error"]);
        }
    }
    else
        header('Location: error.php?error=Invalid input');
?>
