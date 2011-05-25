<?php
require("./global.php");
$query = "SELECT * FROM time WHERE timeid='1'";
$time = mysql_query($query) or die($errdat);
$time = mysql_fetch_array($time);
$time =$time['time'];
echo $time;
echo "<BR>";
echo date("i");
echo "<BR>";
echo $time=($time - date("Y/m/d G:i:s"));
echo "<BR>";
echo substr($time, 10, 2) + 15;
