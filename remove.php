<?
require('./global.php');
session_start();
$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_fetch_array(mysql_query($query)) or die(nouser());
$userid=$userid['userid'];
$password=mysql_fetch_array(mysql_query("SELECT password FROM users WHERE userid='$userid'"));
$password=$password['password'];


if (!empty($_SESSION["username"]))
{
	
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
//////////
			$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
			$credits=$credits['credits'];

	if($credits<1000000)
	{
			$tester=mysql_fetch_array(mysql_query("SELECT gotcheapw FROM users WHERE userid='$userid'"));
			$gotcheapw=$tester['gotcheapw'];
			if ($gotcheapw == "1")
			{
				$cost=array(0,500,900,1600,2550,8200,26200,83900,235800);
			} else
			{
				$cost=array(0,1000,1800,3200,5100,16400,52400,167800,471600);
			}	
			
if (!empty($_POST['sell233213123123123attack']))
{
	if(!empty($_POST['sellwepaonsattackno']))
	{
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE userid='$userid'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];

			$no=$_POST['sellwepaonsattackno'];

	 		$number=round($_POST['sell233213123123123attack']);
	 		$weapon="attack" . $_POST['sellwepaonsattackno'];
	 		$hlweapon="hlattack" . $_POST['sellwepaonsattackno'];
	 		
			if ($number < 0)
			{
				$response="Sorry but you cannot do this";
			} else
			{
				$query="SELECT * FROM users WHERE userid='$userid'";
				$attacks=mysql_query($query);
				$attacks=mysql_fetch_array($attacks);
						
				$attacks1=$attacks[$weapon];
				$hlattacks1=$attacks[$hlweapon];
				$hlattacksnew=$attacks[$hlweapon]-$hlattacks1/$attacks1;
				$hlattacks1=$hlattacks1/$attacks1;
	
				if (($attacks1 - $number) < 0)
				{
					$response="Sorry but you cannot do this";
				} else
				{
				$p=0;
				if (!empty($attacks1))
				 {
					while ($p != $number)
					{			
						$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
						$credits=$credits['credits'];
					
						if($credits<1000000)
						{
				
							$costsell1=round(($cost[$no]*75)*($hlattacks1/100)/100);
						
							$credits=$credits + ($costsell1);
							$wep=$attacks1 - 1;
	 					
	 						$query="UPDATE users SET " . $weapon . "='$wep', credits='$credits', " . $hlweapon . "='$hlattacksnew' WHERE userid='$userid'";
							$attack=mysql_query($query) or die("error");
						
							$p++;
						} else
						{
							$p=$number;
						}
						
						$response="Weapons sucessfully sold";
					}
				} else {
					$p=$number;
					$response="Sorry but you do not have this weapon";
				}
				}
			} 	
	} else {
		$response="There may be blank values";
	}
}

if (!empty($_POST['sell233213123123123defense']))
{
	if(!empty($_POST['sellwepaonsdefenseno']))
	{
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE userid='$userid'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			
			$no=$_POST['sellwepaonsdefenseno'];
	 		$number=round($_POST['sell233213123123123defense']);
	 		$weapon="defense" . $_POST['sellwepaonsdefenseno'];
	 		$hlweapon="hldefense" . $_POST['sellwepaonsdefenseno'];
	 		
			if ($number < 0)
			{
				$response="Sorry but you cannot do this";
			} else
			{
				$query="SELECT * FROM users WHERE userid='$userid'";
				$defenses=mysql_query($query);
				$defenses=mysql_fetch_array($defenses);
					
				$defenses1=$defenses[$weapon];
				$hldefenses1=$defenses[$hlweapon];
				$hldefensesnew=$defenses[$hlweapon]-$hldefenses1/$defenses1;
				$hldefenses1=$hldefenses1/$defenses1;
	
				if (($defenses1- $number) < 0)
				{
					$response="Sorry but you cannot do this";
				} else
				{
					$p=0;
		

				if (!empty($defenses1)) {
					while ($p != $number)
					{			
						$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
						$credits=$credits['credits'];
					
						if($credits<1000000)
						{
							$costsell1=round(($cost[$no]*75)*($hldefenses1/100)/100);
						
							$credits=$credits + ($costsell1);
							$wep=$defenses1 - 1;
	 					
	 						$query="UPDATE users SET " . $weapon . "='$wep', credits='$credits', " . $hlweapon . "='$hldefensesnew' WHERE userid='$userid'";
	 						$defense=mysql_query($query) or die("error");
						
							$p++;
						} else {
							$p=$number;
						}

						$response="Weapons sucessfully sold";
					}
				} else {
					$response="Sorry but you do not have this weapon";
				}
				}
			} 	
	} else {
		$response="There may be blank values";
	}
}

} else
{
	$response="Sorry you can only sell weapons if you have under 1,000,000";
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
} else {
	session_destroy();
	$response="You are not logged in";
}
				session_start();
				$_SESSION["message1"]=$response;
				$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
				session_register('message1');
				session_register('url');
				header("Location: reload.php");
				exit;
?>