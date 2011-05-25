<?php
require('./global.php');

session_start();
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
	} else
	{
		$query="SELECT suspended FROM users WHERE userid='$userid'";
		$sus=mysql_fetch_array(mysql_query($query));
		$sus=$sus['suspended'];
			
		if ($sus=="1")
		{
			session_destroy();
			$response="Your account has been suspended and is pending investigation... you are immune.";
		} else
		{
////
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">RESEARCH</TD></TR>
<?

	$query = "SELECT * FROM users WHERE userid='$userid'";
	$user = mysql_query($query) or die($errdat);
	$user = mysql_fetch_array($user);

	$attacklevel=$user['attacklevel'];
	$attacklevelmoney=40000*pow(2, ($attacklevel-1));
	$orelevel=$user['orelevel'];
	$orelevelmoney=12000*pow(2, ($orelevel-1));
	$defenselevel=$user['defenselevel'];
	$gotclone=$user['gotclone'];
	$gotspy=$user['gotspy'];
	$gotattack=$user['gotattack'];
	$gotbank=$user['gotbank'];
	$gothack=$user['gothack'];
	$gotdefense=$user['gotdefense'];
	$gotcheapw=$user['gotcheapw'];
	$gotcheapwm=$user['gotcheapwm'];
	$gotunits=$user['gotunits'];
	$gotunitsless=$user['gotunitsless'];
	$gotdouble=$user['gotdouble'];
	$spylevel=$user['spylevel'];
	$hacklevel=$user['hacklevel'];
	$spylevelmoney=12000*pow(2, ($spylevel-1));
	$hacklevelmoney=12000*pow(2, ($hacklevel-1));
	$defenselevelmoney=40000*pow(2, ($defenselevel-1));

	require("./mastervalues.php");
	
	// Get the name of their attack technology from Master Values
	// If it is not listed it will default to the Infinite Value plus the number.

	$attackfort=$attacktec[$attacklevel];
	if ($attackfort==null) {
		$attackfort=$attacktech[0] . $attacklevel;
	}

	$defensefort=$deftec[$defenselevel];
	if ($defensefort==null) {
		$defensefort=$deftech[0] . $defenselevel;
	}
c
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><B>GENERAL RESEARCH</B></TD>
</TR>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Ore Refinement and Extraction level (ORE Level): <? echo $orelevel; ?></TD><TD ALIGN="RIGHT"><? if ($orelevel < 12) { ?>Upgrade ORE level: <INPUT TYPE="SUBMIT" NAME="342234234234" VALUE="<? echo number_format($orelevelmoney); ?> CR"><? } ?></TD>
</TR>
</FORM>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Attack technology: <? echo $attackfort; ?></TD><TD ALIGN="RIGHT"><? if ($attacklevel < 12) { ?>Upgrade attack level: <INPUT TYPE="SUBMIT" NAME="3345345345234" VALUE="<? echo number_format($attacklevelmoney); ?> CR"><? } ?></TD>
</TR>
</FORM>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Defense technology: <? echo $defensefort; ?></TD><TD ALIGN="RIGHT"><? if ($defenselevel < 12) { ?>Upgrade defense level: <INPUT TYPE="SUBMIT" NAME="3345345345324234234234" VALUE="<? echo number_format($defenselevelmoney); ?> CR"><? } ?></TD>
</TR>
</FORM>
<? if ($gotspy=="1") { ?>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Spy level: <? echo $spylevel; ?></TD><TD ALIGN="RIGHT">Upgrade spy level: <INPUT TYPE="SUBMIT" NAME="334534534532425666342342348880" VALUE="<? echo number_format($spylevelmoney); ?> CR"></TD>
</TR>
</FORM>
<? } ?>
<? if ($gothack=="1") { ?>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Hacking technology: <? echo $hacklevel; ?></TD><TD ALIGN="RIGHT">Upgrade hack technology: <INPUT TYPE="SUBMIT" NAME="334534534532425666342342348880230923902ddad3" VALUE="<? echo number_format($hacklevelmoney); ?> CR"></TD>
</TR>
</FORM>
<? } ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><B>EXTRA RESEARCH</B></TD>
</TR>
<? if ($gotclone!="1") { ?>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Buy Clone Machine</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="extra342234234234" VALUE="<? echo number_format(6000000); ?> CR"></TD>
</TR>
</FORM>
<? } if ($gotspy!="1") { ?>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Buy Covert Centre</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="extra3345345345234" VALUE="<? echo number_format(6000000); ?> CR"></TD>
</TR>
</FORM>
<? } if ($gotattack!="1") { ?>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Buy 50% Attack Bonus</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="extra3345345345324234234234" VALUE="<? echo number_format(6000000); ?> CR"></TD>
</TR>
</FORM>
<? } if ($gotdefense!="1") { ?>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Buy 50% Defense Bonus</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="extra334534534532425666342342348880" VALUE="<? echo number_format(6000000); ?> CR"></TD>
</TR>
</FORM>
<? } if ($gotbank!="1") { ?>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Buy 25% Money Bonus</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="extra334534534532425666342342348222222222222880" VALUE="<? echo number_format(6000000); ?> CR"></TD>
</TR>
</FORM>
<? } if ($gothack!="1") { ?>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Buy Hacking Centre</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="extra3345345345444423482222ccdd22222222880" VALUE="<? echo number_format(6000000); ?> CR"></TD>
</TR>
</FORM>
<? } ?>
<? if ($gotunits!="1" & $gotunitsless!="1" & $gotcheapw!="1" & $gotcheapwm!="1" & gotdouble!="1") { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><B>ONE TIME BONUS</B></TD>
</TR>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Cheaper Weapons</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="once342234234234" VALUE="<? echo number_format(300000); ?> CR"></TD>
</TR>
</FORM>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Units work for less</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="once3345345345234" VALUE="<? echo number_format(300000); ?> CR"></TD>
</TR>
</FORM>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Double attack credits</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="once3345345345324234234234" VALUE="<? echo number_format(300000); ?> CR"></TD>
</TR>
</FORM>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Buy 100 Units</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="once334534534532425666342342348880" VALUE="<? echo number_format(300000); ?> CR"></TD>
</TR>
</FORM>
<FORM METHOD="POST" ACTION="research.php">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Less Weapon Maintanance</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="once334534534532425666342342348222222222222880" VALUE="<? echo number_format(300000); ?> CR"></TD>
</TR>
</FORM>
<? } ?>
</TABLE>
</TD>
</TR>
</TABLE>
<BR>
<BR>
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
