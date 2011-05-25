<html><head><title>Users</title>
<LINK REL=stylesheet HREF="main.css" TYPE="text/css">
</head><body><center><b><u>Who's Online</u></b></center><br/><br/><?php
  echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"20\";URL=\"reader.php\">";
  $mydir = opendir("online");
  while ($fn = readdir($mydir))
  {
    if ($fn == '.' || $fn == '..')
      continue;
    $fp  = @fopen("online/$fn", 'r');
    @fpassthru($fp);
    @fclose($fp); 
  }
  closedir($mydir);
?></body></html>