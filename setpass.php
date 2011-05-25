<?
require('./global.php');
session_start();
$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_fetch_array(mysql_query($query)) or die("here");
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
if (!empty($_POST['123123123123'])) {
			$username=$_SESSION['username'];
			$password=md5($_POST['123123123123']);
			$query="SELECT userid FROM users WHERE username='$login'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error");
			$userid=$userid['userid'];
	 		$query="UPDATE users SET password='$password' WHERE userid='$userid'";
	 		$password=mysql_query($query) or die("error");
			$response="Password changed, please re-login";
}
////////
		}
	}
} else {
	session_destroy();
	$response="Password incorrect";
}
	session_start();
	$_SESSION["username"]="";
	$_SESSION["password2"]="";
	$_SESSION["message1"]=$response;
	$_SESSION["url"]="./index.php";
	session_register('message1');
	session_register('url');
	session_register('username');
	session_register('password2');
	header("Location: reload.php");
	exit;
?>
