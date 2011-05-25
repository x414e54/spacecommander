<?php
require('./global.php');

session_start();
$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_fetch_array(mysql_query($query));
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
		$query="SELECT suspended FROM users WHERE userid='$userid'";
		$sus=mysql_fetch_array(mysql_query($query));
		$sus=$sus['suspended'];
			
		if ($sus=="1")
		{
			session_destroy();
			$response="Your account has been suspended and is pending investigation... you are immune.";
		} else
		{
////

if (!empty($_POST['extra3345345345234']))
{
			$query="SELECT gotspy FROM users WHERE userid='$userid'";
	 		$gotspy=mysql_fetch_array(mysql_query($query)) or die("error");
			$gotspy=$gotspy['gotspy'];

			if ($gotspy!="1")
			{
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];

				if (($credits - 6000000) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else
				{
					$credits= $credits - 6000000;
			 		$query="UPDATE users SET gotspy='1', credits='$credits' WHERE userid='$userid'";
					$go=mysql_query($query) or die("error");
	
					$response="Research Sucessful";
				}
			} else 
			{
				$response="You already have this research.";
			}
}

if (!empty($_POST['extra3345345345444423482222ccdd22222222880'])) 
{
			$query="SELECT gotspy FROM users WHERE userid='$userid'";
	 		$gothack=mysql_fetch_array(mysql_query($query)) or die("error");
			$gothack=$gothack['gothack'];
	
			if ($gothack!="1")
			{
			
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];
	
				if (($credits - 6000000) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else
				{
					$credits= $credits - 6000000;
			 		$query="UPDATE users SET gothack='1', credits='$credits' WHERE userid='$userid'";
					$go=mysql_query($query) or die("error");

					$response="Research Sucessful";
				}
			} else 
			{
				$response="You already have this research.";
			}
}

if (!empty($_POST['extra342234234234']))
{
			$query="SELECT gotclone FROM users WHERE userid='$userid'";
	 		$gotclone=mysql_fetch_array(mysql_query($query)) or die("error");
			$gotclone=$gotclone['gotclone '];

			if ($gotclone!="1")
			{
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];
	
				if (($credits - 6000000) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else
				{
					$credits= $credits - 6000000;
			 		$query="UPDATE users SET gotclone='1', credits='$credits' WHERE userid='$userid'";
					$go=mysql_query($query) or die("error");

					$response="Research Sucessful";
				}
			} else 
			{
				$response="You already have this research.";
			}
}

if (!empty($_POST['extra3345345345324234234234']))
{

			$query="SELECT gotattack FROM users WHERE userid='$userid'";
	 		$gotattack=mysql_fetch_array(mysql_query($query)) or die("error");
			$gotattack=$gotattack['gotattack'];

			if ($gotattack!="1")
			{
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];
	
				if (($credits - 6000000) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else
				{
					$credits= $credits - 6000000;
			 		$query="UPDATE users SET gotattack='1', credits='$credits' WHERE userid='$userid'";
					$go=mysql_query($query) or die("error");

					$response="Research Sucessful";
				}
			} else 
			{
				$response="You already have this research.";
			}
}

if (!empty($_POST['extra334534534532425666342342348880']))
{

			$query="SELECT gotdefense FROM users WHERE userid='$userid'";
	 		$gotdefense=mysql_fetch_array(mysql_query($query)) or die("error");
			$gotdefense=$gotdefense['gotdefense'];
	
			if ($gotdefense!="1")
			{
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];
	
				if (($credits - 6000000) < 0)
			 	{
					$response="Sorry but you do not have enough credits.";
				} else
				{
					$credits= $credits - 6000000;
			 		$query="UPDATE users SET gotdefense='1', credits='$credits' WHERE userid='$userid'";
					$go=mysql_query($query) or die("error");

					$response="Research Sucessful";
				}
			} else 
			{
				$response="You already have this research.";
			}
}

if (!empty($_POST['extra334534534532425666342342348222222222222880']))
{

			$query="SELECT gotbank FROM users WHERE userid='$userid'";
	 		$gotbank=mysql_fetch_array(mysql_query($query)) or die("error");
			$gotbank=$gotbank['gotbank'];

			if ($gotbank!="1")
			{
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];
	
				if (($credits - 6000000) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else
				{
					$credits= $credits - 6000000;
			 		$query="UPDATE users SET gotbank='1', credits='$credits' WHERE userid='$userid'";
					$go=mysql_query($query) or die("error");

					$response="Research Sucessful";
				}
			} else 
			{
				$response="You already have this research.";
			}
}


if (!empty($_POST['once342234234234']))
{
			$tester=mysql_fetch_array(mysql_query("SELECT gotunits, gotunitsless, gotcheapw, gotcheapwm, gotdouble FROM users WHERE userid='$userid'"));
			$gotcheapw=$tester['gotcheapw'];
			$gotcheapwm=$tester['gotcheapwm'];
			$gotunits=$tester['gotunits'];
			$gotunitsless=$tester['gotunitsless'];
			$gotdouble=$tester['gotdouble'];

			if ($gotunits!="1" & $gotunitsless!="1" & $gotcheapw!="1" & $gotcheapwm!="1" & gotdouble!="1")
			{
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];
			
				if (($credits - 300000) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else
				{
					$credits= $credits - 300000;
	 				$query="UPDATE users SET gotcheapw='1', credits='$credits' WHERE userid='$userid'";
					$go=mysql_query($query) or die("error");
	
					$response="Research Sucessful";
				}
			} else
			{
				$response="You have already used your one time bonus.";
			}
}

if (!empty($_POST['once3345345345234']))
{
			$tester=mysql_fetch_array(mysql_query("SELECT gotunits, gotunitsless, gotcheapw, gotcheapwm, gotdouble FROM users WHERE userid='$userid'"));
			$gotcheapw=$tester['gotcheapw'];
			$gotcheapwm=$tester['gotcheapwm'];
			$gotunits=$tester['gotunits'];
			$gotunitsless=$tester['gotunitsless'];
			$gotdouble=$tester['gotdouble'];

			if ($gotunits!="1" & $gotunitsless!="1" & $gotcheapw!="1" & $gotcheapwm!="1" & gotdouble!="1")
			{
			
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];
			
				if (($credits - 300000) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else
				{
					$credits= $credits - 300000;
			 		$query="UPDATE users SET gotunitsless='1', credits='$credits' WHERE userid='$userid'";
					$go=mysql_query($query) or die("error");
	
					$response="Research Sucessful";
				}
			} else
			{
				$response="You have already used your one time bonus.";
			}
}

if (!empty($_POST['once3345345345324234234234']))
{
			$tester=mysql_fetch_array(mysql_query("SELECT gotunits, gotunitsless, gotcheapw, gotcheapwm, gotdouble FROM users WHERE userid='$userid'"));
			$gotcheapw=$tester['gotcheapw'];
			$gotcheapwm=$tester['gotcheapwm'];
			$gotunits=$tester['gotunits'];
			$gotunitsless=$tester['gotunitsless'];
			$gotdouble=$tester['gotdouble'];

			if ($gotunits!="1" & $gotunitsless!="1" & $gotcheapw!="1" & $gotcheapwm!="1" & gotdouble!="1")
			{
					$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
					$credits=$credits['credits'];
	
				if (($credits - 300000) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else
				{
					$credits= $credits - 300000;
			 		$query="UPDATE users SET gotdouble='1', credits='$credits' WHERE userid='$userid'";
					$go=mysql_query($query) or die("error");
	
					$response="Research Sucessful";
				}
			} else
			{
				$response="You have already used your one time bonus.";
			}
}

if (!empty($_POST['once334534534532425666342342348880']))
{
			$tester=mysql_fetch_array(mysql_query("SELECT gotunits, gotunitsless, gotcheapw, gotcheapwm, gotdouble FROM users WHERE userid='$userid'"));
			$gotcheapw=$tester['gotcheapw'];
			$gotcheapwm=$tester['gotcheapwm'];
			$gotunits=$tester['gotunits'];
			$gotunitsless=$tester['gotunitsless'];
			$gotdouble=$tester['gotdouble'];

			if ($gotunits!="1" & $gotunitsless!="1" & $gotcheapw!="1" & $gotcheapwm!="1" & gotdouble!="1")
			{
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];

				if (($credits - 300000) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else
				{
					$credits= $credits - 300000;
					$units=mysql_fetch_array(mysql_query("SELECT units FROM users WHERE userid='$userid'"));
					$units=$units['units']+100;
			 		$query="UPDATE users SET gotunits='1', units='$units', credits='$credits' WHERE userid='$userid'";
					$go=mysql_query($query) or die("error");
	
					$response="Research Sucessful";
				}
			} else
			{
				$response="You have already used your one time bonus.";
			}
}

if (!empty($_POST['once334534534532425666342342348222222222222880']))
{
			$tester=mysql_fetch_array(mysql_query("SELECT gotunits, gotunitsless, gotcheapw, gotcheapwm, gotdouble FROM users WHERE userid='$userid'"));
			$gotcheapw=$tester['gotcheapw'];
			$gotcheapwm=$tester['gotcheapwm'];
			$gotunits=$tester['gotunits'];
			$gotunitsless=$tester['gotunitsless'];
			$gotdouble=$tester['gotdouble'];

			if ($gotunits!="1" & $gotunitsless!="1" & $gotcheapw!="1" & $gotcheapwm!="1" & gotdouble!="1")
			{
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];
	
				if (($credits - 300000) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else
		            {
					$credits= $credits - 300000;
			 		$query="UPDATE users SET gotcheapwm='1', credits='$credits' WHERE userid='$userid'";
					$go=mysql_query($query) or die("error");

					$response="Research Sucessful";
				}
			} else
			{
				$response="You have already used your one time bonus.";
			}
}

if (!empty($_POST['342234234234']))
{
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error");
			$userid=$userid['userid'];
			$orelevel=mysql_fetch_array(mysql_query("SELECT orelevel FROM users WHERE userid='$userid'"));
			$orelevel=$orelevel['orelevel'];

			if ($orelevel < 12)
			{
				$orelevelmoney=12000*pow(2, ($orelevel-1));;
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];

				if (($credits - $orelevelmoney) < 0)
				{
					$response="Sorry but you do not have enough credits.";	
				} else
				{
					$credits= $credits - $orelevelmoney;
					$orelevel++;
	
			 		$query="UPDATE users SET orelevel='$orelevel', credits='$credits' WHERE userid='$userid'";
			 		$orelevel=mysql_query($query) or die("error");

					$response="Research Sucessful";
				}
			} else
			{
				$response="You cannot upgrade this anymore.";
			}
}

if (!empty($_POST['334534534532425666342342348880']))
{
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error");
			$userid=$userid['userid'];
			$query="SELECT gotspy FROM users WHERE userid='$userid'";
	 		$gotspy=mysql_fetch_array(mysql_query($query)) or die("error");
			$gotspy=$gotspy['gotspy'];

			if ($gotspy=="1")
			{
				$spylevel=mysql_fetch_array(mysql_query("SELECT spylevel FROM users WHERE userid='$userid'"));
				$spylevel=$spylevel['spylevel'];
				$spylevelmoney=12000*pow(2, ($spylevel-1));;

				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];

				if (($credits - $spylevelmoney) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else
				{
					$credits= $credits - $spylevelmoney;
					$spylevel++;
	
			 		$query="UPDATE users SET spylevel='$spylevel', credits='$credits' WHERE userid='$userid'";
			 		$spylevel=mysql_query($query) or die("error");

					$response="Research Sucessful";
				}
			} else
			{
				$response="You do not have any covert abilites.";
			}
}

if (!empty($_POST['334534534532425666342342348880230923902ddad3']))
{
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error");
			$userid=$userid['userid'];
			$query="SELECT gothack FROM users WHERE userid='$userid'";
	 		$gothack=mysql_fetch_array(mysql_query($query)) or die("error");
			$gothack=$gothack['gothack'];

			if ($gothack=="1")
			{
				$hacklevel=mysql_fetch_array(mysql_query("SELECT hacklevel FROM users WHERE userid='$userid'"));
				$hacklevel=$hacklevel['hacklevel'];
				$hacklevelmoney=12000*pow(2, ($hacklevel-1));;
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];

				if (($credits - $hacklevelmoney) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else
				{
					$credits= $credits - $hacklevelmoney;
					$hacklevel++;

			 		$query="UPDATE users SET hacklevel='$hacklevel', credits='$credits' WHERE userid='$userid'";
		 			$hacklevel=mysql_query($query) or die("error");

					$response="Research Sucessful";
				}
			} else
			{
				$response="You do not have any covert abilites.";
			}
}
if (!empty($_POST['3345345345234']))
{
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error");
			$userid=$userid['userid'];
			$attacklevel=mysql_fetch_array(mysql_query("SELECT attacklevel FROM users WHERE userid='$userid'"));
			$attacklevel=$attacklevel['attacklevel'];

			if ($attacklevel<12)
			{
				$attacklevelmoney=40000*pow(2, ($attacklevel-1));
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];

				if (($credits - $attacklevelmoney) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else 
				{
					$credits= $credits - $attacklevelmoney;
					$attacklevel++;

			 		$query="UPDATE users SET attacklevel='$attacklevel', credits='$credits' WHERE userid='$userid'";
			 		$attacklevel=mysql_query($query) or die("error");

					$response="Research Sucessful";
				}
			} else
			{
				$response="You cannot upgrade this anymore.";
			}
}

if (!empty($_POST['3345345345324234234234']))
{
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error");
			$userid=$userid['userid'];
			$defenselevel=mysql_fetch_array(mysql_query("SELECT defenselevel FROM users WHERE userid='$userid'"));
			$defenselevel=$defenselevel['defenselevel'];

			if ($defenselevel<12)
			{
				$defenselevelmoney=40000*pow(2, ($defenselevel-1));
				$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
				$credits=$credits['credits'];
	
				if (($credits - $defenselevelmoney) < 0)
				{
					$response="Sorry but you do not have enough credits.";
				} else 
				{
					$credits= $credits - $defenselevelmoney;
					$defenselevel++;

			 		$query="UPDATE users SET defenselevel='$defenselevel', credits='$credits' WHERE userid='$userid'";
			 		$defenselevel=mysql_query($query) or die("error");

					$response="Research Sucessful";
				}
			} else
			{
				$response="You cannot upgrade this anymore.";
			}
}

/////////
		}
	}
} else {
	session_destroy();
	$response="Password incorrect";
}
	session_start();
	$_SESSION["message1"]=$response;
	$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
	session_register('message1');
	session_register('url');
	header("Location: reload.php");
	exit;
?>	
