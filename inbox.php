<?
session_start();
require("./global.php");

if (empty($_SESSION['username']))
{
	echo "<br>You are not logged in.<br><br>";
	
} else {
$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_fetch_array(mysql_query($query)) or die(nouser());
$userid=$userid['userid'];
$password=mysql_fetch_array(mysql_query("SELECT password FROM users WHERE userid='$userid'"));
$password=$password['password'] or die(nouser());

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
		session_start();
		$_SESSION["username"]="";
		$_SESSION["password2"]="";
		$_SESSION["message1"]=$response;
		$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
		session_register('username');
		session_register('password2');
		session_register('message1');
		session_register('url');
		header("Location: reload.php");
		exit;
	} else
	{
		$query="SELECT suspended FROM users WHERE userid='$userid'";
		$sus=mysql_fetch_array(mysql_query($query));
		$sus=$sus['suspended'];
	
	if ($sus=="1")
	{
		session_destroy();
		$response="Your account has been suspended and is pending investigation... you are immune.";
		session_start();
		$_SESSION["username"]="";
		$_SESSION["password2"]="";
		$_SESSION["message1"]=$response;
		$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
		session_register('username');
		session_register('password2');
		session_register('message1');
		session_register('url');
		header("Location: reload.php");
		exit;	
	} else
	{
			$messages=mysql_query("SELECT time FROM messages WHERE userid='$userid' AND new='1' ORDER BY time DESC");
			$messages=mysql_num_rows($messages);
			if(empty($messages)) { $messages="0"; }
	
			if ($messages==0) { echo "<br>You have no new messages<br><br>"; }
			if ($messages==1) { echo "<br>You have <span id=\"bold\">1</span> new message<br><br>"; }
			if ($messages>1) { echo "<br><a href=\"./index.php?content=messages\">You have <span id=\"bold\">[" . $messages . "]</span> new messages</a><br><br>"; }
	}
}
} else {
		session_destroy();
		$response="Password incorrect";
		session_start();
		$_SESSION["username"]="";
		$_SESSION["password2"]="";
		$_SESSION["message1"]=$response;
		$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
		session_register('username');
		session_register('password2');
		session_register('message1');
		session_register('url');
		header("Location: reload.php");
		exit;
	}
}
?>