<?php
require("./global.php");
if (empty($_SESSION['username'])) {
header("Location: index.php"); 
} else {
$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_fetch_array(mysql_query($query)) or die(nouser());
$userid=$userid['userid'];
$password=mysql_fetch_array(mysql_query("SELECT password FROM users WHERE userid='$userid'"));
$password=$password['password'];
}
if ($_SESSION["password"]==$password) {
$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
$admin=$admin['admin'];
if ($admin=="1") {
$pending=mysql_query("SELECT * FROM pending");
while ($pending2 = mysql_fetch_array($pending)) {
echo $pending2['pendingid'] . "&nbsp;";
echo $pending2['username'] . "&nbsp;";
echo $pending2['email'] . "&nbsp;";
echo "<A HREF=http://commander.anthonybills.com/index.php?register=true&234234234234=" . $pending2['checkid'] . "&234234234234234234234234=" . $pending2['pendingid'] . ">VALIDATE</A><BR>";
}
}
} else {
session_destroy();
header("Location: index.php"); 
} 