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
if (!empty($_GET['fail'])) {
			echo "SPIES FAILED USER HAS NOTICED YOUR PRESENCE";
} else {
if (!empty($_GET['draw'])) {
			echo "YOU DREW AGAINST THE ENEMY!";
} else {
$attackid=$_GET['spyid'];
$query="SELECT userid FROM spylog WHERE spyid='$spyid'";
$useridspy=mysql_fetch_array(mysql_query($query)) or die("INVALID ATTACK ID");
$useridspy=$useridspy['userid'];
if ($userid==$useridspy) {
$query="SELECT * FROM spylog WHERE spyid='$spyid'";
$attack=mysql_fetch_array(mysql_query($query));
$defense=$attack['action'];
$damage=$attack['stats'];
$userid2=$attack['userid2'];
$query="SELECT username FROM users WHERE userid='$userid2'";
$username2=mysql_fetch_array(mysql_query($query));
$username2=$username2['username'];
			echo "SPY OF: " . $username2 . "<BR>";
			echo $damage . "<BR>";
			echo $defense . "<BR>";
if ($attackcredits > 0 && $userid != $userid2) { ?>
<FORM METHOD="POST" ACTION="index.php">
<SPAN ID="MEDIUM"><INPUT TYPE="HIDDEN" VALUE="<? echo $userid2; ?>" NAME="3453453455555555523322"><INPUT VALUE="SPY AGAIN" NAME="attack" TYPE="SUBMIT">
</FORM>
<? } 
}
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

