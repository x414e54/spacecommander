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
			$tester=mysql_fetch_array(mysql_query("SELECT gotcheapwm FROM users WHERE userid='$userid'"));
			$gotcheapwm=$tester['gotcheapwm'];
			if ($gotcheapwm == "1") {
			$a1000=500;
			$a1800=900;
			$a3200=1600;
			$a5100=2550;
			$a16400=8200;
			$a52400=26200;
			$a167800=83900;
			$a471600=235800;
			} else {
			$a1000=1000;
			$a1800=1800;
			$a3200=3200;
			$a5100=5100;
			$a16400=16400;
			$a52400=52400;
			$a167800=167800;
			$a471600=471600;
			}	
			$tester=mysql_fetch_array(mysql_query("SELECT gotcheapw FROM users WHERE userid='$userid'"));
			$gotcheapw=$tester['gotcheapw'];
			if ($gotcheapw == "1") {
			$as1000=500;
			$as1800=900;
			$as3200=1600;
			$as5100=2550;
			$as16400=8200;
			$as52400=26200;
			$as167800=83900;
			$as471600=235800;
			} else {
			$as1000=1000;
			$as1800=1800;
			$as3200=3200;
			$as5100=5100;
			$as16400=16400;
			$as52400=52400;
			$as167800=167800;
			$as471600=471600;
			}	
$query="SELECT * FROM users WHERE userid='$userid'";
$attacks=mysql_query($query);
$attacks=mysql_fetch_array($attacks);

$attacks1=$attacks['attack1'];
$hlattacks1=$attacks['hlattack1'];
$costrep1=round($a1000*(((100*$attacks1)-($hlattacks1))/100));
$hlattacks1=$hlattacks1/$attacks1;
$costsell1=round(($as1000*75)*($hlattacks1/100)/100);

$attacks2=$attacks['attack2'];
$hlattacks2=$attacks['hlattack2'];
$costrep2=round($a1800*(((100*$attacks2)-($hlattacks2))/100));
$hlattacks2=$hlattacks2/$attacks2;
$costsell2=round(($as1800*75)*($hlattacks2/100)/100);

$attacks3=$attacks['attack3'];
$hlattacks3=$attacks['hlattack3'];
$costrep3=round($a3200*(((100*$attacks3)-($hlattacks3))/100));
$hlattacks3=$hlattacks3/$attacks3;
$costsell3=round(($as3200*75)*($hlattacks3/100)/100);

$attacks4=$attacks['attack4'];
$hlattacks4=$attacks['hlattack4'];
$costrep4=round($a5100*(((100*$attacks4)-($hlattacks4))/100));
$hlattacks4=$hlattacks4/$attacks4;
$costsell4=round(($as5100*75)*($hlattacks4/100)/100);

$attacks5=$attacks['attack5'];
$hlattacks5=$attacks['hlattack5'];
$costrep5=round($a16400*(((100*$attacks5)-($hlattacks5))/100));
$hlattacks5=$hlattacks5/$attacks5;
$costsell5=round(($as16400*75)*($hlattacks5/100)/100);

$attacks6=$attacks['attack6'];
$hlattacks6=$attacks['hlattack6'];
$costrep6=round($a52400*(((100*$attacks6)-($hlattacks6))/100));
$hlattacks6=$hlattacks6/$attacks6;
$costsell6=round(($as52400*75)*($hlattacks6/100)/100);

$attacks7=$attacks['attack7'];
$hlattacks7=$attacks['hlattack7'];
$costrep7=round($a167800*(((100*$attacks7)-($hlattacks7))/100));
$hlattacks7=$hlattacks7/$attacks7;
$costsell7=round(($as167800*75)*($hlattacks7/100)/100);

$attacks8=$attacks['attack8'];
$hlattacks8=$attacks['hlattack8'];
$costrep8=round($a471600*(((100*$attacks8)-($hlattacks8))/100));
$hlattacks8=$hlattacks8/$attacks8;
$costsell8=round(($as471600*75)*($hlattacks8/100)/100);
$autorepair=$attacks['autorepair'];
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR VALIGN="TOP" ID="TABLEHEAD">
<TD><SPAN ID="MEDIUM"></TD><TD ALIGN="RIGHT"></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="akisdjoiasda999" VALUE="AUTOREPAIR <? if($autorepair==0) { echo "ON" ; } else { echo "OFF"; }?>"></TD></FORM>
</TR>
<TR ID="TABLEHEAD"><TD COLSPAN="2">CURRENT ATTACK</TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">WEAPON</TD><TD ALIGN="RIGHT">NUMBER</TD><TD ALIGN="RIGHT">SELL</TD>
</TR>
<? if (!empty($attacks1)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Metal Fists</TD><TD><? echo $attacks1; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123attack1" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell1); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hlattacks1; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hlattacks1<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123attack1" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep1/(100-$hlattacks1))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($attacks2)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser Sabre</TD><TD><? echo $attacks2; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123attack2" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell2); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hlattacks2; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hlattacks2<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123attack2" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep2/(100-$hlattacks2))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($attacks3)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser</TD><TD><? echo $attacks3; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123attack3" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell3); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hlattacks3; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hlattacks3<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123attack3" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep3/(100-$hlattacks3))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($attacks4)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">RPG's</TD><TD><? echo $attacks4; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123attack4" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell4); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hlattacks4; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hlattacks4<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123attack4" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep4/(100-$hlattacks4))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($attacks5)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Rail Gun</TD><TD><? echo $attacks5; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123attack5" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell5); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hlattacks5; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hlattacks5<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123attack5" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep5/(100-$hlattacks5))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($attacks6)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser Cannon</TD><TD><? echo $attacks6; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123attack6" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell6); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hlattacks6; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hlattacks6<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123attack6" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep6/(100-$hlattacks6))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($attacks7)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Temporal Cannon</TD><TD><? echo $attacks7; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123attack7" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell7); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hlattacks7; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hlattacks7<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123attack7" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep7/(100-$hlattacks7))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($attacks8)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Inter-Dimensional Rift</TD><TD><? echo $attacks8; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123attack8" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell8); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hlattacks8; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hlattacks8<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123attack8" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep8/(100-$hlattacks8))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } ?>
</TABLE>
</TD>
</TR>
</TABLE>
<BR>
<?
$query="SELECT * FROM users WHERE userid='$userid'";
$defenses=mysql_query($query);
$defenses=mysql_fetch_array($defenses);

$defenses1=$defenses['defense1'];
$hldefenses1=$defenses['hldefense1'];
$costrep1=round($a1000*(((100*$defenses1)-($hldefenses1))/100));
$hldefenses1=$hldefenses1/$defenses1;
$costsell1=round(($as1000*75)*($hldefenses1/100)/100);

$defenses2=$defenses['defense2'];
$hldefenses2=$defenses['hldefense2'];
$costrep2=round($a1800*(((100*$defenses2)-($hldefenses2))/100));
$hldefenses2=$hldefenses2/$defenses2;
$costsell2=round(($as1800*75)*($hldefenses2/100)/100);

$defenses3=$defenses['defense3'];
$hldefenses3=$defenses['hldefense3'];
$costrep3=round($a3200*(((100*$defenses3)-($hldefenses3))/100));
$hldefenses3=$hldefenses3/$defenses3;
$costsell3=round(($as3200*75)*($hldefenses3/100)/100);

$defenses4=$defenses['defense4'];
$hldefenses4=$defenses['hldefense4'];
$costrep4=round($a5100*(((100*$defenses4)-($hldefenses4))/100));
$hldefenses4=$hldefenses4/$defenses4;
$costsell4=round(($as5100*75)*($hldefenses4/100)/100);

$defenses5=$defenses['defense5'];
$hldefenses5=$defenses['hldefense5'];
$costrep5=round($a16400*(((100*$defenses5)-($hldefenses5))/100));
$hldefenses5=$hldefenses5/$defenses5;
$costsell5=round(($as16400*75)*($hldefenses5/100)/100);

$defenses6=$defenses['defense6'];
$hldefenses6=$defenses['hldefense6'];
$costrep6=round($a52400*(((100*$defenses6)-($hldefenses6))/100));
$hldefenses6=$hldefenses6/$defenses6;
$costsell6=round(($as52400*75)*($hldefenses6/100)/100);

$defenses7=$defenses['defense7'];
$hldefenses7=$defenses['hldefense7'];
$costrep7=round($a167800*(((100*$defenses7)-($hldefenses7))/100));
$hldefenses7=$hldefenses7/$defenses7;
$costsell7=round(($as167800*75)*($hldefenses7/100)/100);

$defenses8=$defenses['defense8'];
$hldefenses8=$defenses['hldefense8'];
$costrep8=round($a471600*(((100*$defenses8)-($hldefenses8))/100));
$hldefenses8=$hldefenses8/$defenses8;
$costsell8=round(($as471600*75)*($hldefenses8/100)/100);

?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">CURRENT DEFENCE</TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">WEAPON</TD><TD ALIGN="RIGHT">NUMBER</TD><TD ALIGN="RIGHT">SELL</TD>
</TR>
<? if (!empty($defenses1)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Riot Shield</TD><TD><? echo $defenses1; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123defense1" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell1); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hldefenses1; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hldefenses1<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123defense1" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep1/(100-$hldefenses1))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($defenses2)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Riot Armor</TD><TD><? echo $defenses2; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123defense2" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell2); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hldefenses2; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hldefenses2<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123defense2" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep2/(100-$hldefenses2))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($defenses3)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">T10k Protective Armor</TD><TD><? echo $defenses3; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123defense3" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell3); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hldefenses3; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hldefenses3<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123defense3" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep3/(100-$hldefenses3))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($defenses4)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">T10k Protective Suit</TD><TD><? echo $defenses4; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123defense4" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell4); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hldefenses4; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hldefenses4<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123defense4" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep4/(100-$hldefenses4))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($defenses5)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Proton Shield</TD><TD><? echo $defenses5; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123defense5" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell5); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hldefenses5; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hldefenses5<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123defense5" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep5/(100-$hldefenses5))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($defenses6)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Proton Armor</TD><TD><? echo $defenses6; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123defense6" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell6); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hldefenses6; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hldefenses6<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123defense6" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep6/(100-$hldefenses6))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($defenses7)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Temporal Shield</TD><TD><? echo $defenses7; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123defense7" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell7); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hldefenses7; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hldefenses7<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123defense7" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep7/(100-$hldefenses7))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } if (!empty($defenses8)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Inter-Dimensional Portal</TD><TD><? echo $defenses8; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=remove"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123defense8" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($costsell8); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $hldefenses8; ?></TD><FORM METHOD="POST" ACTION="./index.php?content=repair"><TD ALIGN="RIGHT"><? if ($hldefenses8<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123defense8" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($costrep8/(100-$hldefenses8))); ?> CR PER %"><? }?></FORM></TD>
</TR>
<? } 
			$tester=mysql_fetch_array(mysql_query("SELECT gotcheapw FROM users WHERE userid='$userid'"));
			$gotcheapw=$tester['gotcheapw'];
			if ($gotcheapw == "1") {
			$a1000=500;
			$a1800=900;
			$a3200=1600;
			$a5100=2550;
			$a16400=8200;
			$a52400=26200;
			$a167800=83900;
			$a471600=235800;
			} else {
			$a1000=1000;
			$a1800=1800;
			$a3200=3200;
			$a5100=5100;
			$a16400=16400;
			$a52400=52400;
			$a167800=167800;
			$a471600=471600;
			}	
?>
</TABLE>
</TD>
</TR>
</TABLE>
<BR>
<BR>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<FORM METHOD="POST" ACTION="./index.php">
<INPUT TYPE="HIDDEN" NAME="342234234234333344444412" VALUE="ARMORY">
<TR ID="TABLEHEAD"><TD COLSPAN="2">ATTACK</TD><TD></TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">WEAPON</TD><TD>STRENGTH</TD><TD>PRICE</TD><TD ALIGN="RIGHT">BUY</TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Metal Fists</TD><TD>(+5 Attack)</TD><TD><? echo number_format($a1000); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123attack1" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser Sabre</TD><TD>(+10 Attack)</TD><TD><? echo number_format($a1800); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123attack2" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser</TD><TD>(+20 Attack)</TD><TD><? echo number_format($a3200); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123attack3" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">RPG's</TD><TD>(+40 Attack)</TD><TD><? echo number_format($a5100); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123attack4" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Rail Gun</TD><TD>(+160 Attack)</TD><TD><? echo number_format($a16400); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123attack5" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser Cannon</TD><TD>(+640 Attack)</TD><TD><? echo number_format($a52400); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123attack6" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Temporal Cannon</TD><TD>(+2,560 Attack)</TD><TD><? echo number_format($a167800); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123attack7" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Inter-Dimensional Rift (One only)</TD><TD>(+10,240 Attack)</TD><TD><? echo number_format($a471600); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123attack8" SIZE="2" VALUE="0"></TD>
</TR>
</TABLE>
</TD>
</TR>
</TABLE>
<BR>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">DEFENCE</TD><TD></TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">WEAPON</TD><TD>STRENGTH</TD><TD>PRICE</TD><TD ALIGN="RIGHT">BUY</TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Riot Shield</TD><TD>(+5 Attack)</TD><TD><? echo number_format($a1000); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123defense1" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Riot Armor</TD><TD>(+10 Attack)</TD><TD><? echo number_format($a1800); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123defense2" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">T10k Protective Armor</TD><TD>(+20 Attack)</TD><TD><? echo number_format($a3200); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123defense3" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">T40k Protective Suit</TD><TD>(+40 Attack)</TD><TD><? echo number_format($a5100); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123defense4" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Proton Shield</TD><TD>(+160 Attack)</TD><TD><? echo number_format($a16400); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123defense5" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Proton Armor</TD><TD>(+640 Attack)</TD><TD><? echo number_format($a52400); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123defense6" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Temporal Shield</TD><TD>(+2,560 Attack)</TD><TD><? echo number_format($a167800); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123defense7" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Inter-Dimensional Portal (One only)</TD><TD>(+10,240 Attack)</TD><TD><? echo number_format($a471600); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123defense8" SIZE="2" VALUE="0"></TD>
</TR>
<TR VALIGN="TOP">
<TD></TD><TD></TD><TD></TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" VALUE="Buy"></TD>
</TR>
</TABLE>
</TD>
</TR>
</TABLE>
</FORM>
<?
} else {
session_destroy();
header("Location: index.php"); 
} 
