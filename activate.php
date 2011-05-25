<?
if (!empty($_GET['234234234234234234234234']) && !empty($_GET['234234234234']))
{
		require('./global.php');
		
		$query="DELETE FROM pending WHERE time <= DATE_SUB( NOW(), INTERVAL 30 MIN )";
		$delete=mysql_query($query);	

		$pendingid=$_GET['234234234234234234234234'];
	 	$query="SELECT * FROM pending WHERE pendingid='$pendingid'";
	 	$pending=mysql_fetch_array(mysql_query($query)) or die(invalid());

		$checkid=$pending['checkid'];
	
		if ($_GET['234234234234']==$checkid)
	      {
			$usernameid=$pending['username'];

			$passwordid=$pending['password'];
			$planetid=$pending['planetid'];
			$planetname=$pending['planetname'];
			$planetclan=$pending['planetclan'];
			$clan=$pending['clan'];
			$email=$pending['email'];
			srand ((double) microtime( )*1000000);
			$random_number = rand( );
			$linkid=md5($random_number);
	
			// Create Planet
			if ($planetid==0) {
					$tree=mysql_fetch_array(mysql_query("SELECT * FROM planets ORDER BY planetid DESC"));
					$x=$tree['x'];
					$y=$tree['y'];
					$z=$tree['z'];

					$z++;
					if ($z>10) {
						$z = 0;
						$y++;
					}
					if ($x>100) {
						$y = 0;
						$x++;
					}


				$query="INSERT INTO planets SET name='$planetname', creator='0', x='$x', y='$y', z='$z', clan='$planetclan'";
				$go=mysql_query($query);
				$query="SELECT * FROM planets WHERE name='$planetname' AND creator='0' AND x='$x' AND y='$y' AND z='$z' AND clan='$planetclan'";
				$go=mysql_fetch_array(mysql_query($query));
				$planetid=$go['planetid'];
				$f=0;
				$newplanet=1;
			} else {
				$query="SELECT * FROM users WHERE planet='$planetid'";
				$f=mysql_num_rows(mysql_query($query));
			}
			
			if ($clan==6) {
				$hackers=1;
				$gothack=1;
			} else if ($clan==5) {
				$spies=1;
				$gotspy=1;
			} else if ($clan==4) {
				$gotbank=1;
			} else if ($clan==3) {
				$gotclone=1;
			} else if ($clan==2) {
				$gotdefense=1;
			} else if ($clan==1) {
				$gotattack=1;
			}
			// Create user
	 		$query="INSERT INTO users SET username='$usernameid', email='$email', planet='$planetid', linkid='$linkid', attackcredits='1', moderator='0', race='$clan', password='$passwordid', orelevel='1', rank='0', units='1', credits='1000', attacklevel='1', spylevel='1', hacklevel='1', spies='$spies', hackers='$hackers', gotclone='$gotclone', gotspy='$gotspy', gothack='$gothack', gotattack='$gotattack', gotdefense='$gotdefense', defenselevel='1', debt='1000', f='$f'";
		 		$new=mysql_query($query) or die("error5543");
	
			$query="SELECT userid FROM users WHERE username='$usernameid'";
	 		$userid1=mysql_fetch_array(mysql_query($query));
			$userid1=$userid1['userid'];
			
			if ($newplanet==1) {
				$query="UPDATE planets SET creator='$userid1' WHERE planetid='$planetid'";
				$go=mysql_query($query);			
			}

			$query="SELECT userid FROM users WHERE admin='1'";
	 		$adminid=mysql_fetch_array(mysql_query($query));
			$adminid=$adminid['userid'];

			$time=date("Y/m/d G:i:s");

			$loan = mysql_fetch_array(mysql_query("SELECT * FROM banks WHERE main='1'"));
			$bankid=$loan['bankid'];
			$userid2=$loan['userid'];
			$anonyous=$loan['anonymous'];
	
			// Creates a random password for the bank account.
			$string1="opack";
			$string2=date("Y/m/d G:i:s");
			$string3=$ip;
			$string4=md5($string1); 			$string5=md5($string2);
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
	
			// Checks for a free bank account number
			$s=0;
			while ($s!=1)
			{
				srand ((double) microtime( )*1000000);
				$accountno = rand( );
				$tree=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE bankid='$bankid' AND accountno='$accountno'"));
				$tree=$tree['accountno'];
		
				if (empty($tree))
				{
					$s=1;
				}
			}

			$maxdebt=$loan['maxdebt'];
			$interest=$loan['interest'];
			$maxloan=$loan['maxloan'];
			$check=mysql_fetch_array(mysql_query("SELECT * FROM bankaccounts WHERE bankid='$bankid' AND anonymous='0' AND userid='$userid'"));
			$check=$check['userid'];

			if (empty($check))
			{
				$query="INSERT INTO bankaccounts SET userid='$userid', maxborrow='$maxloan', bankid='$bankid', interest='$interest', maxdebt='$maxdebt', password='$stringer', accountno='$accountno', credits='0', anonymous='0'";
				$go=mysql_query($query) or die ("error552");
			
				$time=date("Y/m/d G:i:s");
		
				$contentbank="Welcome new user, this is the Galactic Bank (the Primary Bank), you have had an acount for this bank automaticaly created. Its ACCOUNT NO IS: " . $accountno . " AND PASSWORD: ". $stringer . " Please login on the banks page.";
	 		
				$query="INSERT INTO messages SET userid='$userid1', userid2='$userid2', content='$contentbank', time='$time'";
		 		$new=mysql_query($query) or die("error5543765");
			}

			$contentadmin="Welcome new user, I am the Admin of this world and I would just like to wish you a pleasant stay. If you have any problems do not be afraid to send me a message. Thankyou!";
			$contentbank="Welcome new user, this is the Galactic Bank as you are a new user to this world we have given you a 1000 credit interest free loan to start you on your way, this will have to be paid back at some time but dont worry about it now.";

	 		$query="INSERT INTO messages SET userid='$userid1', userid2='$adminid', content='$contentadmin', time='$time'";
	 		$new=mysql_query($query) or die("error55439");
	 		$query="INSERT INTO messages SET userid='$userid1', userid2='$userid2', content='$contentbank', time='$time'";
	 		$new=mysql_query($query) or die("error5543765");

			$context="Starting loan";
	 		$query="INSERT INTO loans SET userid='$userid1', payback='0', term='0', interest='0', amount='1000', date='$time', issuer='$userid2', context='$context', startingloan='1'";
	 		$new=mysql_query($query) or die("error55412312loa");

			$query="DELETE FROM pending WHERE pendingid='$pendingid'";
	 		$deletepend=mysql_query($query) or die("error333");

			$response="Account created please login";
			} else 
			{
				$response="Error id wrong.";
			}
} else
{
	$response="Error you have left blank values";
}
				session_start();
				$_SESSION["message1"]=$response;
				$_SESSION["url"]="index.php";
				session_register('message1');
				session_register('url');
				header("Location: reload.php");
				exit;
		function invalid() {
				$response="This user does not exist, it may have been deleted if you did not activate it within 30 Minutes.";
				session_start();
				$_SESSION["message1"]=$response;
				$_SESSION["url"]="index.php";
				session_register('message1');
				session_register('url');
				header("Location: reload.php");
				exit;
		}
?>