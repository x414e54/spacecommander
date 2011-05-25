<?
if (!empty($_POST['a9sdu90a8sud09asudkkkk'])) {
	if (!empty($_POST['49ru90asdfa9jsd9']) && !empty($_POST['234234234num54'])) {
			
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

			$email=stripslashes(preg_replace("/\"/", "", $_POST['49ru90asdfa9jsd9']));

			// Check this user exists in the pending database, and get values if it does
			
			$query="SELECT * FROM pending WHERE email='$email'";
			$pending=mysql_query($query);
			$pending=mysql_fetch_array($pending);
			$pendingid=$pending['pendingid'];
			$newuser=$pending['username'];
			$time=$pending['time'];
			$checkid=$pending['checkid'];

			if (!empty($pendingid)) {

				// Create new Random Password
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

				$query="UPDATE pending SET password='$newpass', time='$time' WHERE pendingid='$pendingid'";
	 			$new=mysql_query($query) or die("error");

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

				mail($newuser . " <" . $email . ">", "REGISTRATION RESENT", $messagerstring ,
					     $headers);

					$response="You have now been resent your activation e-mail, if you do not receive it still please read the help/faq.";
			} else
			{
					$response="A user with that e-mail address does not exist it may have been deleted becuase it was not activated in time.";
			}
		} else
		{
				$response="The code was incorrect.";
		}
	}
	} else
	{
		$response="You have left blank values.";
	}
}
				session_start();
				$_SESSION["message1"]=$response;
				$_SESSION["url"]=$_SERVER['HTTP_REFERER'];
				session_register('message1');
				session_register('url');
				header("Location: reload.php");
				exit;
?>