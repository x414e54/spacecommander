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
////
$query="SELECT username, userid FROM users WHERE username='$username'";
$userid=mysql_fetch_array(mysql_query($query));
$userid=$userid['userid'];
$query = "SELECT * FROM users WHERE userid='$userid'";
$user = mysql_query($query) or die($errdat);
$user = mysql_fetch_array($user);

$query="SELECT time FROM time WHERE timeid='0'";
$time=mysql_fetch_array(mysql_query($query));
$time=$time['time'];

$orelevel=$user['orelevel'];
$attacklevel=$user['attacklevel'];
$defenselevel=$user['defenselevel'];
$attackcredits=$user['attackcredits'];
$planet=$user['planet'];
$rank=$user['rank'];
$race=$user['race'];
					switch ($race) {
					case 1:
						$race="Machines";
	   					break;
					case 2:
   						$race="Humans";
					   	break;
					case 3:
   						$race="Humans";
					   	break;
					case 4:
   						$race="Machines";
					   	break;
					case 5:
   						$race="Xantheans";
					   	break;
					case 6:
   						$race="Xantheans";
					  	break;
					default:
						$race="Unknown";
						break;
					}
$query="SELECT * FROM planets WHERE planetid='$planet'";
$planet=mysql_fetch_array(mysql_query($query));
$planet=$planet['name'];
?>
<? if ($admin!="1") { ?>
<br>Credits: <? echo number_format($user['credits']); ?><br>
<br>Units: <? echo number_format($user['units']); ?><br>
<br>Attack level: <? echo $attacklevel; ?><br>
<br>Defense level: <? echo $defenselevel; ?><br>
<br>ORE level: <? echo $orelevel; ?><br>
<br>Attack credits: <? echo $attackcredits; ?><br>
<br>Planet: <? echo $planet; ?><br>
<br>Species: <? echo $race; ?><br>
<br>Rank: <? if ($isbank!=1) { echo number_format($rank); } else { echo "BANK"; }?><br><br>
<? }  else {
echo "<br>You are an Administrator<br><br>";
}
////
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