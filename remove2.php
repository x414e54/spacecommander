<?php
$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_fetch_array(mysql_query($query)) or die(nouser());
$userid=$userid['userid'];
$password=mysql_fetch_array(mysql_query("SELECT password FROM users WHERE userid='$userid'"));
$password=$password['password'];
if ($_SESSION["password"]==$password) {
			$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
			$credits=$credits['credits'];
			$bankrupt=mysql_fetch_array(mysql_query("SELECT bankrupt FROM users WHERE userid='$userid'"));
			$bankrupt=$bankrupt['bankrupt'];
if($bankrupt=="1") {
			$a1000=188;
			$a1800=338;
			$a3200=600;
			$a5100=957;
			$a16400=3075;
			$a52400=9825;
			$a167800=31463;
if (!empty($_POST['sell233213123123123defense7'])) {
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE userid='$userid'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
	 		$number=round($_POST['sell233213123123123']);
			if ($number < 0) {
			echo "you cannot add this way";
			} else {
			$oldwep=mysql_fetch_array(mysql_query("SELECT defense7 FROM users WHERE userid='$userid'"));
			if (($oldwep['defense7'] - $number) < 0) {
			} else {
			$p=0;
while ($p != $number) {			
$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
			$credits=$credits['credits'];
			$debt=mysql_fetch_array(mysql_query("SELECT debt FROM users WHERE userid='$userid'"));
			$debt=$debt['debt'];
			$oldwep=mysql_fetch_array(mysql_query("SELECT defense7 FROM users WHERE userid='$userid'"));
			if($debt>0) {
			$debt=$debt - ($a167800);
			if ($debt<0) {
			$credits=$credits+((1-2)*$debt);
			$debt="0";
			}
			$wep=$oldwep['defense7'] - 1;
	 		$query="UPDATE users SET defense7='$wep', credits='$credits', debt='$debt' WHERE userid='$userid'";
	 		$defense=mysql_query($query) or die("error");
			$p++;
			} else {
			$p=$number;
            }
}
			header ("Location: index.php?content=armory"); 
			}
			}
}
if (!empty($_POST['sell233213123123123attack7'])) {
			$username=$_SESSION["username"];
			$query="SELECT username, userid FROM users WHERE userid='$userid'";
	 		$userid=mysql_fetch_array(mysql_query($query)) or die("error212");
			$userid=$userid['userid'];
	 		$number=round($_POST['sell233213123123123']);
			if ($number < 0) {
			echo "you cannot add this way";
			} else {
			$oldwep=mysql_fetch_array(mysql_query("SELECT attack7 FROM users WHERE userid='$userid'"));
			if (($oldwep['attack7'] - $number) < 0) {
			} else {
			$p=0;
while ($p != $number) {			
$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
			$credits=$credits['credits'];
			$debt=mysql_fetch_array(mysql_query("SELECT debt FROM users WHERE userid='$userid'"));
			$debt=$debt['debt'];
			$oldwep=mysql_fetch_array(mysql_query("SELECT attack7 FROM users WHERE userid='$userid'"));
			if($debt>0) {
			$debt=$debt - ($a167800);
			if ($debt<0) {
			$credits=$credits+((1-2)*$debt);
			$debt="0";
			}
			$wep=$oldwep['attack7'] - 1;
	 		$query="UPDATE users SET attack7='$wep', credits='$credits', debt='$debt' WHERE userid='$userid'";
	 		$defense=mysql_query($query) or die("error");
			$p++;
			} else {
			$p=$number;
            }
}
			header ("Location: index.php?content=armory"); 
			}
			}
}
}
} else {
session_destroy();
$response="Password incorrect";
header("Location: index.php?2343345345555552423444111222333=$response");
}
?>