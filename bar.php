<?
require('./global.php');
?>
<?
if ($admin!="1"&&$userid>0) {
?>
<br><A HREF="./index.php?content=main">[COMMAND CENTER]</A><br>
<br><A HREF="./index.php?content=attacklog">[ATTACK LOG]</A><br>
<br><A HREF="./index.php?content=planet">[PLANET]</A><br>
<br><A HREF="./index.php?content=solar">[SOLAR SYSTEM]</A><br>
<br><A HREF="./index.php?content=galaxy">[GALAXY]</A><br>
<br><A HREF="./index.php?content=universe">[UNIVERSE]</A><br>
<br><A HREF="./index.php?content=armory">[ARMORY]</A><br>
<br><A HREF="./index.php?content=randd">[RESEARCH]</A><br>
<? if ($isbank!="1") { ?>
<br><A HREF="./index.php?content=bank">[BANK]</A><br>
<?}?>
<br><A HREF="./index.php?content=intelligence">[INTELLIGENCE]</A><br>
<? } 
if ($userid>0) {?>
<br><A HREF="./index.php?content=messages">[MESSAGES]</A><br>
<?
}
if ($admin=="1") {
?>
<br><A HREF="./index.php?content=admin">[ADMIN]</A><br>
<br><A HREF="./todo.txt" TARGET="_new">[TODO LIST]</A><br>
<?
}
if ($isbank=="1") {
?>
<br><A HREF="./index.php?content=isbank">[BANK ACCOUNTS]</A><br>
<?
}
if ($moderator=="1" && $admin!="1") {
?>
<br><A HREF="./index.php?content=moderator">[MODERATOR]</A><br>
<?
}
?>
<br>
<br><A HREF="./index.php?content=chat">[CHAT]</A><br>
<br><A HREF="./index.php?content=help">[HELP]</A><br>
<br><A HREF="./index.php?content=rules">[RULES]</A><br>
<br><A HREF="./index.php?content=forum">[FORUM]</A><br><br>
<?
////////
?>	