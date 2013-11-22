<?php include ('header.php'); 

?>
<p>I wanted to have a quick page to access that will display all the available games and, eventually, all my current games.
  <span class="strike">I want to add the status of the games (i.e. Available, action required, waiting, etc.), but I'm starting small.</span> <strong>(Update: I just added the functionality to check game status.)</strong> I hope this
  is useful for others. Todo: 1) Maybe add some AJAX? 2) Add sparkle and shine.<br /><span>-Juan</span></p>
  </div>
  <div id="content">
<?php if (!isset($_GET['userid'])){//show user data or login form
	include ('loginform.php');
}else{
	include ('showuser.php');
}

include ('getgames.php');

 if (isset($_GET['userid'])){
	include ('showusermeta.php');
	echo '<br/><a href="/weewar" title="Search Again">Search another user.</a>';
}

include ('footer.php');
?>
