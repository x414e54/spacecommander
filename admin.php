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
			session_start();
			$_SESSION["message1"]=$response;
			$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
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
				$_SESSION["message1"]=$response;
				$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
				session_register('message1');
				session_register('url');
				header("Location: reload.php");
				exit;
		} else
		{
////
if (!empty($_POST['29384092384234234'])) {
	if ($_POST['29384092384234234']=="ADMIN") {
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			$moderator=mysql_fetch_array(mysql_query("SELECT moderator FROM users WHERE userid='$userid'"));
			$moderator=$moderator['moderator'];
			$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
			$admin=$admin['admin'];
			if ($admin=="1") {
			$userid2=$_POST['34234234234234444444432'];
			$moderator2=mysql_fetch_array(mysql_query("SELECT moderator FROM users WHERE userid='$userid2'"));
			$moderator2=$moderator2['moderator'];
			$admin2=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid2'"));
			$admin2=$admin2['admin'];
			if ($admin!="1" && ($moderator2=="1" & $admin2=="1")) {
			} else {
			$updatecredits=$_POST['2342344442334233334cred'];
			$updateunits=$_POST['2342343321213234un'];
			$updatecredlevel=$_POST['234234234cred'];
			$updateattack=$_POST['22342344444att'];
			$updatedefense=$_POST['223423333344444def'];
			$updateattackcredits=$_POST['2234233333443334attcred'];
			$attacks1=$_POST['233213123123123attack1'];
			$attacks2=$_POST['233213123123123attack2'];
			$attacks3=$_POST['233213123123123attack3'];
			$attacks4=$_POST['233213123123123attack4'];
			$attacks5=$_POST['233213123123123attack5'];
			$attacks6=$_POST['233213123123123attack6'];
			$attacks7=$_POST['233213123123123attack7'];
			$attacks8=$_POST['233213123123123attack8'];
			$defenses1=$_POST['233213123123123defense1'];
			$defenses2=$_POST['233213123123123defense2'];
			$defenses3=$_POST['233213123123123defense3'];
			$defenses4=$_POST['233213123123123defense4'];
			$defenses5=$_POST['233213123123123defense5'];
			$defenses6=$_POST['233213123123123defense6'];
			$defenses7=$_POST['233213123123123defense7'];
			$defenses8=$_POST['233213123123123defense8'];
			if ($_POST['9231230344324']=="ON") {
				$immune="1";
			} else {
				$immune="0";
			}
			if ($_POST['923331231230344324']=="ON") {
				$suspended="1";
				$immune="1";
			} else {
				$suspended="0";
			}
			$query="UPDATE users SET credits='$updatecredits', suspended='$suspended', attackcredits='$updateattackcredits', immunity='$immune', defenselevel='$updatedefense', attacklevel='$updateattack', orelevel='$updatecredlevel', units='$updateunits', defense1='$defenses1', defense2='$defenses2', defense3='$defenses3', defense4='$defenses4', defense5='$defenses5', defense6='$defenses6', defense7='$defenses7', attack1='$attacks1', attack2='$attacks2', attack3='$attacks3', attack4='$attacks4', attack5='$attacks5', attack6='$attacks6', attack7='$attacks7', suicidepoints='$updatesuicide' WHERE userid='$userid2'";
	 		$update=mysql_query($query) or die("error3334");
			$response="User sucessfully updated";
			session_start();
			$_SESSION["message1"]=$response;
			$_SESSION["url"]="./index.php";
			session_register('message1');
			session_register('url');
			header("Location: reload.php");
			exit;
			}
			}
	} else if ($_POST['29384092384234234']=="MODER") {
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			$moderator=mysql_fetch_array(mysql_query("SELECT moderator FROM users WHERE userid='$userid'"));
			$moderator=$moderator['moderator'];
			$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
			$admin=$admin['admin'];
			if ($moderator=="1" || $admin=="1") {
			$userid2=$_POST['34234234234234444444432'];
			$moderator2=mysql_fetch_array(mysql_query("SELECT moderator FROM users WHERE userid='$userid2'"));
			$moderator2=$moderator2['moderator'];
			$admin2=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid2'"));
			$admin2=$admin2['admin'];
			if ($admin!="1" && ($moderator2=="1" & $admin2=="1")) {
			} else {
			if ($_POST['9231230344324']=="ON") {
				$immune="1";
			} else {
				$immune="0";
			}
			if ($_POST['923331231230344324']=="ON") {
				$suspended="1";
				$immune="1";
			} else {
				$suspended="0";
			}
			$query="UPDATE users SET immunity='$immune', suspended='$suspended' WHERE userid='$userid2'";
	 		$update=mysql_query($query) or die("error3334");
			$response="User sucessfully updated";	
			session_start();
			$_SESSION["message1"]=$response;
			$_SESSION["url"]="./index.php";
			session_register('message1');
			session_register('url');
			header("Location: reload.php");
			exit;
			}
			}
	} else if ($_POST['29384092384234234']=="ADDBANK") {
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
			$admin=$admin['admin'];
			if ($admin=="1") {
				$newuser=$_POST['34234244444411112334534534555514'];
				$passwordbank=md5($_POST['3423424444441asdasd4534555514']);
				$email=$_POST['3423424444441asdasd11asd4534555514'];
				$swiss=$_POST['asdasdasdasd334'];
				$accessed="1";

				$query="SELECT username, email FROM users WHERE username='$newuser' OR email='$email'
          				  UNION
					  SELECT username, email FROM pending WHERE username='$newuser' OR email='$email'
					  UNION 
					  SELECT username, email FROM banned WHERE username='$newuser' OR email='$email'";

				$query=mysql_query($query);
				$check1=mysql_fetch_array($query);

				if(!empty($check1))
				{
					$accessed="0";
				}
			
				// If acceessed is still one then the user account is valid
				if ($accessed=="1")
				{
			if ($swiss>=1) {
				$query="INSERT INTO users SET username='$newuser', password='$passwordbank', email='$email', race='-1', units='5000', credits='10000000', orelevel='10', defenselevel='10', attacklevel='10', rank='-2', attack7='200', defense7='200', hlattack7='20000', hldefense7='20000', spylevel='24', spies='100', gotspy='1', gotclone='1', gotattack='1', gotdefense='1', gotbank='1', gothack='1', hackers='100', hacklevel='24', gotcheapw='1', gotcheapwm='1', gotunits='1', gotunitsless='1', gotdouble='1', isbank='1', planet='1'";
				$go=mysql_query($query);
				$name=mysql_fetch_array(mysql_query("SELECT userid FROM users WHERE username='$newuser'"));
				$name=$name['userid'];
				$query="INSERT INTO banks SET userid='$name', maxborrow='0', maxdebt='0', interest='0', anonymous='1'";
				$go=mysql_query($query);
			} else {
				$query="INSERT INTO users SET username='$newuser', password='$passwordbank', email='$email', race='-1', units='5000', credits='100000000000', orelevel='10', defenselevel='10', attacklevel='10', rank='-2', attack7='200', defense7='200', hlattack7='20000', hldefense7='20000', spylevel='24', spies='100', gotspy='1', gotclone='1', gotattack='1', gotdefense='1', gotbank='1', gothack='1', hackers='100', hacklevel='24', gotcheapw='1', gotcheapwm='1', gotunits='1', gotunitsless='1', gotdouble='1', isbank='1', planet='1'";
				$go=mysql_query($query);
				$name=mysql_fetch_array(mysql_query("SELECT userid FROM users WHERE username='$newuser'"));
				$name=$name['userid'];
				$query="INSERT INTO banks SET userid='$name', maxborrow='1000000', maxdebt='1000000', interest='200', anonymous='0'";
				$go=mysql_query($query);
			}
			$response="New bank created, please log in and change default settings.";
			} else {
				$response="Sorry that usename or e-mail is in use";
			}
			session_start();
			$_SESSION["message1"]=$response;
			$_SESSION["url"]="./index.php";
			session_register('message1');
			session_register('url');
			header("Location: reload.php");
			exit;
			}
	} else if ($_POST['29384092384234234']=="MODERATOR") {
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
			$admin=$admin['admin'];
			if ($admin=="1") {
			if ($_POST['92312303622244324']=="ON") {
				$moderator="1";
			} else {
				$moderator="0";
			}
			$userid2=$_POST['342342444444111123345345345555333333314'];
			$query="UPDATE users SET moderator='$moderator' WHERE userid='$userid2'";
	 		$moderator=mysql_query($query) or die("error3334");
			$response="User sucessfully updated"; 
			session_start();
			$_SESSION["message1"]=$response;
			$_SESSION["url"]="./index.php";
			session_register('message1');
			session_register('url');
			header("Location: reload.php");
			exit;
			}
	} else if ($_POST['29384092384234234']=="BOOST") {
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			$moderator=mysql_fetch_array(mysql_query("SELECT moderator FROM users WHERE userid='$userid'"));
			$moderator=$moderator['moderator'];
			$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
			$admin=$admin['admin'];
			if ($moderator=="1" || $admin=="1") {
			$credsierers=$_POST['23423423ddddfw4cred'];
			$query="SELECT userid, credits FROM users ORDER BY units DESC, credits DESC";
			$users = mysql_query($query) or die("Select Failed!");
			while ($user = mysql_fetch_array($users)) {
			$userid=$user['userid'];
			$credits=$user['credits'] + $credsierers;			
	 		$query="UPDATE users SET credits='$credits' WHERE userid='$userid'";
	 		$boost=mysql_query($query) or die("error");
			$response="Boost has been successful";
			session_start();
			$_SESSION["message1"]=$response;
			$_SESSION["url"]="./index.php";
			session_register('message1');
			session_register('url');
			header("Location: reload.php");
			exit;
			}			
			}
	} else if ($_POST['29384092384234234']=="ADMINSU") {
			$username=$_SESSION["username"];
			$password=$_SESSION["password2"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
			$admin=$admin['admin'];
			if ($admin=="1") {
			$useridsu=$_POST['342342444444111123455514'];
			$query="SELECT username, password FROM users WHERE userid='$useridsu'";
	 		$usernamesu=mysql_fetch_array(mysql_query($query)) or die("error212");
			$passwordsu=$usernamesu['password'];
			$usernamesu=$usernamesu['username'];
			session_destroy();
			session_start();
			$_SESSION["username"]=$usernamesu;
			$_SESSION["password2"]=$passwordsu;
			$_SESSION["oldusername"]=$username;
			$_SESSION["oldpassword"]=$password;
			session_register('username');
			session_register('password2');
			session_register('oldusername');
			session_register('oldpassword');
			$response="Please wait while you are logged in to this account.";
			session_start();
			$_SESSION["message1"]=$response;
			$_SESSION["url"]="./index.php";
			session_register('message1');
			session_register('url');
			header("Location: reload.php");
			exit;
			}
	} else if ($_POST['29384092384234234']=="ANNOUNCEMENT") {
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			$moderator=mysql_fetch_array(mysql_query("SELECT moderator FROM users WHERE userid='$userid'"));
			$moderator=$moderator['moderator'];
			$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
			$admin=$admin['admin'];
			if ($moderator=="1" || $admin=="1") {
			$content=addslashes($_POST['233453242342444444444411111111134']);
			$time=date("Y/m/d G:i:s");
	 		$query="INSERT INTO gameannounce SET time='$time', content='$content'";
	 		$boost=mysql_query($query) or die("error");
			$response="Announcement has been added."; 
			session_start();
			$_SESSION["message1"]=$response;
			$_SESSION["url"]="./index.php";
			session_register('message1');
			session_register('url');
			header("Location: reload.php");
			exit;
			}			
	} else if ($_POST['29384092384234234']=="PAUSE") {
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
			$admin=$admin['admin'];
			if ($admin=="1") {
			$paused=mysql_fetch_array(mysql_query("SELECT paused FROM admin WHERE admin_id='0001'"));
			$paused=$paused['paused'];
                        if ($paused=="1") {
			$query="UPDATE admin SET paused='0' WHERE admin_id='0001'";
			$update=mysql_query($query) or die("error331134322");
			} else {
			$query="UPDATE admin SET paused='1' WHERE admin_id='0001'";
			$update=mysql_query($query) or die("error331134322");
			}
			$response="Game has been paused."; 
			session_start();
			$_SESSION["message1"]=$response;
			$_SESSION["url"]="./index.php";
			session_register('message1');
			session_register('url');
			header("Location: reload.php");
			exit;
			}			
	} else if ($_POST['29384092384234234']=="HARDRESET") {
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			$admin=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid'"));
			$admin=$admin['admin'];
			$i=0;
			if ($admin=="1") {
	 		$query="DELETE FROM users WHERE admin!='1'";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM accountlog";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM bankaccounts";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM accountlogin";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM planets";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM banks";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM outbound";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM inbound";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM transfers";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM sorder";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM register";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM pending";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM loanlog";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="INSERT INTO `users` VALUES ('', 'Galactic Bank', '712d0bf98bfdc3fc1ef38dfcc34b0f8c', 'bank@commander.anthonybills.com', 0, 0, 0, 1, -1, 0, 13, 13, 13, 1e+17, 100000, 1000, 0, -2, 0, 0, 0, 0, 0, 0, 1000, 0, 0, 0, 0, 0, 0, 1000, 24, 1000, 0, 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100000, 0, 0, 0, 0, 0, 0, 0, 100000, 0, 0, 0, 0, 0, 1)";
	 		$reset=mysql_query($query) or die("erroppr");
			$query="SELECT * FROM users WHERE username='Galactic Bank'";
	 		$go=mysql_fetch_array(mysql_query($query));
			$bankid=$go['userid'];
			$query="INSERT INTO banks SET userid='$bankid', maxborrow='1000', maxdebt='1000', interest='0', anonymous='0', main='1'";
			$go=mysql_query($query);
			$query="INSERT INTO planets SET name='Mercury', x='0', y='0', z='0', clan='-1', creator='$bankid', planetid='1'";
			$go=mysql_query($query);
			$query="INSERT INTO planets SET name='Venus', x='0', y='0', z=1', clan='-1', creator='$bankid', planetid='1'";
			$go=mysql_query($query);
			$query="INSERT INTO planets SET name='Earth', x='0', y='0', z='2', clan='-1', creator='$bankid', planetid='1'";
			$go=mysql_query($query);
			$query="INSERT INTO planets SET name='Mars', x='0', y='0', z='3', clan='-1', creator='$bankid', planetid='1'";
			$go=mysql_query($query);
			$query="INSERT INTO planets SET name='Jupiter', x='0', y='0', z='4', clan='-1', creator='$bankid', planetid='1'";
			$go=mysql_query($query);
			$query="INSERT INTO planets SET name='Saturn', x='0', y='0', z='5', clan='-1', creator='$bankid', planetid='1'";
			$go=mysql_query($query);
			$query="INSERT INTO planets SET name='Uranus', x='0', y='0', z='6', clan='-1', creator='$bankid', planetid='1'";
			$go=mysql_query($query);
			$query="INSERT INTO planets SET name='Neptune', x='0', y='0', z='7', clan='-1', creator='$bankid', planetid='1'";
			$go=mysql_query($query);
			$query="INSERT INTO planets SET name='Pluto', x='0', y='0', z='80', clan='-1', creator='$bankid', planetid='1'";
			$go=mysql_query($query);
			$query="DELETE FROM attacklog";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM messages";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM spylog";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM loans";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM useronline";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM recruit";
	 		$delete=mysql_query($query) or die("error331134");
			$response="Game has been completely reset."; 
			session_start();
			$_SESSION["message1"]=$response;
			$_SESSION["url"]="./index.php";
			session_register('message1');
			session_register('url');
			header("Location: reload.php");
			exit;
			}
	} else if ($_POST['29384092384234234']=="ADMINDEL") {
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE username='$username'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
			$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
			$admin=$admin['admin'];
			if ($admin=="1") {
			$userid2=$_POST['34234234234234444444432'];
	 		$query="DELETE FROM users WHERE userid='$userid2'";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM accountlog WHERE userid='$userid2'";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM bankaccounts WHERE userid='$userid2'";
	 		$reset=mysql_query($query) or die("erroppr"); 	 		$query="DELETE FROM accountlogin WHERE userid='$userid2'";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM banks WHERE userid='$userid2'";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM outbound WHERE userid='$userid2'";
	 		$reset=mysql_query($query) or die("erroppr");
	 		$query="DELETE FROM inbound WHERE userid='$userid2'";
	 		$reset=mysql_query($query) or die("erroppr");
			$query="DELETE FROM attacklog WHERE userid='$userid2'";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM attacklog WHERE userid2='$userid2'";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM messages WHERE userid='$userid2'";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM messages WHERE userid2='$userid2'";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM spylog WHERE userid='$userid2'";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM spylog WHERE userid2='$userid2'";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM loans WHERE userid='$userid2'";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM useronline WHERE userid='$userid2'";
	 		$delete=mysql_query($query) or die("error331134");
			$query="DELETE FROM recruit WHERE userid='$userid2'";
	 		$delete=mysql_query($query) or die("error331134");
			$response="User has been deleted."; 
			session_start();
			$_SESSION["message1"]=$response;
			$_SESSION["url"]="./index.php";
			session_register('message1');
			session_register('url');
			header("Location: reload.php");
			exit;
			}
	} else {
		$response="Invalid command";
	}
	session_start();
	$_SESSION["message1"]=$response;
	$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
	session_register('message1');
	session_register('url');
	header("Location: reload.php");
	exit;
} else {
$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
$admin=$admin['admin'];
if ($admin=="1") {
if (!empty($_GET['userid'])) {
$userid2=$_GET['userid'];
$query="SELECT username, userid FROM users WHERE userid='$userid2'";
$username2=mysql_fetch_array(mysql_query($query)) or die("error");
$username2=$username2['username'];
$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid2'"));
$admin=$admin['admin'];
if ($admin!="1") {
$email=mysql_fetch_array(mysql_query("SELECT email FROM users WHERE userid='$userid2'")) or die("errorer");
$email=$email['email'];
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">ADMIN CENTER: <? echo $username2; ?></TD></TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">EMAIL ADDRESS: <? echo $email; ?></TD>
</TR>
<?
$query = "SELECT * FROM users WHERE userid='$userid2'";
$user2 = mysql_query($query) or die($errdat);
$user2 = mysql_fetch_array($user2);


$orelevel=mysql_fetch_array(mysql_query("SELECT orelevel FROM users WHERE userid='$userid2'"));
$orelevel=$orelevel['orelevel'];
$attacklevel=mysql_fetch_array(mysql_query("SELECT attacklevel FROM users WHERE userid='$userid2'"));
$attacklevel=$attacklevel['attacklevel'];
$defenselevel=mysql_fetch_array(mysql_query("SELECT defenselevel FROM users WHERE userid='$userid2'"));
$defenselevel=$defenselevel['defenselevel'];
$attackcredits=mysql_fetch_array(mysql_query("SELECT attackcredits FROM users WHERE userid='$userid2'"));
$attackcredits=$attackcredits['attackcredits'];
$race=mysql_fetch_array(mysql_query("SELECT race FROM users WHERE userid='$userid2'"));
$race=$race['race'];
$immunity=mysql_fetch_array(mysql_query("SELECT immunity FROM users WHERE userid='$userid2'"));
$immunity=$immunity['immunity'];
$moderator=mysql_fetch_array(mysql_query("SELECT moderator FROM users WHERE userid='$userid2'"));
$moderator=$moderator['moderator'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
$online=$online['ip'];
$attackstotal="1";
$attacks=mysql_fetch_array(mysql_query("SELECT attack1, attack2, attack3, attack4, attack5, attack6, attack7 FROM users WHERE userid='$userid2'"));
			$unitstotal=$user2['units'];
			if (($unitstotal-$attacks['attack7'])<0) {
				$unitstotal7=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal7=5*$attacks['attack7'];
				$unitstotal=$unitstotal-$attacks['attack7'];
			}
			if (($unitstotal-$attacks['attack6'])<0) {
				$unitstotal6=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal6=5*$attacks['attack6'];
				$unitstotal=$unitstotal-$attacks['attack6'];
			}
			if (($unitstotal-$attacks['attack5'])<0) {
				$unitstotal5=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal5=5*$attacks['attack5'];
				$unitstotal=$unitstotal-$attacks['attack5'];
			}
			if (($unitstotal-$attacks['attack4'])<0) {
				$unitstotal4=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal4=5*$attacks['attack4'];
				$unitstotal=$unitstotal-$attacks['attack4'];
			}
			if (($unitstotal-$attacks['attack3'])<0) {
				$unitstotal3=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal3=5*$attacks['attack3'];
				$unitstotal=$unitstotal-$attacks['attack3'];
			}
			if (($unitstotal-$attacks['attack2'])<0) {
				$unitstotal2=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal2=5*$attacks['attack2'];
				$unitstotal=$unitstotal-$attacks['attack2'];
			}
			if (($unitstotal-$attacks['attack1'])<0) {
				$unitstotal1=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal1=5*$attacks['attack1'];
				$unitstotal=$unitstotal-$attacks['attack1'];
			}
			$attackstotal=$attackstotal+(2560*$unitstotal7);
			$attackstotal=$attackstotal+(640*$unitstotal6);
			$attackstotal=$attackstotal+(160*$unitstotal5);
			$attackstotal=$attackstotal+(40*$unitstotal4);
			$attackstotal=$attackstotal+(20*$unitstotal3);
			$attackstotal=$attackstotal+(10*$unitstotal2);
			$attackstotal=$attackstotal+(5*$unitstotal1);
			$attackstotal=$attackstotal+$unitstotal;
			$defensestotal="1";
			$defenses=mysql_fetch_array(mysql_query("SELECT defense1, defense2, defense3, defense4, defense5, defense6, defense7 FROM users WHERE userid='$userid2'"));
			$unitstotal2=$user2['units'];
			if (($unitstotal2-$defenses['defense7'])<0) {
				$unitstotal27=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal27=5*$defenses['defense7'];
				$unitstotal2=$unitstotal2-$defenses['defense7'];
			}
			if (($unitstotal2-$defenses['defense6'])<0) {
				$unitstotal26=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal26=5*$defenses['defense6'];
				$unitstotal2=$unitstotal2-$defenses['defense6'];
			}
			if (($unitstotal2-$defenses['defense5'])<0) {
				$unitstotal25=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal25=5*$defenses['defense5'];
				$unitstotal2=$unitstotal2-$defenses['defense5'];
			}
			if (($unitstotal2-$defenses['defense4'])<0) {
				$unitstotal24=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal24=5*$defenses['defense4'];
				$unitstotal2=$unitstotal2-$defenses['defense4'];
			}
			if (($unitstotal2-$defenses['defense3'])<0) {
				$unitstotal23=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal23=5*$defenses['defense3'];
				$unitstotal2=$unitstotal2-$defenses['defense3'];
			}
			if (($unitstotal2-$defenses['defense2'])<0) {
				$unitstotal22=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal22=5*$defenses['defense2'];
				$unitstotal2=$unitstotal2-$defenses['defense2'];
			}
			if (($unitstotal2-$defenses['defense1'])<0) {
				$unitstotal21=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal21=5*$defenses['defense1'];
				$unitstotal2=$unitstotal2-$defenses['defense1'];
			}
			$defensestotal=$defensestotal+(2560*$unitstotal27);
			$defensestotal=$defensestotal+(640*$unitstotal26);
			$defensestotal=$defensestotal+(160*$unitstotal25);
			$defensestotal=$defensestotal+(40*$unitstotal24);
			$defensestotal=$defensestotal+(20*$unitstotal23);
			$defensestotal=$defensestotal+(10*$unitstotal22);
			$defensestotal=$defensestotal+(5*$unitstotal21);
			$defensestotal=$defensestotal+$unitstotal2;
			$userdamage=round(($attackstotal)*pow(1.25, $attacklevel));
			$userdefense=round(($defensestotal)*pow(1.25, $defenselevel));
$suicide=mysql_fetch_array(mysql_query("SELECT suicidepoints FROM users WHERE userid='$userid2'"));
$suicide=$suicide['suicidepoints'];
$average=mysql_fetch_array(mysql_query("SELECT average FROM users WHERE userid='$userid2'"));
$average=$average['average'];
$orelevel=mysql_fetch_array(mysql_query("SELECT orelevel FROM users WHERE userid='$userid2'"));
$orelevel=$orelevel['orelevel'];
$suspended=mysql_fetch_array(mysql_query("SELECT suspended FROM users WHERE userid='$userid2'"));
$suspended=$suspended['suspended'];
$credits2=round((200 * $user2['units'])*pow(1.25, $orelevel));
if ($race=="4") {
$credits2=round($credits2 * 1.25);
}
?>
<FORM METHOD="POST" ACTION="index.php?content=admin">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="ADMIN">
<INPUT TYPE="HIDDEN" NAME="34234234234234444444432" VALUE="<? echo $userid2; ?>">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Credits: <INPUT NAME="2342344442334233334cred" VALUE="<? echo $user2['credits']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Units: <INPUT NAME="2342343321213234un" VALUE="<? echo $user2['units']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Credit level: <INPUT NAME="234234234cred" VALUE="<? echo $orelevel; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Attack level (1-12): <INPUT NAME="22342344444att" VALUE="<? echo $attacklevel; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Defense level (1-12): <INPUT NAME="223423333344444def" VALUE="<? echo $defenselevel; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Attack credits: <INPUT NAME="2234233333443334attcred" VALUE="<? echo $attackcredits; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Suicide Points: <INPUT NAME="2234233333443334suipoint" VALUE="<? echo $suicide; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Attack:</TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Metal Fists: <INPUT TYPE="TEXT" NAME="233213123123123attack1" VALUE="<? echo $attacks['attack1']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser Sabre: <INPUT TYPE="TEXT" NAME="233213123123123attack2" VALUE="<? echo $attacks['attack2']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser: <INPUT TYPE="TEXT" NAME="233213123123123attack3" VALUE="<? echo $attacks['attack3']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">RPG's: <INPUT TYPE="TEXT" NAME="233213123123123attack4" VALUE="<? echo $attacks['attack4']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Rail Gun: <INPUT TYPE="TEXT" NAME="233213123123123attack5" VALUE="<? echo $attacks['attack5']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser Cannon: <INPUT TYPE="TEXT" NAME="233213123123123attack6" VALUE="<? echo $attacks['attack6']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Temporal Cannon: <INPUT TYPE="TEXT" NAME="233213123123123attack7" VALUE="<? echo $attacks['attack7']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Defence:</TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Riot Shield: <INPUT TYPE="TEXT" NAME="233213123123123defense1" VALUE="<? echo $defenses['defense1']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Riot Armor: <INPUT TYPE="TEXT" NAME="233213123123123defense2" VALUE="<? echo $defenses['defense2']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">T10k Protective Armor: <INPUT TYPE="TEXT" NAME="233213123123123defense3" VALUE="<? echo $defenses['defense3']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">T40k Protective Suit: <INPUT TYPE="TEXT" NAME="233213123123123defense4" VALUE="<? echo $defenses['defense4']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Proton Shield: <INPUT TYPE="TEXT" NAME="233213123123123defense5" VALUE="<? echo $defenses['defense5']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Proton Armor: <INPUT TYPE="TEXT" NAME="233213123123123defense6" VALUE="<? echo $defenses['defense6']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Temporal Shield: <INPUT TYPE="TEXT" NAME="233213123123123defense7" VALUE="<? echo $defenses['defense7']; ?>"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Effective attack: <? if($race=="1") { echo number_format(round($userdamage * 1.25)); } else { echo number_format($userdamage); } ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Effective defense: <? if ($race=="2") { echo number_format(round($userdefense * 1.25)); } else { echo number_format($userdefense); } ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Effective income: <? echo number_format($credits2); ?></TD><TD ALIGN="LEFT"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Suicide points: <? echo number_format($suicide); ?></TD><TD ALIGN="LEFT"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Average: <? echo number_format($average); ?></TD><TD ALIGN="LEFT"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Clan: <?  if ($race=="0") { echo "Unselected"; } if ($race=="1") { echo "Terminators[MACHINES]"; } if ($race=="2") { echo "Humans[HUMANS]"; } if ($race=="3") { echo "Cloners[HUMANS]"; } if ($race=="4") { echo "Havervesters[MACHINES]"; } if ($race=="5") { echo "Inter-spacial beings[UNKNOWN]"; } ?></TD><TD ALIGN="RIGHT"></TD>
</TR>
<TR VALIGN="TOP">
<TD><? if (!empty($online)) { ?><SPAN ID="BOLD">ONLINE</SPAN><? } else { ?><SPAN ID="MEDIUM">OFFLINE<? } ?></TD>
</TR>
<TR VALIGN="TOP">
<?
if ($immunity == 1) {
	?><TD ALIGN="LEFT"><SPAN ID="MEDIUM">Immunity: On:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="9231230344324" VALUE="ON" CHECKED>&nbsp;Off:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="9231230344324" VALUE="OFF"></TD><?
} else {
	?><TD ALIGN="LEFT""><SPAN ID="MEDIUM">Immunity: On:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="9231230344324" VALUE="ON">&nbsp;Off:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="9231230344324" VALUE="OFF" CHECKED></TD><?
}
?>
</TR>
<TR VALIGN="TOP">
<?
if ($suspended == 1) {
	?><TD ALIGN="LEFT"><SPAN ID="MEDIUM">Suspended: On:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="923331231230344324" VALUE="ON" CHECKED>&nbsp;Off:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="923331231230344324" VALUE="OFF"></TD><?
} else {
	?><TD ALIGN="LEFT""><SPAN ID="MEDIUM">Suspended: On:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="923331231230344324" VALUE="ON">&nbsp;Off:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="923331231230344324" VALUE="OFF" CHECKED></TD><?
}
?>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="UPDATE"></TD>
</TR>
</FORM>
<FORM METHOD="POST" ACTION="admin.php">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="RACE">
<INPUT TYPE="HIDDEN" NAME="34234244444411112334534534555514" VALUE="<? echo $userid2; ?>">
<TR VALIGN="TOP">
<TD><SELECT NAME="12312312312321">
<OPTION VALUE="1">Attackers</OPTION>
<OPTION VALUE="2">Defenders</OPTION>
<OPTION VALUE="3">Breeders</OPTION>
<OPTION VALUE="4">Hoarders</OPTION>
<OPTION VALUE="5">Coverts</OPTION>
<OPTION VALUE="0">Unselected</OPTION>
</SELECT>
</TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="CHANGE"></TD>
</TR>
</FORM>
<?
if ($userid2!="3") {
?>
<FORM METHOD="POST" ACTION="admin.php">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="MODERATOR">
<INPUT TYPE="HIDDEN" NAME="342342444444111123345345345555333333314" VALUE="<? echo $userid2; ?>">
<TR>
<?
if ($moderator==1) {
	?><TD ALIGN="LEFT"><SPAN ID="MEDIUM">Moderator: On:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="92312303622244324" VALUE="ON" CHECKED>&nbsp;Off:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="92312303622244324" VALUE="OFF"></TD><?
} else {
	?><TD ALIGN="LEFT""><SPAN ID="MEDIUM">Moderator: On:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="92312303622244324" VALUE="ON">&nbsp;Off:<INPUT TYPE="RADIO" STYLE="background: #739CDE;" NAME="92312303622244324" VALUE="OFF" CHECKED></TD><?
}
?>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="UPDATE"></TD>
</TR>
</FORM>
<? } ?>
<FORM METHOD="POST" ACTION="admin.php">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="ADMINDEL">
<INPUT TYPE="HIDDEN" NAME="34234234234234444444432" VALUE="<? echo $userid2; ?>">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="DELETE"></TD>
</TR>
</FORM>
<FORM METHOD="POST" ACTION="admin.php" NAME="suform">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="ADMINSU">
<INPUT TYPE="HIDDEN" NAME="342342444444111123455514" VALUE="<? echo $userid2; ?>">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="SU" ONCLICK="window.open('./exit.php','window','width=5,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,height=5');"></TD>
</TR>
</FORM>
<?
if ($userid != $userid2) {
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><A HREF="./index.php?content=message&userid=<? echo $userid2; ?>">[Send message]</A></TD>
</TR>
<? } ?>
</TABLE>
</TD>
</TR>
</TABLE>
<?
}
} else {
$pendingno=mysql_query("SELECT pendingid FROM pending");
$pendingno=mysql_num_rows($pendingno);
$paused=mysql_fetch_array(mysql_query("SELECT paused FROM admin WHERE admin_id='0001'"));
$paused=$paused['paused'];
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">ADMIN CENTER</TD></TR>
<FORM METHOD="POST" ACTION="admin.php">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="BOOST">
<TD><SPAN ID="MEDIUM">GLOBAL BOOST: <INPUT NAME="23423423ddddfw4cred" VALUE=""></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="BOOST"></TD>
</TR>
</FORM>
<TR VALIGN="TOP">
<FORM METHOD="POST" ACTION="index.php?content=admin">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="PAUSE">
<?
if ($paused == 1) {
	?><TD ALIGN="LEFT"><SPAN ID="MEDIUM">GAME IS PAUSED: <INPUT TYPE="SUBMIT" VALUE="PLAY"></TD><?
} else {
	?><TD ALIGN="LEFT""><SPAN ID="MEDIUM">GAME IS PLAYING: <INPUT TYPE="SUBMIT" VALUE="PAUSE"></TD><?
}
?>
</TR>
</FORM>
<FORM METHOD="POST" ACTION="admin.php">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="ANNOUNCEMENT">
<TD><SPAN ID="MEDIUM">ANNOUNCEMENT: <INPUT NAME="233453242342444444444411111111134" VALUE="" SIZE="50"></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="SEND"></TD>
</TR>
</FORM>
<FORM METHOD="POST" ACTION="admin.php">
<INPUT TYPE="HIDDEN" NAME="29384092384234234" VALUE="ADDBANK">
<TD><SPAN ID="MEDIUM">ADD NEW BANK</TD>
</TR>
<TD><SPAN ID="MEDIUM">NAME: <INPUT NAME="34234244444411112334534534555514" VALUE="" SIZE="50"></TD>
</TR>
<TD><SPAN ID="MEDIUM">EMAIL: <INPUT NAME="3423424444441asdasd11asd4534555514" VALUE="" SIZE="50"></TD>
</TR>
<TD><SPAN ID="MEDIUM">PASSWORD: <INPUT NAME="3423424444441asdasd4534555514" VALUE="" SIZE="50"></TD>
</TR>
<TD><SPAN ID="MEDIUM">TYPE: <SELECT NAME="asdasdasdasd334"><OPTION VALUE="2">SWISS</OPTION><OPTION VALUE="-1">LOAN</OPTION></TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="CREATE"></TD>
</TR>
</FORM>
<? if (!empty($_POST['confirmation'])) { echo "<B> Confirm your intention to reset, this is IRREVSIBLE! </B>"; } ?>
</FORM>
<FORM METHOD="POST" ACTION="<? if (!empty($_POST['confirmation'])) { echo "admin.php"; } else { echo "index.php?content=admin"; }?>">
<INPUT TYPE="HIDDEN" NAME="<? if (!empty($_POST['confirmation'])) { echo "29384092384234234"; } else { echo "confirmation";} ?>" VALUE="HARDRESET">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><INPUT TYPE="SUBMIT" VALUE="HARDRESET"></TD>
</TR>
</FORM>
</TABLE>
</TD>
</TR>
</TABLE>
<BR>
<A HREF="./index.php?content=pendingusers">PENDING USERS = <? echo $pendingno; ?></A> <BR>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">ANNOUNCEMENTS</TD><TD></TD></TR>
<TR><TD>Sent:</TD><TD>Message:</TD></TR>
<?
$announce=mysql_query("SELECT * FROM gameannounce ORDER BY time DESC");
while ($ann = mysql_fetch_array($announce)) {
?>
<TR><TD><? echo $ann['time']; ?></TD><TD><? echo stripslashes($ann['content']); ?></TD></TR>
<?
}
?>
</TABLE>
</TD>
</TR>
</TABLE>
<BR>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">USERS:</TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD>RANK:</TD><TD>Name:</TD><TD ALIGN="RIGHT">UNITS:</TD><TD ALIGN="RIGHT">CREDITS:</TD>
</TR>
<?
$userse=mysql_query("SELECT rank, username, credits, units, userid FROM users ORDER BY rank");
while ($usersde = mysql_fetch_array($userse)) {
$rankno=$usersde['rank'];
$userid2=$usersde['userid'];
$usernamer=$usersde['username'];
$units=$usersde['units'];
$credits=$usersde['credits'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
$online=$online['ip'];
$query=mysql_fetch_array(mysql_query("SELECT admin, moderator, suspended, isbank FROM users WHERE userid='$userid2'"));
$admin=$query['admin'];
$isbank=$query['isbank'];
$moderator=$query['moderator'];
$suspended=$query['suspended'];
?>
<TR VALIGN="TOP" <? if ($admin=="1") { ?>BGCOLOR="GREEN"<? } if ($moderator=="1") { ?>BGCOLOR="BLUE"<? } if ($isbank=="1") { ?>BGCOLOR="PINK"<? } if ($suspended=="1") { ?>BGCOLOR="RED"<? } ?>>
<TD><SPAN ID="MEDIUM"><? if ($admin!="1") { if ($isbank!="1") { if ($suspended!="1") { echo number_format($rankno); } else { echo "Suspended"; } } else { echo "BANK"; }} ?></TD><TD><? if (!empty($online)) { ?><SPAN ID="BOLD"><? } if ($admin!="1") { ?><A HREF="./index.php?content=admin&userid=<? echo $userid2;?>">[<? echo $usernamer; ?>]</A><? } else {  echo $usernamer; } ?></TD><TD ALIGN="RIGHT"><? if ($admin!="1") { echo number_format($units); } ?></TD><TD ALIGN="RIGHT"><? if ($admin!="1") { echo number_format($credits); } ?></TD>
</TR>
<? } ?>
</TABLE>
</TD>
</TR>
</TABLE>
<?
}
}
}
/////////
		}
	}
} else {
	session_destroy();
	$response="Password incorrect";
		session_start();
	$_SESSION["message1"]=$response;
	$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
	session_register('message1');
	session_register('url');
	header("Location: reload.php");
	exit;
	
}
?>
