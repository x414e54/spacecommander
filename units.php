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

if (!empty($_POST['4589999999999778999945']))
{
			$username=$_SESSION["username"];
			$query="SELECT userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error");
			$userid=$userid['userid'];
	
	 		$spies=round($_POST['4589999999999778999945']);

			$query="SELECT gotspy FROM users WHERE userid='$userid'";
	 		$gotspy=mysql_fetch_array(mysql_query($query)) or die("error");
			$gotspy=$gotspy['gotspy'];

			if ($gotspy=="1")
			{
				if ($spies < 0) {
					$response="Sorry but you cannot do this.";
				} else
				{
					$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
					$credits=$credits['credits'];
	
					if ($credits - ($spies*20000) < 0)
					{
						$response="Sorry but you do not have enough credits.";
					} else
					{
						$credits=$credits - ($spies * 20000);
						$oldspies=mysql_fetch_array(mysql_query("SELECT spies FROM users WHERE userid='$userid'"));
						$spies=$oldspies['spies'] + $spies;
				 		$query="UPDATE users SET spies='$spies', credits='$credits' WHERE userid='$userid'";
				 		$units=mysql_query($query) or die("error");

						$response="Spies have been sucessfully bought.";
					}
				}
			} else {
					$response="Sorry but you do not have covert abilites.";
			}
}	



if (!empty($_POST['4589999999999778999945111dd23z']))
{
			$username=$_SESSION["username"];
			$query="SELECT userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error");
			$userid=$userid['userid'];

	 		$hackers=round($_POST['4589999999999778999945111dd23z']);

			$query="SELECT gothack FROM users WHERE userid='$userid'";
	 		$gothack=mysql_fetch_array(mysql_query($query)) or die("error");
			$gothack=$gothack['gothack'];

			if ($gothack=="1")
			{
				if ($hackers < 0)
				{
					$response="Sorry but you cannot do this.";
				} else
				{
					$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
					$credits=$credits['credits'];

					if ($credits - ($hackers*20000) < 0) {
						$response="Sorry but you do not have enough credits.";
					} else
					{
						$credits=$credits - ($hackers * 20000);
						$oldhackers=mysql_fetch_array(mysql_query("SELECT hackers FROM users WHERE userid='$userid'"));
						$hackers=$oldhackers['hackers'] + $hackers;
				 		$query="UPDATE users SET hackers='$hackers', credits='$credits' WHERE userid='$userid'";
				 		$units=mysql_query($query) or die("error");

						$response="Hackers have been sucessfully bought.";
					}
				}
			} else {
					$response="Sorry but you do not have hacking abilites.";
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