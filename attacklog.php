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
<TR ID="TABLEHEAD"><TD COLSPAN="2">OUTGOING ATTACK LOG:</TD><TD></TD><TD></TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD>TIME:</TD><TD>Name:</TD><TD ALIGN="RIGHT">CREDITS STOLEN:</TD><TD ALIGN="RIGHT">UNITS ERASED:</TD><TD ALIGN="RIGHT">YOUR DAMAGE:</TD><TD ALIGN="RIGHT">ENEMY DAMAGE:</TD>
</TR>
<?
if (empty($_GET['start2'])) {
$attacktimelast=date("Y/m/d G:i:s");
} else {
$attacktimelast=$_GET['start2'];
}
$attacker=mysql_query("SELECT * FROM attacklog WHERE userid='$userid' AND outgoing='1' AND time<'$attacktimelast' ORDER BY time DESC");
$i=0;
while ($attack = mysql_fetch_array($attacker)) {
if ($i<10) {
$i++;
$attacktime=$attack['time'];
$attacker2=$attack['userid2'];
$attackid=$attack['attackid'];
$attackunits=$attack['units'];
$attackcredits=$attack['credits'];
$attackdamage=$attack['attackdamage'];
$attackdefense=$attack['defensedamage'];
$query="SELECT username, userid FROM users WHERE userid='$attacker2'";
$attackername=mysql_fetch_array(mysql_query($query)) or die("error6");
$attackername=$attackername['username'];
if ($attack['win']==1) {
?>
<TR VALIGN="TOP" BGCOLOR="BLUE">
<TD><? echo $attacktime; ?></TD><TD><A HREF="./index.php?content=user&userid=<? echo $attacker2; ?>">[<? echo $attackername; ?>]</A></TD><TD ALIGN="RIGHT"><? echo number_format($attackcredits); ?></TD><TD ALIGN="RIGHT"><? echo number_format($attackunits); ?></TD><TD ALIGN="RIGHT"><? echo number_format($attackdamage); ?></TD><TD ALIGN="RIGHT"><? echo number_format($attackdefense); ?></TD>
</TR>
<?
} else {
?>
<TR VALIGN="TOP" BGCOLOR="RED">
<TD><? echo $attacktime; ?></TD><TD><A HREF="./index.php?content=user&userid=<? echo $attacker2; ?>">[<? echo $attackername; ?>]</A></TD><TD ALIGN="RIGHT"><? echo $attackcredits; ?></TD><TD ALIGN="RIGHT"><? echo $attackunits; ?></TD><TD ALIGN="RIGHT"><? echo number_format($attackdamage); ?></TD><TD ALIGN="RIGHT"><? echo number_format($attackdefense); ?></TD>
</TR>
<?
}
}
}
?>
</TABLE>
</TD>
</TR>
</TABLE>
<TABLE WIDTH="100%">
<TR>
<TD ALIGN="LEFT"><A HREF="./index.php?content=attacklog&start2=<? echo $attacktimelast; ?>">PREVIOUS</A></TD><TD ALIGN="RIGHT"><A HREF="./index.php?content=attacklog&start2=<? echo $attacktime; ?>">NEXT</A><//TD>
</TD>
</TABLE>
<BR>
<BR>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">INCOMING ATTACK LOG:</TD><TD></TD><TD></TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD>TIME:</TD><TD>Name:</TD><TD ALIGN="RIGHT">CREDITS STOLEN:</TD><TD ALIGN="RIGHT">UNITS ERASED:</TD><TD ALIGN="RIGHT">YOUR DAMAGE:</TD><TD ALIGN="RIGHT">ENEMY DAMAGE:</TD>
</TR>
<?
if (empty($_GET['start'])) {
$attacktimelast2=date("Y/m/d G:i:s");
} else {
$attacktimelast2=$_GET['start'];
}
$attacker=mysql_query("SELECT * FROM attacklog WHERE userid='$userid' AND outgoing='0' AND time<'$attacktimelast2' ORDER BY time DESC");
$i=0;
while ($attack = mysql_fetch_array($attacker)) {
if ($i<10) {
$i++;
$attacktime=$attack['time'];
$attackid=$attack['attackid'];
$attacker2=$attack['userid2'];
$attackunits=$attack['units'];
$attackcredits=$attack['credits'];
$attackdamage=$attack['attackdamage'];
$attackdefense=$attack['defensedamage'];
$query="SELECT username, userid FROM users WHERE userid='$attacker2'";
$attackername=mysql_fetch_array(mysql_query($query)) or die("error9078");
$attackername=$attackername['username'];
if ($attack['win']==1) {
?>
<TR VALIGN="TOP" BGCOLOR="BLUE">
<TD><? echo $attacktime; ?></TD><TD><A HREF="./index.php?content=user&userid=<? echo $attacker2; ?>">[<? echo $attackername; ?>]</A></TD><TD ALIGN="RIGHT"><? echo number_format($attackcredits); ?></TD><TD ALIGN="RIGHT"><? echo number_format($attackunits); ?></TD><TD ALIGN="RIGHT"><? echo number_format($attackdefense); ?></TD><TD ALIGN="RIGHT"><? echo number_format($attackdamage); ?></TD>
</TR>
<?
} else {
?>
<TR VALIGN="TOP" BGCOLOR="RED">
<TD><? echo $attacktime; ?></TD><TD><A HREF="./index.php?content=user&userid=<? echo $attacker2; ?>">[<? echo $attackername; ?>]</A></TD><TD ALIGN="RIGHT"><? echo $attackcredits; ?></TD><TD ALIGN="RIGHT"><? echo number_format($attackunits); ?></TD><TD ALIGN="RIGHT"><? echo number_format($attackdefense); ?></TD><TD ALIGN="RIGHT"><? echo number_format($attackdamage); ?></TD>
</TR>
<?
}
}
}
?>
</TABLE>
</TD>
</TR>
</TABLE>
<TABLE WIDTH="100%">
<TR>
<TD ALIGN="LEFT"><A HREF="./index.php?content=attacklog&start=<? echo $attacktimelast2; ?>">PREVIOUS</A></TD><TD ALIGN="RIGHT"><A HREF="./index.php?content=attacklog&start=<? echo $attacktime; ?>">NEXT</A><//TD>
</TD>
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