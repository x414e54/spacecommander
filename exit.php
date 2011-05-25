<?
if(!empty($_GET['21i09123'])) {
	$response="Your have been sucessfully logged out.";
	session_start();
	$_SESSION["username"]=$_SESSION["oldusername"];
	$_SESSION["password2"]=$_SESSION["oldpassword"];
	$_SESSION["message1"]=$response;
	$_SESSION["url"]="./index.php";
	session_register('username');
	session_register('password2');
	session_register('message1');
	session_register('url');
	header("Location: reload.php");
	exit;
} else {
?>
<HTML>
	<STYLE TYPE="text/css">
		<? include("./style.css"); ?>
	</STYLE>
	<BODY>
		<FORM METHOD="POST" ACTION="exit.php" NAME="exitform">
			<INPUT TYPE="SUBMIT" VALUE="EXIT" NAME="21i09123" ONCLICK="opener.location.href='./exit.php?21i09123=1';window.close();">
		</FORM>
	</BODY>
</HTML>
<? } ?>