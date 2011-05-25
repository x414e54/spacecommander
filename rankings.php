<?php
require("./global.php");
$paused=mysql_fetch_array(mysql_query("SELECT paused FROM admin WHERE admin_id='0001'"));
$paused=$paused['paused'];
if ($paused!="1") {
			$query="SELECT userid FROM users";
			$users = mysql_query($query) or die("Select Failed!");

while ($user = mysql_fetch_array($users)) {
			$userid=$user['userid'];
			$admin=mysql_fetch_array(mysql_query("SELECT admin, isbank FROM users WHERE userid='$userid'"));
			$isbank=$admin['isbank'];
			$admin=$admin['admin'];
			if ($admin!="1" && $isbank!="1") {
			$suspended=mysql_fetch_array(mysql_query("SELECT suspended FROM users WHERE userid='$userid'"));
			$suspended=$suspended['suspended'];
			if ($suspended!="1") {
			$units=mysql_fetch_array(mysql_query("SELECT units FROM users WHERE userid='$userid'"));
			$units=$units['units'];
			$race=mysql_fetch_array(mysql_query("SELECT race FROM users WHERE userid='$userid'"));
			$race=$race['race'];
			$attacklevel=mysql_fetch_array(mysql_query("SELECT attacklevel FROM users WHERE userid='$userid'"));
			$attacklevel=$attacklevel['attacklevel'];
			$defenselevel=mysql_fetch_array(mysql_query("SELECT defenselevel FROM users WHERE userid='$userid'"));
			$defenselevel=$defenselevel['defenselevel'];
			$attackstotal="1";
			$attacks=mysql_fetch_array(mysql_query("SELECT attack1, attack2, attack3, attack4, attack5, attack6, attack7 FROM users WHERE userid='$userid'"));
			$unitstotal=$units;
			if (($unitstotal-$attacks['attack7'])<0) {
				$unitstotal7=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal7=5*$attacks['attack7'];
				$unitstotal=$unitstotal-$attacks['attack7'];
			}
			if (($unitstotal-$attacks['attack6'])<0) {
				$unitstotal6=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal6=5*$attacks['attack6'];
				$unitstotal=$unitstotal-$attacks['attack6'];
			}
			if (($unitstotal-$attacks['attack5'])<0) {
				$unitstotal5=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal5=5*$attacks['attack5'];
				$unitstotal=$unitstotal-$attacks['attack5'];
			}
			if (($unitstotal-$attacks['attack4'])<0) {
				$unitstotal4=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal4=5*$attacks['attack4'];
				$unitstotal=$unitstotal-$attacks['attack4'];
			}
			if (($unitstotal-$attacks['attack3'])<0) {
				$unitstotal3=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal3=5*$attacks['attack3'];
				$unitstotal=$unitstotal-$attacks['attack3'];
			}
			if (($unitstotal-$attacks['attack2'])<0) {
				$unitstotal2=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal2=5*$attacks['attack2'];
				$unitstotal=$unitstotal-$attacks['attack2'];
			}
			if (($unitstotal-$attacks['attack1'])<0) {
				$unitstotal1=5*$unitstotal;
				$unitstotal=0;
			} else {
				$unitstotal1=5*$attacks['attack1'];
				$unitstotal=$unitstotal-$attacks['attack1'];
			}
			$attackstotal=$attackstotal+(2560*$unitstotal7);
			$attackstotal=$attackstotal+(640*$unitstotal6);
			$attackstotal=$attackstotal+(160*$unitstotal5);
			$attackstotal=$attackstotal+(40*$unitstotal4);
			$attackstotal=$attackstotal+(20*$unitstotal3);
			$attackstotal=$attackstotal+(10*$unitstotal2);
			$attackstotal=$attackstotal+(5*$unitstotal1);
			$attackstotal=$attackstotal+$unitstotal;

			$attacks="";
			$defensestotal="1";
			$defenses=mysql_fetch_array(mysql_query("SELECT defense1, defense2, defense3, defense4, defense5, defense6, defense7 FROM users WHERE userid='$userid'"));
			$unitstotal2=$units;
			if (($unitstotal2-$defenses['defense7'])<0) {
				$unitstotal27=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal27=5*$defenses['defense7'];
				$unitstotal2=$unitstotal2-$defenses['defense7'];
			}
			if (($unitstotal2-$defenses['defense6'])<0) {
				$unitstotal26=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal26=5*$defenses['defense6'];
				$unitstotal2=$unitstotal2-$defenses['defense6'];
			}
			if (($unitstotal2-$defenses['defense5'])<0) {
				$unitstotal25=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal25=5*$defenses['defense5'];
				$unitstotal2=$unitstotal2-$defenses['defense5'];
			}
			if (($unitstotal2-$defenses['defense4'])<0) {
				$unitstotal24=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal24=5*$defenses['defense4'];
				$unitstotal2=$unitstotal2-$defenses['defense4'];
			}
			if (($unitstotal2-$defenses['defense3'])<0) {
				$unitstotal23=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal23=5*$defenses['defense3'];
				$unitstotal2=$unitstotal2-$defenses['defense3'];
			}
			if (($unitstotal2-$defenses['defense2'])<0) {
				$unitstotal22=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal22=5*$defenses['defense2'];
				$unitstotal2=$unitstotal2-$defenses['defense2'];
			}
			if (($unitstotal2-$defenses['defense1'])<0) {
				$unitstotal21=5*$unitstotal2;
				$unitstotal2=0;
			} else {
				$unitstotal21=5*$defenses['defense1'];
				$unitstotal2=$unitstotal2-$defenses['defense1'];
			}
			$defensestotal=$defensestotal+(2560*$unitstotal27);
			$defensestotal=$defensestotal+(640*$unitstotal26);
			$defensestotal=$defensestotal+(160*$unitstotal25);
			$defensestotal=$defensestotal+(40*$unitstotal24);
			$defensestotal=$defensestotal+(20*$unitstotal23);
			$defensestotal=$defensestotal+(10*$unitstotal22);
			$defensestotal=$defensestotal+(5*$unitstotal21);
			$defensestotal=$defensestotal+$unitstotal2;

			$defenses="";
			$userdamage=round(($attackstotal)*pow(1.25, $attacklevel));
			$userdefense=round(($defensestotal)*pow(1.25, $defenselevel));
			$userincome=round($units * 50);
			$gotattack=mysql_fetch_array(mysql_query("SELECT gotattack FROM users WHERE userid='$userid'"));
			$gotattack=$gotattack['gotattack'];
			if ($gotattack=="1") {
			$userdamage=round($userdamage*1.50);
			}
			$gotdefense=mysql_fetch_array(mysql_query("SELECT gotdefense FROM users WHERE userid='$userid'"));
			$gotdefense=$gotdefense['gotdefense'];
			if ($gotdefense=="1") {
			$userdefense=round($userdefense*1.50);
			}
			$gotbank=mysql_fetch_array(mysql_query("SELECT gotbank FROM users WHERE userid='$userid'"));
			$gotbank=$gotbank['gotbank'];
			if ($gotbank=="1") {
			$userincome=round($userincome*1.25);
			}
			$suicide=mysql_fetch_array(mysql_query("SELECT suicidepoints FROM users WHERE userid='$userid'"));
			$suicide=$suicide['suicidepoints'];
			$average=(($userincome+$userdefense+$userdamage)/3)-$suicide*1000;
			$query="UPDATE users SET average='$average' WHERE userid='$userid'";
	 		$updaterank=mysql_query($query) or die("error");
			}
			}
}
			$query="SELECT userid FROM users ORDER BY average DESC";
			$users = mysql_query($query) or die("Select Failed!");
$i=1;
while ($user = mysql_fetch_array($users)) {
			$userid=$user['userid'];
			$admin=mysql_fetch_array(mysql_query("SELECT isbank FROM users WHERE userid='$userid'"));
			$isbank=$admin['isbank'];
			$admin=$admin['admin'];
			if ($admin!="1" && $isbank!="1") {
			$suspended=mysql_fetch_array(mysql_query("SELECT suspended FROM users WHERE userid='$userid'"));
			$suspended=$suspended['suspended'];
			if ($suspended!="1") {
			$race=mysql_fetch_array(mysql_query("SELECT race FROM users WHERE userid='$userid'"));
			$race=$race['race'];
			if ($race!="0") {
			$query="UPDATE users SET rank='$i' WHERE userid='$userid'";
	 		$updaterank=mysql_query($query) or die("error");
			$i++;
			} else {
			$query="UPDATE users SET rank='0' WHERE userid='$userid'";
	 		$updaterank=mysql_query($query) or die("error");
			}
			} else {
			$query="UPDATE users SET rank='-1' WHERE userid='$userid'";
	 		$updaterank=mysql_query($query) or die("error");
			}
			} else {
			$query="UPDATE users SET rank='-2' WHERE userid='$userid'";
	 		$updaterank=mysql_query($query) or die("error");
			}
}
}