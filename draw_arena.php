<?php

    require_once 'Player.class.php';
    require_once 'Ships.class.php';

    session_start();

    function draw_arena()
    {
        echo "<table id='field'>";
        $coord_1 = $_SESSION['pl_1']->get_coord();
        $coord_2 = $_SESSION['pl_2']->get_coord();
        for ($i = 0; $i < 100; $i++)
        {
            echo "<tr>";
            for ($j = 0; $j < 150; $j++)
            {
                $found = 0;
                foreach ($coord_1 as $value)
                {
                    if ($i == $value[0] && $j == $value[1])
                    {
                        echo "<td id='pl_1'></td>";
                        $found = 1;
                    }
                }
                foreach ($coord_2 as $value)
                {
                    if ($i == $value[0] && $j == $value[1])
                    {
                        echo "<td id='pl_2'></td>";
                        $found = 1;
                    }
                }
                if (!$found)
                    echo "<td class='cell'></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

?>