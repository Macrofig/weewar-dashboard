<?php
$userurl = "http://weewar.com/api1/user/";
$username = $_GET['userid'];
$userpoints = NULL;
$userrecord = NULL;
$usergamecount = NULL;
$usergamelist = NULL;
$usergames = array();

$userxml = simplexml_load_file($userurl.$username); //Parse XML

//Check to see if data was returned, if not display error

$username = strval($userxml->attributes());

$userpoints = $userxml->points; //We'll get the points and add to the variable

$userprofile = $userxml->profile;//Sets the url to the users profile on weewar.com

$userimage = $userxml->profileImage; //Sets the url to the users avatar

$userrecord["ties"] = $userxml->draws;//now lets add the users win-loss-tie record to an array
$userrecord["wins"] = $userxml->victories;
$userrecord["losses"] = $userxml->losses;

$usergamecount = $userxml->gamesRunning;//we'll grab the number of current games the user is playing
