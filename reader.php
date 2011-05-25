<html><head><title>Chat Reader</title>
<LINK REL=stylesheet HREF="main.css" TYPE="text/css"></head>
<body>
<?php
  echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"20\";URL=\"reader.php\">";
  $fp     = @fopen("chat.txt", 'r');
  @fpassthru($fp);
  @fclose($fp);
?></body></html>