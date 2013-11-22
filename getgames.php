<?php
$opengamesurl = 'http://weewar.com/api1/games/open';
$gameapiurl = 'http://weewar.com/api1/game/';
$gamesurl= "http://weewar.com/game/";
$i = 1;
$opengamesxml = simplexml_load_file($opengamesurl); //Parse XML

function getGameStatus($gamexmlurl,$username){
	$game = simplexml_load_file($gamexmlurl); //Parse XML
	$gamestatus = NULL;
	foreach ($game->players->player as $player){
		if ($player == $username){
			foreach ($player->attributes() as $a => $b) {
				if ($a == "current")
				$gamestatus = "Your Turn";

				if ($a == "undo")
				$gamestatus = "Attention";
			}	
		}

	}
	if (isset($gamestatus))
		return $gamestatus;
	else
		return "Waiting";
}


if (isset($_GET['userid']) && $userxml->games){
	$showusergames = TRUE;
} else{
	$showusergames = FALSE;
}
if ($opengamesxml->game){
	$showopengames = TRUE;	
} else{
	$showopengames = FALSE;
}?>

<h3>Games List:</h3>

<ul id="gamelist">

<?php

if ($showopengames == TRUE){
	foreach($opengamesxml->game as $opengames) {//Build simple list of games with links
		$gameurl = NULL;
		$gameid = $opengames->attributes(); //Grabs the game id and sets it.
		$gameurl = $gamesurl . $gameid; //creates the url to the game using the new information

		echo "<li class=\"gameid\"id=\"".$gameid."\">".$i." | "."<a href=\"".$gameurl."\" />".$gameid."</a> - Status(Open)</li>";//puts it all together

		$i++; //counter for the game list
	}
}

if ($showusergames == TRUE){
	$usergames = $userxml->games;
	foreach($usergames->game as $usergameid) {//Grab the users game list and set it to an array
		$gameurl = NULL;
		//$gamename = $usergame->attributes(); //future - store the game name
		$gameurl = $gamesurl . $usergameid;
		$gamexmlurl = $gameapiurl . $usergameid;
		$gamestatus = getGameStatus($gamexmlurl,$username);
		echo "<li class=\"usergameid\"id=\"".$usergameid."\">".$i." | "."<a href=\"".$gameurl."\" />".$usergameid."</a> - Status(" . $gamestatus . ")</li>";//puts it all together

		$i++; //counter for the game list
	}
}

if ($showusergames == FALSE && $showopengames == FALSE){
	echo "<li id=\"nogames\">No games at the moment</li>";
}?>

</ul>
