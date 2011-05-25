<?php
require("./global.php");
if (empty($_SESSION['username'])) {
header("Location: index.php"); 
} else {
$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_fetch_array(mysql_query($query)) or die(nouser());
$userid=$userid['userid'];
$password=mysql_fetch_array(mysql_query("SELECT password FROM users WHERE userid='$userid'"));
$password=$password['password'];
}
if ($_SESSION["password"]==$password) {
$isbank=mysql_fetch_array(mysql_query("SELECT isbank FROM users WHERE userid='$userid'"));
$isbank=$isbank['isbank'];
if ($isbank=="1") {
if (!empty($_GET['userid'])) {
$userid2=$_GET['userid'];
$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid2'"));
$admin=$admin['admin'];
$moderator2=mysql_fetch_array(mysql_query("SELECT moderator FROM users WHERE userid='$userid2'"));
$moderator2=$moderator2['moderator'];
if ($admin!="1") {
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
$user2 = mysql_query($query) or die($errdat);
$user2 = mysql_fetch_array($user2);
$units2=$user2['units'];
$orelevel=mysql_fetch_array(mysql_query("SELECT orelevel FROM users WHERE userid='$userid2'")) or die("error1");
$orelevel=$orelevel['orelevel'];
$race=mysql_fetch_array(mysql_query("SELECT race FROM users WHERE userid='$userid2'")) or die("error5");
$race=$race['race'];
$immunity=mysql_fetch_array(mysql_query("SELECT immunity FROM users WHERE userid='$userid2'")) or die("error6");
$immunity=$immunity['immunity'];
$moderator=mysql_fetch_array(mysql_query("SELECT moderator FROM users WHERE userid='$userid2'")) or die("error7");
$moderator=$moderator['moderator'];
$admin2=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid2'")) or die("error8");
$admin2=$admin2['admin'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
$online=$online['ip'];
$isbank=mysql_fetch_array(mysql_query("SELECT isbank FROM users WHERE userid='$userid2'")) or die("error10");
$isbank=$isbank['isbank'];
$spylevel=mysql_fetch_array(mysql_query("SELECT spylevel FROM users WHERE userid='$userid2'")) or die("error11");
$spylevel=$spylevel['spylevel'];
$gotspy=mysql_fetch_array(mysql_query("SELECT gotspy FROM users WHERE userid='$userid2'")) or die("error12");
$gotspy=$gotspy['gotspy'];
$attacklevel=mysql_fetch_array(mysql_query("SELECT attacklevel FROM users WHERE userid='$userid2'")) or die("error12");
$attacklevel=$attacklevel['attacklevel'];
$defenselevel=mysql_fetch_array(mysql_query("SELECT defenselevel FROM users WHERE userid='$userid2'")) or die("error12");
$defenselevel=$defenselevel['defenselevel'];
$spylevelmoney=12000*pow(2, ($spylevel-1));
$defenselevelmoney=40000*pow(2, ($defenselevel-1));
$gotunitsless=mysql_fetch_array(mysql_query("SELECT gotunitsless FROM users WHERE userid='$userid2'")) or die("error14");
$gotunitsless=$gotunitsless['gotunitsless'];
$gotcheapwm=mysql_fetch_array(mysql_query("SELECT gotcheapwm FROM users WHERE userid='$userid2'")) or die("error15");
$gotcheapwm=$gotcheapwm['gotcheapwm'];
$gotbank=mysql_fetch_array(mysql_query("SELECT gotbank FROM users WHERE userid='$userid2'")) or die("error19");
$gotbank=$gotbank['gotbank'];

$attackstotal="1";
$attacks=mysql_fetch_array(mysql_query("SELECT attack1, attack2, attack3, attack4, attack5, attack6, attack7 FROM users WHERE userid='$userid2'")) or die ("error20");
			$unitstotal=$units2;
			$acosts=0;
			$acosts=$acosts+(2560*$attacks['attack7']);
			$acosts=$acosts+(640*$attacks['attack6']);
			$acosts=$acosts+(160*$attacks['attack5']);
			$acosts=$acosts+(40*$attacks['attack4']);
			$acosts=$acosts+(20*$attacks['attack3']);
			$acosts=$acosts+(10*$attacks['attack2']);
			$acosts=$acosts+(5*$attacks['attack1']);
			$defenses=mysql_fetch_array(mysql_query("SELECT defense1, defense2, defense3, defense4, defense5, defense6, defense7 FROM users WHERE userid='$userid2'"));
			$dcosts=0;
			$dcosts=$dcosts+(2560*$defenses['defense7']);
			$dcosts=$dcosts+(640*$defenses['defense6']);
			$dcosts=$dcosts+(160*$defenses['defense5']);
			$dcosts=$dcosts+(40*$defenses['defense4']);
			$dcosts=$dcosts+(20*$defenses['defense3']);
			$dcosts=$dcosts+(10*$defenses['defense2']);
			$dcosts=$dcosts+(5*$defenses['defense1']);
$orelevel=mysql_fetch_array(mysql_query("SELECT orelevel FROM users WHERE userid='$userid2'"));
$orelevel=$orelevel['orelevel'];
$suspended=mysql_fetch_array(mysql_query("SELECT suspended FROM users WHERE userid='$userid2'"));
$suspended=$suspended['suspended'];
$credits2=round((100*pow(1.25, $orelevel)) * $units2);
if ($gotbank=="1") {
$credits2=round($credits2 * 1.25);
}
if ($attacklevel=="1") {
$attackfort="None";
}
if ($attacklevel=="2") {
$attackfort="Dune Buggies";
}
if ($attacklevel=="3") {
$attackfort="Armored Exoskeletos";
}
if ($attacklevel=="4") {
$attackfort="APCs";
}
if ($attacklevel=="5") {
$attackfort="Laser Tanks";
}
if ($attacklevel=="6") {
$attackfort="Mammoth Tanks";
}
if ($attacklevel=="7") {
$attackfort="Temporal Tanks";
}
if ($attacklevel=="8") {
$attackfort="Ion Cannon";
}
if ($attacklevel=="9") {
$attackfort="Nuclear Bomb";
}
if ($attacklevel=="10") {
$attackfort="Quantum Bomb";
}
if ($attacklevel=="11") {
$attackfort="Temporal Storm";
}
if ($attacklevel=="12") {
$attackfort="POWER OF GOD";
}
if ($attacklevel>"12") {
$atta=$attacklevel;
$attackfort="ULTIMATE POWER X " . $atta;
}
if ($defenselevel=="1") {
$defensefort="Tents";
}
if ($defenselevel=="2") {
$defensefort="Lasers";
}
if ($defenselevel=="3") {
$defensefort="Armored Barracks";
}
if ($defenselevel=="4") {
$defensefort="Command Centre";
}
if ($defenselevel=="5") {
$defensefort="Nuclear Bunker";
}
if ($defenselevel=="6") {
$defensefort="Underground Caverns";
}
if ($defenselevel=="7") {
$defensefort="Temporal Fence";
}
if ($defenselevel=="8") {
$defensefort="Temporal Cannons";
}
if ($defenselevel=="9") {
$defensefort="Space Station";
}
if ($defenselevel=="10") {
$defensefort="Planet";
}
if ($defenselevel=="11") {
$defensefort="Temporal Domain";
}
if ($defenselevel=="12") {
$defensefort="POWER OF GOD";
}
if ($defenselevel>"12") {
$der=$defenselevel;
$defensefort="ULTIMATE POWER X " . $der;
}
$suicide=1000+$user['suicidepoints'];
if ($gotunitsless=="1") {
$uniter=($units2*1*$orelevel);
$pay=1*$orelevel;
} else {
$uniter=($units2*10*$orelevel);
$pay=10*$orelevel;
}
if ($gotcheapwm=="1") {
$weapm=(($acosts/2)*$attacklevel)+(($dcosts/2)*$defenselevel);
} else {
$weapm=($acosts*$attacklevel)+($dcosts*$defenselevel);
}
$debt="";
$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid2'");
	while ($loan = mysql_fetch_array($loans)) {
	$debt=$debt+$loan['amount'];
}
$debt2="";
$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid2' AND issuer='$userid'");
	while ($loan = mysql_fetch_array($loans)) {
	$debt2=$debt2+$loan['amount'];
}
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Credits: <? echo number_format($user2['credits']); ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Total Debt: <? if (!empty($debt)) { echo number_format($debt);  } else { echo "n/a"; } ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Debt from you: <? if (!empty($debt2)) { echo number_format($debt2);  } else { echo "n/a"; } ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Max debt: <? echo number_format($user2['maxborrow']); ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Units: <? echo $units2; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Credit level: <? echo $orelevel; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Attack level: <? echo $attackfort; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Defense level: <? echo $defensefort; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Spy level: <? echo $spylevel; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Spyies: <? echo $user2['spies']; ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Effective income: Gross: <DIV ID=BOLD><? echo number_format(round($credits2-($uniter+$weapm))); ?></DIV>Net: <? echo number_format($credits2); ?></TD><TD ALIGN="LEFT"><SPAN ID="MEDIUM">Costs: TOTAL: <? echo number_format(round($uniter+$weapm)); ?> Unit Pay(<? echo $pay; ?>CR Per unit):<? echo number_format($uniter); ?>, Armory Upkeep Costs: <? echo number_format($weapm) ; ?></TD>
</TR>

<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Average: <? echo $average; ?></TD><TD ALIGN="LEFT"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Clan: <?  if ($race=="0") { echo "Unselected"; } if ($race=="1") { echo "Attackers"; } if ($race=="2") { echo "Defenders"; } if ($race=="3") { echo "Breeders"; } if ($race=="4") { echo "Bankers"; } if ($race=="5") { echo "Coverts"; } ?></TD><TD ALIGN="RIGHT"></TD>
</TR>
<TR VALIGN="TOP">
<TD><? if (!empty($online)) { ?><SPAN ID="BOLD">ONLINE</SPAN><? } else { ?><SPAN ID="MEDIUM">OFFLINE<? } ?></TD>
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
<?
if ($userid != $userid2) {
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><A HREF="./index.php?content=message&userid=<? echo $userid2; ?>">[Send message]</A></TD>
</TR>
<? } ?>
<TR VALIGN="TOP" colspan='2'><TD colspan='2'>
<TABLE WIDTH="100%" STYLE="font-size: 10pt;">
<TR><TD><B>LOANS:</B></TD></TR>
<TR><TD>USER:</TD><TD>AMOUNT (click for statement):</TD><TD>TERM:</TD><TD>CONTEXT: </TD><TD>DATE ISSUED:</TD></TR>
<?
$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid2' AND issuer='$userid'");
while ($loan = mysql_fetch_array($loans)) {
$userid3=$loan['issuer'];
$loanid=$loan['loanid'];
$amount=$loan['amount'];
$context=$loan['context'];
$date=$loan['date'];
$payback=$loan['payback'];
$term=$loan['term'];
$interest=$loan['interest'];
$issuername=mysql_fetch_array(mysql_query("SELECT username FROM users WHERE userid='$userid2'"));
$issuername=$issuername['username'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
$online=$online['ip'];
if ($amount==0) {
$completed=1;
} else {
$completed=0;
}
?>
<FORM METHOD="POST" ACTION="index.php?content=bank">
<INPUT TYPE="hidden" NAME="asdijaisodjoaiewjda" VALUE="<? echo $loanid; ?>">
<TR><TD><? if (!empty($online)) { ?><SPAN ID="BOLD"><? }?><A HREF="index.php?content=message&userid=<? echo $userid2; ?>">[<? echo $issuername; ?>]</A></TD><TD><A HREF="index.php?content=bankloanlog&loanid=<? echo $loanid; ?>">[<? if ($completed!=1) {echo number_format($amount); ?> <? if ($interest=="0") { echo "IF"; } else { echo "at ".$interest."% DPR"; } } else { echo "Completed"; }?>]</A></TD><TD><? if ($completed!=1) { if ($term>0) { echo $term;  ?> TURNS - <? echo $term-$payback;?> LEFT <? } else { echo "INFINITE"; } } else { echo "completed"; }?></TD><TD><?echo $context; ?></TD><TD><?echo $date;?></TD></TR>
</FORM>
<?
}
?>
</TABLE>
</TD></TR>
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
<TR ID="TABLEHEAD"><TD COLSPAN="2">BANK ACCOUNTS</TD></TR>
</TABLE>
</TD>
</TR>
</TABLE>
<BR>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPA3N="2">USERS:</TD><TD></TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD>DEBT TO YOU:</TD><TD>Name:</TD><TD ALIGN="RIGHT">UNITS:</TD><TD ALIGN="RIGHT">CREDITS:</TD>
</TR>
<?
$userse=mysql_query("SELECT userid FROM users");
while ($usersde = mysql_fetch_array($userse)) {
	$userid2=$usersde['userid'];
	$debt="";
	$loans2=mysql_query("SELECT * FROM loans WHERE userid='$userid2' AND issuer='$userid'");
		while ($loan2 = mysql_fetch_array($loans2)) {
		$debt=$debt+$loan2['amount'];
	}
	$query=mysql_query("UPDATE users SET debt='$debt' WHERE userid='$userid2'");
}


$userse=mysql_query("SELECT rank, username, credits, units, userid FROM users ORDER BY debt DESC");
while ($usersde = mysql_fetch_array($userse)) {
$rankno=$usersde['rank'];
$userid2=$usersde['userid'];
$loan=mysql_fetch_array(mysql_query("SELECT * FROM loans WHERE userid='$userid2'"));
$loan=$loan['loanid'];
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
	$debt="";
	$loans2=mysql_query("SELECT * FROM loans WHERE userid='$userid2' AND issuer='$userid'");
		while ($loan2 = mysql_fetch_array($loans2)) {
		$debt=$debt+$loan2['amount'];
	}
if (!empty($loan)) {
?>
<TR VALIGN="TOP" <? if ($admin=="1") { ?>BGCOLOR="GREEN"<? } if ($moderator=="1") { ?>BGCOLOR="BLUE"<? } if ($isbank=="1") { ?>BGCOLOR="PINK"<? } if ($suspended=="1") { ?>BGCOLOR="RED"<? } ?>>
<TD><SPAN ID="MEDIUM"><? if ($admin!="1") { if ($isbank!="1") { if ($suspended!="1") { echo number_format($debt); } else { echo "Suspended"; } } else { echo "BANK"; }} ?></TD><TD><? if (!empty($online)) { ?><SPAN ID="BOLD"><? } if ($admin!="1") { ?><A HREF="./index.php?content=isbank&userid=<? echo $userid2;?>">[<? echo $usernamer; ?>]</A><? } else {  echo $usernamer; } ?></TD><TD ALIGN="RIGHT"><? if ($admin!="1") { echo number_format($units); } ?></TD><TD ALIGN="RIGHT"><? if ($admin!="1") { echo number_format($credits); } ?></TD>
</TR>
<? }} ?>
</TABLE>
</TD>
</TR>
</TABLE>
<?
}
}
} else {
session_destroy();
header("Location: index.php"); 
} 
