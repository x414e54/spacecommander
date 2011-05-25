<?
require('./global.php');

$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_fetch_array(mysql_query($query));
$userid=$userid['userid'];
$password=mysql_fetch_array(mysql_query("SELECT password FROM users WHERE userid='$userid'"));
$password=$password['password'];

if ($_SESSION["password2"]==$password)
{
	$admin=mysql_fetch_array(mysql_query("SELECT admin FROM users WHERE userid='$userid'"));
	$admin=$admin['admin'];
	$query="SELECT paused FROM admin WHERE admin_id='0001'";
	$paused=mysql_fetch_array(mysql_query($query));
	$paused=$paused['paused'];

	if ($paused=="1" && $admin!="1")
	{
		session_destroy();
		$response="Im sorry the game has been paused... you cannot log in at this time.";
		header("Location: index.php?23432423444111222333=$response");
	} else
	{
		$query="SELECT suspended FROM users WHERE userid='$userid'";
		$sus=mysql_fetch_array(mysql_query($query));
		$sus=$sus['suspended'];
			
		if ($sus=="1")
		{
			session_destroy();
			$response="Your account has been suspended and is pending investigation... you are immune.";
			header("Location: index.php?23432423444111222333=$response");
		} else
		{
/////////
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<FORM METHOD="POST" ACTION="index.php" NAME="checkboxform">
<TR ID="TABLEHEAD"><TD COLSPAN="2">MESSAGES:</TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
	<TD>&nbsp;</TD>
</TR>
<TR VALIGN="TOP" ID="TABLEHEAD">
	<TD><? $messages=mysql_query("SELECT * FROM messages WHERE userid='$userid' ORDER BY time DESC");
$o=0;
while ($message = mysql_fetch_array($messages)) {
$o++;
}?><INPUT TYPE="CHECKBOX" NAME="boxer" ONCLICK="javascript: for (var j=0; j<<? echo $o;?>;j++) { if(document.checkboxform.boxer.checked==true) {document.forms['checkboxform'].elements['chcehciaisdjasdiaisjdji' +j].checked=true;} else {document.forms['checkboxform'].elements['chcehciaisdjasdiaisjdji' +j].checked=false;} };"> <INPUT TYPE="SUBMIT" NAME="asdjioasdjas90d09a90sd90as9d8890" VALUE="DELETE CHECKED"></TD>
</TR>
<?
$j=0;
$query = "SELECT filterwords FROM admin WHERE admin_id=0001";
$filterwords = mysql_query($query) or die($errdat);
$filterwords = mysql_fetch_array($filterwords);
$filterwords = preg_replace("/   /", " ", preg_replace("/  /", " ", $filterwords['filterwords']));
$messages=mysql_query("SELECT * FROM messages WHERE userid='$userid' ORDER BY time DESC");
	$search[0] = "/</";
	$search[1] = "/>/";
	$search[2] = "/\n/";
	$search[3] = "/  /";
	$search[4] = "/   /";

	$replace[0] = "&lt;";
	$replace[1] = "&gt;";
	$replace[2] = "<BR>";
	$replace[3] = "&nbsp; ";
	$replace[4] = "&nbsp; &nbsp;";
		$filterwords2="/" . preg_replace("/ /", "/i /", $filterwords) . "/i";
		$search2=explode(" ", $filterwords2);
		$i=0;
		while ($i < count($search2)) {
		while (strlen($replace2[$i]) < strlen($search2[$i])-3) {
			$replace2[$i].="*";
		}
		$i=$i+1;
		}
while ($message = mysql_fetch_array($messages)) {
$messagetime=$message['time'];
$messager2=$message['userid2'];
$content2 = preg_replace($search2, $replace2, $message['content']);
$messagecontent = stripslashes(preg_replace($search, $replace, $content2));
$messageid=$message['messageid'];
$query="SELECT username, userid FROM users WHERE userid='$messager2'";
$messagername=mysql_fetch_array(mysql_query($query)) or die("error");
$messagername=$messagername['username'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$messager2'"));
$online=$online['ip'];
if ($message['new']=="1") {
$messagesold=mysql_query("UPDATE messages SET new='0' WHERE messageid='$messageid'");
?>
<TR VALIGN="TOP" ID="TABLEHEAD">
<TD><INPUT TYPE="CHECKBOX" VALUE="<? echo $messageid;?>" ID="box" NAME="chcehciaisdjasdiaisjdji<? echo $j; ?>"><SPAN ID="BOLD">NEW</SPAN>&nbsp;SENT: <? echo $messagetime; ?>&nbsp;<SPAN ID="MEDIUM"><A HREF="./index.php?3422342342344=DeleteMessage&8888766=<? echo $userid; ?>&444231231234234=<? echo $messageid; ?>">[Delete]</A>&nbsp;<A HREF="./index.php?content=message&userid=<? echo $messager2; ?>">[Reply]</A></SPAN></TD>
</TR>
<?
} else {
?>
<TR VALIGN="TOP" ID="TABLEHEAD">
<TD><INPUT TYPE="CHECKBOX" VALUE="<? echo $messageid;?>" ID="box" NAME="chcehciaisdjasdiaisjdji<? echo $j; ?>">SENT: <? echo $messagetime; ?>&nbsp;<SPAN ID="MEDIUM"><A HREF="./index.php?3422342342344=DeleteMessage&8888766=<? echo $userid; ?>&444231231234234=<? echo $messageid; ?>">[Delete]</A>&nbsp;<A HREF="./index.php?content=message&userid=<? echo $messager2; ?>">[Reply]</A></SPAN></TD>
</TR>
<?
}$j++;
?>
<TR VALIGN="TOP">
<TD>FROM: <? if (!empty($online)) { ?><SPAN ID="BOLD"><? } if ($messager2!=$userid) { ?><A HREF="./index.php?content=user&userid=<? echo $messager2;?>">[<? echo $messagername; ?>]</A><? } else { ?><? echo $messagername; ?><? } ?></TD>
</TR>
<TR VALIGN="TOP">
<TD><? echo stripslashes($messagecontent); ?></TD>
</TR>
<?
}
$filterwords="";
$filterwords2="";
$search="";
$search2="";
$replace="";
$replace2="";
?>
<INPUT TYPE="HIDDEN" NAME="asdijasidoasid778876" VALUE="<? echo $j;?>">
</FORM>
</TABLE>
</TD>
</TR>
</TABLE>
<?
////////
		}
	}
} else {
	session_destroy();
	$response="Password incorrect";
	session_start();
	$_SESSION["message1"]=$response;
	$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
	session_register('message1');
	session_register('url');
	header("Location: reload.php");
	exit;
}
?>			