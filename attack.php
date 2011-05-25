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
							if (!empty($_POST['34534534523322']))
							{
								
									$username=$_SESSION["username"];
									$query="SELECT username, userid FROM users WHERE username='$username'";
	 								$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
									$userid=$userid['userid'];
									$userid2=$_POST['34534534523322'];
							
							if ($userid!=$userid2)
							{
									$user=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid'"));
									$units=$user['units'];
									$attackcredits=$user['attackcredits'];
									$gotattack=$user['gotattack'];
									$isbank=$user['isbank'];

									$user2=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid2'"));									
									$units2=$user2['units'];
									$immunity=$user2['immunity'];
									$admin=$user2['admin'];
									$isbank2=$user2['isbank'];
									$rank=$user2['rank'];
		
							if ($immunity=="1" || $admin=="1" || $rank=="0")
							{
										$response="Sorry attack failed becuase this user is currently immune.";
							} else
							{
										$attacks=mysql_query("SELECT time FROM attacklog WHERE userid='$userid' AND userid2='$userid2' AND outgoing='1' AND time >= DATE_SUB( NOW(), INTERVAL 1 DAY )");
										$attacks=mysql_num_rows($attacks);
						
							if ($attacks > 14 && $isbank!=1)
							{
								$response="Sorry you can only attack a user 15 times in 24 hours";
							} else
							{
										if ($units > 0)
											{
											
												if (($attackcredits - 1) < 0)
												{
															$response="Sorry the attack failed becuase you do not have enough attack credits!";
												} else	
											{	
												
										$attacklevel=$user['attacklevel'];
										$defenselevel=$user2['defenselevel'];
						
										$attacks=$user;
										$unitstotal=$units;
										$defenses=$user2;
										$unitstotal2=$units2;

										require("./weapons.php");
	
										
										// Remove weapon 8 becuase it might not be needed
										$attackstotal=$attackstotal-($attarray[7]['power']*5*($attarray[7]['health']/100));
										$defensestotal=$defensestotal-($defarray[7]['power']*5*($defarray[7]['health']/100));
										
										// As weapons have been used degrade them by 1%;
										for($i = 0; $i < $attalength-1; $i++)
										{
											$newhl = $attarray[$i]['health'] - $attarray[$i]['amount'];
											if ( $newhl < 0 ) { $newhl = 0; }
											if ($isbank==1) {
												$newhl=$attarray[$i]['health'];
											}
											$attarray[$i]['health'] = $newhl;
										}
										
										for($i = 0; $i < $defalength-1; $i++)
										{
											$newhl=$defarray[$i]['health']-$defarray[$i]['amount'];
											if ($newhl<0) { $newhl=0; }
											if ($isbank==1 && $isbank2!=1) {
												$newhl=0;
											}
											if ($isbank2==1) {
												$newhl=$defarray[$i]['health'];
											}
											$defarray[$i]['health']=$newhl;
										}

										$userdamage=round(($attackstotal)*pow(1.25, $attacklevel));
										$userdefense=round(($defensestotal)*pow(1.25, $defenselevel));
			
										if ($user['gotattack']=="1")
										{
													$userdamage=round($userdamage*1.50);
										}
				
										if ($user2['gotdefense']=="1")
										{
													$userdefense=round($userdefense*1.50);
										}
										
										if ($userdamage-$userdefense<0 && $attarray[$attalength-1]['amount'] > 0 )
										{
												$attackstotal=$attackstotal+($attarray[7]['power']*5*($attarray[$attalength-1]['health']/100));
												$userdamage=round(($attackstotal)*pow(1.25, $attacklevel));
										
												if ($user['gotattack']=="1")
												{
														$userdamage=round($userdamage*1.50);
												}
														$attarray[7]['health']=0;
										} 
												
										if ($userdamage-$userdefense>0 && $defarray[$defalength]['amount'] > 0)
										{
												$defensestotal=$defensestotal+($defarray[7]['power']*5*($defarray[$defalength-1]['health']/100));
												$userdefense=round(($defensestotal)*pow(1.25, $defenselevel));
											
												if ($user2['gotdefense']=="1")
												{
														$userdefense=round($userdefense*1.50);
												}
														$defarray[7]['health']=0;
										}
																
										$attackdamage=($userdamage - $userdefense);
										
										$buildquery = "";
										for($i = 0; $i < $attalength; $i++)
										{
											$buildquery = $buildquery . "hlattack";
											$buildquery = $buildquery . ($i + 1) . "='";
											$buildquery = $buildquery . $attarray[$i]['health'] . "'";
											if ($i != $attalength - 1) { $buildquery = $buildquery . ", ";}
										}
										
										$query="UPDATE users SET " . $buildquery . " WHERE userid='$userid'";
										$go=mysql_query($query) or die("errorattackhealth");
										
										$buildquery = "";
										for($i = 0; $i < $defalength; $i++)
										{
											$buildquery = $buildquery . "hldefense";
											$buildquery = $buildquery . ($i + 1) . "='";
											$buildquery = $buildquery . $defarray[$i]['health'] . "'";
											if ($i != $defalength -1) { $buildquery = $buildquery . ", ";}
										}
										
										$query="UPDATE users SET " . $buildquery . " WHERE userid='$userid2'";
										$go=mysql_query($query) or die("errordefensehealth" . $query);
										
										$credits=$user['credits'];
										$credits2=$user2['credits'];
																		
											$attackcredits=$attackcredits - 1;
	 										$query="UPDATE users SET attackcredits='$attackcredits' WHERE userid='$userid'";
	 										$attack=mysql_query($query) or die("error1");
	 										// Loose		
											if ($attackdamage < 0)
											{
												
													$attackdamagepos=sqrt($attackdamage * $attackdamage);
													$attackdamageunits = round(($units*0.01));
				
													if (($units - $attackdamageunits) <= 0)
													{
														
														$attacklogunits=$units;
														$units="0";
													} else
													{
														$units = $units - $attackdamageunits;
														$attacklogunits=$attackdamageunits;
													}
	 												
	 												$query="UPDATE users SET units='$units' WHERE userid='$userid'";
	 												$attack=mysql_query($query) or die("error2");
													$time=date("Y/m/d G:i:s");
													
													$query="INSERT INTO attacklog SET time='$time', userid2='$userid', credits='0', units='$attacklogunits', userid='$userid2', attackdamage='$userdamage', defensedamage='$userdefense', win='1', outgoing='0'";
	 												$attack=mysql_query($query) or die("error3");
	 												
													$query="INSERT INTO attacklog SET time='$time', userid2='$userid2', credits='0', units='$attacklogunits', userid='$userid', attackdamage='$userdamage', defensedamage='$userdefense', win='0', outgoing='1'";
	 												$attack=mysql_query($query) or die("error34");
	 												
													$query="SELECT attackid FROM attacklog WHERE time='$time' AND userid='$userid' AND userid2='$userid2'";
	 												$attackid=mysql_fetch_array(mysql_query($query)) or die("error345");
	 												
													$attackid=$attackid['attackid'];
													Header("Location: index.php?content=attackreport&attackid=$attackid");
													exit;													
											}
											
											// Draw
											if ($attackdamage == 0)
											{
													$time=date("Y/m/d G:i:s");
													
													$query="INSERT INTO attacklog SET time='$time', userid2='$userid', credits='0', units='0', userid='$userid2', attackdamage='$userdamage', defensedamage='$userdefense', win='0', outgoing='0'";
	 												$attack=mysql_query($query) or die("error3");
	 												
													$query="INSERT INTO attacklog SET time='$time', userid2='$userid2', credits='0', units='0', userid='$userid', attackdamage='$userdamage', defensedamage='$userdefense', win='0', outgoing='1'";
	 												$attack=mysql_query($query) or die("error34");
	 												
													$query="SELECT attackid FROM attacklog WHERE time='$time' AND userid='$userid' AND userid2='$userid2'";
	 												$attackid=mysql_fetch_array(mysql_query($query)) or die("error345");
	 												
													$attackid=$attackid['attackid'];
													Header("Location: index.php?content=attackreport&attackid=$attackid");
													exit;
											}
											
											// Win
											if ($attackdamage > 0)
											{
													$creditbias=(($units2*($units2/100))/($units*($units/100)));
													$attackdamageunits2 = round(($units2*0.01));
													$attackdamagecredits2 = round(($credits2*0.90) * $creditbias);
													if ($isbank==1 && $isbank2!=1) { $attackdamagecredits2=$credits; }
													if ($isbank==1 && $isbank2!=1) { $attackdamageunits2=$units2; }
													if (($credits2 - $attackdamagecredits2) < 0)
													{
																$credits=$credits + $credits2;
																$attacklogcredits2=$credits2;
																$credits2="0";
													} else
													{
																$credits2 = $credits2 - $attackdamagecredits2;
																$credits=$credits + $attackdamagecredits2;
																$attacklogcredits2=$attackdamagecredits2;
													}
													
													if (($units2 - $attackdamageunits2) < 0)
													{
																$attacklogunits2=$units2;
																$units2="0";
													} else
													{
																$units2 = $units2 - $attackdamageunits2;
																$attacklogunits2=$attackdamageunits2;
													}
													
													$query="UPDATE users SET units='$units2', credits='$credits2' WHERE userid='$userid2'";
	 												$attack=mysql_query($query) or die("error3");
	 												
	 												$query="UPDATE users SET credits='$credits' WHERE userid='$userid'";
	 												$attack=mysql_query($query) or die("error2");
	 												
													$time=date("Y/m/d G:i:s");
													
													$query="INSERT INTO attacklog SET time='$time', userid2='$userid', credits='$attacklogcredits2', units='$attacklogunits2', attackdamage='$userdamage', defensedamage='$userdefense', userid='$userid2', win='0', outgoing='0'";
	 												$attack=mysql_query($query) or die("error3");
	 												
													$query="INSERT INTO attacklog SET time='$time', userid2='$userid2', credits='$attacklogcredits2', units='$attacklogunits2', attackdamage='$userdamage', defensedamage='$userdefense', userid='$userid', win='1', outgoing='1'";
	 												$attack=mysql_query($query) or die("error34");
	 											
													$query="SELECT attackid FROM attacklog WHERE time='$time' AND userid='$userid' AND userid2='$userid2'";
	 												$attackid=mysql_fetch_array(mysql_query($query)) or die("error345");
	 												
													$attackid=$attackid['attackid'];
													Header("Location: index.php?content=attackreport&attackid=$attackid");
													exit;
											}
										}
									} else {
												$response="Sorry attack failed becuase you do not have any units.";
											}
			}
			}
			} else {
				$response="You cannot attack yourself!";
			}
} else {
				$response="There were blank values!";
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
