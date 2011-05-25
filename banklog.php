<?php
require("./global.php");
if (empty($_SESSION['username'])) {
header("Location: index.php"); 
} else {
$login=$_SESSION["username"];
$query="SELECT username, userid FROM users WHERE username='$login'";
$userid=mysql_fetch_array(mysql_query($query)) or die(nouser());
$userid=$userid['userid'];
$password=mysql_fetch_array(mysql_query("SELECT password FROM users WHERE userid='$userid'"));
$password=$password['password'];
}
if ($_SESSION["password"]==$password) {
if (!empty($_GET['accountno']) && !empty($_GET['bankid'])){
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">BANK OF CHURCHILL</TD></TR>
<?
		$accountno=$_GET['accountno'];
		$bankid=$_GET['bankid'];
		$loans2=mysql_fetch_array(mysql_query("SELECT * FROM accountlogin WHERE userid='$userid' AND accountno='$accountno' AND bankid='$bankid'"));
		$bpassword=$loans2['password'];
								if (!empty($bpassword)) {
													$loans2=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE accountno='$accountno' AND bankid='$bankid'"));
													$apassword=$loans2['password'];							
													$credits=$loans2['credits'];							
													if(!empty($apassword)) {
														if($apassword==$bpassword) {

													$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankid'"));
													$bankuserid=$bankuserid['userid'];
													$bankname=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$bankuserid'"));
													$bankname=$bankname['username'];

?>
<TR><TD><B>STATEMENT FOR ACCOUNT:</B></TD></TR>
<TR><TD>
			<TABLE WIDTH="100%" STYLE="font-size: 10pt;">
					<TR><TD><B>LOGGED IN TO:</B></TD></TR>
					<TR><TD>BANK</TD><TD>USERNAME:</TD><TD>CREDITS:</TD><TD>LOGOUT:</TR>
										<FORM METHOD="POST" ACTION="index.php?content=bank">
				<INPUT TYPE="HIDDEN" NAME="asidjaisodjasid2093993" VALUE="<? echo $loginid; ?>">
 				<TR VALIGN="TOP" colspan='2'><TD><? echo $bankname; ?></TD><TD><? echo $accountno; ?></TD><TD><? echo number_format($credits); ?><TD><INPUT TYPE="SUBMIT" NAME="aosdoao234234234234234sd" VALUE="LOGOUT"></TD></TR></FORM>
 				</TABLE>
</TD></TR>
<TR><TD><TABLE WIDTH=100%>
<TR><TD>DATE:</TD><TD>TYPE:</TD><TD>AMOUNT:</TD><TD>ACCOUNT NO:</TD><TD>BANK:</TD></TR>
<?
$loans=mysql_query("SELECT * FROM accountlog WHERE accountno='$accountno' AND bankid='$bankid' ORDER BY date ASC");
while ($loan = mysql_fetch_array($loans)) {
$type=$loan['type'];
$date=$loan['date'];
$to=$loan['toid'];
$tobankid=$loan['tobankid'];
$amount=$loan['inc'];
										
													if($tobankid!=0) {
													$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$tobankid'"));
													$bankuserid=$bankuserid['userid'];
													$bankname=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$bankuserid'"));
													$bankname=$bankname['username'];
} else { 	
$recname=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$to'"));
													$recname=$recname['username'];
 $bankname="USER"; $to="<A HREF=\"index.php?content=message&userid=" . $to . "\">[" . $recname . "]</A>";}
?>
<TR><TD><? echo $date; ?></TD><TD><? echo $type; ?></TD><TD><? if ($type=="TRANSFER") { echo "-";} else { echo "+";} echo $amount;?></TD><TD><? echo $to;?></TD><TD><? echo $bankname;?></TD></TR>
<?
}
?></TABLE>
</TD></TR>
</TABLE>
</TABLE>
<?


														} else {
															echo "Incorrect account or password for this bank";												
														}
														} else {
															echo "Incorrect account or password for this bank";										
														}
								} else {
									echo "You are not logged in to this account";												
								}
}
	

} else {
session_destroy();
header("Location: index.php"); 
}
