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
if (!empty($_GET['loanid'])){
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">BANK OF CHURCHILL</TD></TR>
<?
$query="SELECT username, userid FROM users WHERE username='$username'";
$userid=mysql_fetch_array(mysql_query($query)) or die("error");
$userid=$userid['userid'];
$loanid=$_GET['loanid'];
$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid' AND loanid='$loanid'");
$loan = mysql_fetch_array($loans);
$userid2=$loan['issuer'];
$loanid=$loan['loanid'];
$amount=$loan['amount'];
$context=$loan['context'];
$date=$loan['date'];
$payback=$loan['payback'];
$term=$loan['term'];
$interest=$loan['interest'];
$issuername=mysql_fetch_array(mysql_query("SELECT username FROM users WHERE userid='$userid2'"));
$issuername=$issuername['username'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
$online=$online['ip'];
if ($amount==0) {
$completed=1;
} else {
$completed=0;
}
if (!empty($loanid)) {
?>
<TR><TD><B>STATEMENT FOR LOAN:</B></TD></TR>
<TR><TD>
<TABLE STYLE="font-size:10pt;">
<TR><TD>ISSUER:</TD><TD>AMOUNT:</TD><TD>TERM:</TD><TD>CONTEXT: </TD><TD>DATE ISSUED:</TD><TD>PAY OFF:</TR>
<FORM METHOD="POST" ACTION="index.php?content=bank">
<INPUT TYPE="hidden" NAME="asdijaisodjoaiewjda" VALUE="<? echo $loanid; ?>">
<TR><TD><? if (!empty($online)) { ?><SPAN ID="BOLD"><? }?><A HREF="index.php?content=message&userid=<? echo $userid2; ?>">[<? echo $issuername; ?>]</A></TD><TD><A HREF="index.php?content=loanlog&loanid=<? echo $loanid; ?>">[<? if ($completed!=1) {echo number_format($amount); ?> <? if ($interest=="0") { echo "IF"; } else { echo "at ".$interest."% DPR"; } } else { echo "Completed"; }?>]</A></TD><TD><? if ($completed!=1) { if ($term>0) { echo $term;  ?> TURNS - <? echo $term-$payback;?> LEFT <? } else { echo "INFINITE"; } } else { echo "completed"; }?></TD><TD><?echo $context; ?></TD><TD><?echo $date;?></TD><TD ALIGN="RIGHT"><INPUT TYPE="TEXT" NAME="4433111"><INPUT TYPE="SUBMIT" NAME="1123123123" VALUE="PAY OFF"></TD></TR>
</FORM>
</TABLE>
</TD></TR>
<TR><TD><TABLE WIDTH=100%>
<TR><TD>DATE:</TD><TD>TYPE:</TD><TD>AMOUNT</TR>
<?
$loans=mysql_query("SELECT * FROM loanlog WHERE loanid='$loanid' ORDER BY date ASC");
while ($loan = mysql_fetch_array($loans)) {
$type=$loan['type'];
$date=$loan['date'];
$amount=$loan['inc'];
?>
<TR><TD><? echo $date; ?></TD><TD><? echo $type; ?></TD><TD><? if ($type=="Repayment" || $type=="Loan Completed") { echo "-";} else { echo "+";} echo $amount;?></TR>
<?
}
?>
</TABLE>
</TD></TR>
</TABLE>
</TABLE>
<?
}
}
} else {
session_destroy();
header("Location: index.php"); 
}