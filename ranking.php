<?php

if (!isset($content) && empty($_SESSION["username"])){
	$content="ranking";
	require('./index.php');
} else {
?>
<br>
<div class="header">Rankings</div>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR VALIGN="TOP">
<TD>Rank</TD><TD>Username</TD><TD ALIGN="RIGHT">Units</TD><TD ALIGN="RIGHT">Credits</TD>
</TR>
<?
$ranking=mysql_query("SELECT rank, username, credits, units, userid FROM users ORDER BY rank");
while ($rank = mysql_fetch_array($ranking)) {
$rankno=$rank['rank'];
if ($rankno!="-1" && $rankno!="0" && $rankno!="-2") {
$userid2=$rank['userid'];
$usernamer=$rank['username'];
$units=$rank['units'];
$credits=$rank['credits'];
?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM"><? echo number_format($rankno); ?></TD><TD><? echo $usernamer; ?></A></TD><TD ALIGN="RIGHT"><? echo number_format($units); ?></TD><TD ALIGN="RIGHT"><? echo number_format($credits); ?></TD>
</TR>
<?
}
}
?>
</TABLE>
</TD>
</TR>
</TABLE>
<? } ?>