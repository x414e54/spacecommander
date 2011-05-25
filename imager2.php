<?
require("./global.php");
if (empty($_COOKIE["register"])) {
$stringer = "PLEAES ENABLE COOKIES";
} else {
			$registerid=$_COOKIE["register"];
			require("./ip.php");
 			$time = date("Y/m/d G:i:s");
			$query="DELETE FROM register WHERE time <= DATE_SUB( NOW(), INTERVAL 30 MINUTE)";
	 		$recruit=mysql_query($query) or die("error31234");
$string1=$_COOKIE["register"];
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

			$query="SELECT * FROM register WHERE ip='$ip' AND regid='$registerid'";
	 		$register=mysql_fetch_array(mysql_query($query));
			$register=$register['id'];
if(!empty($register)) {
			$query="UPDATE register SET time='$time', code='$stringer' WHERE id='$register'";
	 		$recruit=mysql_query($query) or die("error31");
} else {
			$query="INSERT INTO register SET time='$time', code='$stringer', ip='$ip', regid='$registerid'";
	 		$recruit=mysql_query($query) or die("error3123");
}
}
$im    = imagecreatefromgif("images/image4.gif");
$orange = imagecolorallocate($im, 220, 210, 60);
$px    = (imagesx($im) - 7.5 * strlen($string)) /2;
imagestring($im, 3, $px, 9, $stringer, $orange);
imagegif($im);
imagedestroy($im);
?>