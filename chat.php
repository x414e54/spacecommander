<?php
	if (!isset($content) && empty($_SESSION["username"])){
		$content="chat";
		require('./index.php');
	} else {
	if (!empty($_SESSION["username"])) {
		require('./global.php');
		$query = "SELECT planet FROM users WHERE userid='$userid'";
		$user = mysql_query($query) or die($errdat);
		$user = mysql_fetch_array($user);
		$planetid=$user['planet'];

		$query="SELECT * FROM planets WHERE planetid='$planetid'";
		$planet=mysql_fetch_array(mysql_query($query)) or die("error");
		$x=$planet['x'];
		$y=$planet['y'];
		$z=$planet['z'];
	} else {
		$username="space-commander";
	}
?><br>
<div class="header">Space Commander: Chat</div><br>
You will be connected to the Flat 47 IRC server<br><br>
Click <a href="./chat2.php?user=<? echo $username; ?>&channel=space-commander" target="_new">[here]</a> to open universe chanel (#space-commander) in a new window.<br>
<?
if (!empty($userid)) {
?>
Click <a href="./chat2.php?user=<? echo $username; ?>&channel=<? echo $x; ?>" target="_new">[here]</a> to open galaxy chanel (Galaxy: #<? echo $x; ?>) in a new window.<br>
Click <a href="./chat2.php?user=<? echo $username; ?>&channel=<? echo $x; ?>:<? echo $y; ?>" target="_new">[here]</a> to open solar system chanel (Co-ordinates: #<? echo $x; ?>:<? echo $y; ?>) in a new window.<br>
Click <a href="./chat2.php?user=<? echo $username; ?>&channel=<? echo $x; ?>:<? echo $y; ?>:<? echo $z; ?>" target="_new">[here]</a> to open planet chanel (Co-ordinates: #<? echo $x; ?>:<? echo $y; ?>:<? echo $z; ?>) in a new window.<br>
<? } ?>
<br>
<?
	}
?>

