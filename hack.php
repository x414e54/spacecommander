<?
require('./global.php');

$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_fetch_array(mysql_query($query)) or die(nouser());
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
			$bankrupt=mysql_fetch_array(mysql_query("SELECT bankrupt FROM users WHERE userid='$userid'"));
			$bankrupt=$bankrupt['bankrupt'];

			if ($bankrupt!=1)
		 	{


//////////////////////
if (!empty($_POST['3453453455555555523322jdjdijdjiodijod'])) {
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			$userid2=$_POST['3453453455555555523322jdjdijdjiodijod'];
			if ($userid!=$userid2) {
			$time=date("Y/m/d G:i:s");
			$hackers=mysql_fetch_array(mysql_query("SELECT hackers FROM users WHERE userid='$userid'"));
			$hackers=$hackers['hackers'];
			$hackers2=mysql_fetch_array(mysql_query("SELECT hackers FROM users WHERE userid='$userid2'"));
			$hackers2=$hackers2['hackers'];
			$hacklevel=mysql_fetch_array(mysql_query("SELECT hacklevel FROM users WHERE userid='$userid'"));
			$hacklevel=$hacklevel['hacklevel'];
			$hacklevel2=mysql_fetch_array(mysql_query("SELECT hacklevel FROM users WHERE userid='$userid2'"));
			$hacklevel2=$hacklevel2['hacklevel'];
			$units2=mysql_fetch_array(mysql_query("SELECT units FROM users WHERE userid='$userid2'"));
			$units2=$units2['units'];
			$credits2=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid2'"));
			$credits2=$credits2['credits'];
			$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
			$credits=$credits['credits'];
			$gothack=mysql_fetch_array(mysql_query("SELECT gothack FROM users WHERE userid='$userid'"));
			$gothack=$gothack['gothack'];
			$gothack2=mysql_fetch_array(mysql_query("SELECT gothack FROM users WHERE userid='$userid2'"));
			$gothack2=$gothack2['gothack'];
			$immunity=mysql_fetch_array(mysql_query("SELECT immunity FROM users WHERE userid='$userid2'"));
			$immunity=$immunity['immunity'];
			if ($gothack=="0") {
			header("Location: index.php?content=spyreport&nospy=true");
			} else {
			if ($immunity=="1") {
			header("Location: index.php?content=spyreport&immunity=true");
			} else {
			$userdamage=round(($hackers)*pow(1.25, $hacklevel));
			$userdefense=round(($hackers2)*pow(1.25, $hacklevel2));
			if ($gothack=="1") {
			$userdamage=round($userdamage*1.50);
			}
			$covertbias="1";
			$canseename="0";
			if ($gothack2=="1") {
			$userdefense=round($userdefense*1.50);
			$canseename="1";
			}
			if ($gothack2=="0") {
			$userdefense=0;
			}
			$attackdamage=($userdamage-$userdefense);
			if ($hackers > 0) {
			if ($attackdamage < 0) {
			$spyaction="None... hackers were descovered.";
			$stats="Stats report failed.";
			$time=date("Y/m/d G:i:s");
			$query="INSERT INTO spylog SET time='$time', userid2='$userid', userid='$userid2', action='$spyaction', stats='none', canseename='$canseename', incoming='1'";
	 		$attack=mysql_query($query) or die("error31");
			$query="UPDATE users SET spied='1' WHERE userid='$userid2'";
	 		$attack=mysql_query($query) or die("error32");
			$query="INSERT INTO spylog SET time='$time', userid2='$userid2', userid='$userid', action='$spyaction', stats='$stats', canseename='$canseename', incoming='0'";
	 		$attack=mysql_query($query) or die("error34");
			Header("Location: index.php?content=spyreport&fail=true");
			}
			if ($attackdamage == 0) {
			echo "DRAW";
			}
			if ($attackdamage > 0) {
			$spys=mysql_query("SELECT time FROM spylog WHERE userid='$userid' AND userid2='$userid2' AND incoming='0' AND action !='None... spies were killed.'  AND action !='None spy/hack attack limit reached recon only.' AND action !='None... hackers were descovered.'  AND action !='None hack/spy attack limit reached recon only.' AND time >= DATE_SUB( NOW(), INTERVAL 1 DAY )");
			$spys=mysql_num_rows($spys);
			if ($spys < 5) {
					$spyaction="MESSAGES STOLEN AND CURRENTLY LOGGED IN BANK ACCOUNT DETAILS STOLEN."; 
					$spyaction1="MESSAGES STOLEN AND CURRENTLY LOGGED IN BANK ACCOUNT DETAILS STOLEN."; 
					$query="SELECT * FROM accountlogin WHERE userid='$userid2'";
					$accounts=mysql_query($query) or die("poo");
					$stringerthing="<BR><B>ACCOUNTS HACKED</B><BR><BR>";
					while( $account=mysql_fetch_array($accounts)) {
						$accountno=$account['accountno'];
						if (!empty($accountno)) {
						$accountpassword=$account['password'];
						$bankid=$account['bankid'];
						$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankid'"));
						$bankuserid=$bankuserid['userid'];
						$bankname=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$bankuserid'"));
						$bankname=$bankname['username'];
						$query2="SELECT * FROM bankaccounts WHERE bankid='$bankid' AND accountno='$accountno'";
						$anonymous=mysql_fetch_array(mysql_query($query2));
						$userider=$anonymous['userid'];
						$anonymous=$anonymous['anonymous'];
						if ($anonymous==0) {
							$time=date("Y/m/d G:i:s");
							$contentuser="THIS IS AN AUTOMATED MESSAGE FROM THIS BANK TELLING YOU SOMEONE HAS JUST HACKED ACCOUNT: " . $accountno;
					 		$query="INSERT INTO messages SET userid='$userider', userid2='$bankuserid', content='$contentuser', time='$time'";
					 		$new=mysql_query($query) or die("error55439");
						}
						$stringerthing=$stringerthing . "ACCOUNT: " . $accountno . " AT BANK: " . $bankname . " PASSWORD: " . $accountpassword . "<BR>";
						}
					}
					$stringerthing=$stringerthing . "<BR><B>MESSAGES HACKED</B><BR><BR>";
					$query="SELECT * FROM messages WHERE userid='$userid2'";
					$messages=mysql_query($query);
					while( $message=mysql_fetch_array($messages)) {
					$messagetime=$message['time'];
					$messager2=$message['userid2'];
					$content2 = $message['content'];
					$messageid=$message['messageid'];
					$query="SELECT username, userid FROM users WHERE userid='$messager2'";
					$messagername=mysql_fetch_array(mysql_query($query)) or die("error");
					$messagername=$messagername['username'];
						$stringerthing=$stringerthing . "<B>FROM</B>: " . $messagername . "<BR> <B>DATE</B>:  " . $messagetime . "<BR> <B>CONTENT</B>:  <BR>" . $content2 . "<BR>";
					}
			} else {
				$spyaction="None hack/spy attack limit reached recon only."; 
				$spyaction1="None hack/spy attack limit reached recon only."; 
				$stringerthing="None";
			}
				$time=date("Y/m/d G:i:s");
				$query="UPDATE users SET infiltrated='1' WHERE userid='$userid2'";
	 			$attack=mysql_query($query) or die("error34");
				$query="INSERT INTO spylog SET time='$time', userid2='$userid', userid='$userid2', action='$spyaction', stats='none', canseename='$canseename', incoming='1'";
	 			$attack=mysql_query($query) or die("error31");
				$query="INSERT INTO spylog SET time='$time', userid2='$userid2', userid='$userid', action='$spyaction1', stats='$stringerthing', canseename='$canseename', incoming='0'";
	 			$attack=mysql_query($query) or die("error349");
				$query="SELECT spyid FROM spylog WHERE time='$time' AND userid2='$userid2' AND userid='$userid'";
	 			$spyid=mysql_fetch_array(mysql_query($query)) or die("error34");
				$spyid=$spyid['spyid'];
				Header("Location: index.php?content=spyreport&spyid=$spyid");
			}
			}
			}
			}
			}
}
//////////

			} else
			{
				$response="You cannot do that you are bankrupt";
			}
		}
	}
} else {
	session_destroy();
	$response="Password incorrect";
}
function nouser() {
	session_destroy();
	$response="User does not exist";
}
				session_start();
				$_SESSION["message1"]=$response;
				$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
				session_register('message1');
				session_register('url');
				header("Location: reload.php");
				exit;
?>
