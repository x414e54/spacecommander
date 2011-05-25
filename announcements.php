<? 
require("./global.php");
?>
<?
$announce=mysql_query("SELECT * FROM gameannounce ORDER BY time DESC");
while ($ann = mysql_fetch_array($announce)) {
?>
<br>Sent:<? echo $ann['time']; ?><br><? echo stripslashes($ann['content']); ?><br>
<?
}
?>
<br>