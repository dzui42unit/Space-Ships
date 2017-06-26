<?php
    session_start();
    if (!($_POST["login"]) || !($_POST["passwd"]) || ($_POST["submit"] != "OK"))
    {
        echo "Error\n";
        return ;
    }
    if (!file_exists("../private"))
        mkdir("../private");
    if (file_exists("../private/passwd"))
    {
        $data = file_get_contents("../private/passwd");
        $data = unserialize($data);
        foreach ($data as $elem)
        {
            if ($elem["login"] == $_POST["login"])
            {
                echo "Error\n";
                return ;
            }
        }
        $_SESSION['loggued_on_user'] = $_POST["login"];
        $data[count($data)]["login"] = $_POST["login"];
        $data[count($data) - 1]["passwd"] = hash("whirlpool", $_POST["passwd"]);
        file_put_contents("../private/passwd", serialize($data));
        echo "OK\n";
        header("Location: index.html");
    }
    else
    {
        $_SESSION['loggued_on_user'] = $_POST["login"];
        $data[0]["login"] = $_POST["login"];
        $data[0]["passwd"] = hash("whirlpool", $_POST["passwd"]);
        file_put_contents("../private/passwd", serialize($data));
        echo "OK\n";
        header("Location: index.html");
    }
?>
