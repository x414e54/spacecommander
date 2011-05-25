<?
session_start();
if (empty($_SESSION['username']))
{
	if (!empty($_POST['3452323jrd9023d9023e0923d23d2222']))
	{
		$_SESSION["username"]=$_POST['3452323jrd9023d9023e0923d23d2222'];
		$_SESSION["password2"]=md5($_POST['123123123122342340d0-aqskd0a-sd3']);
		session_register('username');
		session_register('password2');
		header("Location: index.php");
		exit;
	} else {
?>
<FORM METHOD="POST" ACTION="login.php">
<br>Username: <br><br><INPUT TYPE="TEXT" NAME="3452323jrd9023d9023e0923d23d2222" MAXCHARS="50"><br>
<br>Password:<br><br><INPUT TYPE="PASSWORD" NAME="123123123122342340d0-aqskd0a-sd3" MAXCHARS="50"><br>
<br><INPUT TYPE="SUBMIT" NAME="345345435333" VALUE="LOGIN"><br>
<br><a href="./register.php">Register</a><br>
<br><a href="./register.php">Forgot Password?</a><br>
</FORM><br>
<? }
 } else {
	echo "<br>You are logged in as ";
	echo $_SESSION['username'];
	echo "<br>";
?>
<br><FORM METHOD="POST" ACTION="logout.php">
<INPUT TYPE="SUBMIT" NAME="345345435333" VALUE="LOGOUT"></FORM><br>
<FORM METHOD="POST" ACTION="setpass.php">Password:<br>
<br><INPUT TYPE="PASSWORD" NAME="123123123123" MAXCHARS="50"><br><br><INPUT TYPE="SUBMIT" NAME="345345435333" VALUE="CHANGE"></FORM><br>
<?} ?>