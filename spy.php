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
if (!empty($_POST['3453453455555555523322']))
{
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			$userid2=$_POST['3453453455555555523322'];

			if ($userid!=$userid2)
			{

			$time=date("Y/m/d G:i:s");

			$user=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid'"));
			$spies=$user['spies'];
			$spylevel=$user['spylevel'];
			$credits=$user['credits'];
			$gotspy=$user['gotspy'];

			$user2=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid2'"));
			$spylevel2=$user2['spylevel'];
			$units2=$user2['units'];
			$credits2=$user2['credits'];
			$gotspy2=$user2['gotspy'];
			$immunity=$user2['immunity'];
			$spies2=$spies2['spies'];

			if ($gotspy=="0")
			{
				$response="Sorry you do not have any spy abilities";
			} else
			{

			if ($immunity=="1")
			{
				$response="Sorry but that user has been made immune";
			} else
			{

				$userdamage=round(($spies)*pow(1.25, $spylevel));
				$userdefense=round(($spies2)*pow(1.25, $spylevel2));

			if ($gotspy=="1")
			{
				$userdamage=round($userdamage*1.50);
			}

			$covertbias="1";
			$canseename="0";

			if ($gotspy2=="1")
			{
				$userdefense=round($userdefense*1.50);
				$canseename="1";
			}

			if ($gotspy2=="0")
			{
				$userdefense=0;
			}

			$attackdamage=($userdamage-$userdefense);
			if ($spies > 0)
			{
				if ($attackdamage < 0)
				{
					$spyaction="None... spies were killed.";
					$stats="Stats report failed.";

					$time=date("Y/m/d G:i:s");

					$query="INSERT INTO spylog SET time='$time', userid2='$userid', userid='$userid2', action='$spyaction', stats='none', canseename='$canseename', incoming='1'";
			 		$attack=mysql_query($query) or die("error31");

					$query="UPDATE users SET spied='1' WHERE userid='$userid2'";
			 		$attack=mysql_query($query) or die("error32");

					$query="INSERT INTO spylog SET time='$time', userid2='$userid2', userid='$userid', action='$spyaction', stats='$stats', canseename='$canseename', incoming='0'";
			 		$attack=mysql_query($query) or die("error34");

					Header("Location: index.php?content=spyreport&fail=true");
					exit;
				}
		
				if ($attackdamage == 0)
				{
					$spyaction="None... draw.";
					$stats="Stats report failed.";
			
					$time=date("Y/m/d G:i:s");
	
					$query="INSERT INTO spylog SET time='$time', userid2='$userid', userid='$userid2', action='$spyaction', stats='none', canseename='$canseename', incoming='1'";
			 		$attack=mysql_query($query) or die("error31");

					$query="UPDATE users SET spied='1' WHERE userid='$userid2'";
			 		$attack=mysql_query($query) or die("error32");

					$query="INSERT INTO spylog SET time='$time', userid2='$userid2', userid='$userid', action='$spyaction', stats='$stats', canseename='$canseename', incoming='0'";
			 		$attack=mysql_query($query) or die("error34");

					Header("Location: index.php?content=spyreport&fail=true");
					exit;
				}

				if ($attackdamage > 0)
				{
	
					$gotattack=$user2['gotattack'];
					$gotdefense=$user2['gotdefense'];
					$attacklevel2=$user2['attacklevel'];
					$defenselevel2=$user2['defenselevel'];

					$attacks=$user2;
					$unitstotal=$units2;
					$defenses=$user2;
					$unitstotal2=$units2;

					require("./weapons.php");

					$userdamage2=round(($attackstotal)*pow(1.25, $attacklevel2));
					$userdefense2=round(($defensestotal)*pow(1.25, $defenselevel2));
					
					if ($gotattack=="1")
					{
						$userdamage2=round($userdamage2*1.50);
					}

					if ($gotdefense=="1")
					{
						$userdefense2=round($userdefense2*1.50);
					}

					$spys=mysql_query("SELECT time FROM spylog WHERE userid='$userid' AND userid2='$userid2' AND incoming='0' AND action !='None... spies were killed.'  AND action !='None spy/hack attack limit reached recon only.'  AND action !='None... hackers were descovered.'  AND action !='None hack/spy attack limit reached recon only.' AND time >= DATE_SUB( NOW(), INTERVAL 1 DAY )");
					$spys=mysql_num_rows($spys);

					if ($spys < 5)
					{
		
						if (($defensestotal-$units2)<0&&($attackstotal-$units2)<0)
						{
							$spyrandom = rand(1,3); 
						} else
						{
							$spyrandom = rand(1,4); 
						}

						$p=0;
				
						if($spyrandom=="4")
						{
							while ($p!="6")
							{
								$spyrandomer = rand(1,14);
					
								if (($defensestotal-$units2)<0)
								{
									$spyrandomer = rand(8,14);
								}
		
								if (($attackstotal-$units2)<0)
								{
									$spyrandomer = rand(1,7);
								}
			
								if ($spyrandomer<8)
								{
									$wea="hldefense" . $spyrandomer;
									$wea2="defense" . $spyrandomer;
									$wea3="hldefense" . $spyrandomer;
			
									$pooer=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid2'")) or die("error3");
									$poo=$pooer[$wea2];
									$poo2=$pooer[$wea]-($pooer[$wea]/$poo);

									if ($poo>0)
									{
										$defwep=array(1 => "Riot Shield", "Riot Armor", "T10k Protective Armor", "T40k Protective Suit", "Proton Shield", "Proton Armor", "Temporal Shield");
										$nameerrr=$defwep[$spyrandomer];
	
										$query="UPDATE users SET " . $wea3 . "='$poo2'  WHERE userid='$userid2'";
								 		$attack=mysql_query($query) or die("error3");
										$attacks="";
										$defenses="";
										$spyaction="Your weapons have been saboutaged... " . $nameerrr; 
										$spyaction1="Their weapons have been saboutaged...  " . $nameerrr; 
										$spyrandom="0";
										$p=6;
									}
								} else
								{
									$spyrandomer=$spyrandomer-7;
	
									$wea="hlattack" . $spyrandomer;
									$wea2="attack" . $spyrandomer;
									$wea3="hlattack" . $spyrandomer;
	
									$pooer=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid2'")) or die("error3");
									$poo=$pooer[$wea2];
									$poo2=$pooer[$wea]-($pooer[$wea]/$poo);

									if ($poo>0)
									{	
										$attwep=array(1 => "Metal Fists", "Laser Sabre", "Laser", "RPG's", "Rail Gun", "Laser Cannon","Temporal Cannon");
										$nameerrr=$attwep[$spyrandomer];

										$query="UPDATE users SET " . $wea3 . "='$poo2' WHERE userid='$userid2'";
								 		$attack=mysql_query($query) or die("error3");
										$attacks="";
										$defenses="";
										$spyaction="Your weapons have been saboutaged... " . $nameerrr; 
										$spyaction1="Their weapons have been saboutaged... " . $nameerrr; 
										$spyrandom="0";
										$p=6;
									}
								}
							}




						}

						if($spyrandom=="1")
						{
							$unitpoison=round($units2*0.1);
							$units2=$units2-$unitpoison;
	
							$spyaction="Your army has been covertly poisoned... you have lost " . $unitpoison . "units"; 
							$spyaction1="Their army has been covertly poisoned... they have lost " . $unitpoison . "units"; 

							$query="UPDATE users SET units='$units2' WHERE userid='$userid2'";
					 		$attack=mysql_query($query) or die("error3");
						}
			
						if($spyrandom=="2")
						{
							$cashstolen=round($credits2*0.01);
							$credits2=$credits2-$cashstolen;
							$credits=$credits+$cashstolen;
	
							$spyaction="They have stolen some of your credits... you have lost " . $cashstolen . "credits"; 
							$spyaction1="You have stolen some of their credits... they have lost " . $cashstolen . "credits"; 
	
							$query="UPDATE users SET credits='$credits2' WHERE userid='$userid2'";
					 		$attack=mysql_query($query) or die("error1");

							$query="UPDATE users SET credits='$credits' WHERE userid='$userid'";
					 		$attack=mysql_query($query) or die("error2");
						}
						if($spyrandom=="3")
						{
							$spyaction="None, too risky."; 
							$spyaction1="None, too risky."; 
						}
					} else
					{
						$spyaction="None spy/hack attack limit reached recon only."; 
						$spyaction1="None spy/hack attack limit reached recon only."; 
					}
						$time=date("Y/m/d G:i:s");

						require("./spyextra.php");

						$stats="They have...an effective attack of " . number_format($userdamage2) . " and an effective defense of " . number_format($userdefense2) . $spyextra;
						$query="UPDATE users SET infiltrated='1' WHERE userid='$userid2'";
				 		$attack=mysql_query($query) or die("error34");
	
						$query="INSERT INTO spylog SET time='$time', userid2='$userid', userid='$userid2', action='$spyaction', stats='none', canseename='$canseename', incoming='1'";
				 		$attack=mysql_query($query) or die("error31");

						$query="INSERT INTO spylog SET time='$time', userid2='$userid2', userid='$userid', action='$spyaction1', stats='$stats', canseename='$canseename', incoming='0'";
				 		$attack=mysql_query($query) or die("error349");

						$query="SELECT spyid FROM spylog WHERE time='$time' AND userid2='$userid2' AND userid='$userid'";
	 					$spyid=mysql_fetch_array(mysql_query($query)) or die("error34");
						$spyid=$spyid['spyid'];
		
						Header("Location: index.php?content=spyreport&spyid=$spyid");
						exit;
			}
		} else 
		{
				$response="I'm sorry but you do not have any spies";
		}
	}
 }
} else 
{
	$response="You cannot attack your self!";
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

