<?php
require("./global.php");
			$query="DELETE FROM recruit WHERE time <= DATE_SUB( NOW(), INTERVAL 30 MINUTE )";
			$delete=mysql_query($query) or die("error101");
if (!empty($_GET['user'])) {
$linkid=$_GET['user'];
setcookie("user", $_GET['user']);
$steriner=$_GET['user'];
					if ($_SERVER["HTTP_X_FORWARDED_FOR"]) {
					  if ($_SERVER["HTTP_CLIENT_IP"]) {
					   $proxy = $_SERVER["HTTP_CLIENT_IP"];
					  } else {
					   $proxy = $_SERVER["REMOTE_ADDR"];
					  }
						  $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
					} else {
					  if ($_SERVER["HTTP_CLIENT_IP"]) {
					   $ip = $_SERVER["HTTP_CLIENT_IP"];
					  } else {
					   $ip = $_SERVER["REMOTE_ADDR"];
					  }
					}
 			$query="SELECT * FROM recruit WHERE ip='$ip' AND userid='$linkid' AND recruited='1'";
	 		$recruit=mysql_fetch_array(mysql_query($query));
			$recruit=$recruit['recid'];
if (!empty($_COOKIE[$steriner]) || !empty($recruit)) {
			$linkid=$_GET['user'];
			$query="SELECT username,userid FROM users WHERE linkid='$linkid'";
	 		$usernameer=mysql_fetch_array(mysql_query($query)) or die("error");
			$userid=$usernameer['userid'];
			$usernameer=$usernameer['username'];
			$response="You have already been recruited into " . $usernameer . "s army please come back in 30mins";
			setcookie("recruiter",$userid, time()+1800);
				session_start();
				$_SESSION["message1"]=$response;
				$_SESSION["url"]=index.php;
				session_register('message1');
				session_register('url');
				header("Location: reload.php");
				exit;
} else {
			$query="SELECT * FROM recruit WHERE userid='$linkid' AND ip='$ip'";
	 		$recruit=mysql_fetch_array(mysql_query($query));
			$recruit=$recruit['time'];
if (!empty($_POST['genkeythingy'])) {
			$linkid=$_COOKIE["user"];
			$query="SELECT code FROM recruit WHERE userid='$linkid' AND ip='$ip'";
	 		$stringer=mysql_fetch_array(mysql_query($query)) or die("error34");
			$stringer=$stringer['code'];
                        if ($_POST['genkeythingy']==$stringer) {
			$query="SELECT userid, username FROM users WHERE linkid='$linkid'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error34");
			$usernameer=$userid['username'];
			$userid=$userid['userid'];
			$units=mysql_fetch_array(mysql_query("SELECT units FROM users WHERE userid='$userid'"));
			$units=$units['units'] + 1;
			setcookie($_GET['user'], $_GET['user'], time()+1800);
	 		$query="UPDATE users SET units='$units' WHERE userid='$userid'";
	 		$units=mysql_query($query) or die("error4");
 			$time = date("Y/m/d G:i:s");
	 		$query="UPDATE recruit SET time='$time', recruited='1' WHERE userid='$linkid' AND ip='$ip'";
	 		$units=mysql_query($query) or die("error14");
			$response="You have been recruited into " . $usernameer . "s army please register if you have not already";
			setcookie("recruiter",$userid, time()+1800);
			} else {
			$response="Incorrect key";
			}
				session_start();
				$_SESSION["message1"]=$response;
				$_SESSION["url"]=index.php;
				session_register('message1');
				session_register('url');
				header("Location: reload.php");
				exit;

} else {
				$aliens="./themes/erethral/loader.theme";
				$humans="./themes/erethral/loader.theme";
				$machines="./themes/erethral/loader.theme";
				$default="./themes/erethral/loader.theme";

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
				$loader="./recruit2.php";
				require($theme);
}
}
} else {
$response="This is an invalid unique user ID";
				session_start();
				$_SESSION["message1"]=$response;
				$_SESSION["url"]="index.php";
				session_register('message1');
				session_register('url');
				header("Location: reload.php");
				exit;

}
function nouserer() {
$response="This is an invalid unique user ID";
				session_start();
				$_SESSION["message1"]=$response;
				$_SESSION["url"]=index.php;
				session_register('message1');
				session_register('url');
				header("Location: reload.php");
				exit;

}
?>