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
$query="UPDATE users SET infiltrated='0', spied='0' WHERE userid='$userid'";
$updateinf=mysql_query($query);
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">OUTGOING COVERT ATTACKS:</TD><TD></TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD>TIME:</TD><TD>Name:</TD><TD ALIGN="RIGHT">Report:</TD><TD ALIGN="RIGHT">ACTION:</TD></TD>
</TR>
<?
$attacker=mysql_query("SELECT * FROM spylog WHERE userid='$userid' AND incoming='0' ORDER BY time DESC");
while ($attack = mysql_fetch_array($attacker)) {
$attacktime=$attack['time'];
$spyid=$attack['spyid'];
$attacker2=$attack['userid2'];
$attackaction=$attack['action'];
$stats=$attack['stats'];
$query="SELECT username, userid FROM users WHERE userid='$attacker2'";
$attackername=mysql_fetch_array(mysql_query($query));
$attackername=$attackername['username'];
?>
<TR VALIGN="TOP" BGCOLOR="GREEN">
<TD><? echo $attacktime; ?></TD><TD><? if (!empty($attackername)) { ?><A HREF="./index.php?content=user&userid=<? echo $attacker2; ?>">[<? echo $attackername; ?>]</A><? } else { ?>UNKNOWN<? } ?></TD><TD ALIGN="RIGHT"><A HREF="./index.php?content=spyreport&spyid=<? echo $spyid; ?>">[Report]</A></TD><TD ALIGN="RIGHT"><? echo $attackaction; ?></TD></TD>
</TR>
<? } ?>
</TABLE>
</TD>
</TR>
</TABLE>
<BR>
<BR>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">INCOMING COVERT ATTACKS:</TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD>TIME:</TD><TD>Name:</TD><TD ALIGN="RIGHT">ACTION:</TD></TD>
</TR>
<?
$attacker=mysql_query("SELECT * FROM spylog WHERE userid='$userid' AND incoming='1' ORDER BY time DESC");
while ($attack = mysql_fetch_array($attacker)) {
$attacktime=$attack['time'];
$attacker2=$attack['userid2'];
$attackaction=$attack['action'];
$canseename=$attack['canseename'];
$query="SELECT username, userid FROM users WHERE userid='$attacker2'";
$attackername=mysql_fetch_array(mysql_query($query));
$attackername=$attackername['username'];
if ($canseename==1 && !empty($attackername)) {
?>
<TR VALIGN="TOP" BGCOLOR="GREEN">
<TD><? echo $attacktime; ?></TD><TD><A HREF="./index.php?content=user&userid=<? echo $attacker2; ?>">[<? echo $attackername; ?>]</A></TD><TD ALIGN="RIGHT"><? echo $attackaction; ?></TD></TD>
</TR>
<?
} else {
?>
<TR VALIGN="TOP" BGCOLOR="GREEN">
<TD><? echo $attacktime; ?></TD><TD>UNKNOWN</TD><TD ALIGN="RIGHT"><? echo $attackaction; ?></TD></TD>
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
