<?php 
	session_start();
	$url=$_SESSION["url"];
	$message1=$_SESSION["message1"];
				$aliens="./themes/erethral/loader.theme";
				$humans="./themes/erethral/loader.theme";
				$machines="./themes/erethral/loader.theme";
				$default="./themes/erethral/loader.theme";

				$query=("SELECT race FROM users WHERE userid='$userid'");
				$race=mysql_fetch_array(mysql_query($query));
				$race=$race['race'];
					switch ($race) {
					case 1:
						$theme=$machines;
	   					break;
					case 2:
   						$theme=$humans;
					   	break;
					case 3:
   						$theme=$humans;
					   	break;
					case 4:
   						$theme=$machines;
					   	break;
					case 5:
   						$theme=$aliens;
					   	break;
					case 6:
   						$theme=$aliens;
					  	break;
					default:
						$theme=$default;
						break;
					}
				$loader="./loader.php";
				require($theme);
?>