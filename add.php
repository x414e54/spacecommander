<?php
if ($_GET['123123123123']=="12312312345445") {
require("./global.php");
$paused=mysql_fetch_array(mysql_query("SELECT paused FROM admin WHERE admin_id='0001'"));
$paused=$paused['paused'];

if ($paused!="1") {

			$query="SELECT userid FROM users";
			$users = mysql_query($query) or die("Select Failed!");

while ($user = mysql_fetch_array($users)) {

			$userid=$user['userid'];
			$database=mysql_fetch_array(mysql_query("SELECT suspended, race, bankrupt, gotunitsless, gotcheapwm, gotdouble, credits, debt, orelevel, gotbank, attacklevel, isbank, defenselevel, attackcredits, gotclone FROM users WHERE userid='$userid'"));
			$suspended=$database['suspended'];
			$race=$database['race'];
			$bankrupt=$database['bankrupt'];
			$isbank=$database['isbank'];
           
			if ($suspended!="1" & $race!="0" & $bankrupt!="1") {
				$gotunitsless=$database['gotunitsless'];
				$gotdouble=$database['gotdouble'];
				$credits=$database['credits'];
				$debt=$database['debt'];
				$orelevel=$database['orelevel'];
				$attacklevel=$database['attacklevel'];
				$defenselevel=$database['defenselevel'];
				$gotbank=$database['gotbank'];
				$gotclone=$database['gotclone'];
				$attackcredits=$database['attackcredits'] + 1;

				if ($gotdobule=="1") {
					$attackcredits=$attackcredits + 1;
				}

				$units=mysql_fetch_array(mysql_query("SELECT units FROM users WHERE userid='$userid'"));
					$units=$units['units'];
				if ($gotclone=="1") {
					$units++;
		 			$query=mysql_query("UPDATE users SET units='$units' WHERE userid='$userid'");
					$units=mysql_fetch_array(mysql_query("SELECT units FROM users WHERE userid='$userid'"));
					$units=$units['units'];
				}

				$credits2=round((100 * pow(1.25, $orelevel))*$units);
					echo "Credits2=";
					echo $credits2;
				if ($gotbank=="1") {
					$credits2=round($credits2 * 1.25);
					echo "Credits2=";
					echo $credits2;
				}


				if ($gotunitsless=="1") {
					$uniter=($units*1*$orelevel);
					echo "uniter=";
					echo $uniter;
				} else {
					$uniter=($units*10*$orelevel);
					echo "uniter=";
					echo $uniter;
				}

				$credits=round(($credits+$credits2)-($uniter));
					echo "credits=";
					echo $credits;

				if ($isbank!=1) {
				$query="SELECT * FROM users WHERE userid='$userid'";
				$thinger=mysql_fetch_array(mysql_query($query));
				$hlattack1=$thinger['hlattack1']-(0.1*$thinger['attack1']);
				$hlattack2=$thinger['hlattack2']-(0.1*$thinger['attack2']);
				$hlattack3=$thinger['hlattack3']-(0.1*$thinger['attack3']);
				$hlattack4=$thinger['hlattack4']-(0.1*$thinger['attack4']);
				$hlattack5=$thinger['hlattack5']-(0.1*$thinger['attack5']);
				$hlattack6=$thinger['hlattack6']-(0.1*$thinger['attack6']);
				$hlattack7=$thinger['hlattack7']-(0.1*$thinger['attack7']);
				$hlattack8=$thinger['hlattack8']-(0.1*$thinger['attack8']);
				$hldefense1=$thinger['hldefense1']-(0.1*$thinger['defense1']);
				$hldefense2=$thinger['hldefense2']-(0.1*$thinger['defense2']);
				$hldefense3=$thinger['hldefense3']-(0.1*$thinger['defense3']);
				$hldefense4=$thinger['hldefense4']-(0.1*$thinger['defense4']);
				$hldefense5=$thinger['hldefense5']-(0.1*$thinger['defense5']);
				$hldefense6=$thinger['hldefense6']-(0.1*$thinger['defense6']);
				$hldefense7=$thinger['hldefense7']-(0.1*$thinger['defense7']);
				$hldefense8=$thinger['hldefense8']-(0.1*$thinger['defense8']);
				if ($hlattack1<0) { $hlattack1=0; }
				if ($hlattack2<0) { $hlattack2=0; }
				if ($hlattack3<0) { $hlattack3=0; }
				if ($hlattack4<0) { $hlattack4=0; }
				if ($hlattack5<0) { $hlattack5=0; }
				if ($hlattack6<0) { $hlattack6=0; }
				if ($hlattack7<0) { $hlattack7=0; }
				if ($hlattack8<0) { $hlattack8=0; }
				if ($hldefense1<0) { $hldefense1=0; }
				if ($hldefense2<0) { $hldefense2=0; }
				if ($hldefense3<0) { $hldefense3=0; }
				if ($hldefense4<0) { $hldefense4=0; }
				if ($hldefense5<0) { $hldefense5=0; }
				if ($hldefense6<0) { $hldefense6=0; }
				if ($hldefense7<0) { $hldefense7=0; }
				if ($hldefense8<0) { $hldefense8=0; }
				$query="UPDATE users SET hlattack1='$hlattack1', hlattack2='$hlattack2', hlattack3='$hlattack3', hlattack4='$hlattack4', hlattack5='$hlattack5', hlattack6='$hlattack6', hlattack7='$hlattack7', hlattack8='$hlattack8', hldefense1='$hldefense1', hldefense2='$hldefense2', hldefense3='$hldefense3', hldefense4='$hldefense4', hldefense5='$hldefense5', hldefense6='$hldefense6', hldefense7='$hldefense7', hldefense8='$hldefense8' WHERE userid='$userid'";
				$go=mysql_query($query);

				if ($thinger['autorepair']==1) {
					
					
				$query="SELECT * FROM users WHERE userid='$userid'";
								$defenses=mysql_fetch_array(mysql_query($query));
							$gotcheapwm=$defenses['gotcheapwm'];
			if ($gotcheapwm == "1") {
			$a1000=500;
			$a1800=900;
			$a3200=1600;
			$a5100=2550;
			$a16400=8200;
			$a52400=26200;
			$a167800=83900;
			$a471600=235800;
			} else {
			$a1000=1000;
			$a1800=1800;
			$a3200=3200;
			$a5100=5100;
			$a16400=16400;
			$a52400=52400;
			$a167800=167800;
			$a471600=471600;
			}	
				$defenses1=$defenses['defense1'];
				$hldefenses1=$defenses['hldefense1'];
				$costrep1=round($a1000*(((100*$defenses1)-($hldefenses1))/100));
				$costa1=round($costrep1/(100-($hldefenses1/$defenses1)));
		
				$defenses2=$defenses['defense2'];
				$hldefenses2=$defenses['hldefense2'];
				$costrep2=round($a1800*(((100*$defenses2)-($hldefenses2))/100));
				$costa2=round($costrep2/(100-($hldefenses2/$defenses2)));
	
				$defenses3=$defenses['defense3'];
				$hldefenses3=$defenses['hldefense3'];
				$costrep3=round($a3200*(((100*$defenses3)-($hldefenses3))/100));
				$costa3=round($costrep3/(100-($hldefenses3/$defenses3)));

				$defenses4=$defenses['defense4'];
				$hldefenses4=$defenses['hldefense4'];
				$costrep4=round($a5100*(((100*$defenses4)-($hldefenses4))/100));
				$costa4=round($costrep4/(100-($hldefenses4/$defenses4)));
				
				$defenses5=$defenses['defense5'];
				$hldefenses5=$defenses['hldefense5'];
				$costrep5=round($a16400*(((100*$defenses5)-($hldefenses5))/100));
				$costa5=round($costrep5/(100-($hldefenses5/$defenses5)));
		
				$defenses6=$defenses['defense6'];
				$hldefenses6=$defenses['hldefense6'];
				$costrep6=round($a52400*(((100*$defenses6)-($hldefenses6))/100));
				$costa6=round($costrep6/(100-($hldefenses6/$defenses6)));

				$defenses7=$defenses['defense7'];
				$hldefenses7=$defenses['hldefense7'];
				$costrep7=round($a167800*(((100*$defenses7)-($hldefenses7))/100));
				$costa7=round($costrep7/(100-($hldefenses7/$defenses7)));

				$defenses8=$defenses['defense8'];
				$hldefenses8=$defenses['hldefense8'];
				$costrep8=round($a471600*(((100*$defenses8)-($hldefenses8))/100));
				$costa8=round($costrep8/(100-($hldefenses8/$defenses8)));
				
				
			if ($defenses8>0) {
				$posdefenses8=100-$hldefenses8/$defenses8;
				$money=$posdefenses8*$costa8;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hldefenses8=$hldefenses8+($posdefenses8*$moneyer*$defenses8);
					$credits=$credits-$costa8*($posdefenses8*$moneyer);
				} else {
					$hldefenses8=$hldefenses8+($posdefenses8*$defenses8);
					$credits=$credits-$costa8*$posdefenses8;
				}
			}
			if ($defenses7>0) {
				$posdefenses7=100-$hldefenses7/$defenses7;
				$money=$posdefenses7*$costa7;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hldefenses7=$hldefenses7+($posdefenses7*$moneyer*$defenses7);
					$credits=$credits-$costa7*($posdefenses7*$moneyer);
				} else {
					$hldefenses7=$hldefenses7+($posdefenses7*$defenses7);
					$credits=$credits-$costa7*$posdefenses7;
				}
			}	
			if ($defenses6>0) {
				$posdefenses6=100-$hldefenses6/$defenses6;
				$money=$posdefenses6*$costa6;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hldefenses6=$hldefenses6+($posdefenses6*$moneyer*$defenses6);
					$credits=$credits-$costa6*($posdefenses6*$moneyer);
				} else {
					$hldefenses6=$hldefenses6+($posdefenses6*$defenses6);
					$credits=$credits-$costa6*$posdefenses6;
				}
			}
			if ($defenses5>0) {
				$posdefenses5=100-$hldefenses5/$defenses5;
				$money=$posdefenses5*$costa5;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hldefenses5=$hldefenses5+($posdefenses5*$moneyer*$defenses5);
					$credits=$credits-$costa5*($posdefenses5*$moneyer);
				} else {
					$hldefenses5=$hldefenses5+($posdefenses5*$defenses5);
					$credits=$credits-$costa5*$posdefenses5;
				}
			}
			if ($defenses4>0) {
				$posdefenses4=100-$hldefenses4/$defenses4;
				$money=$posdefenses4*$costa4;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hldefenses4=$hldefenses4+($posdefenses4*$moneyer*$defenses4);
					echo $hldefenses4;
					echo "<BR>";
					$credits=$credits-$costa4*($posdefenses4*$moneyer);
					echo $credits;
					echo "<BR>";
				} else {
					$hldefenses4=$hldefenses4+($posdefenses4*$defenses4);
					$credits=$credits-$costa4*$posdefenses4;
				}
			}
			if ($defenses3>0) {
				$posdefenses3=100-$hldefenses3/$defenses3;
				$money=$posdefenses3*$costa3;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hldefenses3=$hldefenses3+($posdefenses3*$moneyer*$defenses3);
					$credits=$credits-$costa3*($posdefenses3*$moneyer);
				} else {
					$hldefenses3=$hldefenses3+($posdefenses3*$defenses3);
					$credits=$credits-$costa3*$posdefenses3;
				}
			}
			if ($defenses2>0) {
				$posdefenses2=100-$hldefenses2/$defenses2;
				$money=$posdefenses2*$costa2;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hldefenses2=$hldefenses2+($posdefenses2*$moneyer*$defenses2);
					$credits=$credits-$costa2*($posdefenses2*$moneyer);
				} else {
					$hldefenses2=$hldefenses2+($posdefenses2*$defenses2);
					$credits=$credits-$costa2*$posdefenses2;
				}
			}
			if ($defenses1>0) {
				$posdefenses1=100-$hldefenses1/$defenses1;
				$money=$posdefenses1*$costa1;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hldefenses1=$hldefenses1+($posdefenses1*$moneyer*$defenses1);
					$credits=$credits-$costa1*($posdefenses1*$moneyer);
				} else {
					$hldefenses1=$hldefenses1+($posdefenses1*$defenses1);
					$credits=$credits-$costa1*$posdefenses1;
				}
}
				$attacks=$defenses;
				$attacks1=$attacks['attack1'];
				$hlattacks1=$attacks['hlattack1'];
				$costrep1=round($a1000*(((100*$attacks1)-($hlattacks1))/100));
				$costa1=round($costrep1/(100-($hlattacks1/$attacks1)));
	
				$attacks2=$attacks['attack2'];
				$hlattacks2=$attacks['hlattack2'];
				$costrep2=round($a1800*(((100*$attacks2)-($hlattacks2))/100));
				$costa2=round($costrep2/(100-($hlattacks2/$attacks2)));

				$attacks3=$attacks['attack3'];
				$hlattacks3=$attacks['hlattack3'];
				$costrep3=round($a3200*(((100*$attacks3)-($hlattacks3))/100));
				$costa3=round($costrep3/(100-($hlattacks3/$attacks3)));

				$attacks4=$attacks['attack4'];
				$hlattacks4=$attacks['hlattack4'];
				$costrep4=round($a5100*(((100*$attacks4)-($hlattacks4))/100));
				$costa4=round($costrep4/(100-($hlattacks4/$attacks4)));

				$attacks5=$attacks['attack5'];
				$hlattacks5=$attacks['hlattack5'];
				$costrep5=round($a16400*(((100*$attacks5)-($hlattacks5))/100));
				$costa5=round($costrep5/(100-($hlattacks5/$attacks5)));
	
				$attacks6=$attacks['attack6'];
				$hlattacks6=$attacks['hlattack6'];
				$costrep6=round($a52400*(((100*$attacks6)-($hlattacks6))/100));
				$costa6=round($costrep6/(100-($hlattacks6/$attacks6)));
	
				$attacks7=$attacks['attack7'];
				$hlattacks7=$attacks['hlattack7'];
				$costrep7=round($a167800*(((100*$attacks7)-($hlattacks7))/100));
				$costa7=round($costrep7/(100-($hlattacks7/$attacks7)));

				$attacks8=$attacks['attack8'];
				$hlattacks8=$attacks['hlattack8'];
				$costrep8=round($a471600*(((100*$attacks8)-($hlattacks8))/100));
				$costa8=round($costrep8/(100-($hlattacks8/$attacks8)));
				if ($attacks8>0) {
				$posattacks8=100-$hlattacks8/$attacks8;
				$money=$posattacks8*$costa8;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hlattacks8=$hlattacks8+($posattacks8*$moneyer*$attacks8);
					$credits=$credits-$costa8*($posattacks8*$moneyer);
				} else {
					$hlattacks8=$hlattacks8+($posattacks8*$attacks8);
					$credits=$credits-$costa8*$posattacks8;
				}
			}
				if ($attacks7>0) {
				$posattacks7=100-$hlattacks7/$attacks7;
				$money=$posattacks7*$costa7;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hlattacks7=$hlattacks7+($posattacks7*$moneyer*$attacks7);
					$credits=$credits-$costa7*($posattacks7*$moneyer);
				} else {
					$hlattacks7=$hlattacks7+($posattacks7*$attacks7);
					$credits=$credits-$costa7*$posattacks7;
				} 
				}
				
				if ($attacks6>0) {
				$posattacks6=100-$hlattacks6/$attacks6;
				$money=$posattacks6*$costa6;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hlattacks6=$hlattacks6+($posattacks6*$moneyer*$attacks6);
					$credits=$credits-$costa6*($posattacks6*$moneyer);
				} else {
					$hlattacks6=$hlattacks6+($posattacks6*$attacks6);
					$credits=$credits-$costa6*$posattacks6;
				} 			}
				if ($attacks5>0) {
				$posattacks5=100-$hlattacks5/$attacks5;
				$money=$posattacks5*$costa5;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hlattacks5=$hlattacks5+($posattacks5*$moneyer*$attacks5);
					$credits=$credits-$costa5*($posattacks5*$moneyer);
				} else {
					$hlattacks5=$hlattacks5+($posattacks5*$attacks5);
					$credits=$credits-$costa5*$posattacks5;
				}
				
			}
								if ($attacks4>0) {
				$posattacks4=100-$hlattacks4/$attacks4;
				$money=$posattacks4*$costa4;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hlattacks4=$hlattacks4+($posattacks4*$moneyer*$attacks4);
					$credits=$credits-$costa4*($posattacks4*$moneyer);
				}	 else {
					$hlattacks4=$hlattacks4+($posattacks4*$attacks4);
					$credits=$credits-$costa4*$posattacks4;
				}
				}
									if ($attacks3>0) {
				$posattacks3=100-$hlattacks3/$attacks3;
				$money=$posattacks3*$costa3;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hlattacks3=$hlattacks3+($posattacks3*$moneyer*$attacks3);
					$credits=$credits-$costa3*($posattacks3*$moneyer);
				} else {
					$hlattacks3=$hlattacks3+($posattacks3*$attacks3);
					$credits=$credits-$costa3*$posattacks3;
				}
			}
								if ($attacks2>0) {
				$posattacks2=100-$hlattacks2/$attacks2;
				$money=$posattacks2*$costa2;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hlattacks2=$hlattacks2+($posattacks2*$moneyer*$attacks2);
					$credits=$credits-$costa2*($posattacks2*$moneyer);
				} else {
					$hlattacks2=$hlattacks2+($posattacks2*$attacks2);
					$credits=$credits-$costa2*$posattacks2;
				}
			}
								if ($attacks1>0) {
				$posattacks1=100-$hlattacks1/$attacks1;
				$money=$posattacks1*$costa1;
				$moneyer=$credits/$money;
				if ($moneyer<1) {
					$hlattacks1=$hlattacks1+($posattacks1*$moneyer*$attacks1);
					$credits=$credits-$costa1*($posattacks1*$moneyer);
				} else {
					$hlattacks1=$hlattacks1+($posattacks1*$attacks1);
					$credits=$credits-$costa1*$posattacks1;
				}
			}
				$query="UPDATE users SET hlattack1='$hlattacks1', hlattack2='$hlattacks2', hlattack3='$hlattacks3', hlattack4='$hlattacks4', hlattack5='$hlattacks5', hlattack6='$hlattacks6', hlattack7='$hlattacks7', hlattack8='$hlattacks8', hldefense1='$hldefenses1', hldefense2='$hldefenses2', hldefense3='$hldefenses3', hldefense4='$hldefenses4', hldefense5='$hldefenses5', hldefense6='$hldefenses6', hldefense7='$hldefenses7', hldefense8='$hldefenses8' WHERE userid='$userid'";
				$go=mysql_query($query);
				}
}
				if ($credits<0) {
					$bankrupt=1;
					$time=date("Y/m/d G:i:s");
					$contentuser="THIS IS AN AUTOMATED MESSAGE TELLING YOU THAT YOU ARE NOW BANKRUPT AS YOU WERE UNABLE TO AFFORD TO PAY YOUR UNITS THE MAY START TO LEAVE NOW";
			 		$query="INSERT INTO messages SET userid='$userid', userid2='$userid', content='$contentuser', time='$time'";
			 		$new=mysql_query($query) or die("error55439");
					$credits=0;
				} else {
					$backrupt=0;
				}
				$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid'");
				while ($loan = mysql_fetch_array($loans)) {
				$userid2=$loan['issuer'];
				$amount=$loan['amount'];
				$loanid=$loan['loanid'];
				$payback=$loan['payback'];
				$date=$loan['date'];
				$term=$loan['term'];
				if ($amount!=0) {
				if ($term!=0) {
					$payback++;
				}
				$interest=$loan['interest'];
				if ($interest>0){
				$br="<BR>";
echo $interest;
echo $br;
$interest=(100+$interest)/100;
echo $interest;
echo $br;
echo $amount;
echo $br;
$time=48;
echo $time;
echo $br;
$base=exp(1);
echo $base;
echo $br;
$ln2=log($interest,exp(1));
echo $ln2;
echo $br;
$ln2720=exp($ln2/$time);
echo $ln2720;
echo $br;
$total=exp($ln2/$time);
echo $total;
echo $br;
$interest=$total;
echo $interest;
echo $br;
$inc=$amount;
echo $inc;
echo $br;
$amount=round($amount*$interest);
echo $amount;
echo $br;
				$inc=round($amount-$inc);
				$type="Intrest";
				$time=date("Y/m/d G:i:s");
		 		$query="UPDATE loans SET amount='$amount', payback='$payback', date='$date' WHERE loanid='$loanid'";
		 		$database=mysql_query($query) or die("error");
		 		$query="INSERT INTO loanlog SET type='$type', inc='$inc', date='$time', loanid='$loanid'";
		 		$database=mysql_query($query) or die("error");
				}
				if (($term-$payback)<=5 && ($term-$payback)>0 && $term!=0) {
					$time=date("Y/m/d G:i:s");
					$checkerer=$term-$payback;
					$contentuser="THIS IS AN AUTOMATED MESSAGE YOU HAVE LESS THAN " . $checker. " TURNS TO REPAY YOUR LOAN TO THIS USER.";
			 		$query="INSERT INTO messages SET userid='$userid', userid2='$userid2', content='$contentuser', time='$time'";
			 		$new=mysql_query($query) or die("error55439");
				}
				echo "payback = ";
				echo $payback;
				echo "term = ";
				echo $term;
				if ($payback>=$term && $term!=0) {
					$time=date("Y/m/d G:i:s");
					$contentuser="THIS IS AN AUTOMATED MESSAGE FROM THIS USER TELLING YOU THAT YOU HAVE FAILED TO REPAY YOUR LOAN IN DUE TIME, YOU WILL NOW BE CONTACTED BY THE USER AND HE WILL DECIDE HOW TO FURTHER PROGRESS.";
					$contentbank="THIS IS AN AUTOMATED MESSAGE THIS USER HAS FAILED TO REPAY HIS LOAN IN TIME YOU MAY NOW TAKE ANY ACTION YOU SEE FIT.";
			 		$query="INSERT INTO messages SET userid='$userid', userid2='$userid2', content='$contentuser', time='$time'";
			 		$new=mysql_query($query) or die("error55439");
			 		$query="INSERT INTO messages SET userid='$userid2', userid2='$userid', content='$contentbank', time='$time'";
			 		$new=mysql_query($query) or die("error55439");
				}
				}
				}
		 		$query="UPDATE users SET credits='$credits', attackcredits='$attackcredits', bankrupt='$bankrupt' WHERE userid='$userid'";
		 		$database=mysql_query($query) or die("error");

		 	}
}
		$query="SELECT * FROM transfers";
		$transfers=mysql_query($query);
		while($transfer=mysql_fetch_array($transfers)) {
			$timetill=$transfer['timetill'];
			$time=$transfer['time'];
			$date=$transfer['date'];
			$transferid=$transfer['transferid'];
			if ($time<=$timetill) {
				$sender=$transfer['sender'];
				$receiver=$transfer['receiver'];
				$bankid=$transfer['bankid'];
				$bankidrec=$transfer['bankidrec'];
				$amount=$transfer['transfer'];
					$recname=$transfer['recname'];
				if ($bankid==0 && $bankidrec==0) { // from user to user
															$sender=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$sender'"));
															$credits2=$sender['credits'];		
															$sender=$sender['userid'];
															$receiver=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$receiver'"));
															$credits=$receiver['credits'];		
															$receiver=$receiver['userid'];
															if (!empty($sender)) {
																if(!empty($receiver)) {
															if ($credits-$amount>=0) {
																$credits=$credits-$amount;
																$credits2=$credits2+$amount;
																$query="UPDATE users SET credits='$credits2' WHERE userid='$sender'";
																$go=mysql_query($query) or die("error1");
																$query="UPDATE users SET credits='$credits' WHERE userid='$receiver'";
																$go=mysql_query($query) or die("error1");
																$time = date("Y/m/d G:i:s");
																$contentuser = "THIS IS AN AUTOMATED MESSAGE FROM THIS USER TELLING YOU THAT YOU HAVE BEEN SENT: " . number_format($amount). " CREDITS";
														 		$query = "INSERT INTO messages SET userid='$receiver', userid2='$sender', content='$contentuser', time='$time'";
			 													$new = mysql_query($query) or die("error55439");
			 													$contentuser = "THIS IS AN AUTOMATED MESSAGE FROM THIS USER TELLING YOU THAT YOU HAVE BEEN RECEIVED: " . number_format($amount). " CREDITS";
														 		$query = "INSERT INTO messages SET userid='$sender', userid2='$receiver', content='$contentuser', time='$time'";
			 													$new = mysql_query($query) or die("error55439");
															} else {
																	$contentuser = "THIS IS AN AUTOMATED MESSAGE FROM THIS USER TELLING YOUR TRANSFER TO: " . $username2 . " OF " . number_format($amount) . "CREDITS HAS FAILED BECUASE YOU DO NOT HAVE ENOUGH CREDITS";
														 			$query = "INSERT INTO messages SET userid='$sender', userid2='$receiver', content='$contentuser', time='$time'";
			 														$new = mysql_query($query) or die("error55439");
																	$query="DELETE FROM transfers WHERE transferid='$transferid'";
																	$delete=mysql_query($query);
														}		
														} else {
																															$time = date("Y/m/d G:i:s");
																															$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE admin='1'"));
																$bankuserid = $bankuserid['userid'];
																	$contentuser = "THIS IS AN AUTOMATED MESSAGE FROM THIS ADMIN TELLING YOUR TRANSFER TO: " . $recname . " OF " . number_format($amount). " CREDITS HAS FAILED BECUASE THAT USER NO LONGER EXISTS";
														 			$query = "INSERT INTO messages SET userid='$userid', userid2='$bankuserid', content='$contentuser', time='$time'";//admin userid
			 														$new = mysql_query($query) or die("error55439");
																	$query="DELETE FROM transfers WHERE transferid='$transferid'";
																	$delete=mysql_query($query);
														}															
														} else {
																	$query="DELETE FROM transfers WHERE transferid='$transferid'";
																	$delete=mysql_query($query);
														}
				} else if ($bankidrec==0) {// from bank to user
															$sender2=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE bankid='$bankid' AND accountno='$sender'"));
															$credits2=$sender2['credits'];		
															$senid=$sender2['id'];
															$receiver2=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$receiver'"));
															$credits=$receiver2['credits'];		
															$recid=$receiver2['userid'];
															if (!empty($recid)) {
																if(!empty($senid)) {
															if ($credits2-$amount>=0) {
																$credits=$credits+$amount;
																$credits2=$credits2-$amount;
																$time=date("Y/m/d G:i:s");
																$query="UPDATE users SET credits='$credits' WHERE userid='$receiver'";
																$go=mysql_query($query) or die("error1");
																$query="UPDATE bankaccounts SET credits='$credits2' WHERE accountno='$sender' AND bankid='$bankid'";
																$go=mysql_query($query) or die("error3");
																$query="INSERT INTO accountlog SET accountno='$sender', bankid='$bankid', inc='$amount', date='$time', type='TRANSFER', toid='$receiver', tobankid='0'";
																$go=mysql_query($query) or die("error4");
																$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankid'"));
																$bankuserid = $bankuserid['userid'];
																$credits3 = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$bankuserid'"));
																$credits3 = $credits3['credits'];
																$credits3=$credits3-$amount;
																$query="UPDATE users SET credits='$credits3' WHERE userid='$bankuserid'";
																$go=mysql_query($query) or die("error1");
																$time = date("Y/m/d G:i:s");
																$contentuser = "THIS IS AN AUTOMATED MESSAGE FROM THIS BANK TELLING YOU THAT YOU HAVE BEEN SENT: " . number_format($amount). " CREDITS FROM ACCOUNTNO ". $sender;
														 		$query = "INSERT INTO messages SET userid='$receiver', userid2='$bankuserid', content='$contentuser', time='$time'";
			 													$new = mysql_query($query) or die("error55439");
			 													$query="DELETE FROM transfers WHERE transferid='$transferid'";
																$delete=mysql_query($query);
															}
														} else {
																	$query="DELETE FROM transfers WHERE transferid='$transferid'";
																	$delete=mysql_query($query);
														}
														} else {
																															$time = date("Y/m/d G:i:s");
																	$query="DELETE FROM transfers WHERE transferid='$transferid'";
																	$delete=mysql_query($query);
																	$query="INSERT INTO accountlog SET accountno='$sender', bankid='$bankid', inc='0', date='$time', type='TRANSFER FAILED', toid='$receiver', tobankid='0'";
																  $go=mysql_query($query) or die("error4");
														}
				} else if ($bankid==0) { // from user to bank
															$sender2=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$sender'"));
															$credits2=$sender2['credits'];		
															$senid=$sender2['userid'];
															$receiver2=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE bankid='$bankidrec' AND accountno='$receiver'"));
															$credits=$receiver2['credits'];		
															$recid=$receiver2['id'];
															if (!empty($recid)) {
																if(!empty($senid)) {
															if ($credits2-$amount>=0) {
																$credits=$credits+$amount;
																$credits2=$credits2-$amount;
																$time=date("Y/m/d G:i:s");
																$query="UPDATE users SET credits='$credits2' WHERE userid='$sender'";
																$go=mysql_query($query) or die("error1");
																$query="UPDATE bankaccounts SET credits='$credits' WHERE accountno='$receiver' AND bankid='$bankidrec'";
																$go=mysql_query($query) or die("error3");
																$query="INSERT INTO accountlog SET accountno='$receiver', bankid='$bankidrec', inc='$amount', date='$time', type='RECEIVE', toid='$sender', tobankid='0'";
																$go=mysql_query($query) or die("error4");
																$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankidrec'"));
																$bankuserid = $bankuserid['userid'];
																$credits3 = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$bankuserid'"));
																$credits3 = $credits3['credits'];
																$credits3=$credits3+$amount;
																$query="UPDATE users SET credits='$credits3' WHERE userid='$bankuserid'";
																$go=mysql_query($query) or die("error1");
																$time = date("Y/m/d G:i:s");
																$contentuser = "THIS IS AN AUTOMATED MESSAGE FROM THIS BANK TELLING YOU THAT BANK ACCOUNTNO: " . $receiver . " HAS RECEIVED " . number_format($amount). " CREDITS";
														 		$query = "INSERT INTO messages SET userid='$sender', userid2='$bankuserid', content='$contentuser', time='$time'";
			 													$new = mysql_query($query) or die("error55439");
																	$query="DELETE FROM transfers WHERE transferid='$transferid'";
																	$delete=mysql_query($query);
															} else {
																																$time = date("Y/m/d G:i:s");
																																$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankidrec'"));
																$bankuserid = $bankuserid['userid'];
																$contentuser = "THIS IS AN AUTOMATED MESSAGE FROM THIS BANK TELLING YOU TRANSFER TO BANK ACCOUNTNO: " . $receiver . " OF " . number_format($amount). " CREDITS HAS FAILED AS YOU DO NOT HAVE ENOUGH CREDITS";
														 		$query = "INSERT INTO messages SET userid='$sender', userid2='$bankuserid', content='$contentuser', time='$time'";
			 													$new = mysql_query($query) or die("error55439");
			 												}
														} else {
																	$query="DELETE FROM transfers WHERE transferid='$transferid'";
																	$delete=mysql_query($query);
														}
														} else {
																	$query="DELETE FROM transfers WHERE transferid='$transferid'";
																	$delete=mysql_query($query);
																$time = date("Y/m/d G:i:s");
																																$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankidrec'"));
																$bankuserid = $bankuserid['userid'];
																$contentuser = "THIS IS AN AUTOMATED MESSAGE FROM THIS BANK TELLING YOU TRANSFER TO BANK ACCOUNTNO: " . $receiver . " OF " . number_format($amount). " CREDITS HAS FAILED AS THIS ACCOUNT DOES NOT EXIST";
														 		$query = "INSERT INTO messages SET userid='$sender', userid2='$bankuserid', content='$contentuser', time='$time'";
			 													$new = mysql_query($query) or die("error55439");
														}
				} else { // from bank to bank
															$sender2=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE bankid='$bankid' AND accountno='$sender'"));
															$credits2=$sender2['credits'];		
															$senid=$sender2['id'];
															$receiver2=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE bankid='$bankidrec' AND accountno='$receiver'"));
															$credits=$receiver2['credits'];		
															$recid=$receiver2['id'];
															if (!empty($recid)) {
																if(!empty($senid)) {
															if ($credits-$amount>=0) {
																$credits=$credits+$amount;
																$credits2=$credits2-$amount;
																$time=date("Y/m/d G:i:s");
																$query="UPDATE bankaccounts SET credits='$credits2' WHERE accountno='$sender' AND bankid='$bankid'";
																$go=mysql_query($query) or die("error3");
																$query="UPDATE bankaccounts SET credits='$credits' WHERE accountno='$receiver' AND bankid='$bankidrec'";
																$go=mysql_query($query) or die("error3");
																$query="INSERT INTO accountlog SET accountno='$receiver', bankid='$bankidrec', inc='$amount', date='$time', type='RECEIVE', toid='$sender', tobankid='$bankid'";
																$go=mysql_query($query) or die("error4");
														  	$query="INSERT INTO accountlog SET accountno='$sender', bankid='$bankid', inc='$amount', date='$time', type='TRANSFER', toid='$receiver', tobankid='$bankidrec'";
																$go=mysql_query($query) or die("error4");
																$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankidrec'"));
																$bankuserid = $bankuserid['userid'];
																$credits3 = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$bankuserid'"));
																$credits3 = $credits3['credits'];
																$credits3=$credits3+$$amount;
																$query="UPDATE users SET credits='$credits3' WHERE userid='$bankuserid'";
																$go=mysql_query($query) or die("error1");
																$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankid'"));
																$bankuserid = $bankuserid['userid'];
																$credits3 = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$bankuserid'"));
																$credits3 = $credits3['credits'];
																$credits3=$credits3-$$amount;
																$query="UPDATE users SET credits='$credits3' WHERE userid='$bankuserid'";
																$go=mysql_query($query) or die("error1");
																	$query="DELETE FROM transfers WHERE transferid='$transferid'";
																	$delete=mysql_query($query);
															}
														} else {
																	$query="DELETE FROM transfers WHERE transferid='$transferid'";
																	$delete=mysql_query($query);
														}
														} else {
															$time=date("Y/m/d G:i:s");
																$query="DELETE FROM transfers WHERE transferid='$transferid'";
																$delete=mysql_query($query);
																$query="INSERT INTO accountlog SET accountno='$sender', bankid='$bankid', inc='$amount', date='$time', type='TRANSFER FAILED', toid='$receiver', tobankid='$bankidrec'";
																$go=mysql_query($query) or die("error4");
														}
				}
			} else {
				$timetill++;
				$query="UPDATE transfers SET timetill='$timetill', date='$date' WHERE transferid='$transferid'";
				$go=mysql_query($query);
			}
		}
		$query="DELETE FROM attacklog WHERE time <= DATE_SUB( NOW(), INTERVAL 2 DAY )";
		$delete=mysql_query($query);
		$query="DELETE FROM pending WHERE time <= DATE_SUB( NOW(), INTERVAL 30 MIN )";
		$delete=mysql_query($query);
		$query="DELETE FROM spylog WHERE time <= DATE_SUB( NOW(), INTERVAL 2 DAY )";
		$delete=mysql_query($query);
}
		$time=time();
		$query="UPDATE time SET time='$time' WHERE timeid='0'";
		$time=mysql_query($query) or die("error");
}?>