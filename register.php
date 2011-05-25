<?
if (!empty($_POST['a9sdu90a8sud09asudkkkk'])) {
if (!empty($_POST['234234234']) && !empty($_POST['234234234222222']) && !empty($_POST['234234234222as222']) && !empty($_POST['c9u3e90uclan']) && !empty($_POST['234234234num54'])) {
	if (!empty($_POST['aosdjpaosjdopasdjposadj']))
	{
		if (!empty($_POST['ao4354545dopasdjposadj']))
		{
			if (empty($_COOKIE["register"]))
			{
				$response = "PLEAES ENABLE COOKIES";
			} else
			{
			
			require('./global.php');
			
			$registerid=$_COOKIE["register"];
			
			require("./ip.php");
			
			$query="SELECT * FROM register WHERE ip='$ip' AND regid='$registerid'";
	 		$register=mysql_fetch_array(mysql_query($query));
			$register=$register['code'];
			
			if ($register==$_POST['234234234num54']) 
			{
				
			$newuser=stripslashes(preg_replace("/ /", "", $_POST['234234234']));
			$email=stripslashes(preg_replace("/\"/", "", $_POST['234234234222as222']));

			if($_POST['234234234222222']==$_POST['234234234222as222']) {
				
			// Accessed 1 Means an Account can be created
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
			
			// If acceessed is still one then the user account is valid
			if ($accessed=="1") {
				$planetcheck=1;
										
				$clan2=$_POST['c9u3e90uclan'];
				switch ($clan2) {
					case 1:
						$clan=1;
	   					break;
					case 2:
   						$clan=2;
					   	break;
					case 3:
   						$clan=2;
					   	break;
					case 4:
   						$clan=1;
					   	break;
					case 5:
   						$clan=3;
					   	break;
					case 6:
   						$clan=3;
					  	break;
					default:
						$clan=0;
						break;
					}
				if(!empty($_POST['234u293rj9jfjj9']))
				{
					if($_POST['234u293rj9jfjj9']=="JOIN") {
						// Join this planet;
							if (!empty($_COOKIE["recruiter"])) {
										$recruiter=$_COOKIE["recruiter"];
										$query="SELECT username FROM users WHERE userid='$recruiter'";
										$username=mysql_fetch_array(mysql_query($query));
										$username=$username['username'];
										$query="SELECT * FROM planets WHERE creator='$recruiter'";
										$planet=mysql_fetch_array(mysql_query($query));
										$planetname=$planet['name'];
										$planetid=$planet['planetid'];
										$planetclan=$planet['clan'];
										if ($clan==0) {
											$planetcheck=0;
											$response="Invalid Clan.";
										}
										if ($clan!=$planetclan) {
											$planetcheck=0;
											$response="Sorry but this clan cannot join this planet.";
										}
							} else {
										$planetcheck=0;
										$response="Please enable cookies";
							}
					} else if($_POST['234u293rj9jfjj9']=="CREATE" && !empty($_POST['aiosdasiodhjaplanet2'])) {
						// Create this planet;
						$planetid='0';
						$planetname=$_POST['aiosdasiodhjaplanet2'];
						if ($clan==0) {
							$planetcheck=0;
							$response="Invalid Clan.";
						}
					} else if($_POST['234u293rj9jfjj9']=="RANDOM") {
						// Join random this planet;
										if ($clan==0) {
											$planetcheck=0;
											$response="Invalid Clan.";
										} else {
											
											$query="SELECT * FROM planets WHERE clan='$clan'";
											$planet=mysql_query($query);
											
											while($random=mysql_fetch_array($planet)) {
												$planetid=$random['planetid'];

												$number=mysql_num_rows(mysql_query("SELECT planet FROM users WHERE planet='$planetid'
																     UNION
																     SELECT planetid FROM pending WHERE planetid='$planetid'"));
												if ($number<100) {
													$planetname=$random['name'];
													$thing=rand(0,2);
													if ($thing<1) {
															$planet=null;
													}
												}
											}
												if($number>=100 || empty($planetid)) {
													$planetid='0';
													$string1="newuser";
													$string2="ehrehr";
													$string3="iehire";
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
													$stringer=substr($stringer,0,8);
													$planetname=$stringer;
												}
										} 
					} else {
						$planetcheck=0;
						$response="You have left some blank values";
					}
				} else {
					if(!empty($_POST['aiosdasiodhjaplanet2']))
					{
						// Create this planet;
						$planetid='0';
						$planetname=$_POST['aiosdasiodhjaplanet2'];
						if ($clan==0) {
							$planetcheck=0;
							$response="Invalid Clan.";
						}
					} else {
						$planetcheck=0;
						$response="You have left some blank values";
					}
				}
				
				$query="SELECT name FROM plantes
					UNION
					SELECT planetname FROM pending";

				$query=mysql_query($query);
				$check2=mysql_fetch_array($query);
				
				if(!empty($check2)) {
					$planetcheck=0;
					$response="I am sorry but this Planet already exists.";
				}
				
					if ($planetcheck==0) {
									session_start();
									$_SESSION["message1"]=$response;
									$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
									session_register('message1');
									session_register('url');
									header("Location: reload.php");
									exit;
					}
					
				srand ((double) microtime( )*1000000);
				$random_number = rand( );
				$checkid=md5($random_number);

				require_once('./ip.php');
				
				// Create Random Password
				$string1="newuser";
				$string2=$time;
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
				$stringer=substr($stringer,0,8);
				$newpass=md5($stringer);
				
				$clan2=$_POST['c9u3e90uclan'];
				$time=date("Y/m/d G:i:s");
				$query="INSERT INTO pending SET username='$newuser', email='$email', password='$newpass', clan='$clan2', planetclan='$clan', checkid='$checkid', planetid='$planetid', planetname='$planetname', time='$time'";
	 			$new=mysql_query($query) or die("error");

				$query="SELECT pendingid FROM pending WHERE username='$newuser' AND checkid='$checkid'";
		 		$pendingid=mysql_fetch_array(mysql_query($query));
				$pendingid=$pendingid['pendingid'];

				$messagerstring="You have registered to Space Commander to activate your account please click:\n\nhttp://commander.anthonybills.com/activate.php?234234234234=" . $checkid . "&234234234234234234234234=" . $pendingid .
						     "\n\nto confirm your e-mail address.\n\nYour username is: " . $newuser . "\nand your Password is: " . $stringer . "\nplease login and change your password straight away\n\nThankyou, \nChurchill Commander Admin";

				// Send Mail
				   $headers="";
				   $headers .= "X-Sender:  $newuser <$email>\n"; //
				   $headers .="From: Space Commander <register@commander.anthonybills.com>\n";
				   $headers .= "Reply-To: Space Commander <register@commander.anthonybills.com>\n";
				   $headers .= "Date: ".date("r")."\n";
				   $headers .= "Message-ID: <".date("YmdHis")."commander@".$_SERVER['SERVER_NAME'].">\n";
				   $headers .= "Return-Path: Space Commander <register@commander.anthonybills.com>\n";
				   $headers .= "Delivered-to: Space Commander <register@commander.anthonybills.com>\n";
				   $headers .= "MIME-Version: 1.0\n";
				   $headers .= "Content-type: text/plain\n";
				   $headers .= "X-Priority: 1\n";
				   $headers .= "Importance: High\n";
				   $headers .= "X-MSMail-Priority: High\n";
				   $headers .= "X-Mailer: Commander Mailler With PHP!\n";

				mail($newuser . " <" . $email . ">", "REGISTRATION", $messagerstring ,
					     $headers);

					$response="You have now been sent an e-mail please click the link on it within 30 Minutes.";
				} else
				{
						$response="Error usename already taken or email already used or banned";
				}			
		} else
		{
				$response="E-mail addresses did not match.";
		}
		} else
		{
				$response="The code was incorrect.";
		}
	}
} else
{
	$response="You must agree to comply with the Rules";
}
} else
{
	$response="You must agree to comply with the Terms of Service";
}
} else
{
	$response="Error you have left blank values";
}
			session_start();
			$_SESSION["message1"]=$response;
			$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
			session_register('message1');
			session_register('url');
			header("Location: reload.php");
			exit;
} else {


	if (!isset($content) && empty($_SESSION["username"])){
		$content="register";
		require('./index.php');
	} else {

			require('./global.php');	

if (empty($_COOKIE["register"])) {
echo "register cookie not working";
}
	if (!empty($_POST['c9u3e90uclan'])) {
		$clan2=$_POST['c9u3e90uclan'];
	} else {
		$clan2=1;
	}

	if (!empty($_COOKIE["recruiter"])) {
		$recruiter=$_COOKIE["recruiter"];
		$query="SELECT * FROM users WHERE userid='$recruiter'";
		$query=mysql_query($query) or die("error100");
		$username=mysql_fetch_array($query);
		$planetid=$username['planet'];
		$username=$username['username'];
		$query="SELECT * FROM planets WHERE planetid='$planetid'";
		$planet=mysql_fetch_array(mysql_query($query));
		$planetname=$planet['name'];
		$planetid=$planet['planetid'];
		$planetclan=$planet['clan'];
	}

	switch ($clan2)
	{
	case 1:
		$clan=1;
		break;
	case 2:
   		$clan=2;
	   	break;
	case 3:
   		$clan=2;
	   	break;
	case 4:
		$clan=1;
	   	break;
	case 5:
		$clan=3;
	   	break;
	case 6:
		$clan=3;
	  	break;
	default:
		$clan=0;
		break;
	}

	$racetype=array("Unselected", "[MACHINES]", "[HUMANS]", "[UNKNOWN]");

?>
 <FORM METHOD="POST" ACTION="register.php">
<table width="100%"  border="0" cellspacing="6" cellpadding="2">
  <tr>
    <td>REGISTER:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Username: </td>
    <td><INPUT TYPE="TEXT" NAME="234234234" MAXCHARS="50"></td>
  </tr>
  <tr>
    <td>Password: </td>
    <td>This is sent to you in an e-mail</td>
  </tr>
  <tr>
    <td>Clan:</td>
    <td><SELECT NAME="c9u3e90uclan">
      <OPTION VALUE=1 <?if($clan2==1) {echo "SELECTED"; }?>>Terminators[MACHINES]</OPTION>
      <OPTION VALUE=2 <?if($clan2==2) {echo "SELECTED"; }?>>Humans[HUMANS]</OPTION>
      <OPTION VALUE=3 <?if($clan2==3) {echo "SELECTED"; }?>>Cloners[HUMANS]</OPTION>
      <OPTION VALUE=4 <?if($clan2==4) {echo "SELECTED"; }?>>Havervesters[MACHINES]</OPTION>
      <OPTION VALUE=5 <?if($clan2==5) {echo "SELECTED"; }?>>Inter-spacial beings[UNKNOWN]</OPTION>
      <OPTION VALUE=6 <?if($clan2==6) {echo "SELECTED"; }?>>Hackers[UNKNOWN]</OPTION>
    </SELECT></td>
  </tr>
  <tr>
    <td>Valid E-mail Address: </td>
    <td><INPUT TYPE="TEXT" NAME="234234234222as222" MAXCHARS="50"></td>
  </tr>
  <tr>
    <td>Confirm E-mail Address: </td>
    <td><INPUT TYPE="TEXT" NAME="234234234222222" MAXCHARS="50"></td>
  </tr>
  <tr>
    <td><IMG SRC="imager2.php"></td>
    <td><INPUT TYPE="TEXT" NAME="234234234num54" MAXCHARS="50"></td>
  </tr>
  <tr>
    <td>Planet: </td>
    <td><SELECT NAME="234u293rj9jfjj9">
  <? if(!empty($planetid)) {?>      <OPTION VALUE="JOIN">Join Planet</OPTION>  <? } ?>
      <OPTION VALUE="RANDOM">Join Random Planet</OPTION>
      <OPTION VALUE="CREATE">Create New Planet</OPTION>
    </SELECT></td>
  </tr>
  <? if(!empty($planetid)) {?>      
  <tr>
    <td>Join <? echo $username; ?>'s Planet (must be <? echo $racetype[$planetclan]; ?>): </td>
    <td><? echo $planetname; ?></td>
  </tr>
  <? } ?>
  <tr>
    <td>Create New Planet: </td>
    <td><input type="TEXT" name="aiosdasiodhjaplanet2" maxchars="50"></td>
  </tr>
  <tr>
    <td><input type="checkbox" name="aosdjpaosjdopasdjposadj"></td>
    <td>I have read and agree to comply with the <a href="terms.php" target="_new">[Terms of Service]</a></td>
  </tr>
  <tr>
    <td><input type="checkbox" name="ao4354545dopasdjposadj"></td>
    <td>I have read and agree to comply with the <a href="rules.php" target="_new">[Rules]</a></td>
  </tr>
  <tr>
    <td><INPUT TYPE="SUBMIT" VALUE="JOIN" NAME="a9sdu90a8sud09asudkkkk"></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
<br>
  <FORM METHOD="POST" ACTION="resend.php">
<table width="100%"  border="0" cellspacing="6" cellpadding="0">
  <tr>
    <td>RESEND:</td>
    <td></td>
  </tr>
  <tr>
    <td>If you do/have not received your activation e-mail please type your e-mail address and the code in below and submit.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><IMG SRC="imager2.php"></td>
    <td><INPUT TYPE="TEXT" NAME="234234234num54" MAXCHARS="50"></td>
  </tr>
  <tr>
    <td>Your e-mail address:</td>
    <td><INPUT TYPE="TEXT" NAME="49ru90asdfa9jsd9" MAXCHARS="50"></td>
  </tr>
    <tr>
    <td><input type="SUBMIT" value="RESEND" name="a9sdu90a8sud09asudkkkk"></td>
    <td></td>
  </tr>
</table>
  </form>
<?
	}
}
?>