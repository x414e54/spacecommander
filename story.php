<?
	if (!isset($content) && empty($_SESSION["username"])){
		$content="story";
		require('./index.php');
	} else {
			$alienstory="./alienstory.php";
			$humanstory="./humanstory.php";
			$machinesstory="./machinesstory.php";
			$defaultstory="./defaultstory.php";

			require('./global.php');
				
			$username=$_SESSION["username"];

			$query=("SELECT race FROM users WHERE username='$username'");
			$race=mysql_fetch_array(mysql_query($query));
			$race=$race['race'];

			switch ($race) {
				case 1:
					$story=$machinesstory;
				break;	
				case 2:
   					$story=$humanstory;
			   	break;
				case 3:
   					$story=$humanstory;
			   	break;
				case 4:
   					$story=$machinesstory;
			   	break;
				case 5:
   					$story=$alienstory;
			   	break;
				case 6:
   					$story=$alienstory;
			  	break;
				default:
					$story=$defaultstory;
				break;
			}
		echo "<br>";
		include($story);
		echo "<br>";
		echo "<br>";
	}
?>