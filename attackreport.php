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
/////////

if (!empty($_GET['draw'])) {
			echo "YOU DREW AGAINST THE ENEMY!";
} else {
$attackid=$_GET['attackid'];
$query="SELECT userid FROM attacklog WHERE attackid='$attackid'";
$useridattack=mysql_fetch_array(mysql_query($query)) or die("INVALID ATTACK ID");
$useridattack=$useridattack['userid'];
if ($userid==$useridattack) {
$query="SELECT * FROM attacklog WHERE attackid='$attackid'";
$attack=mysql_fetch_array(mysql_query($query));
$query="SELECT attackcredits FROM users WHERE userid='$userid'";
$attackcredits=mysql_fetch_array(mysql_query($query));
$attackcredits=$attackcredits['attackcredits'];
$defense=$attack['defensedamage'];
$damage=$attack['attackdamage'];
$credits=$attack['credits'];
$units=$attack['units'];
$win=$attack['win'];
$userid2=$attack['userid2'];
$query="SELECT username FROM users WHERE userid='$userid2'";
$username2=mysql_fetch_array(mysql_query($query));
$username2=$username2['username'];
			echo "ATTACK ON: " . $username2 . "<BR>";
			echo "YOUR DAMAGE " . number_format($damage) . "<BR>";
			echo "ENEMY DAMAGE " . number_format($defense) . "<BR>";
if ($win=="1") {
			echo "UNITS ERASED " . number_format($units) . "<BR>";
			echo "CREDITS STOLEN " . number_format($credits) . "<BR>";
} else { 
			echo "UNITS LOST " . number_format($units) . "<BR>";
}
if ($attackcredits > 0 && $userid != $userid2) { ?>
<FORM METHOD="POST" ACTION="index.php">
<SPAN ID="MEDIUM"><INPUT TYPE="HIDDEN" VALUE="<? echo $userid2; ?>" NAME="34534534523322"><INPUT VALUE="ATTACK AGAIN" NAME="attack" TYPE="SUBMIT">
</FORM>
<? } 
}
}
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