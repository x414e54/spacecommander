<?
require ('./global.php');
$users=mysql_num_rows(mysql_query("SELECT userid FROM users WHERE admin!='1' AND isbank!='1'"));
?>
<br>Server time: <span id=worldclock></span><br>
<br>Registered users: <? echo $users; ?><br>
<?
$paused=mysql_fetch_array(mysql_query("SELECT paused FROM admin WHERE admin_id='0001'"));
$paused=$paused['paused'];
if ($paused!="1") {
$time=mysql_fetch_array(mysql_query("SELECT time FROM time WHERE timeid='0'"));
$time=$time['time'];
?>
<br>Next update in </span><span id=serverclock></span>&nbsp;<a href="javascript:window.location.reload()">[refresh]</A><br><br>
<? } else { ?>
<br>Game has been paused &nbsp; <A HREF="index.php">[refresh]</A><br><br>
<? } ?>
<script language="JavaScript">

var hours=<? echo date("G");?>;
var mins=<? echo date("i");?>;
var sec=<? echo date("s");?>;
var stime=<? echo round((($time - time())+1800)/60); ?>;

function WorldClock(){
	sec++;

	if(sec==60){
		sec=0;
		mins++;
	}

	if(mins==60){
		mins=0;
		hours++;
	}

	if(hours==24){
		hours=0;
	}

	if(hours<=9){
		hours2="0" + hours;
	} else {
		hours2=hours;
	}

	if(mins<=9) {
		mins2="0" + mins;
	} else {
		mins2=mins;
	}

	if(sec<=9) {
		sec2="0"+ sec;
	} else {
		sec2=sec;
	}

	var finaltime=hours2 + ":" + mins2 + ":" + sec2;

	if (document.all) {
		worldclock.innerHTML=finaltime;
	} else if (document.getElementById) {
		document.getElementById("worldclock").innerHTML=finaltime;
	}

	setTimeout("WorldClock()",1000);
}

function ServerClock() {
	if (stime<=0) {
		var finaltime="NOW";
	} else {
		var finaltime=stime+"m";
	}

	if (document.all) {
		serverclock.innerHTML=finaltime;
	} else if (document.getElementById) {
		document.getElementById("serverclock").innerHTML=finaltime;
	}
	stime--;
	setTimeout("ServerClock()",60000);
}

function Clocks() {
	ServerClock();
	WorldClock();
}
window.onload=Clocks();
</script>
