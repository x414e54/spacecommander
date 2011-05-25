<?php
require("./config.php");
mysql_connect("$server","$user","$password")
  	or die("Unable to connect to SQL server.<BR>");
mysql_select_db("$database")
	or die("Could not connect to database.<BR>");
?>