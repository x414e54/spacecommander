<?php
require('./global.php');

$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_fetch_array(mysql_query($query));
$userid=$userid['userid'];
$password=mysql_fetch_array(mysql_query("SELECT password FROM users WHERE userid='$userid'"));
$password=$password['password'];

if ($_SESSION["password2"]==$password)
{
	$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
	$admin=$admin['admin'];
	$query="SELECT paused FROM admin WHERE admin_id='0001'";
	$paused=mysql_fetch_array(mysql_query($query));
	$paused=$paused['paused'];

	if ($paused=="1" && $admin!="1")
	{
		session_destroy();
		$response="Im sorry the game has been paused... you cannot log in at this time.";
		header("Location: index.php?23432423444111222333=$response");
	} else
	{
		$query="SELECT suspended FROM users WHERE userid='$userid'";
		$sus=mysql_fetch_array(mysql_query($query));
		$sus=$sus['suspended'];
			
		if ($sus=="1")
		{
			session_destroy();
			$response="Your account has been suspended and is pending investigation... you are immune.";
			header("Location: index.php?23432423444111222333=$response");
		} else
		{
////
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">RANKING:</TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD>RANK:</TD><TD>Name:</TD><TD ALIGN="RIGHT">UNITS:</TD><TD ALIGN="RIGHT">CREDITS:</TD>
</TR>
<?
$banking=mysql_query("SELECT rank, username, credits, units, userid FROM users WHERE isbank='1'");
while ($bank = mysql_fetch_array($banking)) {
$bankno=$bank['rank'];
$userid3=$bank['userid'];
$usernamer=$bank['username'];
$units=$bank['units'];
$credits=$bank['credits'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid3'"));
$online=$online['ip'];
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">BANK</TD><TD><? if (!empty($online)) { ?><SPAN ID="BOLD"><? } if ($userid3!=$userid) { ?><A HREF="./index.php?content=user&userid=<? echo $userid3;?>">[<? echo $usernamer; ?>]</A><? } else { ?><? echo $usernamer; ?><? } ?></A></TD><TD ALIGN="RIGHT">Unknown</TD><TD ALIGN="RIGHT">Unknown</TD>
</TR>
<? }
$ranking=mysql_query("SELECT rank, username, credits, units, userid FROM users ORDER BY rank");
while ($rank = mysql_fetch_array($ranking)) {
$rankno=$rank['rank'];
if ($rankno!="-1" && $rankno!="-2" && $rankno!="0") {
$userid2=$rank['userid'];
$usernamer=$rank['username'];
$units=$rank['units'];
$credits=$rank['credits'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
$online=$online['ip'];
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><? echo $rankno; ?></TD><TD><? if (!empty($online)) { ?><SPAN ID="BOLD"><? } if ($userid2!=$userid) { ?><A HREF="./index.php?content=user&userid=<? echo $userid2;?>">[<? echo $usernamer; ?>]</A><? } else { ?><? echo $usernamer; ?><? } ?></TD><TD ALIGN="RIGHT"><? echo number_format($units); ?></TD><TD ALIGN="RIGHT"><? echo number_format($credits); ?></TD>
</TR>
<?
}
}
?>
</TABLE>
</TD>
</TR>
</TABLE>
<?
/////////
		}
	}
} else {
	session_destroy();
	$response="Password incorrect";
	session_start();
	$_SESSION["message1"]=$response;
	$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
	session_register('message1');
	session_register('url');
	header("Location: reload.php");
	exit;
}
?>	