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

//////////////////////
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];
				
				$tester=mysql_fetch_array(mysql_query("SELECT gotcheapwm,autorepair FROM users WHERE userid='$userid'"));
				$gotcheapwm=$tester['gotcheapwm'];
				$autorepair=$tester['autorepair'];
				
					if ($gotcheapw == "1")
					{
						$cost=array(0,500,900,1600,2550,8200,26200,83900,235800);
					} else
					{
						$cost=array(0,1000,1800,3200,5100,16400,52400,167800,471600);
					}
					
					if (!empty($_POST['akisdjoiasda999']))
					{
						if ($autorepair==0)
						{
							$autorepair=1;
							$response="Autorepair is now turned on";
						} else
						{
							$autorepair=0;
							$response="Autorepair is now turned off";
						}
						$query="UPDATE users SET autorepair='$autorepair' WHERE userid='$userid'";
						$go=mysql_query($query);
					}
					
					if (!empty($_POST['rep233213123123123attack']))
					{
						if (!empty($_POST['reperattackerno']))
						{
							$no=$_POST['reperattackerno'];
							$attackno="attack" . $_POST['reperattackerno'];
							$hlattackno="hlattack" . $_POST['reperattackerno'];
							$query="SELECT * FROM users WHERE userid='$userid'";
							$attacks=mysql_query($query);
							$attacks=mysql_fetch_array($attacks);
							$attacks1=$attacks[$attackno];
							$hlattacks1=$attacks[$hlattackno];
						
						if (!empty($attacks1))
						{
							$costrep=round(round($cost[$no]*(((100*$attacks1)-($hlattacks1))/100))/(100-($hlattacks1/$attacks1)));

				 			$number=$_POST['rep233213123123123attack']; if ($number<=0)
				 			{
								$response="Sorry you cannot do this.";
							} else
							{
								if (($hlattacks1+$number) <= 100*$attacks1)
								{
									$hlattacknew=$hlattacks1+($number*$attacks1);
									$credits=$credits-($costrep*$number);
									if ($credits >=0)
									{
										$query="UPDATE users SET " . $hlattackno . "='$hlattacknew', credits='$credits' WHERE userid='$userid'";
										$go=mysql_query($query);
										$response="The weapon has been repaired";
									} else 
									{
										$response="Sorry you do not have enough credits.";
									}
								} else
								{
										$response="You cannot repair over 100%.";
								}	
							}							
							} else
							{
							$response="You do not have any of these weapons.";
							}
						} else {
							$response="There may be blank values.";
						}
					}

					if (!empty($_POST['rep233213123123123defense']))
					{
						if (!empty($_POST['reperdefenseerno']))
						{
							$no=$_POST['reperdefenseerno'];
							$defenseno="defense" . $_POST['reperdefenseerno'];
							$hldefenseno="hldefense" . $_POST['reperdefenseerno'];
							$query="SELECT * FROM users WHERE userid='$userid'";
							$defenses=mysql_query($query);
							$defenses=mysql_fetch_array($defenses);
							$defenses1=$defenses[$defenseno];
							$hldefenses1=$defenses[$hldefenseno];
						
						if (!empty($defenses1))
						{
							$costrep=round(round($cost[$no]*(((100*$defenses1)-($hldefenses1))/100))/(100-($hldefenses1/$defenses1)));

				 			$number=$_POST['rep233213123123123defense']; if ($number<=0)
				 			{
								$response="Sorry you cannot do this.";
							} else
							{
								if (($hldefenses1+$number) <= 100*$defenses1)
								{
									$hldefensenew=$hldefenses1+($number*$defenses1);
									$credits=$credits-($costrep*$number);
									if ($credits >=0)
									{
										$query="UPDATE users SET " . $hldefenseno . "='$hldefensenew', credits='$credits' WHERE userid='$userid'";
										$go=mysql_query($query);
										$response="The weapon has been repaired";
									} else 
									{
										$response="Sorry you do not have enough credits.";
									}
								} else
								{
										$response="You cannot repair over 100%.";
								}								
							}
							} else
							{
							$response="You do not have any of these weapons.";
							}
						} else {
							$response="There may be blank values.";
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