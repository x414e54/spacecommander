<?
$query="SELECT * FROM users WHERE userid='$userid2'";
$attacks=mysql_query($query);
$attacks=mysql_fetch_array($attacks);
$attacks1=$attacks['attack1'];
$attacks2=$attacks['attack2'];
$attacks3=$attacks['attack3'];
$attacks4=$attacks['attack4'];
$attacks5=$attacks['attack5'];
$attacks6=$attacks['attack6'];
$attacks7=$attacks['attack7'];
$attacks="";
$spyextra="<BR><BR>
<TABLE CELLPADDING=\'1\' CELLSPACING=\'0\' BORDER=\'0\' ALIGN=\'CENTER\' WIDTH=\'90%\'><TR><TD>
<TABLE CELLPADDING=\'4\' CELLSPACING=\'0\' BORDER=\'0\' WIDTH=\'100%\'>
<TR ID=\"TABLEHEAD\"><TD COLSPAN=\"2\">CURRENT ATTACK</TD><TD></TD></TR>
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">WEAPON</TD><TD ALIGN=\"RIGHT\">NUMBER</TD>
</TR>";
if (!empty($attacks1)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">Metal Fists</TD><TD>" . $attacks1 . "</TD>
</TR>";
} if (!empty($attacks2)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">Laser Sabre</TD><TD>" . $attacks2 . "</TD>
</TR>";
} if (!empty($attacks3)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">Laser</TD><TD>" . $attacks3 . "</TD>
</TR>";
} if (!empty($attacks4)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">RPG\'s</TD><TD>" . $attacks4 . "</TD>
</TR>";
} if (!empty($attacks5)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">Rail Gun</TD><TD>" . $attacks5 . "</TD>
</TR>";
} if (!empty($attacks6)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">Laser Cannon</TD><TD>" . $attacks6 . "</TD>
</TR>";
} if (!empty($attacks7)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">Temporal Cannon</TD><TD>" . $attacks7 . "</TD>
</TR>";
}
$spyextra=$spyextra . "
</TABLE>
</TD>
</TR>
</TABLE> 
<BR>
<BR>
";
$query="SELECT * FROM users WHERE userid='$userid2'";
$defenses=mysql_query($query);
$defenses=mysql_fetch_array($defenses);
$defenses1=$defenses['defense1'];
$defenses2=$defenses['defense2'];
$defenses3=$defenses['defense3'];
$defenses4=$defenses['defense4'];
$defenses5=$defenses['defense5'];
$defenses6=$defenses['defense6'];
$defenses7=$defenses['defense7'];
$defenses="";
$spyextra=$spyextra . "
<TABLE CELLPADDING=\'1\' CELLSPACING=\'0\' BORDER=\'0\' ALIGN=\'CENTER\' WIDTH=\'90%\'><TR><TD>
<TABLE CELLPADDING=\'4\' CELLSPACING=\'0\' BORDER=\'0\' WIDTH=\'100%\'>
<TR ID=\"TABLEHEAD\"><TD COLSPAN=\"2\">CURRENT DEFENCE</TD><TD></TD></TR>
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">WEAPON</TD><TD ALIGN=\"RIGHT\">NUMBER</TD>
</TR>";
if (!empty($defenses1)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">Riot Shield</TD><TD>" . $defenses1 . "</TD>
</TR>";
} if (!empty($defenses2)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">Riot Armor</TD><TD>" . $defenses2 . "</TD>
</TR>";
} if (!empty($defenses3)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">T10k Protective Armor</TD><TD>" . $defenses3 . "</TD>
</TR>";
} if (!empty($defenses4)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">T40k Protective Suit</TD><TD>" .  $defenses4 . "</TD>
</TR>";
} if (!empty($defenses5)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">Proton Shield</TD><TD>" . $defenses5 . "</TD>
</TR>";
} if (!empty($defenses6)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">Proton Armor</TD><TD>" . $defenses6 . "</TD>
</TR>";
} if (!empty($defenses7)) {
$spyextra=$spyextra . "
<TR VALIGN=\"TOP\">
<TD><SPAN ID=\"MEDIUM\">Temporal Shield</TD><TD>" . $defenses7 . "</TD>
</TR>";
}
$spyextra=$spyextra . "
</TABLE>
</TD>
</TR>
</TABLE>";
?>