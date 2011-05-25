<?
require('./global.php');
session_start();
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
	} else
	{
		$query="SELECT suspended, bankrupt FROM users WHERE userid='$userid'";
		$sus=mysql_fetch_array(mysql_query($query));
		$sus=$sus['suspended'];
			
		if ($sus=="1")
		{
			session_destroy();
			$response="Your account has been suspended and is pending investigation... you are immune.";
		} else
		{
			$bankrupt=$sus['bankrupt'];

			if ($bankrupt!=1)
		 	{

//////////////////////
					if (!empty($_POST['342234234234333344444412']))
					{
							$username=$_SESSION["username"];
							$query="SELECT * FROM users WHERE username='$username'";
	 						$user=mysql_fetch_array(mysql_query($query)) or die("error");
							$userid=$user['userid'];
							$credits=$user['credits'];
							$gotcheapw=$user['gotcheapw'];
							
							if ($gotcheapw == "1") {
			$a1000=500;
			$a1800=900;
			$a3200=1600;
			$a5100=2550;
			$a16400=8200;
			$a52400=26200;
			$a167800=83900;
			$a471600=235800;
							} else {
			$a1000=1000;
			$a1800=1800;
			$a3200=3200;
			$a5100=5100;
			$a16400=16400;
			$a52400=52400;
			$a167800=167800;
			$a471600=471600;
							}			
			
							$attacks=$user;
							$attacks1=$attacks['attack1'];
							$hlattacks1=$attacks['hlattack1'];
							$attacks2=$attacks['attack2'];
							$hlattacks2=$attacks['hlattack2'];
							$attacks3=$attacks['attack3'];
							$hlattacks3=$attacks['hlattack3'];
							$attacks4=$attacks['attack4'];
							$hlattacks4=$attacks['hlattack4'];
							$attacks5=$attacks['attack5'];
							$hlattacks5=$attacks['hlattack5'];
							$attacks6=$attacks['attack6'];
							$hlattacks6=$attacks['hlattack6'];
							$attacks7=$attacks['attack7'];
							$hlattacks7=$attacks['hlattack7'];
							$attacks8=$attacks['attack8'];
							$hlattacks8=$attacks['hlattack8'];
							$defenses1=$attacks['defense1'];
							$hldefenses1=$attacks['hldefense1'];
							$defenses2=$attacks['defense2'];
							$hldefenses2=$attacks['hldefense2'];
							$defenses3=$attacks['defense3'];
							$hldefenses3=$attacks['hldefense3'];
							$defenses4=$attacks['defense4'];
							$hldefenses4=$attacks['hldefense4'];
							$defenses5=$attacks['defense5'];
							$hldefenses5=$attacks['hldefense5'];
							$defenses6=$attacks['defense6'];
							$hldefenses6=$attacks['hldefense6'];
							$defenses7=$attacks['defense7'];
							$hldefenses7=$attacks['hldefense7'];
							$defenses8=$attacks['defense8'];
							$hldefenses8=$attacks['hldefense8'];
							$attacks="";
							
			$cumulativemoney="0";
			
			if (!empty($_POST['233213123123123attack1'])&& $_POST['233213123123123attack1'] >0){
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123attack1'] * $a1000);
			$attacks1=$attacks1+($_POST['233213123123123attack1']);
			$hlattacks1=$hlattacks1+(100*$_POST['233213123123123attack1']);
			}
			if (!empty($_POST['233213123123123attack2']) && $_POST['233213123123123attack2'] >0) {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123attack2'] * $a1800);
			$attacks2=$attacks2+($_POST['233213123123123attack2']);
			$hlattacks2=$hlattacks2+(100*$_POST['233213123123123attack2']);
			}
			if (!empty($_POST['233213123123123attack3']) && $_POST['233213123123123attack3'] >0) {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123attack3'] * $a3200);
			$attacks3=$attacks3+($_POST['233213123123123attack3']);
			$hlattacks3=$hlattacks3+(100*$_POST['233213123123123attack3']);
			}
			if (!empty($_POST['233213123123123attack4']) && $_POST['233213123123123attack4'] >0) {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123attack4'] * $a5100);
			$attacks4=$attacks4+($_POST['233213123123123attack4']);
			$hlattacks4=$hlattacks4+(100*$_POST['233213123123123attack4']);
			}
			if (!empty($_POST['233213123123123attack5']) && $_POST['233213123123123attack5'] >0) {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123attack5'] * $a16400);
			$attacks5=$attacks5+($_POST['233213123123123attack5']);
			$hlattacks5=$hlattacks5+(100*$_POST['233213123123123attack5']);
			}
			if (!empty($_POST['233213123123123attack6']) && $_POST['233213123123123attack6'] >0) {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123attack6'] * $a52400);
			$attacks6=$attacks6+($_POST['233213123123123attack6']);
			$hlattacks6=$hlattacks6+(100*$_POST['233213123123123attack6']);
			}
			if (!empty($_POST['233213123123123attack7']) && $_POST['233213123123123attack7'] >0) {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123attack7'] * $a167800);
			$attacks7=$attacks7+($_POST['233213123123123attack7']);
			$hlattacks7=$hlattacks7+(100*$_POST['233213123123123attack7']);
			}
			if (!empty($_POST['233213123123123attack8']) && $_POST['233213123123123attack8'] ==1 && $attacks8==0) {
			$cumulativemoney=$cumulativemoney+($a471600);
			$attacks8=1;
			$hlattacks8=100;
			}
			if (!empty($_POST['233213123123123defense1']) && $_POST['233213123123123defense1'] >0) {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123defense1'] * $a1000);
			$defenses1=$defenses1+($_POST['233213123123123defense1']);
			$hldefenses1=$hldefenses1+(100*$_POST['233213123123123defense1']);
			}
			if (!empty($_POST['233213123123123defense2']) && $_POST['233213123123123defense2'] >0) {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123defense2'] * $a1800);
			$defenses2=$defenses2+($_POST['233213123123123defense2']);
			$hldefenses2=$hldefenses2+(100*$_POST['233213123123123defense2']);
			}
			if (!empty($_POST['233213123123123defense3']) && $_POST['233213123123123defense3'] >0)  {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123defense3'] * $a3200);
			$defenses3=$defenses3+($_POST['233213123123123defense3']);
			$hldefenses3=$hldefenses3+(100 *$_POST['233213123123123defense3']);
			}
			if (!empty($_POST['233213123123123defense4']) && $_POST['233213123123123defense4'] >0) {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123defense4'] * $a5100);
			$defenses4=$defenses4+($_POST['233213123123123defense4']);
			$hldefenses4=$hldefenses4+(100 *$_POST['233213123123123defense4']);
			}
			if (!empty($_POST['233213123123123defense5']) && $_POST['233213123123123defense5'] >0) {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123defense5'] * $a16400);
			$defenses5=$defenses5+($_POST['233213123123123defense5']);
			$hldefenses5=$hldefenses5+(100 *$_POST['233213123123123defense5']);
			}
			if (!empty($_POST['233213123123123defense6']) && $_POST['233213123123123defense6'] >0) {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123defense6'] * $a52400);
			$defenses6=$defenses6+($_POST['233213123123123defense6']);
			$hldefenses6=$hldefenses6+(100 *$_POST['233213123123123defense6']);
			}
			if (!empty($_POST['233213123123123defense7']) && $_POST['233213123123123defense7'] >0) {
			$cumulativemoney=$cumulativemoney+($_POST['233213123123123defense7'] * $a167800);
			$defenses7=$defenses7+($_POST['233213123123123defense7']);
			$hldefenses7=$hldefenses7+(100 *$_POST['233213123123123defense7']);
			}
			if (!empty($_POST['233213123123123defense8']) && $_POST['233213123123123defense8'] ==1 && $defenses8==0) {
			$cumulativemoney=$cumulativemoney+($a471600);
			$defenses8=1;
			$hldefenses8=100;
			}
			
							if (($credits - $cumulativemoney) < 0)
							{
										$response="Failed becuase you do not have enough money!";
							} else
							{
										$credits=$credits - $cumulativemoney;
	 									$query="UPDATE users SET credits='$credits' WHERE userid='$userid'";
	 									$credits=mysql_query($query) or die("error12");
	 									
	 									$query="UPDATE users SET attack1='$attacks1', attack2='$attacks2', attack3='$attacks3', attack4='$attacks4', attack5='$attacks5', attack6='$attacks6', attack7='$attacks7', attack8='$attacks8', hlattack1='$hlattacks1', hlattack2='$hlattacks2', hlattack3='$hlattacks3', hlattack4='$hlattacks4', hlattack5='$hlattacks5', hlattack6='$hlattacks6', hlattack7='$hlattacks7', hlattack8='$hlattacks8' WHERE userid='$userid'";
	 									$attacks=mysql_query($query) or die("error34");
	 									
	 									$query="UPDATE users SET defense1='$defenses1', defense2='$defenses2', defense3='$defenses3', defense4='$defenses4', defense5='$defenses5', defense6='$defenses6', defense7='$defenses7', defense8='$defenses8', hldefense1='$hldefenses1', hldefense2='$hldefenses2', hldefense3='$hldefenses3', hldefense4='$hldefenses4', hldefense5='$hldefenses5', hldefense6='$hldefenses6', hldefense7='$hldefenses7', hldefense8='$hldefenses8' WHERE userid='$userid'";
	 									$defenses=mysql_query($query) or die("error56");
	 									
										$response="Weapons bought sucessfully";
							}
					} else
					{ 
										$response="You have not acessed this page correctly";
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