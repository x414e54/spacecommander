<html>
<head>
<title>Private Chat</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

if ( !defined( "INCLUDES" ) )
	include( "includes.php" );

if ( $privateChatStyle == 1 )
{

/** The private chat room will be displayed in this format:

+-----------+--------------------+-----------+
|           |                    |           |
| PROFILE 1 |      THE CHAT      | PROFILE 1 |
|           |                    |           |
+-----------+--------------------+-----------+

*/

print <<< PRIVATE1

<frameset rows="*" cols="*,500,*" framespacing="0" frameborder="NO" border="0">
  	<frame src="$popupPath?username=$user1" name="leftFrame" scrolling="YES">
  	<frame src="$indexPath?bypass=1&name=$user1&room=$roomName" name="mainFrame">
  	<frame src="$popupPath?username=$user2" name="rightFrame" scrolling="YES">
</frameset>

PRIVATE1;

}
else if ( $privateChatStyle == 2 )
{

/** The private chat room will be displayed in this format:

+-----------+--------------------+
|           |                    |
| PROFILE 1 |                    |
|           |                    |
+-----------+      THE CHAT      |
|           |                    |
| PROFILE 2	|                    |
|           |                    |
+-----------+--------------------+

*/

print <<< PRIVATE2

<frameset cols="300,*" framespacing="0" frameborder="NO" border="0">
<frameset rows="*,*" framespacing="0" frameborder="NO" border="0">
  	<frame src="$popupPath?username=$user1" name="leftFrame" scrolling="YES">
  	<frame src="$popupPath?username=$user2" name="rightFrame" scrolling="YES">
</frameset>
  	<frame src="$indexPath?bypass=1&name=$user1&room=$roomName" name="mainFrame">
</frameset>

PRIVATE2;

}
else if ( $privateChatStyle == 3 )
{

/** The private chat room will be displayed in this format:

+-----------+--------------------+
|           |                    |
| PROFILE 2 |      THE CHAT      |
|   ONLY    |                    |
|           |                    |
+-----------+--------------------+

*/

print <<< PRIVATE2

<frameset cols="300,*" framespacing="0" frameborder="NO" border="0">
  	<frame src="$popupPath?username=$user2" name="rightFrame" scrolling="YES">
  	<frame src="$indexPath?bypass=1&name=$user1&room=$roomName" name="mainFrame">
</frameset>

PRIVATE2;

}
else if ( $privateChatStyle == 4 )
{

/** The private chat room will be displayed in this format (No profile information):

+--------------------+
|                    |
|      THE CHAT      |
|                    |
+--------------------+

*/

$name = $user1;
$room = $roomName;
$bypass = 1;
include( "$indexPath" );

}

?>

<noframes>
<body>
You must have a web browser that supports frames to view this page.
</body>
</noframes>

</html>
