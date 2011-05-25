<?
	require('./global.php');
		if (getenv('HTTP_CLIENT_IP')) {
			$ip = getenv('HTTP_CLIENT_IP');
		}
		elseif (getenv('HTTP_X_FORWARDED_FOR')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_X_FORWARDED')) {
			$ip = getenv('HTTP_X_FORWARDED');
		}
		elseif (getenv('HTTP_FORWARDED_FOR')) {
			$ip = getenv('HTTP_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_FORWARDED')) {
			$ip = getenv('HTTP_FORWARDED');
		}
		else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		$timestamp = time();
		$insert = mysql_query ("INSERT INTO useronline SET timestamp='$timestamp', ip='$ip', userid='$userid'");
		$delete = mysql_query ("DELETE FROM useronline WHERE timestamp < ($timestamp - 240)");
		$count = mysql_num_rows ( mysql_query("SELECT DISTINCT userid FROM useronline"));
?><br>Users Online: <? echo $count; ?><br><br>