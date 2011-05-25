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
$moderator=mysql_fetch_array(mysql_query("SELECT moderator FROM users WHERE userid='$userid'"));
$moderator=$moderator['moderator'];
if ($moderator=="1") {
if (!empty($_GET['userid'])) {
$userid2=$_GET['userid'];
$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid2'"));
$admin=$admin['admin'];
$moderator2=mysql_fetch_array(mysql_query("SELECT moderator FROM users WHERE userid='$userid2'"));
$moderator2=$moderator2['moderator'];
if ($admin!="1" & $moderator2!="1") {
$query="SELECT username, userid FROM users WHERE userid='$userid2'";
$username2=mysql_fetch_array(mysql_query($query)) or die("error");
$username2=$username2['username'];
$email=mysql_fetch_array(mysql_query("SELECT email FROM users WHERE userid='$userid2'")) or die("errorer");
$email=$email['email'];
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">ADMIN CENTER: <? echo $username2; ?></TD></TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">EMAIL ADDRESS: <? echo $email; ?></TD>
</TR>
<?
	$query = "SELECT * FROM users WHERE userid='$userid2'";
	$user = mysql_query($query) or die($errdat);
	$user = mysql_fetch_array($user);

	$attacklevel=$user['attacklevel'];
	$attacklevelmoney=40000*pow(2, ($attacklevel-1));
	$orelevel=$user['orelevel'];
	$orelevelmoney=12000*pow(2, ($orelevel-1));
	$defenselevel=$user['defenselevel'];
	$attackcredits=$user['attackcredits'];
	$race=$user['race'];
	$isbank=$user['isbank'];
	$spylevel=$user['spylevel'];
	$hacklevel=$user['hacklevel'];
	$credits=$user['credits'];
	$spies=$user['spies'];
	$gotspy=$user['gotspy'];
	$spylevelmoney=12000*pow(2, ($spylevel-1));
	$immunityer4=$user['immunity'];
	$infiltrated4=$user['infiltrated'];
	$linkid=$user['linkid'];
	$spied4=$user['spied'];
	$defenselevelmoney=40000*pow(2, ($defenselevel-1));
	$gotunitsless=$user['gotunitsless'];
	$gotcheapwm=$user['gotcheapwm'];
	$gotdouble=$user['gotdouble'];
	$gotattack=$user['gotattack'];
	$gothack=$user['gothack'];
	$gotdefense=$user['gotdefense'];
	$gotbank=$user['gotbank'];
	$moderator=$user['moderator'];
	$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
	$online=$online['ip'];
	
	$debt="";
	$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid' AND startingloan='0'");
	while ($loan = mysql_fetch_array($loans))
	{
		$debt=$debt+$loan['amount'];
	}

	$attacks=$user;
	$units=$user['units'];
	$unitstotal=$units;
	$defenses=$attacks;
	$unitstotal2=$units;

	require("./weapons.php");

	$userdamage=round(($attackstotal)*pow(1.25, $attacklevel));
	$userdefense=round(($defensestotal)*pow(1.25, $defenselevel));
	$credits2=round((100*pow(1.25, $orelevel)) * $user['units']);

	if ($gotbank=="1") {
		$credits2=round($credits2 * 1.25);
	}

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


	if ($gotunitsless=="1") {
		$uniter=($user['units']*1*$orelevel);
		$pay=1*$orelevel;
	} else {
		$uniter=($user['units']*10*$orelevel);
		$pay=10*$orelevel;
	}
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Credits: <? echo number_format($credits); ?> CR</TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Debt: <? if (!empty($debt)) { echo number_format($debt);  } else { echo "0"; } ?> CR</TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Units: <? echo $units; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Credit level: <? echo $orelevel; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Attack level: <? echo $attackfort . ", " . $attacklevel; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Defense level: <? echo $defensefort . ", " . $defenselevel; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Spy level: <? echo $spylevel; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Spyies: <? echo $spies; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Attack credits: <? echo $attackcredits; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM" STYLE="font-weight:bold;">Attack:</TD>
<TD><SPAN ID="MEDIUM" STYLE="font-weight:bold;">Defence:</TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Metal Fists: <? echo $attacks['attack1']; ?> Health: <? echo round($attacks['hlattack1']/$attacks['attack1']); ?></TD>
<TD><SPAN ID="MEDIUM">Riot Shield: <? echo $defenses['defense1']; ?> Health: <? echo round($defenses['hldefense1']/$defenses['defense1']); ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser Sabre: <? echo $attacks['attack2']; ?> Health: <? echo round($attacks['hlattack2']/$attacks['attack2']); ?></TD>
<TD><SPAN ID="MEDIUM">Riot Armor:<? echo $defenses['defense2']; ?> Health: <? echo round($defenses['hldefense2']/$defenses['defense2']); ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser: <? echo $attacks['attack3']; ?> Health: <? echo round($attacks['hlattack3']/$attacks['attack3']); ?></TD>
<TD><SPAN ID="MEDIUM">T10k Protective Armor: <? echo $defenses['defense3']; ?> Health: <? echo round($defenses['hldefense3']/$defenses['defense3']); ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">RPG's: <? echo $attacks['attack4']; ?> Health: <? echo round($attacks['hlattack4']/$attacks['attack4']); ?></TD>
<TD><SPAN ID="MEDIUM">T40k Protective Suit: <? echo $defenses['defense4']; ?> Health: <? echo round($defenses['hldefense4']/$defenses['defense4']); ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Rail Gun: <? echo $attacks['attack5']; ?> Health: <? echo round($attacks['hlattack5']/$attacks['attack5']); ?></TD>
<TD><SPAN ID="MEDIUM">Proton Shield: <? echo $defenses['defense5']; ?> Health: <? echo round($defenses['hldefense5']/$defenses['defense5']); ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser Cannon:  <? echo $attacks['attack6']; ?> Health: <? echo round($attacks['hlattack6']/$attacks['attack6']); ?></TD>
<TD><SPAN ID="MEDIUM">Proton Armor:  <? echo $defenses['defense6']; ?> Health: <? echo round($defenses['hldefense6']/$defenses['defense6']); ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Temporal Cannon: <? echo $attacks['attack7']; ?> Health: <? echo round($attacks['hlattack7']/$attacks['attack7']); ?></TD>
<TD><SPAN ID="MEDIUM">Temporal Shield:  <? echo $defenses['defense7']; ?> Health: <? echo round($defenses['hldefense7']/$defenses['defense7']); ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Inter-Dimensional Rift: <? echo $attacks['attack8']; ?> Health: <? echo round($attacks['hlattack8']/$attacks['attack8']); ?></TD>
<TD><SPAN ID="MEDIUM">Inter-Dimensional Portal:  <? echo $defenses['defense8']; ?> Health: <? echo round($defenses['hldefense8']/$defenses['defense8']); ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Effective attack: <? if($gotattack=="1") { echo number_format(round($userdamage * 1.50)); } else { echo number_format($userdamage); } ?></TD>
<TD><SPAN ID="MEDIUM">Effective defense: <? if ($gotdefense=="1") { echo number_format(round($userdefense*1.50)); } else { echo number_format($userdefense); } ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Effective income: Gross: <DIV ID=BOLD><? echo number_format(round($credits2-($uniter))); ?></DIV>Net: <? echo number_format($credits2); ?></TD><TD ALIGN="LEFT"><SPAN ID="MEDIUM">Costs: TOTAL: <? echo number_format(round($uniter)); ?> Unit Pay(<? echo $pay; ?>CR Per unit):<? echo number_format($uniter); ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Average: <? echo $average; ?></TD><TD ALIGN="LEFT"></TD>
</TR> <? if ($isbank!=1 && $admin2!=1) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Unique LINK: <? echo "<A HREF=" . "http://commander.anthonybills.com/recruit.php?user=" . $linkid . ">http://commander.anthonybills.com/recruit.php?user=" . $linkid . "</A>" ?></TD>
</TR><? }?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Clan: <?  if ($race=="0") { echo "Unselected"; } if ($race=="1") { echo "Attackers"; } if ($race=="2") { echo "Defenders"; } if ($race=="3") { echo "Breeders"; } if ($race=="4") { echo "Bankers"; } if ($race=="5") { echo "Coverts"; } ?></TD><TD ALIGN="RIGHT"></TD>
</TR>
<TR VALIGN="TOP">
<TD><? if (!empty($online)) { ?><SPAN ID="BOLD">ONLINE</SPAN><? } else { ?><SPAN ID="MEDIUM">OFFLINE<? } ?></TD>
</TR>
<FORM METHOD="POST" ACTION="index.php?content=admin">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="MODER">
<INPUT TYPE="HIDDEN" NAME="34234234234234444444432" VALUE="<? echo $userid2; ?>">
<TR VALIGN="TOP">
<?
if ($immunity == 1) {
	?><TD ALIGN="LEFT"><SPAN ID="MEDIUM">Immunity: On:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="9231230344324" VALUE="ON" CHECKED>&nbsp;Off:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="9231230344324" VALUE="OFF"></TD><?
} else {
	?><TD ALIGN="LEFT""><SPAN ID="MEDIUM">Immunity: On:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="9231230344324" VALUE="ON">&nbsp;Off:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="9231230344324" VALUE="OFF" CHECKED></TD><?
}
?>
</TR>
<TR VALIGN="TOP">
<?
if ($suspended == 1) {
	?><TD ALIGN="LEFT"><SPAN ID="MEDIUM">Suspended: On:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="923331231230344324" VALUE="ON" CHECKED>&nbsp;Off:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="923331231230344324" VALUE="OFF"></TD><?
} else {
	?><TD ALIGN="LEFT""><SPAN ID="MEDIUM">Suspended: On:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="923331231230344324" VALUE="ON">&nbsp;Off:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="923331231230344324" VALUE="OFF" CHECKED></TD><?
}
?>
</TR>
<? if ($moderator=="1"&&$admin2!="1") {
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">MODERATOR</TD>
</TR>
<? } ?>
<? if ($isbank=="1") {
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">BANK</TD>
</TR>
<? } ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="UPDATE"></TD>
</TR>
</FORM>
<? if($isbank!="1") {?>
<FORM METHOD="POST" ACTION="index.php?content=admin">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="RACE">
<INPUT TYPE="HIDDEN" NAME="34234244444411112334534534555514" VALUE="<? echo $userid2; ?>">
<TR VALIGN="TOP">
<TD><SELECT NAME="12312312312321">
<OPTION VALUE="1">Attackers</OPTION>
<OPTION VALUE="2">Defenders</OPTION>
<OPTION VALUE="3">Breeders</OPTION>
<OPTION VALUE="4">Bankers</OPTION>
<OPTION VALUE="5">Coverts</OPTION>
<OPTION VALUE="0">Unselected</OPTION>
</SELECT>
</TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="CHANGE"></TD>
</TR>
</FORM>
<? } ?>
<?
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
} else {
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">ADMIN CENTER</TD></TR>
<FORM METHOD="POST" ACTION="index.php?content=admin">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="BOOST">
<TD><SPAN ID="MEDIUM">GLOBAL BOOST: <INPUT NAME="23423423ddddfw4cred" VALUE=""></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="BOOST"></TD>
</TR>
</FORM>
<FORM METHOD="POST" ACTION="index.php?content=admin">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="ANNOUNCEMENT">
<TD><SPAN ID="MEDIUM">ANNOUNCEMENT: <INPUT NAME="233453242342444444444411111111134" VALUE="" SIZE="50"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="SEND"></TD>
</TR>
</FORM>
</TABLE>
</TD>
</TR>
</TABLE>
<BR>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">USERS:</TD><TD></TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD>RANK:</TD><TD>Name:</TD><TD ALIGN="RIGHT">UNITS:</TD><TD ALIGN="RIGHT">CREDITS:</TD>
</TR>
<?
$userse=mysql_query("SELECT rank, username, credits, units, userid FROM users ORDER BY rank");
while ($usersde = mysql_fetch_array($userse)) {
$rankno=$usersde['rank'];
$userid2=$usersde['userid'];
$usernamer=$usersde['username'];
$units=$usersde['units'];
$credits=$usersde['credits'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
$online=$online['ip'];
$query=mysql_fetch_array(mysql_query("SELECT admin, isbank, moderator, suspended FROM users WHERE userid='$userid2'"));
$admin=$query['admin'];
$isbank=$query['isbank'];
$moderator=$query['moderator'];
$suspended=$query['suspended'];
?>
<TR VALIGN="TOP" <? if ($admin=="1") { ?>BGCOLOR="GREEN"<? } if ($moderator=="1") { ?>BGCOLOR="BLUE"<? } if ($isbank=="1") { ?>BGCOLOR="PINK"<? } if ($suspended=="1") { ?>BGCOLOR="RED"<? } ?>>
<TD><SPAN ID="MEDIUM"><? if ($admin!="1") { if ($isbank!="1") { if ($suspended!="1") { echo number_format($rankno); } else { echo "Suspended"; } } else { echo "BANK"; }} ?></TD><TD><? if (!empty($online)) { ?><SPAN ID="BOLD"><? } if ($admin!="1" & $moderator!="1" & $isbank!="1") { ?><A HREF="./index.php?content=moderator&userid=<? echo $userid2;?>">[<? echo $usernamer; ?>]</A><? } else {  echo $usernamer; } ?></TD><TD ALIGN="RIGHT"><? if ($admin!="1") { echo number_format($units); } ?></TD><TD ALIGN="RIGHT"><? if ($admin!="1") { echo number_format($credits); } ?></TD>
</TR>
<? } ?>
</TABLE>
</TD>
</TR>
</TABLE>
<?
}
}
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