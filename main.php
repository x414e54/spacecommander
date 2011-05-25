<?
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
/////////
?><br>
<div class="header">Command Center</div><Br>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<?
	$query = "SELECT * FROM users WHERE userid='$userid'";
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

	$debt="";
	$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid' AND startingloan='0'");
	while ($loan = mysql_fetch_array($loans))
	{
		$debt=$debt+$loan['amount'];
	}

	$attacks=$user;
	$units=$user['units'];
	$unitstotal=$units;
	$defenses=$user;
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
<TD><SPAN class="bold">Credits:</span> <? echo number_format($user['credits']); ?></SPAN></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN class="bold">Debt</span> (Without Starting Loan): <? echo number_format($debt); ?></SPAN></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN class="bold">Ore Refinement and Extraction level (ORE Level):</span> <? echo $orelevel; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD WIDTH=50%><SPAN class="bold">Attack technology:</span> <? echo $attackfort; ?></TD></TR>
<TR VALIGN="TOP">
<TD><SPAN class="bold">Defense technology:</span> <? echo $defensefort; ?></TD>
</TR>
<? if ($gotspy=="1") { ?>
<TR VALIGN="TOP">
<TD><SPAN class="bold">Spy level:</span> <? echo $spylevel; ?></TD>
</TR>
<FORM METHOD="POST" ACTION="units.php">
<TR VALIGN="TOP">
<TD><SPAN class="bold">Spies:</span> <? echo $user['spies']; ?></SPAN></TD><TD ALIGN="RIGHT">Buy more spies (20000 credits a spy): <INPUT TYPE="TEXT" NAME="4589999999999778999945"><INPUT TYPE="SUBMIT" VALUE="Buy"></TD>
</TR>
</FORM>
<? } ?>
<? if ($gothack=="1") { ?>
<TR VALIGN="TOP">
<TD><SPAN class="bold">Hack level:</span> <? echo $hacklevel; ?></TD>
</TR>
<FORM METHOD="POST" ACTION="units.php">
<TR VALIGN="TOP">
<TD><SPAN class="bold">Hackers:</span> <? echo $user['hackers']; ?></SPAN></TD><TD ALIGN="RIGHT">Buy more hackers (20000 credits a hacker): <INPUT TYPE="TEXT" NAME="4589999999999778999945111dd23z"><INPUT TYPE="SUBMIT" VALUE="Buy"></TD>
</TR>
</FORM>
<? } ?>
<TR VALIGN="TOP">
<TD><SPAN class="bold">Attack Credits:</span> <? echo $attackcredits; ?></TD></TD>
</TR>
<? if ($isbank!=1) {?>
<TR VALIGN="TOP">
<TD><SPAN class="bold">Clan:</span> <? echo $racename[$race];?></TD><TD ALIGN="RIGHT"></TD>
</TR>
<? } ?>
<TR VALIGN="TOP">
<TD><SPAN class="bold">Effective attack</span>: <? if($gotattack=="1") { echo number_format(round($userdamage * 1.50)); } else { echo number_format($userdamage); } ?></TD><TD ALIGN="LEFT"><span class="bold">Effective defense:</span> <? if ($gotdefense=="1") { echo number_format(round($userdefense*1.50)); } else { echo number_format($userdefense); } ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN class="bold">Effective income</span>: Gross: <DIV class="bold"><? echo number_format(round($credits2-($uniter))); ?></DIV>Net: <? echo number_format($credits2); ?></TD><TD ALIGN="LEFT">Costs: TOTAL: <? echo number_format(round($uniter)); ?> Unit Pay(<? echo $pay; ?>CR Per unit):<? echo number_format($uniter); ?></TD>
</TR>
<? if ($isbank!=1) { ?>
<TR VALIGN="TOP">
<TD colspan='3'><span class="bold">Your Unique Link</span> ( <a href="./help.php#link">[? - What is my link for?]</a> ):<br><br> <? echo "<A HREF=" . "http://commander.anthonybills.com/recruit.php?user=" . $linkid . ">http://commander.anthonybills.com/recruit.php?user=" . $linkid . "</A>" ?></TD>
</TR>
<?
}
if ($debt>0) {
?>
<TR VALIGN="TOP">
<TD></TD><TD ALIGN="LEFT"><SPAN class="bold" STYLE="color:red">WARNING: YOU ARE IN DEBT!!!</SPAN><A HREF="./index.php?content=bank">[Bank]</A></TD>
</TR>
<?
}
if (round($credits2-($uniter+$weapm))<0) {
?>
<TR VALIGN="TOP">
<TD></TD><TD ALIGN="LEFT"><SPAN class="bold">WARNING: YOU ARE LOOSING MONEY - SELL SOME WEAPONS OR GET MORE UNITS</SPAN></TD>
</TR>
<?
}
if ($spied4=="1") {
?>
<TR VALIGN="TOP">
<TD></TD><TD ALIGN="LEFT"><SPAN class="bold">Someone has been spying on you....</SPAN><A HREF="./index.php?content=intelligence">[Intelligence]</A></TD>
</TR>
<?
}
if ($infiltrated4=="1") {
?>
<TR VALIGN="TOP">
<TD></TD><TD ALIGN="LEFT"><SPAN class="bold">YOUR BASE HAS BEEN INFILTRATED!!!!....</SPAN><A HREF="./index.php?content=intelligence">[Intelligence]</A></TD>
</TR>
<?
}
if ($immunityer4=="1") {
?>
<TR VALIGN="TOP">
<TD></TD><TD ALIGN="LEFT">You have been made immune by an Admin.</TD>
</TR>
<?
}
?>
<?
if (!empty($_GET['2343345345555552423444111222333'])) {
?>
<TR VALIGN="TOP">
<TD></TD><TD ALIGN="LEFT"><SPAN class="bold"><? echo $_GET['2343345345555552423444111222333'] ?></TD>
</TR>
<?
}
?>
</TABLE>
<BR>
<BR>
<div class="header">Contact an Admin/Moderator</div><br>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR><TD>ADMINS:</TD></TR>
<?
$admins=mysql_query("SELECT userid, username FROM users WHERE admin='1'");
while ($admin = mysql_fetch_array($admins)) {
$userid2=$admin['userid'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
$online=$online['ip'];
?>
<TR><TD><A HREF="index.php?content=message&userid=<? echo $userid2; ?>">[<? echo $admin['username']; ?>]</A></TD><TD><? if (!empty($online)) { ?><SPAN class="bold">ONLINE</SPAN><? } else { ?>OFFLINE<? } ?></TD></TR>
<?
}
?>
<TR><TD>MODERATORS:</TD><TD></TD></TR>
<?
$admins=mysql_query("SELECT userid, username FROM users WHERE moderator='1'");
while ($admin = mysql_fetch_array($admins)) {
$userid2=$admin['userid'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
$online=$online['ip'];
?>
<TR><TD><A HREF="index.php?content=message&userid=<? echo $userid2; ?>">[<? echo $admin['username']; ?>]</A></TD><TD><? if (!empty($online)) { ?><SPAN class="bold">ONLINE</SPAN><? } else { ?>OFFLINE<? } ?></TD></TR>
<?
}
?>
</TABLE>
<Br>
<?
////////
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
