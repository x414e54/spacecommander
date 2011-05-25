<?
	session_destroy();
	$response="Your have been sucessfully logged out.";
	session_start();
	$_SESSION["username"]="";
	$_SESSION["password2"]="";
	$_SESSION["message1"]=$response;
	$_SESSION["url"]="./index.php";
	session_register('username');
	session_register('password2');
	session_register('message1');
	session_register('url');
	header("Location: reload.php");
	exit;
?>