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
if (!empty($_GET['userid'])) {
$userid2=$_GET['userid'];
$query="SELECT username, userid FROM users WHERE userid='$userid2'";
$username2=mysql_fetch_array(mysql_query($query)) or die("error");
$username2=$username2['username'];
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2"><? echo $username2; ?></TD></TR>
<?

	$query = "SELECT * FROM users WHERE userid='$userid2'";
	$user2 = mysql_query($query) or die($errdat);
	$user2 = mysql_fetch_array($user2);

	$orelevel=$user2['orelevel'];
	$attacklevel=$user2['attacklevel'];
	$defenselevel=$user2['defenselevel'];
	$race=$user2['race'];
	$rank2=$user2['rank'];
	$moderator=$user2['moderator'];
	$isbank=$user2['isbank'];
	$admin=$user2['admin'];

	require("./mastervalues.php");
	
	// Get user2's race
	if ($race>=0)
	{
		$race=$racename[$race];
	} else 
	{
		$race="UNKNOWN";
	}

	// Get the name of their attack technology from Master Values
	// If it is not listed it will default to the Infinite Value plus the number.
	$defensefort=$deftec[$defenselevel];
	if ($defensefort==null) {
	 $defensefort="Unknown";
	}

	$user=mysql_fetch_array(mysql_query("SELECT hackers, spies, attackcredits FROM users WHERE userid='$userid'"));
	$hackers=$user['hackers'];
	$attackcredits=$user['attackcredits'];
	$spies=$user['spies'];

	$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
	$online=$online['ip'];

if ($admin!="1") {
	$nam=mysql_fetch_array(mysql_query("SELECT name FROM users WHERE userid='$userid2'"));
	$nam=$nam['name'];

?>

<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Credits: <? if ($isbank==1) { echo "Unknown"; } else { echo number_format($user2['credits']); }?></SPAN>&nbsp;<SPAN ID="MEDIUM">UNITS:</SPAN> <?  if ($isbank==1) { echo "Unknown"; } else { echo number_format($user2['units']); }?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Defense technology: <? echo $defensefort; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Clan: <?  echo $race; ?></TD><TD ALIGN="RIGHT"></TD>
</TR>
<? } ?>
<TR VALIGN="TOP">
<TD><? if (!empty($online)) { ?><SPAN ID="BOLD">ONLINE</SPAN><? } else { ?><SPAN ID="MEDIUM">OFFLINE<? } ?></TD>
</TR>
<? if ($moderator=="1"&&$admin!="1") {
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">MODERATOR</TD>
</TR>
<? } 
if ($admin=="1") {
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">ADMIN</TD>
</TR>
<? } 
if ($rank2=="1") {
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">THE ALMIGHTY ONE!!!</TD>
</TR>
<? } 
if ($attackcredits > 0 && $userid != $userid2 && $admin!="1") { ?>
<FORM METHOD="POST" ACTION="attack.php" NAME="attackform">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="HIDDEN" VALUE="<? echo $userid2; ?>" NAME="34534534523322"><INPUT TYPE="SUBMIT" VALUE="ATTACK" ONCLICK="this.disabled=true;document.attackform.submit();"></TD>
</TR>
</FORM>
<? } 
if ($spies>0 && $userid != $userid2 && $admin!="1") { ?>
<FORM METHOD="POST" ACTION="spy.php" NAME="spyform">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="HIDDEN" VALUE="<? echo $userid2; ?>" NAME="3453453455555555523322"><INPUT TYPE="SUBMIT" VALUE="SPY" ONCLICK="this.disabled=true;document.spyform.submit();"></TD>
</TR>
</FORM>
<? } 
if ($hackers>0 && $userid != $userid2 && $admin!="1") { ?>
<FORM METHOD="POST" ACTION="hack.php" NAME="hackform">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="HIDDEN" VALUE="<? echo $userid2; ?>" NAME="3453453455555555523322jdjdijdjiodijod"><INPUT TYPE="SUBMIT" VALUE="HACK" ONCLICK="this.disabled=true;document.hackform.submit();"></TD>
</TR>
</FORM>
<? } 
 if ($userid != $userid2) {
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><A HREF="./index.php?content=message&userid=<? echo $userid2; ?>">[Send message]</A></TD>
</TR>
<? } ?>
</TABLE>
</TD>
</TR>
</TABLE>
<?
}
////////////
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
