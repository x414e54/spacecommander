<?
$userid2=$_GET['userid'];
$query="SELECT username, userid FROM users WHERE userid='$userid2'";
$username2=mysql_fetch_array(mysql_query($query)) or die("error");
$username2=$username2['username'];
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<FORM NAME=SendMessage ACTION=index.php METHOD=POST>
<INPUT TYPE=HIDDEN NAME=342234232342342344 VALUE=SendMessage>
<INPUT TYPE=HIDDEN NAME=34234231231231234234 VALUE="<? echo $_GET['userid']; ?>">
<TR ID="TABLEHEAD"><TD COLSPAN="2" ID="MEDIUM">Send Message To: <? echo $username2; ?></TD></TR>
<TR VALIGN="TOP">
<TD>Content:</TD>
<TD><TEXTAREA NAME="234234233242322222" ROWS=10 COLS=80></TEXTAREA></TD>
</TR>
<TR VALIGN="TOP">
<TD></TD>
<TD><INPUT TYPE="SUBMIT" VALUE="ADD"></TD>
</TR>
<TR><TD>&nbsp;</TD></TR>
</TD>
</TR>
</FORM>
</TABLE> 
</TABLE>