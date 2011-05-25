<?	$default2="http://www.anthonybills.com/anthony/playlist.m3u";
	$alien2="http://www.anthonybills.com/anthony/playlist.m3u";
	$machines2="http://www.anthonybills.com/anthony/playlist.m3u";
	$humans2="http://www.anthonybills.com/anthony/playlist.m3u";

				require('./global.php');
				
				$username=$_SESSION["username"];

				$query=("SELECT race FROM users WHERE username='$username'");
				$race=mysql_fetch_array(mysql_query($query));
				$race=$race['race'];

					switch ($race) {
					case 1:
						$music=$machines2;
	   					break;
					case 2:
   						$music=$humans2;
					   	break;
					case 3:
   						$music=$humans2;
					   	break;
					case 4:
   						$music=$machines2;
					   	break;
					case 5:
   						$music=$alien2;
					   	break;
					case 6:
   						$music=$alien2;
					  	break;
					default:
						$music=$default2;
						break;
					}
?>
<html>
<body bgcolor="gray">
<h2>Space Music</h2>
<embed  SRC="<? echo $music; ?>" LOOP="true" autostart="true" WIDTH=180 HEIGHT=60 CONTROL="console" CONTROLLER="true" type="audio/mpeg">