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
$query=mysql_fetch_array(mysql_query("SELECT moderator, admin, isbank FROM users WHERE userid='$userid'"));
$moderator=$query['moderator'];
$admin=$query['admin'];
$isbank=$query['isbank'];
?>
<?
if ($admin!="1") {
?>
<br><A HREF="./index.php?content=main">[COMMAND CENTER]</A><br>
<br><A HREF="./index.php?content=attacklog">[ATTACK LOG]</A><br>
<br><A HREF="./index.php?content=planet">[PLANET]</A><br>
<br><A HREF="./index.php?content=solar">[SOLAR SYSTEM]</A><br>
<br><A HREF="./index.php?content=galaxy">[GALAXY]</A><br>
<br><A HREF="./index.php?content=universe">[UNIVERSE]</A><br>
<br><A HREF="./index.php?content=armory">[ARMORY]</A><br>
<br><A HREF="./index.php?content=randd">[RESEARCH]</A><br>
<? if ($isbank!="1") { ?>
<br><A HREF="./index.php?content=bank">[BANK]</A><br>
<?}?>
<br><A HREF="./index.php?content=intelligence">[INTELLIGENCE]</A><br>
<? } ?>
<br><A HREF="./index.php?content=messages">[MESSAGES]</A><br>
<?
if ($admin=="1") {
?>
<br><A HREF="./index.php?content=admin">[ADMIN]</A><br>
<br><A HREF="./todo.txt" TARGET="_new">[TODO LIST]</A><br>
<?
}
if ($isbank=="1") {
?>
<br><A HREF="./index.php?content=isbank">[BANK ACCOUNTS]</A><br>
<?
}
if ($moderator=="1" && $admin!="1") {
?>
<br><A HREF="./index.php?content=moderator">[MODERATOR]</A><br>
<?
}
?>
<br>
<br><A HREF="./index.php?content=chat">[CHAT]</A><br>
<br><A HREF="./index.php?content=help">[HELP]</A><br>
<br><A HREF="./index.php?content=rules">[RULES]</A><br>
<br><A HREF="./index.php?content=forum">[FORUM]</A><br><br>
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