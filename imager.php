<?
require("./global.php");
if (empty($_COOKIE["user"])) {
$stringer = "PLEAES ENABLE COOKIES";
} else {
			$users=$_COOKIE["user"];
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
 			$time = date("Y/m/d G:i:s");
			$query="SELECT * FROM recruit WHERE ip='$ip' AND userid='$users' AND recruited='1'";
	 		$recruit=mysql_fetch_array(mysql_query($query));
			$recruit=$recruit['time'];
if (!empty($recruit)) {
$stringer = "ERROR";
} else {
$string1=$_COOKIE["user"];
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
			$stringer=substr($stringer,0,6);

			$query="SELECT * FROM recruit WHERE ip='$ip' AND userid='$users' AND recruited='0'";
	 		$recruit=mysql_fetch_array(mysql_query($query));
			$recruit=$recruit['recid'];
if(!empty($recruit)) {
			$query="UPDATE recruit SET time='$time', code='$stringer' WHERE recid='$recruit'";
	 		$recruit=mysql_query($query) or die("error31");
} else {
			$query="INSERT INTO recruit SET time='$time', userid='$users', code='$stringer', ip='$ip'";
	 		$recruit=mysql_query($query) or die("error31");
}
}
}
$im    = imagecreatefromgif("images/image4.gif");
$orange = imagecolorallocate($im, 220, 210, 60);
$px    = (imagesx($im) - 7.5 * strlen($string)) /2;
imagestring($im, 3, $px, 9, $stringer, $orange);
imagegif($im);
imagedestroy($im);
?>