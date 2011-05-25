<?php
session_start();
require("./global.php");

if (empty($_SESSION['username']))
{
			$string1="cookies";
			$string2=$time;
			$string3=$ip;
			$string4=md5($string1);
			$string5=md5($string2);
			$string6=md5($string3);
			$string7="thisisthepointlesskeyjusttoseeificanmakeitevensafer";
			$string8=md5($string7);
			$string9=$string1.$string2.$string3;
			$string10=md5($string9);
			$string11=$string9.$string8;
			srand ((double) microtime( )*1000000);
			$random_number = rand( );
			$string12=md5($string11);
			$string13=md5($random_number);
			$string14=$string12.$string13;
			$stringer=md5($string14);
			setcookie("register",$stringer);
	require("./themes/erethral/index.theme");
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
		exit;	} else
	{
			// Check to see the user's clan and then load specific theme
				$aliens="./themes/erethral/index.theme";
				$humans="./themes/erethral/index.theme";
				$machines="./themes/erethral/index.theme";
				$default="./themes/erethral/index.theme";

				$query=("SELECT race FROM users WHERE userid='$userid'");
				$race=mysql_fetch_array(mysql_query($query));
				$race=$race['race'];
					switch ($race) {
					case 1:
						$theme=$machines;
	   					break;
					case 2:
   						$theme=$humans;
					   	break;
					case 3:
   						$theme=$humans;
					   	break;
					case 4:
   						$theme=$machines;
					   	break;
					case 5:
   						$theme=$aliens;
					   	break;
					case 6:
   						$theme=$aliens;
					  	break;
					default:
						$theme=$default;
						break;
					}
				require($theme);
				} 
		}

	} else
	{
		session_destroy();
		$response="Password incorrect";
		session_start();
		$_SESSION["username"]="";
		$_SESSION["password2"]="";
		$_SESSION["message1"]=$response;
		$_SESSION["url"]="./index.php";
		session_register('username');
		session_register('password2');
		session_register('message1');
		session_register('url');
		header("Location: reload.php");
		exit;
	}
}
function nouser() {
session_destroy();
$response="User does not exist";
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
