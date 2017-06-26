
<html>

<head>
    <title>General Rank</title>

    <style>

        body
        {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-image: url(http://www.storywarren.com/wp-content/uploads/2016/09/space-1.jpg);
        }

        .player
        {
            width: 80%;
            display: flex;
            justify-content: space-around;
        }

        .name
        {
            margin-top: 10px;
            background: white;
            padding: 5px;
            flex: 2;
            text-align: center;
            margin-left: 5px;
        }

        input
        {
            background: #3498db;
            border-radius: 28px;
            color: #ffffff;
            font-size: 20px;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
            margin-top: 15px;
        }

        input:hover {
            background: #3cb0fd;
            text-decoration: none;
        }

    </style>

</head>

<body>

<div class="player">
    <div class="name">Rank</div>
    <div class="name">Name</div>
    <div class="name">Win</div>
    <div class="name">Defeat</div>
    <div class="name">Draw</div>
    <div class="name">Games</div>
</div>

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
function sort_me($player1, $player2)
{
    $player1 = explode(",", $player1);
    $player2 = explode(",", $player2);
    if ($player1[1] == $player2[1])
    {
        return $player1[4] < $player2[4];
    }
    return $player1[1] < $player2[1];
}
$stat = file_get_contents("private/stat");
$players = explode("\n", $stat);
$players = array_diff($players, array(""));
usort($players, "sort_me");

$rank = 1;

foreach ($players as $value)
{
    $value = explode(",", $value);
    echo '<div class="player">
    <div class="name">' . $rank++ . '</div>
    <div class="name">' . $value[0] . '</div>
    <div class="name">' . $value[1] . '</div>
    <div class="name">' . $value[2] . '</div>
    <div class="name">' . $value[3] . '</div>
    <div class="name">' . $value[4] . '</div>
</div>';
}
?>
<form action="index.php">
    <input class="button" type="submit" value="Main Page"/>
</form>
</body>
</html>