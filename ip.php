<?
if ($_SERVER["HTTP_X_FORWARDED_FOR"])
{
	if ($_SERVER["HTTP_CLIENT_IP"])
	{	
		$proxy = $_SERVER["HTTP_CLIENT_IP"];
	} else
	{
		$proxy = $_SERVER["REMOTE_ADDR"];
	}
	
	$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else
{
	if ($_SERVER["HTTP_CLIENT_IP"])
	{
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	} else
	{
		$ip = $_SERVER["REMOTE_ADDR"];
	}
}
?>