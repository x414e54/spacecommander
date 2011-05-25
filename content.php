<?php
session_start();
require("./global.php");

if (empty($_SESSION['username']))
{
		if (isset($_GET['content']) || isset($content)) {
			if ($_GET['content'] == "" && $content=="" ) {
				include("./clans.php");
				include("./news.php");			
			} else {
				if (!isset($content)) {
					$content=$_GET['content'];
				}
				$content=$content . ".php";
					if (file_exists($content)) {
						if ($_GET['content']!="admin") {
							include($content);
						} else {
							include("./error404.php");
						}
					} else {
						include("./error404.php");
					}
			}
		} else {
			include("./clans.php");
			include("./news.php");			
			include("./terms.php");	
		}
} else {
$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_fetch_array(mysql_query($query)) or die(nouser());
$userid=$userid['userid'];
$password=mysql_fetch_array(mysql_query("SELECT password FROM users WHERE userid='$userid'"));
$password=$password['password'] or die(nouser());

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
		session_start();
		$_SESSION["username"]="";
		$_SESSION["password2"]="";
		$_SESSION["message1"]=$response;
		$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
		session_register('username');
		session_register('password2');
		session_register('message1');
		session_register('url');
		header("Location: reload.php");
		exit;
	} else
	{
		$query="SELECT suspended FROM users WHERE userid='$userid'";
		$sus=mysql_fetch_array(mysql_query($query));
		$sus=$sus['suspended'];
	
	if ($sus=="1")
	{
		session_destroy();
		$response="Your account has been suspended and is pending investigation... you are immune.";
		session_start();
		$_SESSION["username"]="";
		$_SESSION["password2"]="";
		$_SESSION["message1"]=$response;
		$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
		session_register('username');
		session_register('password2');
		session_register('message1');
		session_register('url');
		header("Location: reload.php");
		exit;	} else
	{
						$query="SELECT admin FROM users WHERE userid='$userid'";
						$admin=mysql_fetch_array(mysql_query($query)) or die(nouser());
						$admin=$admin['admin'];
						if (isset($_GET['content']) || isset($content)) {
							if ($_GET['content'] == "" && $content=="" ) {
								if ($admin!="1") {
								include("./main.php");
								} else {
								include("./admin.php");
								}
	  						} else {
								if (!isset($content)) {
									$content=$_GET['content'];
								}
								$content=$content . ".php";
								if (file_exists($content)) {
									if ($admin!="1") {
										if ($_GET['content']!="admin") {
											include($content);
										} else {
											include("./error404.php");
										}
									} else {
									if ($_GET['content']!="attack" & $_GET['content']!="intelligence" & $_GET['content']!="user" & $_GET['content']!="attacklog" & $_GET['content']!="spylog" & $_GET['content']!="armory") {
										include($content);
									} else {
										include("./admin.php");
									}
									}
   								} else {
										include("./error404.php");
								}
  							}
						} else {
								if ($admin!="1") {
								include("./main.php");
								} else {
								include("./admin.php");
								}
  						}
  					}
  				}
		} else
	{
		session_destroy();
		$response="Password incorrect";
		session_start();
		$_SESSION["username"]="";
		$_SESSION["password2"]="";
		$_SESSION["message1"]=$response;
		$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
		session_register('username');
		session_register('password2');
		session_register('message1');
		session_register('url');
		header("Location: reload.php");
		exit;
	}
}
