<?php
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
////
if (!empty($_POST['1123123123'])) {
			if (!empty($_POST['asdijaisodjoaiewjda'])) {
			$loanid=$_POST['asdijaisodjoaiewjda'];
			$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
			$credits=$credits['credits'];
			$amount=mysql_fetch_array(mysql_query("SELECT * FROM loans WHERE userid='$userid' AND loanid='$loanid'"));
			$amount=$amount['amount'];
			$issuer=mysql_fetch_array(mysql_query("SELECT * FROM loans WHERE userid='$userid' AND loanid='$loanid'"));
			$issuer=$issuer['issuer'];
			$date=mysql_fetch_array(mysql_query("SELECT * FROM loans WHERE userid='$userid' AND loanid='$loanid'"));
			$date=$date['date'];
			if (!empty($amount)) {
			$credits2=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE isbank='1' AND userid='$issuer'"));
			$credits2=$credits2['credits'];
			$payoff=$_POST['4433111'];
			if (($payoff > 0) && ($amount - $payoff >=0)) {
				if (($credits - $payoff) > 0 ) {
				   $credits=$credits - $payoff;
				   $amount=$amount - $payoff;
				   $credits2=$credits2 + $payoff;
				} else {
				   $credits2=$credits2 + $credits;
				   $amount=$amount - $credits;
				   $credits=0;
				}
	 		$new=mysql_query($query) or die("error55412312loa");
     			$query="UPDATE users SET debt='$debt', credits='$credits' WHERE userid='$userid'";
			$go=mysql_query($query) or die("error");
     			$query="UPDATE loans SET amount='$amount', date='$date' WHERE userid='$userid' AND loanid='$loanid'";
			$go=mysql_query($query) or die("error");
			$type="Repayment";
			$time=date("Y/m/d G:i:s");
	 		$query="INSERT INTO loanlog SET type='$type', inc='$payoff', date='$time', loanid='$loanid'";
	 		$database=mysql_query($query) or die("error");
			if ($amount==0) {
			$amount=mysql_fetch_array(mysql_query("SELECT * FROM loanlog WHERE loanid='$loanid' ORDER BY logid ASC"));
			$amount=$amount['inc'];
			$type="Loan Completed";
	 		$query="INSERT INTO loanlog SET type='$type', inc='$amount', date='$time', loanid='$loanid'";
	 		$database=mysql_query($query) or die("error");
			}
     			$query="UPDATE users SET credits='$credits2' WHERE isbank='1' AND userid='$issuer'";
			$go=mysql_query($query) or die("error");
			}
			}
			}
}


if (!empty($_POST['522342342342342'])) {
			$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
			$credits=$credits['credits'];
			$debt=mysql_fetch_array(mysql_query("SELECT debt FROM users WHERE userid='$userid'"));
			$debt=$debt['debt'];
			$bankrupt=mysql_fetch_array(mysql_query("SELECT bankrupt FROM users WHERE userid='$userid'"));
			$bankrupt=$bankrupt['bankrupt'];
			if ($bankrupt==0) {
			if (($debt > 0) && ($credits == 0)) {
   			$query="UPDATE users SET bankrupt='1' WHERE userid='$userid'";
			$go=mysql_query($query) or die("error");
			}
            }
			if ($bankrupt==1) {
			if ($debt == 0) {
   			$query="UPDATE users SET bankrupt='0' WHERE userid='$userid'";
			$go=mysql_query($query) or die("error");
			}
            }

}

if (!empty($_POST['522342342342342creasd'])) {
			if(!empty($_POST['asdasncaoisoi38933']) && !empty($_POST['asdas4435345ncaoi555soi38933'])  && !empty($_POST['asdddddddd0asd0-a0-sd']) && !empty($_POST['asdddddddd0asd0-a0-21231233sd'])) {
			$credits=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid'"));
			$planet=$credits['planet'];
			$credits=$credits['credits'];
			$swiss=$_POST['asdasncaoisoi38933'];
			$newuser=$_POST['asdas4435345ncaoi555soi38933'];
			$email=$_POST['asdddddddd0asd0-a0-sd'];
			$passwordbank=md5($_POST['asdddddddd0asd0-a0-21231233sd']);
			$swissamount=100000000;
			$loanamount=1000000000000;
			$query="SELECT username FROM users";
			$usernamer=mysql_query($query) or die("error");
			$accessed="1";
			$query="SELECT username, email FROM users WHERE username='$newuser' OR email='$email'
          			  UNION
				  SELECT username, email FROM pending WHERE username='$newuser' OR email='$email'
				  UNION 
				  SELECT username, email FROM banned WHERE username='$newuser' OR email='$email'";

			$query=mysql_query($query);
			$check1=mysql_fetch_array($query);

			if(!empty($check1))
			{
				$accessed="0";
			}

			if ($accessed==1) {
			if ($swiss>=1 && $credits-$swissamount>=0) {
      	$credits=$credits-$swissamount;		
				$query="INSERT INTO users SET username='$newuser', password='$passwordbank', email='$email', race='-1', units='5000', credits='10000000', orelevel='10', defenselevel='10', attacklevel='10', rank='-2', attack7='200', defense7='200', hlattack7='20000', hldefense7='20000', spylevel='24', spies='100', gotspy='1', gotclone='1', gotattack='1', gotdefense='1', gotbank='1', gothack='1', hackers='100', hacklevel='24', gotcheapw='1', gotcheapwm='1', gotunits='1', gotunitsless='1', gotdouble='1', isbank='1', planet='$planet'";
				$go=mysql_query($query);
				$name=mysql_fetch_array(mysql_query("SELECT userid FROM users WHERE username='$newuser'"));
				$name=$name['userid'];
			if (!empty($name)) {
				$query="INSERT INTO banks SET userid='$name', maxborrow='0', maxdebt='0', interest='0', anonymous='1'";
				$go=mysql_query($query);
				echo "bank created";
				$query="UPDATE users SET credits='$credits' WHERE userid='$userid'";
				$go=mysql_query($query);
			} else {
				echo "error2";
			}
      } else if ($swiss<=0 && $credits-$loanamount>=0) {
      	$credits=$credits-$loanamount;	
				$query="INSERT INTO users SET username='$newuser', password='$passwordbank', email='$email', race='-1', units='5000', credits='100000000000', orelevel='10', defenselevel='10', attacklevel='10', rank='-2', attack7='200', defense7='200', hlattack7='20000', hldefense7='20000', spylevel='24', spies='100', gotspy='1', gotclone='1', gotattack='1', gotdefense='1', gotbank='1', gothack='1', hackers='100', hacklevel='24', gotcheapw='1', gotcheapwm='1', gotunits='1', gotunitsless='1', gotdouble='1', isbank='1', planet='$planet'";
				$go=mysql_query($query);
				$name=mysql_fetch_array(mysql_query("SELECT userid FROM users WHERE username='$newuser'"));
				$name=$name['userid'];
			if (!empty($name)) {
				$query="INSERT INTO banks SET userid='$name', maxborrow='1000000', maxdebt='1000000', interest='200', anonymous='0'";
				$go=mysql_query($query);
				echo "bank created";
				$query="UPDATE users SET credits='$credits' WHERE userid='$userid'";
				$go=mysql_query($query);
			} else {
				echo "error3";
			}   	
      } else {
      	echo "error";
      }
    } else {
    	echo "SORRY EMAIL ADDRES OR USERNAME IN USE OR BANNED";
    }
    } else {
    	echo "BLANK VALUES";
    }
}

if (!empty($_POST['12321380983ejjdjdjd'])) {
	if (!empty($_POST['234234254563WSDFWSDF'])) {
		$bankid=$_POST['234234254563WSDFWSDF'];
		$loan = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankid'"));
		$bankid=$loan['bankid'];
		$userid2=$loan['userid'];
		$anonymous=$loan['anonymous'];
		$string1="opack";
		$string2=date("Y/m/d G:i:s");
		$string3=$ip;
		$string4=md5($string1);
		$string5=md5($string2);
		$string6=md5($string3);
		$string7="thisisthepointlesskeyjusttoseeificanmakeitevensafer";
		$string8=md5($string7);
		$string9=$string1.$string2.$string3;
		$string10=md5($string9);
		$string11=$string9.$string8;
		srand ((double) microtime( )*1000000);
		$random_number = rand( );
		$string12=md5($string11);
		$string13=md5($random_number);
		$string14=$string12.$string13;
		$stringer=md5($string14);
		$stringer=substr($stringer,0,6);
		$s=0;
		while ($s!=1) {
			srand ((double) microtime( )*1000000);
			$accountno = rand( );
			$tree=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE bankid='$bankid' AND accountno='$accountno'"));
			$tree=$tree['accountno'];
			if (empty($tree)) {
				$s=1;
			}
		}
		if ($anonymous==0) {
			$maxdebt=$loan['maxdebt'];
			$interest=$loan['interest'];
			$maxloan=$loan['maxloan'];
			$tree=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid2'"));
			$tree=$tree['username'];
			$check=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE bankid='$bankid' AND anonymous='0' AND userid='$userid'"));
			$check=$check['userid'];
			if (empty($check)) {
				$query="INSERT INTO bankaccounts SET userid='$userid', maxborrow='$maxloan', bankid='$bankid', interest='$interest', maxdebt='$maxdebt', password='$stringer', accountno='$accountno', credits='0', anonymous='0'";
				$go=mysql_query($query);
					$time=date("Y/m/d G:i:s");
					$contentuser="THIS IS AN AUTOMATED MESSAGE FROM THIS BANK TELLING YOU THAT YOU HAVE CREATED A NEW ACCOUNT WITH THE USERNAME: " . $accountno . " AND PASSWORD: ". $stringer;
			 		$query="INSERT INTO messages SET userid='$userid', userid2='$userid2', content='$contentuser', time='$time'";
			 		$new=mysql_query($query) or die("error55439");
				echo "ACCOUNT CREATED PLEASE CHECK YOUR EMAIL";
			} else {
				echo "SORRY YOU ALREADY HAVE AN ACCOUNT WITH THIS BANK";
			}
		} else {
			$query="INSERT INTO bankaccounts SET maxborrow='0', bankid='$bankid', interest='0', maxdebt='0', password='$stringer', accountno='$accountno', credits='0', anonymous='1'";
			$go=mysql_query($query);
					$time=date("Y/m/d G:i:s");
					$contentuser="THIS IS AN AUTOMATED MESSAGE FROM THIS BANK TELLING YOU THAT YOU HAVE CREATED A NEW ACCOUNT WITH THE USERNAME: " . $accountno . " AND PASSWORD: ". $stringer;
			 		$query="INSERT INTO messages SET userid='$userid', userid2='$userid2', content='$contentuser', time='$time'";
			 		$new=mysql_query($query) or die("error55439");
				echo "ACCOUNT CREATED PLEASE CHECK YOUR EMAIL";
		}
	}
}

if (!empty($_POST['aosdoaosd'])) {
		if(!empty($_POST['234234254563WSDFWSDF']) && !empty($_POST['234234fojfsdfjsdfsodfo']) && !empty($_POST['234234fojfsdfjsdfsod55555555fo'])) {
				$accountno=$_POST['234234fojfsdfjsdfsodfo'];
				$bpassword=$_POST['234234fojfsdfjsdfsod55555555fo'];
				$bankid=$_POST['234234254563WSDFWSDF'];
				$loan=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE bankid='$bankid' AND accountno='$accountno' AND password='$bpassword'"));
				$usersendid=$loan['userid'];
				$anonymous=$loan['anonymous'];
				$id=$loan['id'];
					if (!empty($id)) {
										$loan=mysql_fetch_array(mysql_query("SELECT * FROM accountlogin WHERE userid='$userid' AND bankid='$bankid' AND accountno='$accountno' AND password='$bpassword'"));
										$id=$loan['loginid'];
												if (empty($id)) {
																$loan=mysql_fetch_array(mysql_query("SELECT * FROM accountlogin WHERE bankid='$bankid' AND accountno='$accountno' AND password='$bpassword'"));
																$id=$loan['loginid'];
																if (!empty($id)) {
																		if ($anonymous==0) {
																		$time=date("Y/m/d G:i:s");
																		$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankid'"));
																		$bankuserid=$bankuserid['userid'];
																		$contentuser="THIS IS AN AUTOMATED MESSAGE FROM THIS BANK TELLING YOU THAT MULTIPLE USERS HAVE TRIED TO ACCESS YOUR BANK ACCOUNT SIMULTANOEUSLY: " . $accountno;
																 		$query="INSERT INTO messages SET userid='$usersendid', userid2='$bankuserid', content='$contentuser', time='$time'";
																 		$new=mysql_query($query) or die("error55439");
																		echo "WARNING SOMEONE ELSE IS LOGGED IN TO THIS BANK ACCOUNT!!!!!";
																		} else {
																		echo "WARNING SOMEONE ELSE IS LOGGED IN TO THIS BANK ACCOUNT!!!!!";
																		}

																}
																if ($anonymous==0 && $usersendid!=$userid) {
																	$time=date("Y/m/d G:i:s");
																		$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankid'"));
																		$bankuserid=$bankuserid['userid'];
																		$contentuser="THIS IS AN AUTOMATED MESSAGE FROM THIS BANK TELLING YOU SOMEONE WHO IS NOT YOU HAS ATTEMPTED TO ACCESS ACCOUNT " . $accountno;
																 		$query="INSERT INTO messages SET userid='$usersendid', userid2='$bankuserid', content='$contentuser', time='$time'";
																 		$new=mysql_query($query) or die("error55439");
																		echo "WARNING THIS IS NOT YOUR BANK ACCOUNT!!!!!";
																}
																$query="INSERT INTO accountlogin SET userid='$userid', bankid='$bankid', password='$bpassword', accountno='$accountno'";
																$go=mysql_query($query);
												} else {
																			echo "YOU ARE ALREADY LOGGED IN TO THIS ACCOUNT";
												}	
					} else {
						echo "INVALID USERNAME OR PASSWORD FOR THIS BANK";
					}
		}
}

if (!empty($_POST['aosdoao234234234234234sd'])) {
		if (!empty($_POST['asidjaisodjasid2093993'])) {
			$loginid=$_POST['asidjaisodjasid2093993'];
				$query="DELETE FROM accountlogin WHERE loginid='$loginid' AND userid='$userid'";
				$go=mysql_query($query);
		}
	}
	
// transfer bank to bank
if (!empty($_POST['aosdoaosd343423424923409'])){
	if (!empty($_POST['biasdiamtasdiojasidjeueu']) && !empty($_POST['ajdiojdiasjdi99u989act1']) && !empty($_POST['ajdiojdiasjdi994343434u989act1']) &&!empty($_POST['biasdioact2asdiojasidj213123123123eueu']) && !empty($_POST['234234asdasdasd254563WSDFWSDF'])) {
		$from=$_POST['ajdiojdiasjdi99u989act1'];
		$frombankid=$_POST['ajdiojdiasjdi994343434u989act1'];
		$to=$_POST['biasdioact2asdiojasidj213123123123eueu'];
		$bankid=$_POST['234234asdasdasd254563WSDFWSDF'];
		$transfer=$_POST['biasdiamtasdiojasidjeueu'];
		$loans2=mysql_fetch_array(mysql_query("SELECT * FROM accountlogin WHERE userid='$userid' AND accountno='$from' AND bankid='$frombankid'"));
		$bpassword=$loans2['password'];
		if ($transfer>0) {
			if ($to!=$from){
								if (!empty($bpassword)) {
													$loans2=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE accountno='$from' AND bankid='$frombankid'"));
													$apassword=$loans2['password'];							
													$credits=$loans2['credits'];							
													if(!empty($apassword)) {
														if($apassword==$bpassword) {
															$loans2=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE accountno='$to' AND bankid='$bankid'"));
															$credits2=$loans2['credits'];		
															$id=$loans2['id'];
															if (!empty($id)) {
															if ($credits-$transfer>=0) {
															if ($bankid==$frombankid) {
																$credits=$credits-$transfer;
																$credits2=$credits2+$transfer;
																$time=date("Y/m/d G:i:s");
																$query="UPDATE bankaccounts SET credits='$credits2' WHERE accountno='$to' AND bankid='$bankid'";
																$go=mysql_query($query) or die("error1");
																$query="INSERT INTO accountlog SET accountno='$to', bankid='$bankid', inc='$transfer', date='$time', type='RECEIVE', toid='$from', tobankid='$frombankid'";
																$go=mysql_query($query) or die("error2");
																$query="UPDATE bankaccounts SET credits='$credits' WHERE accountno='$from' AND bankid='$frombankid'";
																$go=mysql_query($query) or die("error3");
																$query="INSERT INTO accountlog SET accountno='$from', bankid='$frombankid', inc='$transfer', date='$time', type='TRANSFER', toid='$to', tobankid='$bankid'";
																$go=mysql_query($query) or die("error4");
																echo "TRANSACTION COMPLETED";		
															} else {
																																	$loans2=mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$frombankid'"));
																	$anonymous2=$loans2['anonymous'];	
																																		$loans2=mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankid'"));
																	$anonymous=$loans2['anonymous'];	
																	if ($anonymous==1 && $anonymous2==1) {
																		$period=14;
																	} else if ($anonymous==1 && $anonymous2==0){
																		$period=10;
																	} else if ($anonymous==0 && $anonymous2==1){
																		$period=10;
																	} else {
																		$period=3;
																	}
																	$time=date("Y/m/d G:i:s");
																	$query="INSERT INTO transfers SET  time='$period', timetill='0', date='$time', receiver='$to', sender='$from', bankidrec='$bankid', bankid='$frombankid', recname='$username', transfer='$transfer'";
																	$go=mysql_query($query);
																	echo "TRANSACTION COMPLETED IT WILL TAKE UP TO " . $period . " TURNS UNTILL THEY RECEIVE IT";		
															}
															}
														} else {
															echo "This account at this bank does not exist";
														}
														} else {
															echo "Incorrect account or password for this bank";												
														}
														} else {
															echo "Incorrect account or password for this bank";										
														}
								} else {
									echo "You are not logged in to this account";												
								}
	}}

	}
}
//transfer from bank to user
if (!empty($_POST['aosdoaosd3434234249234099384395348'])){
	if (!empty($_POST['biasdiamtasdiojasidjeueu']) && !empty($_POST['ajdiojdiasjdi99u989act1']) && !empty($_POST['ajdiojdiasjdi994343434u989act1']) &&!empty($_POST['biasdioact2asdiojasidj213123123123eueu'])) {
		$from=$_POST['ajdiojdiasjdi99u989act1'];
		$frombankid=$_POST['ajdiojdiasjdi994343434u989act1'];
		$to=$_POST['biasdioact2asdiojasidj213123123123eueu'];
		$transfer=$_POST['biasdiamtasdiojasidjeueu'];
		$loans2=mysql_fetch_array(mysql_query("SELECT * FROM accountlogin WHERE userid='$userid' AND accountno='$from' AND bankid='$frombankid'"));
		$bpassword=$loans2['password'];
		if ($transfer>0) {
			if ($to!=$from && $frombankid!=0){
								if (!empty($bpassword)) {
													$loans2=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE accountno='$from' AND bankid='$frombankid'"));
													$apassword=$loans2['password'];							
													$credits=$loans2['credits'];							
													if(!empty($apassword)) {
														if($apassword==$bpassword) {
															$loans2=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$to'"));
															$credits2=$loans2['credits'];		
															$id=$loans2['userid'];
															if (!empty($id)) {
															if ($credits-$transfer>=0) {
																	$loans2=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$to'"));
																	$username=$loans2['username'];	
																	$loans2=mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$frombankid'"));
																	$anonymous=$loans2['anonymous'];	
																	if ($anonymous==0) {
																	$period=3;
																	} else {
																	$period=7;
																	}
																	$time=date("Y/m/d G:i:s");
																	$query="INSERT INTO transfers SET  time='$period', timetill='0', sender='$from', date='$time', receiver='$to', bankidrec='0', bankid='$frombankid', recname='$username', transfer='$transfer'";
																	$go=mysql_query($query);
																	echo "TRANSACTION COMPLETED IT WILL TAKE UP TO " . $period . " TURNS UNTILL THEY RECEIVE IT";		
															}
														} else {
															echo "This account at this user does not exist";
														}
														} else {
															echo "Incorrect account or password for this bank";												
														}
														} else {
															echo "Incorrect account or password for this bank";										
														}
								} else {
									echo "You are not logged in to this account";												
								}
	} else { echo "error"; }
	} else { echo "error2"; }

	}  else { echo "You may have left blank values"; }
}

//transfer from user to bank
if (!empty($_POST['aosdoaosd34342342342edddaaa5348'])){
	if (!empty($_POST['biasdiamtasdiojasidjeueu']) && !empty($_POST['ajdiojdiasjdi99u989act1']) && !empty($_POST['ajdiojdiasjdi994343434u989act1']) &&!empty($_POST['biasdioact2asdiojasidj213123123123eueu'])) {
		$to=$_POST['ajdiojdiasjdi99u989act1'];
		$bankid=$_POST['ajdiojdiasjdi994343434u989act1'];
		$from=$_POST['biasdioact2asdiojasidj213123123123eueu'];
		$transfer=$_POST['biasdiamtasdiojasidjeueu'];
		if ($transfer>0) {
			if ($to!=$from && $bankid!=0){
													$loans2=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE accountno='$to' AND bankid='$bankid'"));
													$aid=$loans2['id'];							
													$credits=$loans2['credits'];							
															$loans2=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$from'"));
															$credits2=$loans2['credits'];		
															$userid2=$loans2['userid'];
															if (!empty($aid)) {
																if(!empty($userid2)) {
															if ($credits2-$transfer>=0) {
																	$loans2=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$from'"));
																	$username=$loans2['username'];	
																	$loans2=mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankid'"));
																	$anonymous=$loans2['anonymous'];	
																	if ($anonymous==0) {
																	$period=3;
																	} else {
																	$period=7;
																	}
																	$time=date("Y/m/d G:i:s");
																	$query="INSERT INTO transfers SET time='$period', timetill='0', sender='$from', date='$time', receiver='$to', bankidrec='$bankid', bankid='0', recname='$username', transfer='$transfer'";
																	$go=mysql_query($query);
																	echo "TRANSACTION COMPLETED IT WILL TAKE UP TO " . $period . " TURNS UNTILL THEY RECEIVE IT";		
															}
														}
														} else {
															echo "This account at this bank does not exist";
														}
	} else { echo "error"; }
	} else { echo "error2"; }

	}  else { echo "You may have left blank values"; }
}

if (!empty($_POST['222222222222222111'])) {
	if (!empty($_POST['11111wer23234'])) {
	$bankid=$_POST['11111wer23234'];
$banks=mysql_query("SELECT * FROM banks WHERE userid='$bankid'");
$bank = mysql_fetch_array($banks);
			$userid2=$bank['userid'];
			$maxborrow=$bank['maxborrow'];
			$maxdebt2=$bank['maxdebt'];
			$interest2=$bank['interest'];
			$bankusername=mysql_fetch_array(mysql_query("SELECT username FROM users WHERE isbank='1' AND userid='$userid2'"));
			$bankusername=$bankusername['username'];
			$credits2=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE isbank='1' AND userid='$userid2'"));
			$credits2=$credits2['credits'];
			$credits3=$credits2;
			$credits2=$credits2*0.1;
			$max=mysql_fetch_array(mysql_query("SELECT maxborrow FROM bankaccounts WHERE userid='$userid' AND bankid='$userid2'"));
			$max=$max['maxborrow'];
			$maxdebt=mysql_fetch_array(mysql_query("SELECT maxdebt FROM bankaccounts WHERE userid='$userid' AND bankid='$userid2'"));
			$maxdebt=$maxdebt['maxdebt'];
			$interest=mysql_fetch_array(mysql_query("SELECT interest FROM bankaccounts WHERE userid='$userid' AND bankid='$userid2'"));
			$interest=$interest['interest'];
			$debt="";
			$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid'");
			while ($loan = mysql_fetch_array($loans)) {
				$debt=$debt+$loan['amount'];
			}
			$debt2="";
			$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid' AND issuer='$userid2'");
			while ($loan = mysql_fetch_array($loans)) {
				$debt2=$debt2+$loan['amount'];
			}
			if (!empty($max)) {
				$maxdebt=$maxdebt;
				$maxloan=$max;
				$interest=$interest;
			} else {
				$maxdebt=$maxdebt2;				
				$maxloan=$maxborrow;
				$interest=$interest2;
			}
			$maxdebt=$maxdebt-$debt;
			$maxloan=$maxloan-$debt2;
			if ($maxloan>$maxdebt) {
				$borrowmax=$maxdebt;
			} else {
				$borrowmax=$maxloan;
			}
			if ($borrowmax > $credits2) {
				$borrowmax=$credits2;
			}
			if ($borrowmax < 0) {
				$borrowmax=0;
			}
			$credits=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE userid='$userid'"));
			$credits=$credits['credits'];
			$request=$_POST['11111111111123123123'];
			if ($request>0 && $request<=$borrowmax) {
			$credits3=$credits3-$request;
			$credits=$credits + $request;
			$query="UPDATE users SET credits='$credits3' WHERE isbank='1' AND userid='$userid2'";
			$go=mysql_query($query) or die("error");
			$time=date("Y/m/d G:i:s");
			$context="Extra Bank Loan";
	 		$query="INSERT INTO loans SET userid='$userid', payback='0', term='1000', interest='$interest', amount='$request', date='$time', issuer='$userid2', context='$context'";
	 		$new=mysql_query($query) or die("error55412312loa");
			$query="SELECT loanid FROM loans WHERE userid='$userid' ORDER BY loanid DESC";
		 	$loanid=mysql_fetch_array(mysql_query($query));
			$loanid=$loanid['loanid'];
			$type="Extra Bank Loan";
			$time=date("Y/m/d G:i:s");
	 		$query="INSERT INTO loanlog SET type='$type', inc='$request', date='$time', loanid='$loanid'";
	 		$database=mysql_query($query) or die("error");
			$query="UPDATE users SET credits='$credits' WHERE userid='$userid'";
			$go=mysql_query($query) or die("error");
          }
          }

}
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">BANK OF CHURCHILL</TD></TR>
<?
$query="SELECT username, userid FROM users WHERE username='$username'";
$userid=mysql_fetch_array(mysql_query($query)) or die("error");
$userid=$userid['userid'];
$query = "SELECT * FROM users WHERE userid='$userid'";
$user = mysql_query($query) or die($errdat);
$user = mysql_fetch_array($user);
			$debt="";
			$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid'");
			while ($loan = mysql_fetch_array($loans)) {
				$debt=$debt+$loan['amount'];
			}
?>
<FORM METHOD="POST" ACTION="index.php?content=bank">
<TR VALIGN="TOP" colspan='2'>
<TD colspan='2'><SPAN ID="MEDIUM">Login to bank account with <SELECT NAME="234234254563WSDFWSDF"><?
$loans=mysql_query("SELECT * FROM banks");
while ($loan = mysql_fetch_array($loans)) {
$bankid=$loan['bankid'];
$userid2=$loan['userid'];
$tree=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid2'"));
$tree=$tree['username'];
?><OPTION NAME="as234234234" VALUE="<? echo $bankid; ?>"><? echo $tree; ?></OPTION><? }?>
</SELECT> USERNAME: <INPUT TYPE="TEXT" NAME="234234fojfsdfjsdfsodfo"> PASSWORD: <INPUT TYPE="TEXT" NAME="234234fojfsdfjsdfsod55555555fo"><INPUT TYPE="SUBMIT" NAME="aosdoaosd" VALUE="LOGIN"></FORM>
</TD>
</TR>
<TR VALIGN="TOP" colspan='2'>
<TD colspan='2'>
		<TABLE WIDTH="100%" STYLE="font-size: 10pt;">
					<TR><TD><B>LOGGED IN TO:</B></TD></TR>
					<TR><TD>BANK</TD><TD>USERNAME (click for statement):</TD><TD>CREDITS:</TD><TD>LOGOUT:</TR><?
										$loans2=mysql_query("SELECT * FROM accountlogin WHERE userid='$userid'");
										while ($loan2 = mysql_fetch_array($loans2)) {
													$bankid=$loan2['bankid'];
													$userid2=$loan2['userid'];
													$loginid=$loan2['loginid'];
													$passwordbank=$loan2['password'];
													$accountno=$loan2['accountno'];
													$bankuserid = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankid'"));
													$bankuserid=$bankuserid['userid'];
													$bankname=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$bankuserid'"));
													$bankname=$bankname['username'];
													$bpassword = mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE bankid='$bankid' AND accountno='$accountno'"));
													$credits=$bpassword['credits'];
													$bpassword=$bpassword['password'];
													if (!empty($bpassword)) {
?>
				<FORM METHOD="POST" ACTION="index.php?content=bank">
				<INPUT TYPE="HIDDEN" NAME="asidjaisodjasid2093993" VALUE="<? echo $loginid; ?>">
 				<TR VALIGN="TOP" colspan='2'><TD><? echo $bankname; ?></TD><TD><a href="index.php?content=banklog&accountno=<?echo $accountno;?>&bankid=<? echo $bankid;?>">[<? echo $accountno; ?>]</a></TD><TD><? echo number_format($credits); ?></TD><TD><INPUT TYPE="SUBMIT" NAME="aosdoao234234234234234sd" VALUE="LOGOUT"></TD></TR></FORM>
				<TR colspan='4'><TD ></TD><TD colspan='3'><TABLE><TR><TD><SPAN ID="MEDIUM"><B>TRANSFER</B></TD></TR><TR><TD><SPAN ID="MEDIUM">TRANSFER:</TD><TD><SPAN ID="MEDIUM">FROM:</TD><TD><SPAN ID="MEDIUM">TO:</TD><TD><SPAN ID="MEDIUM">AT BANK:</TD></TR>
 				<TR><FORM METHOD="POST" ACTION="index.php?content=bank"><TD><INPUT TYPE="TEXT" NAME="biasdiamtasdiojasidjeueu"></TD><TD><SPAN ID="MEDIUM"><INPUT TYPE="HIDDEN" NAME="ajdiojdiasjdi994343434u989act1" VALUE="<? echo $bankid; ?>"><INPUT TYPE="HIDDEN" NAME="ajdiojdiasjdi99u989act1" VALUE="<? echo $accountno; ?>">THIS ACCOUNT</TD><TD><INPUT TYPE="TEXT" NAME="biasdioact2asdiojasidj213123123123eueu"></TD><TD><SELECT NAME="234234asdasdasd254563WSDFWSDF">
 <?
						$banks=mysql_query("SELECT * FROM banks");
						while ($bank= mysql_fetch_array($banks)) {
								$bankid2=$bank['bankid'];
$userid2=$bank['userid'];
								$tree=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid2'"));
								$tree=$tree['username'];
				?><OPTION NAME="as234234234" VALUE="<? echo $bankid2; ?>"><? echo $tree; ?></OPTION><? }?>
				</TD><TD><INPUT TYPE="SUBMIT" NAME="aosdoaosd343423424923409" VALUE="TRANSFER"></TD></FORM></TR>
 				<TR><FORM METHOD="POST" ACTION="index.php?content=bank"><TD><INPUT TYPE="TEXT" NAME="biasdiamtasdiojasidjeueu"></TD><TD><SPAN ID="MEDIUM"><? echo $username;?></TD><TD><SPAN ID="MEDIUM"><INPUT TYPE="HIDDEN" NAME="ajdiojdiasjdi994343434u989act1" VALUE="<? echo $bankid;?>"><INPUT TYPE="HIDDEN" NAME="ajdiojdiasjdi99u989act1" VALUE="<? echo $accountno;?>"><INPUT TYPE="HIDDEN" NAME="biasdioact2asdiojasidj213123123123eueu" VALUE="<? echo $userid;?>">THIS ACCOUNT</TD><TD><SPAN ID="MEDIUM"><? echo $bankname; ?></TD><TD><INPUT TYPE="SUBMIT" NAME="aosdoaosd34342342342edddaaa5348" VALUE="TRANSFER"></FORM></TD></TR>
 				<TR><FORM METHOD="POST" ACTION="index.php?content=bank"><TD><INPUT TYPE="TEXT" NAME="biasdiamtasdiojasidjeueu"></TD><TD><SPAN ID="MEDIUM">THIS ACCOUNT</TD><TD><SPAN ID="MEDIUM"><INPUT TYPE="HIDDEN" NAME="ajdiojdiasjdi994343434u989act1" VALUE="<? echo $bankid;?>"><INPUT TYPE="HIDDEN" NAME="ajdiojdiasjdi99u989act1" VALUE="<? echo $accountno;?>"><INPUT TYPE="HIDDEN" NAME="biasdioact2asdiojasidj213123123123eueu" VALUE="<? echo $userid;?>"> <? echo $username;?></TD><TD>n/a</TD><TD><INPUT TYPE="SUBMIT" NAME="aosdoaosd3434234249234099384395348" VALUE="TRANSFER"></FORM></TD></TR>
		</TABLE></TD></TR>
						<TR colspan='4'><TD ></TD><TD colspan='3'><TABLE><TR><TD><SPAN ID="MEDIUM"><B>STANDING ORDER</B></TD></TR><TR><TD><SPAN ID="MEDIUM">TRANSFER:</TD><TD><SPAN ID="MEDIUM">FROM:</TD><TD><SPAN ID="MEDIUM">TO:</TD><TD><SPAN ID="MEDIUM">AT BANK:</TD><TD><SPAN ID="MEDIUM">TURNS:</TD></TR>
 				<TR><TD><INPUT TYPE="TEXT" NAME="biasdioasdiojasidjeueu"></TD><TD><SPAN ID="MEDIUM">THIS ACCOUNT</TD><TD><INPUT TYPE="TEXT" NAME="biasdioasdiojasidj213123123123eueu"></TD><TD><SELECT NAME="234234asdasdasd254563WSDFWSDF">
 <?
						$banks=mysql_query("SELECT * FROM banks");
						while ($bank= mysql_fetch_array($banks)) {
								$bankid2=$bank['bankid'];
$userid2=$bank['userid'];
								$tree=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid2'"));
								$tree=$tree['username'];
				?><OPTION NAME="as234234234" VALUE="<? echo $bankid2; ?>"><? echo $tree; ?></OPTION><? }?>
				</TD><TD><INPUT TYPE="TEXT" NAME="biasdioasdiojasidj213123123123eueu"></TD></TR>
 				<TR><TD><INPUT TYPE="TEXT" NAME="biasdioasdiojasidjeueu"></TD><TD><SPAN ID="MEDIUM"><? echo $username;?></TD><TD><SPAN ID="MEDIUM">THIS ACCOUNT</TD><TD><SPAN ID="MEDIUM"><? echo $bankname; ?></TD><TD><INPUT TYPE="TEXT" NAME="biasdioasdiojasidj213123123123eueu"></TD></TR>
 				<TR><TD><INPUT TYPE="TEXT" NAME="biasdioasdiojasidjeueu"></TD><TD><SPAN ID="MEDIUM">THIS ACCOUNT</TD><TD><SPAN ID="MEDIUM"><? echo $username;?></TD><TD>n/a</TD><TD><INPUT TYPE="TEXT" NAME="biasdioasdiojasidj213123123123eueu"></TD></TR>
		</TABLE></TR></TD>
<TR><TD></TD><TD colspan='3'>
		<TABLE>
				<TR><TD><SPAN ID="MEDIUM"><B>BORROW</B></TD></TR>
<? 
			$bank=mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE bankid='$bankid'"));
			$userid2=$bank['userid'];
			$maxborrow=$bank['maxborrow'];
			$maxdebt2=$bank['maxdebt'];
			$interest2=$bank['interest'];
			$bankusername=mysql_fetch_array(mysql_query("SELECT username FROM users WHERE isbank='1' AND userid='$userid2'"));
			$bankusername=$bankusername['username'];
			$credits2=mysql_fetch_array(mysql_query("SELECT credits FROM users WHERE isbank='1' AND userid='$userid2'"));
			$credits2=$credits2['credits'];
			$credits2=$credits2*0.1;
			$max=mysql_fetch_array(mysql_query("SELECT maxborrow FROM bankaccounts WHERE userid='$userid' AND bankid='$userid2'"));
			$max=$max['maxborrow'];
			$maxdebt=mysql_fetch_array(mysql_query("SELECT maxdebt FROM bankaccounts WHERE userid='$userid' AND bankid='$userid2'"));
			$maxdebt=$maxdebt['maxdebt'];
			$interest=mysql_fetch_array(mysql_query("SELECT interest FROM bankaccounts WHERE userid='$userid' AND bankid='$userid2'"));
			$interest=$interest['interest'];
			$debt="";
			$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid'");
			while ($loan = mysql_fetch_array($loans)) {
				$debt=$debt+$loan['amount'];
			}
			$debt2="";
			$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid' AND issuer='$userid2'");
			while ($loan = mysql_fetch_array($loans)) {
				$debt2=$debt2+$loan['amount'];
			}
			if (!empty($max)) {
				$maxdebt=$maxdebt;
				$maxloan=$max;
				$interest=$interest;
			} else {
				$maxdebt=$maxdebt2;				
				$maxloan=$maxborrow;
				$interest=$interest2;
			}
			$maxdebt=$maxdebt-$debt;
			$maxloan=$maxloan-$debt2;
			if ($maxloan>$maxdebt) {
				$borrowmax=$maxdebt;
			} else {
				$borrowmax=$maxloan;
			}
			if ($borrowmax>$credits2) {
				$borrowmax=$credits2;
			}
			$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
			$online=$online['ip'];
if ($borrowmax>0){
?>
<FORM METHOD="POST" ACTION="index.php?content=bank">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">(You can borrow up to <?echo number_format($borrowmax);   ?>CR) at <? echo $interest;?>% DPR</TD><TD ALIGN="RIGHT"><INPUT TYPE="HIDDEN" NAME="11111wer23234" VALUE="<? echo $userid2; ?>"><INPUT TYPE="TEXT" NAME="11111111111123123123"><INPUT TYPE="SUBMIT" NAME="222222222222222111" VALUE="BORROW"></TD>
	
</TR>
</FORM>
<? } ?>
</TABLE>
<BR>
</TD></TR>
		<? } else if ($bpassword!=$passwordbank) {?>
		<FORM METHOD="POST" ACTION="index.php?content=bank">
		<INPUT TYPE="HIDDEN" NAME="asidjaisodjasid2093993" VALUE="<? echo $loginid; ?>">
		
	<TR VALIGN="TOP" colspan="2"><TD><? echo $bankname; ?></TD><TD>
<? echo $accountno; ?></TD><TD>PASSWORD INVALID PLEASE RELOGIN <INPUT TYPE="SUBMIT" NAME="aosdoao234234234234234sd" VALUE="REMOVE"><BR></TD></TR></FORM>
	<? } else { ?>
	<FORM METHOD="POST" ACTION="index.php?content=bank">
			<INPUT TYPE="HIDDEN" NAME="asidjaisodjasid2093993" VALUE="<? echo $loginid; ?>">
			
	?><TR VALIGN="TOP" colspan='2'><TD><? echo $bankname; ?></TD><TD>
<? echo $accountno; ?><</TD><TD>USERNAME NO LONGER EXISTS <INPUT TYPE="SUBMIT" NAME="aosdoao234234234234234sd" VALUE="REMOVE"><BR></TD></TR></FORM>
<? }
} ?>
</TABLE>
</TD>
</TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">You are in debt by <? echo number_format($debt); ?></TD>
</TR>
<TR COLSPAN='2'><TD COLSPAN='2'>
<TABLE WIDTH="100%" STYLE="font-size: 10pt;">
<TR><TD><B>LOANS:</B></TD></TR>
<TR><TD>ISSUER:</TD><TD>AMOUNT (click for statement):</TD><TD>TERM:</TD><TD>CONTEXT: </TD><TD>DATE ISSUED:</TD><TD>PAY OFF:</TR>
<?
$loans=mysql_query("SELECT * FROM loans WHERE userid='$userid' ORDER BY date ASC");
while ($loan = mysql_fetch_array($loans)) {
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
?>
<FORM METHOD="POST" ACTION="index.php?content=bank">
<INPUT TYPE="hidden" NAME="asdijaisodjoaiewjda" VALUE="<? echo $loanid; ?>">
<TR><TD><? if (!empty($online)) { ?><SPAN ID="BOLD"><? }?><A HREF="index.php?content=message&userid=<? echo $userid2; ?>">[<? echo $issuername; ?>]</A></TD><TD><A HREF="index.php?content=loanlog&loanid=<? echo $loanid; ?>">[<? if ($completed!=1) {echo number_format($amount); ?> <? if ($interest=="0") { echo "IF"; } else { echo "at ".$interest."% DPR"; } } else { echo "Completed"; }?>]</A></TD><TD><? if ($completed!=1) { if ($term>0) { echo $term;  ?> TURNS - <? echo $term-$payback;?> LEFT <? } else { echo "INFINITE"; } } else { echo "completed"; }?></TD><TD><?echo $context; ?></TD><TD><?echo $date;?></TD><TD ALIGN="RIGHT"><? if ($completed!=1) { ?><INPUT TYPE="TEXT" NAME="4433111"><INPUT TYPE="SUBMIT" NAME="1123123123" VALUE="PAY OFF"><? }?></TD></TR>
</FORM>
<?
}
?>
</TABLE>
</TD></TR>
<TR COLSPAN='2'><TD COLSPAN='2'>
<TABLE WIDTH="100%" STYLE="font-size: 10pt;">
<TR><TD><B>STANDING ORDERS:</B></TD></TR>
<TR><TD>RECEIVER:</TD><TD>AMOUNT PER TURN(click for statement):</TD><TD>TERM:</TD><TD>CONTEXT: </TD><TD>DATE ISSUED:</TD><TD>PAY OFF:</TR>
<?
$loans=mysql_query("SELECT * FROM sorder WHERE userid='$userid' ORDER BY date ASC");
while ($loan = mysql_fetch_array($loans)) {
$userid2=$loan['reciever'];
$loanid=$loan['orderid'];
$amount=$loan['amount'];
$context=$loan['context'];
$date=$loan['date'];
$payback=$loan['payback'];
$term=$loan['term'];
$issuername=mysql_fetch_array(mysql_query("SELECT username FROM users WHERE userid='$userid2'"));
$issuername=$issuername['username'];
$online=mysql_fetch_array(mysql_query("SELECT ip FROM useronline WHERE userid='$userid2'"));
$online=$online['ip'];
if ($amount==0) {
$completed=1;
} else {
$completed=0;
}
?>
<FORM METHOD="POST" ACTION="index.php?content=bank">
<INPUT TYPE="hidden" NAME="asdijaisodjoaiewjda" VALUE="<? echo $loanid; ?>">
<TR><TD><? if (!empty($online)) { ?><SPAN ID="BOLD"><? }?><A HREF="index.php?content=message&userid=<? echo $userid2; ?>">[<? echo $issuername; ?>]</A></TD><TD><A HREF="index.php?content=loanlog&loanid=<? echo $loanid; ?>">[<? if ($completed!=1) {echo number_format($amount); } else { echo "Completed"; }?>]</A></TD><TD><? if ($completed!=1) { if ($term>0) { echo $term;  ?> TURNS - <? echo $term-$payback;?> LEFT <? } else { echo "INFINITE"; } } else { echo "completed"; }?></TD><TD><?echo $context; ?></TD><TD><?echo $date;?></TD><TD ALIGN="RIGHT"><? if ($completed!=1) { ?><INPUT TYPE="SUBMIT" NAME="11231231artey23" VALUE="CANCEL"><? }?></TD></TR>
</FORM>
<?
}
?>
</TABLE>
</TD></TR>
<TR VALIGN="TOP" colspan='2'>
	<FORM METHOD="POST" ACTION="index.php?content=bank">
<TD colspan='2'><SPAN ID="MEDIUM">Create new bank account with <SELECT NAME="234234254563WSDFWSDF"><?
$loans=mysql_query("SELECT * FROM banks");
while ($loan = mysql_fetch_array($loans)) {
$bankid=$loan['bankid'];
$userid2=$loan['userid'];
$anonymous=$loan['anonymous'];
$tree=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userid='$userid2'"));
$tree=$tree['username'];
$check=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE bankid='$userid2' AND anonymous='0' AND userid='$userid'"));
$check=$check['userid'];
if (empty($check)) {
?><OPTION NAME="as234234234" VALUE="<? echo $bankid; ?>"><? echo $tree; ?></OPTION><? }}?>
</SELECT><INPUT TYPE="SUBMIT" NAME="12321380983ejjdjdjd" VALUE="CREATE"></FORM>
</TD>
</TR>
<TR VALIGN="TOP" colspan='2'>
	<FORM METHOD="POST" ACTION="index.php?content=bank">
<TD colspan='2'><SPAN ID="MEDIUM"><B>CREATE A NEW BANK:</B></TD></TR>
<TR VALIGN="TOP" colspan='2'><TD colspan='2'><SPAN ID="MEDIUM">ANONYMOUS BANK (PEOPLE CAN CREATE AS MANY ACCOUNTS AS THEY LIKE COST 100,000,000 CREDITS PEOPLE CANNOT TAKE LOANS OUT ACCOUNTS ARE ANONYMOUS</TD></TR>
<TR VALIGN="TOP" colspan='2'><TD colspan='2'><SPAN ID="MEDIUM">LOAN BANK (PEOPLE CAN CREATE ONLY ONE FOR 1,000,000,000,000 CREDITS - PEOPLE CAN TAKE LOANS OUT ACCOUNTS LINKED TO USERS</TD></TR><TR colspan='2'><TD colspan='2'><TABLE><TR></TD><SPAN ID="MEDIUM"><SELECT NAME="asdasncaoisoi38933">
<OPTION NAME="as234234234" VALUE="1">ANONYMOUS</OPTION> BANK (PEOPLE CAN CREATE AS MANY ACCOUNTS AS THEY LIKE COST 100,000,000 CREDITS PEOPLE CANNOT TAKE LOANS OUT ACCOUNTS ARE ANONYMOUS</OPTION>
<OPTION NAME="as234234234" VALUE="-1">LOAN BANK </OPTION>(PEOPLE CAN CREATE ONLY ONE FOR 1,000,000,000,000 CREDITS - PEOPLE CAN TAKE LOANS OUT ACCOUNTS LINKED TO USERS</OPTION>
</SELECT></TD><TD><SPAN ID="MEDIUM">BANK NAME: <INPUT TYPE="TEXT" NAME="asdas4435345ncaoi555soi38933"></TD></TR><TR><TD><SPAN ID="MEDIUM">BANK PASSWORD: <INPUT TYPE="PASSWORD" NAME="asdddddddd0asd0-a0-21231233sd"></TD><TD><SPAN ID="MEDIUM">BANK EMAIL: <INPUT TYPE="TEXT" NAME="asdddddddd0asd0-a0-sd"></TD><TD><INPUT TYPE="SUBMIT" NAME="522342342342342creasd" VALUE="CREATE"></FORM></TD></TR>
</TABLE>
</TD>
</TR>
<? if ($user['bankrupt']=="0") { ?>
<FORM METHOD="POST" ACTION="index.php?content=bank">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">DECLARE SELF BANKRUPT</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="522342342342342" VALUE="DECLARE"></TD>
</TR>
</FORM>
<? } 
   if ($user['bankrupt']=="1") {
   $query="SELECT * FROM users WHERE userid='$userid'";
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
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">CURRENT ATTACK</TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">WEAPON</TD><TD ALIGN="RIGHT">NUMBER</TD><TD ALIGN="RIGHT">SELL</TD>
</TR>
<? if (!empty($attacks1)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Metal Fists</TD><TD><? echo $attacks1; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123attack1" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 188 CR"></FORM></TD>
</TR>
<? } if (!empty($attacks2)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser Sabre</TD><TD><? echo $attacks2; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123attack2" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 338 CR"></FORM></TD>
</TR>
<? } if (!empty($attacks3)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser</TD><TD><? echo $attacks3; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123attack3" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 600 CR"></FORM></TD>
</TR>
<? } if (!empty($attacks4)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">RPG's</TD><TD><? echo $attacks4; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123attack4" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 963 CR"></FORM></TD>
</TR>
<? } if (!empty($attacks5)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Rail Gun</TD><TD><? echo $attacks5; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123attack5" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 3,075 CR"></FORM></TD>
</TR>
<? } if (!empty($attacks6)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Laser Cannon</TD><TD><? echo $attacks6; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123attack6" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 9,825 CR"></FORM></TD>
</TR>
<? } if (!empty($attacks7)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Temporal Cannon</TD><TD><? echo $attacks7; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123attack7" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 31,463 CR"></FORM></TD>
</TR>
<? } ?>
</TABLE>
</TD>
</TR>
</TABLE>
<BR>
<?
$query="SELECT * FROM users WHERE userid='$userid'";
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
?>
<TABLE CELLPADDING='1' CELLSPACING='0' BORDER='0' ALIGN='CENTER' WIDTH='90%'><TR><TD>
<TABLE CELLPADDING='4' CELLSPACING='0' BORDER='0' WIDTH='100%'>
<TR ID="TABLEHEAD"><TD COLSPAN="2">CURRENT DEFENCE</TD><TD></TD><TD></TD></TR>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">WEAPON</TD><TD ALIGN="RIGHT">NUMBER</TD><TD ALIGN="RIGHT">SELL</TD>
</TR>
<TR VALIGN="TOP">
<? if (!empty($defenses1)) { ?>
<TD><SPAN ID="MEDIUM">Riot Shield</TD><TD><? echo $defenses1; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123defense1" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 188 CR"></FORM></TD>
</TR>
<? } if (!empty($defenses2)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Riot Armor</TD><TD><? echo $defenses2; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123defense2" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 338 CR"></FORM></TD>
</TR>
<? } if (!empty($defenses3)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">T10k Protective Armor</TD><TD><? echo $defenses3; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123defense3" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 600 CR"></FORM></TD>
</TR>
<? } if (!empty($defenses4)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">T40k Protective Suit</TD><TD><? echo $defenses4; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123defense4" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 963 CR"></FORM></TD>
</TR>
<? } if (!empty($defenses5)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Proton Shield</TD><TD><? echo $defenses5; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123defense5" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 3,075 CR"></FORM></TD>
</TR>
<? } if (!empty($defenses6)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Proton Armor</TD><TD><? echo $defenses6; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123defense6" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 9,825 CR"></FORM></TD>
</TR>
<? } if (!empty($defenses7)) { ?>
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">Temporal Shield</TD><TD><? echo $defenses7; ?></TD><TD ALIGN="RIGHT"><FORM METHOD="POST" ACTION="./index.php?content=remove2"><INPUT TYPE="TEXT" NAME="sell233213123123123defense7" SIZE="2" VALUE="0">&nbsp;<INPUT TYPE="SUBMIT" VALUE="Sell for 31,463 CR"></FORM></TD>
</TR>
<? }
?>
<FORM METHOD="POST" ACTION="index.php?content=bank">
<TR VALIGN="TOP">
<TD><SPAN ID="MEDIUM">YOU ARE BANKRUPT YOU MUST CLEAR YOUR DEBT TO UNBANKRUPT YOURSELF</TD><TD ALIGN="RIGHT"><INPUT TYPE="SUBMIT" NAME="522342342342342" VALUE="DECLARE"></TD>
</TR>
</FORM>
<? } ?>
</TABLE>
</TD>
</TR>
</TABLE>
<BR>
<BR>
<?
/////////
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
