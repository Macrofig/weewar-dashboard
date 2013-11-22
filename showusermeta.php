<div id="usermeta">
<div id="userimage"><img src="<?php echo $userimage; ?>" width="100" alt="<?php echo $username; ?>" /></div>
<p><?php echo $username; ?><br />
Wins: <?php echo $userrecord["wins"]; ?> || Losses: <?php echo $userrecord["losses"]; ?> || Ties: <?php echo $userrecord["ties"]; ?>
<br /><a href="<?php echo $userprofile; ?>" title="View <?php echo $username; ?>'s Profile">View Profile</a>
</p>
</div>