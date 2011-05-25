<? 
session_start();
?>
<script Language="javascript">
function music() {
		win=window.open('./music2.php','win','width=200,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,height=60');
}
<?
if ($_SESSION["music"]!=1) {
	$_SESSION["music"]=1;
	session_register("open");
?>
		window.onload=music();
</script>
<br>
<? } 
?>
</script><Br>
Click <a onclick="music();">[here]</a> to open music<br><br>




