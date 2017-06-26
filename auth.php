<?php
function auth($login, $passwd)
{
	$data = unserialize(file_get_contents("../private/passwd"));
	foreach ($data as $elem)
	{
		if (($elem['login'] == $login) && ($elem['passwd'] == hash('whirlpool', $passwd)))
		{
			return (true);
		}
	}
	return (false);
}
?>
