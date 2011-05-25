<?
require('./global.php');
session_start();
$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_query($query);
$userid=mysql_fetch_array($userid);
$userid=$userid['userid'];

if (!empty($_SESSION["username"])) {

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
///////
require("./mastervalues.php");

$query="SELECT * FROM users WHERE userid='$userid'";

$gotcheapwm=$tester['gotcheapwm'];
$gotcheapw=$tester['gotcheapw'];

$attacks=mysql_query($query);
$attacks=mysql_fetch_array($attacks);

$attcount = count($attarray);
$defcount = count($defarray);
$totcount = $attcount + $defcount;

for($i = 1; $i < ($totcount + 1); $i++) { 

	$weaponarray = array_merge($attarray, $defarray);

	$h = $i - 1;

	$tempweaponname=$weaponarray[$h]['name'];

	$tempweaponpower=$weaponarray[$h]['power'];

	$tempweaponcost=$weaponarray[$h]['cost'];

	if ($i < ($attcount + 1)) {
		$type = 'attack';
		$j = $i;
	} else {
		$type = 'defense';
		$j = $i - $attcount;
	}
	
	$tempweaponcount=$attacks[$type . $j];

	$tempweaponhealth=$attacks['hl' . $type . $j]/$tempweaponcount;

//	$temprepaircost=round($weaponarray[$h]['cost']*(((100-$tempweaponhealth)/100)*$tempweaponcount));
	$temprepaircost=round(($weaponarray[$h]['cost']*$tempweaponcount)/100);

	if ($gotcheapwm == "1") {
		$temprepaircost = $temprepaircost * $cheapmaintainfactor;
	}

	$tempsalecost=round(($weaponarray[$h]['cost']*$salefactor)*($tempweaponhealth/100));

	if ($gotcheapw == "1") {
		$tempsalecost = $tempsalecost * $cheapweaponfactor;
	}

	if ($i < ($attcount + 1)) {
		$attackdata[$i] = array( "count" => $tempweaponcount, "health" => $tempweaponhealth, "repair" => $temprepaircost, "sell" => $tempsalecost, "name" => $tempweaponname, "power" => $tempweaponpower, "cost" => $tempweaponcost);
	} else {
		$j = $i - $attcount;
		$defensedata[$j] = array( "count" => $tempweaponcount, "health" => $tempweaponhealth, "repair" => $temprepaircost, "sell" => $tempsalecost, "name" => $tempweaponname, "power" => $tempweaponpower, "cost" => $tempweaponcost);
	}

} 



$autorepair=$attacks['autorepair'];
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR VALIGN="TOP" ID="TABLEHEAD">
<TD><SPAN ID="MEDIUM"></TD><TD ALIGN="RIGHT"></TD><FORM METHOD="POST" ACTION="./repair.php"><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="akisdjoiasda999" VALUE="AUTOREPAIR <? if($autorepair==0) { echo "OFF" ; } else { echo "ON"; }?>"></TD></FORM>
</TR>
<TR ID="TABLEHEAD"><TD COLSPAN="2">CURRENT ATTACK</TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">WEAPON</TD><TD ALIGN="RIGHT">NUMBER</TD><TD ALIGN="RIGHT">SELL</TD>
</TR>


<?
for($i = 1; $i < ($attcount + 1); $i++) { 

if (!empty($attackdata[$i]['count'])) { 
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><? echo $attackdata[$i]['name'] ?></TD><TD><? echo $attackdata[$i]['count']; ?></TD><FORM METHOD="POST" ACTION="./remove.php"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123attack" SIZE="2" VALUE="0"><INPUT TYPE="hidden" VALUE="<? echo $i; ?>" NAME="sellwepaonsattackno">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($attackdata[$i]['sell']); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $attackdata[$i]['health']; ?></TD><FORM METHOD="POST" ACTION="./repair.php"><TD ALIGN="RIGHT"><? if ($attackdata[$i]['health']<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123attack" SIZE="2" VALUE="0"><INPUT TYPE="hidden" VALUE="<? echo $i; ?>" NAME="reperattackerno">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($attackdata[$i]['repair'])); ?> CR PER %"><? }?></FORM></TD>
</TR>

<? 
}
}
?>

</TABLE>
</TD>
</TR>
</TABLE>
<BR>



<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">CURRENT DEFENSE</TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">WEAPON</TD><TD ALIGN="RIGHT">NUMBER</TD><TD ALIGN="RIGHT">SELL</TD>
</TR>


<?
for($i = 1; $i < ($defcount + 1); $i++) { 

if (!empty($defensedata[$i]['count'])) { 
?>

<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><? echo $defensedata[$i]['name'] ?></TD><TD><? echo $defensedata[$i]['count']; ?></TD><FORM METHOD="POST" ACTION="./remove.php"><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="sell233213123123123defense" SIZE="2" VALUE="0"><INPUT TYPE="hidden" VALUE="<? echo $i; ?>" NAME="sellwepaonsdefenseno">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for <? echo number_format($defensedata[$i]['sell']); ?> CR"></FORM></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"></TD><TD>Health: <? echo $defensedata[$i]['health']; ?></TD><FORM METHOD="POST" ACTION="./repair.php"><TD ALIGN="RIGHT"><? if ($defensedata[$i]['health']<100) {?> <INPUT TYPE="TEXT" NAME="rep233213123123123defense" SIZE="2" VALUE="0"><INPUT TYPE="hidden" NAME="reperdefenseerno" VALUE="<? echo $i; ?>">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Repair for <? echo number_format(round($defensedata[$i]['repair'])); ?> CR PER %"><? }?></FORM></TD>
</TR>

<? 
}
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
<FORM METHOD="POST" ACTION="./buy.php">
<INPUT TYPE="HIDDEN" NAME="342234234234333344444412" VALUE="ARMORY">
<TR ID="TABLEHEAD"><TD COLSPAN="2">ATTACK</TD><TD></TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">WEAPON</TD><TD>STRENGTH</TD><TD>PRICE</TD><TD ALIGN="RIGHT">BUY</TD>
</TR>


<?
for($i = 1; $i < ($attcount + 1); $i++) { 
?>

<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><? echo $attackdata[$i]['name']; ?></TD><TD>(+<? echo $attackdata[$i]['power']; ?> Attack)</TD><TD><? echo number_format($attackdata[$i]['cost']); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123attack<? echo $i; ?>" SIZE="2" VALUE="0"></TD>
</TR>

<?
}
?>

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

<?
for($i = 1; $i < ($defcount + 1); $i++) { 
?>

<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><? echo $defensedata[$i]['name']; ?></TD><TD>(+<? echo $defensedata[$i]['power']; ?> ATTACK)</TD><TD><? echo number_format($defensedata[$i]['cost']); ?> CR</TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="233213123123123defense<? echo $i; ?>" SIZE="2" VALUE="0"></TD>
</TR>

<?
}
?>


<TR VALIGN="TOP">
<TD></TD><TD></TD><TD></TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" VALUE="Buy"></TD>
</TR>
</TABLE>
</TD>
</TR>
</TABLE>
</FORM>
<?
////////
		}
	}
} else {
	session_destroy();
	$response="Password incorrect";
	session_start();
	$_SESSION["message1"]=$response;
	$_SESSION["url"]="./index.php";
	session_register('message1');
	session_register('url');
	header("Location: reload.php");
	exit;
}
} else {
	session_destroy();
	header("Location: index.php");
	exit;
}
?>	