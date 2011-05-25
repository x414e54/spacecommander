<?
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

//////////

if (!isset($_GET['x']) && !isset($_GET['y']) && !isset($_GET['z'])) {
	$query = "SELECT planet FROM users WHERE userid='$userid'";
	$user = mysql_query($query) or die($errdat);
	$user = mysql_fetch_array($user);
	$planetid=$user['planet'];

	$query="SELECT * FROM planets WHERE planetid='$planetid'";
	$planet=mysql_fetch_array(mysql_query($query)) or die("error");
} else {
	$x=$_GET['x'];
	$y=$_GET['y'];
	$z=$_GET['z'];
	$query="SELECT * FROM planets WHERE x='$x' AND y='$y' AND z='$z'";
	$planet=mysql_fetch_array(mysql_query($query)) or die("error");	
}
$x=$planet['x'];
$y=$planet['y'];
$z=$planet['z'];
$planetid=$planet['planetid'];
$creator=$planet['creator'];
$planet=$planet['name'];
?>
<br>
<div class="header">Planet</div>
Co-ordinates <? echo $x; ?>:<? echo $y;?>:<? echo $z;?><br>
Planetname <? echo $planet; ?>
<br>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR VALIGN="TOP">
<TD>Co-ordinates</TD><TD>Name</TD><TD ALIGN="RIGHT">Units</TD><TD ALIGN="RIGHT">Credits</TD>
</TR>
<?
$ranking=mysql_query("SELECT isbank, rank, username, credits, units, userid, f FROM users WHERE planet='$planetid' AND admin!='1' ORDER BY f");
while ($rank = mysql_fetch_array($ranking)) {
$rankno=$rank['rank'];
$userid2=$rank['userid'];
$usernamer=$rank['username'];
$isbank=$rank['isbank']; 
$units=$rank['units'];
$credits=$rank['credits'];
$f=$rank['f'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
$online=$online['ip'];
?>
<TR VALIGN="TOP">
<TD><?echo $x; ?>:<? echo $y;?>:<? echo $z;?>:<? echo $f; ?></TD><TD><? if (!empty($online)) { ?><span class="bold"><? } if ($userid2!=$userid) { ?><A HREF="./index.php?content=user&userid=<? echo $userid2;?>">[<? echo $usernamer; ?>]</A><? } else { ?><? echo $usernamer; ?><? } ?></TD><TD ALIGN="RIGHT"><? if($isbank==1) {echo "UNKNOWN";} else { echo number_format($units); } ?></TD><TD ALIGN="RIGHT"><? if($isbank==1) {echo "UNKNOWN";} else { echo number_format($credits);} ?></TD>
</TR>
<?
}
?>
</TABLE>
<br>
<?
//////////
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