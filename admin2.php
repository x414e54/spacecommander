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
$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
$admin=$admin['admin'];
if ($admin=="1") {
if (!empty($_GET['userid'])) {
$userid2=$_GET['userid'];
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
$attacklevel=mysql_fetch_array(mysql_query("SELECT attacklevel FROM users WHERE userid='$userid2'")) or die("error2");
$attacklevel=$attacklevel['attacklevel'];
$defenselevel=mysql_fetch_array(mysql_query("SELECT defenselevel FROM users WHERE userid='$userid2'")) or die("error3");
$defenselevel=$defenselevel['defenselevel'];
$attackcredits=mysql_fetch_array(mysql_query("SELECT attackcredits FROM users WHERE userid='$userid2'")) or die("error4");
$attackcredits=$attackcredits['attackcredits'];
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
$spylevelmoney=12000*pow(2, ($spylevel-1));
$linkid=mysql_fetch_array(mysql_query("SELECT linkid FROM users WHERE userid='$userid2'")) or die("error13");
$linkid=$linkid['linkid'];
$defenselevelmoney=40000*pow(2, ($defenselevel-1));
$gotunitsless=mysql_fetch_array(mysql_query("SELECT gotunitsless FROM users WHERE userid='$userid2'")) or die("error14");
$gotunitsless=$gotunitsless['gotunitsless'];
$gotcheapwm=mysql_fetch_array(mysql_query("SELECT gotcheapwm FROM users WHERE userid='$userid2'")) or die("error15");
$gotcheapwm=$gotcheapwm['gotcheapwm'];
$gotdouble=mysql_fetch_array(mysql_query("SELECT gotdouble FROM users WHERE userid='$userid2'")) or die("error16");
$gotdouble=$gotdouble['gotdouble'];
$gotattack=mysql_fetch_array(mysql_query("SELECT gotattack FROM users WHERE userid='$userid2'")) or die("error17");
$gotattack=$gotattack['gotattack'];
$gotdefense=mysql_fetch_array(mysql_query("SELECT gotdefense FROM users WHERE userid='$userid2'")) or die("error18");
$gotdefense=$gotdefense['gotdefense'];
$gotbank=mysql_fetch_array(mysql_query("SELECT gotbank FROM users WHERE userid='$userid2'")) or die("error19");
$gotbank=$gotbank['gotbank'];
$gothack=mysql_fetch_array(mysql_query("SELECT gothack FROM users WHERE userid='$userid2'")) or die("error20");
$gothack=$gothack['gotbank'];

$attackstotal="1";
$attacks=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid2'"));
			$unitstotal=$units2;
			$aer1=$attacks['hlattack1']/$attacks['attack1']/100;
			$aer2=$attacks['hlattack2']/$attacks['attack2']/100;
			$aer3=$attacks['hlattack3']/$attacks['attack3']/100;
			$aer4=$attacks['hlattack4']/$attacks['attack4']/100;
			$aer5=$attacks['hlattack5']/$attacks['attack5']/100;
			$aer6=$attacks['hlattack6']/$attacks['attack6']/100;
			$aer7=$attacks['hlattack7']/$attacks['attack7']/100;
			$aer8=$attacks['hlattack8']/$attacks['attack8']/100;

			if (($unitstotal-$attacks['attack8']) < 0) {
				$unitstotal8=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal8=5*$attacks['attack8'];
				$unitstotal=$unitstotal-$attacks['attack8'];
			}
			if (($unitstotal-$attacks['attack7'])<0) {
				$unitstotal7=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal7=5*$attacks['attack7'];
				$unitstotal=$unitstotal-$attacks['attack7'];
			}
			if (($unitstotal-$attacks['attack6'])<0) {
				$unitstotal6=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal6=5*$attacks['attack6'];
				$unitstotal=$unitstotal-$attacks['attack6'];
			}
			if (($unitstotal-$attacks['attack5'])<0) {
				$unitstotal5=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal5=5*$attacks['attack5'];
				$unitstotal=$unitstotal-$attacks['attack5'];
			}
			if (($unitstotal-$attacks['attack4'])<0) {
				$unitstotal4=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal4=5*$attacks['attack4'];
				$unitstotal=$unitstotal-$attacks['attack4'];
			}
			if (($unitstotal-$attacks['attack3'])<0) {
				$unitstotal3=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal3=5*$attacks['attack3'];
				$unitstotal=$unitstotal-$attacks['attack3'];
			}
			if (($unitstotal-$attacks['attack2'])<0) {
				$unitstotal2=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal2=5*$attacks['attack2'];
				$unitstotal=$unitstotal-$attacks['attack2'];
			}
			if (($unitstotal-$attacks['attack1'])<0) {
				$unitstotal1=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal1=5*$attacks['attack1'];
				$unitstotal=$unitstotal-$attacks['attack1'];
			}
			$attackstotal=$attackstotal+(10240*$unitstotal8*$aer8);
			$attackstotal=$attackstotal+(2560*$unitstotal7*$aer7);
			$attackstotal=$attackstotal+(640*$unitstotal6*$aer6);
			$attackstotal=$attackstotal+(160*$unitstotal5*$aer5);
			$attackstotal=$attackstotal+(40*$unitstotal4*$aer4);
			$attackstotal=$attackstotal+(20*$unitstotal3*$aer3);
			$attackstotal=$attackstotal+(10*$unitstotal2*$aer2);
			$attackstotal=$attackstotal+(5*$unitstotal1*$aer1);
			$attackstotal=$attackstotal+$unitstotal;
			$defenses=$attacks;
			$defensestotal="1";

			$der1=$defenses['hldefense1']/$defenses['defense1']/100;
			$der2=$defenses['hldefense2']/$defenses['defense2']/100;
			$der3=$defenses['hldefense3']/$defenses['defense3']/100;
			$der4=$defenses['hldefense4']/$defenses['defense4']/100;
			$der5=$defenses['hldefense5']/$defenses['defense5']/100;
			$der6=$defenses['hldefense6']/$defenses['defense6']/100;
			$der7=$defenses['hldefense7']/$defenses['defense7']/100;
			$der8=$defenses['hldefense8']/$defenses['defense8']/100;

			$unitstotal2=$units2;
			if (($unitstotal2-$defenses['defense8'])<0) {
				$unitstotal28=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal28=5*$defenses['defense8'];
				$unitstotal2=$unitstotal2-$defenses['defense8'];
			}
			if (($unitstotal2-$defenses['defense7'])<0) {
				$unitstotal27=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal27=5*$defenses['defense7'];
				$unitstotal2=$unitstotal2-$defenses['defense7'];
			}
			if (($unitstotal2-$defenses['defense6'])<0) {
				$unitstotal26=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal26=5*$defenses['defense6'];
				$unitstotal2=$unitstotal2-$defenses['defense6'];
			}
			if (($unitstotal2-$defenses['defense5'])<0) {
				$unitstotal25=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal25=5*$defenses['defense5'];
				$unitstotal2=$unitstotal2-$defenses['defense5'];
			}
			if (($unitstotal2-$defenses['defense4'])<0) {
				$unitstotal24=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal24=5*$defenses['defense4'];
				$unitstotal2=$unitstotal2-$defenses['defense4'];
			}
			if (($unitstotal2-$defenses['defense3'])<0) {
				$unitstotal23=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal23=5*$defenses['defense3'];
				$unitstotal2=$unitstotal2-$defenses['defense3'];
			}
			if (($unitstotal2-$defenses['defense2'])<0) {
				$unitstotal22=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal22=5*$defenses['defense2'];
				$unitstotal2=$unitstotal2-$defenses['defense2'];
			}
			if (($unitstotal2-$defenses['defense1'])<0) {
				$unitstotal21=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal21=5*$defenses['defense1'];
				$unitstotal2=$unitstotal2-$defenses['defense1'];
			}
			$defensestotal=$defensestotal+(10240*$unitstotal28*$der8);
			$defensestotal=$defensestotal+(2560*$unitstotal27*$der7);
			$defensestotal=$defensestotal+(640*$unitstotal26*$der6);
			$defensestotal=$defensestotal+(160*$unitstotal25*$der5);
			$defensestotal=$defensestotal+(40*$unitstotal24*$der4);
			$defensestotal=$defensestotal+(20*$unitstotal23*$der3);
			$defensestotal=$defensestotal+(10*$unitstotal22*$der2);
			$defensestotal=$defensestotal+(5*$unitstotal21*$der1);
			$defensestotal=$defensestotal+$unitstotal2;
			$userdamage=round(($attackstotal)*pow(1.25, $attacklevel));
			$userdefense=round(($defensestotal)*pow(1.25, $defenselevel));

$average=mysql_fetch_array(mysql_query("SELECT average FROM users WHERE userid='$userid2'"));
$average=$average['average'];
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

if ($gotunitsless=="1") {
$uniter=($units2*1*$orelevel);
$pay=1*$orelevel;
} else {
$uniter=($units2*10*$orelevel);
$pay=10*$orelevel;
}

$debt="";
$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid2'");
	while ($loan = mysql_fetch_array($loans)) {
	$debt=$debt+$loan['amount'];
}
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Credits: <? echo number_format($user2['credits']); ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Debt: <? if (!empty($debt)) { echo number_format($debt);  } else { echo "0"; } ?> CR</TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Units: <? echo $units2; ?></TD>
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
<TD><SPAN ID="MEDIUM">Spyies: <? echo $user2['spies']; ?></TD>
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
<TD><SPAN ID="MEDIUM">Clan: <?  if ($race=="0") { echo "Unselected"; } if ($race=="1") { echo "Attackers"; } if ($race=="2") { echo "Defenders"; } if ($race=="3") { echo "Breeders"; } if ($race=="4") { echo "Bankers"; } if ($race=="5") { echo "Coverts"; } if ($race=="-1") { echo "No Race - Bank"; }?></TD><TD ALIGN="RIGHT"></TD>
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
<? if ($admin2=="1") {
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">ADMINISTRATOR</TD>
</TR>
<? } ?>
<? if ($moderator=="1") {
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
<TD><SPAN ID="MEDIUM">ANNOUNCEMENT: <INPUT NAME="233453242342444444444411111111134" VALUE="" SIZE="100"></TD>
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
<TR ID="TABLEHEAD"><TD COLSPA3N="2">USERS:</TD><TD></TD><TD></TD><TD></TD></TR>
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
<TD><SPAN ID="MEDIUM"><? if ($admin!="1") { if ($isbank!="1") { if ($suspended!="1") { echo number_format($rankno); } else { echo "Suspended"; } } else { echo "BANK"; }} ?></TD><TD><? if (!empty($online)) { ?><SPAN ID="BOLD"><? } ?><A HREF="./index.php?content=admin2&userid=<? echo $userid2;?>">[<? echo $usernamer; ?>]</A></TD><TD ALIGN="RIGHT"><? if ($admin!="1") { echo number_format($units); } ?></TD><TD ALIGN="RIGHT"><? if ($admin!="1") { echo number_format($credits); } ?></TD>
</TR>
<? } ?>
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