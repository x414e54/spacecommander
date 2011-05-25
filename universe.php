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
<br>
<div class="header">The Universe</div>
<br>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR VALIGN="TOP">
<TD>Galaxy No</TD><TD ALIGN="RIGHT">Solar Systems</TD>
</TR>
<?
$ranking=mysql_query("SELECT DISTINCT x FROM planets");
while ($rank = mysql_fetch_array($ranking)) {
$x=$rank['x'];
$query = "SELECT DISTINCT y FROM planets WHERE x='$x'";
$nouser = mysql_query($query);
$nouser = mysql_num_rows($nouser);
?>
<TR VALIGN="TOP">
<TD><a href="index.php?content=galaxy&x=<? echo $x; ?>">[<? echo $x; ?>]</a></TD><TD ALIGN="RIGHT"><? echo $nouser; ?></TD></TD>
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