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

//////////
?>
<?
if (!isset($_GET['x']) && !isset($_GET['y'])) {
	$query = "SELECT planet FROM users WHERE userid='$userid'";
	$user = mysql_query($query);
	$user = mysql_fetch_array($user);
	$planetid = $user['planet'];

	$user=mysql_query("SELECT * FROM planets WHERE planetid='$planetid'");
	$user = mysql_fetch_array($user);
	$x=$user['x'];
	$y=$user['y'];
} else {
	$x=$_GET['x'];
	$y=$_GET['y'];
}
?>
<br>
<div class="header">Solar System</div>
Co-ordinates <? echo $x; ?>:<? echo $y;?>
<br>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR VALIGN="TOP">
<TD>Co-ordinates</TD><TD>Name</TD><TD ALIGN="RIGHT">City</TD><TD ALIGN="RIGHT">Creator</TD>
</TR>
<?
$ranking=mysql_query("SELECT * FROM planets WHERE x='$x' AND y='$y'");
while ($rank = mysql_fetch_array($ranking)) {
$z=$rank['z'];
$name=$rank['name'];
$creator=$rank['creator'];
$planetid=$rank['planetid'];
$query = "SELECT planet FROM users WHERE planet='$planetid'";
$nouser = mysql_query($query) or die($errdat);
$nouser = mysql_num_rows($nouser);
$query = "SELECT username FROM users WHERE userid='$creator'";
$user = mysql_query($query) or die($errdat);
$user = mysql_fetch_array($user);
$creatorname=$user['username'];
?>
<TR VALIGN="TOP">
<TD><a href="index.php?content=planet&x=<? echo $x; ?>&y=<? echo $y; ?>&z=<? echo $z; ?>">[<? echo $x; ?>:<? echo $y;?>:<? echo $z; ?>]</a></TD><TD><a href="index.php?content=planet&x=<? echo $x; ?>&y=<? echo $y; ?>&z=<? echo $z; ?>">[<? echo $name; ?>]</a></TD><TD ALIGN="RIGHT"><? echo $nouser; ?></TD><TD ALIGN="RIGHT"><? echo $creatorname; ?></TD>
</TR>
<?
}
?>
</TABLE>
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