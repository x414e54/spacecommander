<html>
<body>

<?
if ( !defined( "INCLUDES" ) )
	include( "includes.php" );

if ( !$can_play && !$bypass )
{

$name = trim( $name );

print <<< DETECT_FLASH

<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"  codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" ID="DetectFlash" WIDTH="1" HEIGHT="1" ALIGN="">
<PARAM NAME=movie VALUE="DetectFlash.swf?index_page=$PHP_SELF&name=$name">
<PARAM NAME=index_page VALUE="$PHP_SELF">
<PARAM NAME=name VALUE="$name">
<PARAM NAME=quality VALUE=low>
<PARAM NAME=bgcolor VALUE="#FFFFFF">
<EMBED src="DetectFlash.swf?index_page=$PHP_SELF&name=$name" quality=low bgcolor=#FFFFFF  WIDTH="1" HEIGHT="1" swLiveConnect=true ID="DetectFlash" NAME="DetectFlash" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
</OBJECT>

<meta http-equiv="refresh" content="5;url=$noFlash">

DETECT_FLASH;

exit;

}

/****************************************

Javascript popup windows for getting user
profiles, and creating private chats.

****************************************/

print <<< JAVASCRIPT

<script language="JavaScript">
<!--

// changes bgcolor of html document via flash getURL command

/** This function opens a popup window with the profile of <username> in it. The parameters
that control the style, size and positioning of the popup window are in the includes.php file */

function getChatProfile( username )
{
	window.open( "$popupPath?username=" + username, "userProfile", "width=$popupWidth,height=$popupHeight,top=$popupTopOffset,left=$popupLeftOffset,$popupOptions" );
}

/** This function opens a popup window for a private chat betwen user1 and user2. The popup
options can be edited directly in this function, but you have to know a bit of Javascript. */

function privateChat( user1, user2, roomName )
{
	window.open( "$privateChatPath?roomName=" + roomName + "&user1=" + user1 + "&user2=" + user2, "privateChat", "resizable,scrollbars,menubar,status" );
}
-->
</script>

JAVASCRIPT;


function copyright()
{
print <<< COPYRIGHT

	<p><font face=Arial size=2>
	<P><h3>Want the *** SOURCE CODE *** to this chat room?</h3><P>


	The $5 purchase at <a target=newWindow href=http://www.tufat.com/chat.php>http://www.tufat.com/chat.php</a> includes ALL source (including the .FLA file, which most programmers don't release), as well as installation instructions.

	<P>Copyright 2002-2003 Darren G. Gates <a target=newWindow href=http://www.tufat.com>www.tufat.com</a>
	</font>

COPYRIGHT;
}


if ( !$bypass && $displayLoginForm )	// we have a logon name via the HTML form
{

/****************************************

The initial login form, where users enter
their chat names (stored in $name variable)

****************************************/

print <<< FORM

<div align=center>
<script language="Javascript">
<!--
function validateLogin( loginForm )
{
	if ( loginForm.name.value == "" ) {
		alert( "Please enter a valid user name." );
	}
	else {
		loginForm.submit();
	}
}
//-->
</script>
<form name=chatForm method=POST action="./index.php?content=talk">
  <table width="460" border="0" cellpadding="1" cellspacing="0" bgcolor="#000099">
    <tr>
      <td><table width="100%" height=100% border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td colspan="2"><font face=Arial size=3><b>Chat Room Identification</b></font></td>
          </tr>
          <tr>
            <td width="77%"><font face=Arial size=2>Enter a name to identify you
              in the chat:</font></td>
            <td width="23%"><input type=TEXT name=213213 size=20 style="font-size: 12px; font-family: Arial;" maxlength=50 VALUE="$username" DISABLED="TRUE"><input type=HIDDEN name=name size=20 style="font-size: 12px; font-family: Arial;" maxlength=50 VALUE="$username"></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">If you are
              a moderator, enter the moderator code:</font></td>
            <td><input name=modpass type=text style="font-size: 12px; font-family: Arial;" id="modpass" size=20 maxlength=20></td>
          </tr>
          <tr>
            <td><input type=hidden name=bypass value="Bypass"> <input style="font-size: 12px; font-family: Arial;" type=button name=Identity value="Enter Chat Room" onClick="javascript:validateLogin(document.chatForm);"></td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </table>
  </form>
</div>


FORM;


if ( $SERVER_NAME == "tufat.com" )
{
	print "<p><font face=Arial size=2>For this demo, if you type \"mod123\" as the moderator code, then you will be logged in as a moderator. Also, you may type \"spy123\" as the moderator code to login as a spy - this means that you will be able to view a chat without anyone knowing that you're there. In spy mode, you may not perform moderator actions (e.g. booting & banning) or contribute messages to the chat because that would 'blow your cover'. If you login as a moderator in this demo, please be kind and do not arbitrarily boot users you don't know from the room. The moderator & spy codes are set in the configuration options.</font>";

	copyright();
}

exit;

}

$connection = new DBConnection();

/** Check to see if this user's IP address is banned. */

$name = trim( $name );

/** Default names have been disabled in this version of FlashChat. The
assumption is that to get to the chat, the user has already logged in.

if ( !$name )
	$name = $defaultUserName;
if ( !$room )
	$room = $defaultRoomName;

*/

if ( !$room )
{
	$numNames = $connection->getValue( "SELECT COUNT(ID) FROM chat_users WHERE name LIKE '$name'" );

	/** If someone else is already using this name in a chat, append a number
	at the end of the name so that everyone has a unique identifier. */

	if ( $numNames > 0 )
		$name = $name . " " . $numNames;
}

function validDomain( $domain )
{
	// check to make sure that the form submission came from this domain

	global $SERVER_NAME;

	if ( $domain == $SERVER_NAME )
		return true;
	else
		return false;
}

if ( $modpass == $spyPassword )
{
	$modParam = "<PARAM NAME=spy VALUE=\"1\">\n";
	$modParamString = "&spy=1";
}
else if ( $modpass == $moderatorPassword )
{
	$modParam= "<PARAM NAME=moderator VALUE=\"1\">\n";
	$modParamString = "&moderator=1";
}

// do not allow HTML tags in name
$name = strip_tags( $name );

$myip = $REMOTE_ADDR;

// remove IP addresses from chat_banned that have timed out
$connection->query( "DELETE FROM chat_banned WHERE NOW() - datetime >= $banTime" );

// remove entries from chat_ip that have timed out
$connection->query( "DELETE FROM chat_ip WHERE NOW() - datetime >= $banTime" );

$banned = $connection->getValue( "SELECT IP FROM chat_banned WHERE ip = '$myip' AND NOW() - datetime < $banTime" );

if ( $banned )
{
	print "<font face=Arial><h2>Banned IP Detected</h2><font size=2>You are unable to login because your IP address ($banned) has been banned from any chat activity for 1 hour from the time of banning.</font></font>";

	exit;
}
else
{
	// insert this user's IP address in chat_ip (in case they are banned later)
	$connection->query( "INSERT INTO chat_ip VALUES( '$name', '$myip', NOW() )" );
}

$rooms = str_replace( ", ", ",", $rooms );
$rooms = trim( $rooms );

?>
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" WIDTH=443 HEIGHT=540>
<PARAM NAME=movie VALUE="FlashChat.swf?show_profiles=<? print $profilePopup; ?>&button_text_color=<? print $buttonTextColor; ?>&button_color=<? print $buttonColor; ?>&init_vol=<? print $initialVolume; ?><? print $modParamString; ?>&snd_send=<? print $sendMsgSound; ?>&snd_receive=<? print $receiveMsgSound; ?>&snd_enter=<? print $enterRoomSound; ?>&snd_leave=<? print $leaveRoomSound; ?>&user_font_size=<? print $userlistFontSize; ?>&user_font_face=<? print $userlistFontType; ?>&msg_font_face=<? print $messageFontType; ?>&msg_font_size=<? print $messageFontSize; ?>&enter_color=<? print $welcomeColor; ?>&private_color=<? print $privateChatInviteColor; ?>&user_color=<? print $userlistFontColor; ?>&msg_color=<? print $messageFontColor; ?>&room=<? print $room; ?>&input_text_color=<? print $inputTextColor; ?>&bg_text_color=<? print $textBackgroundColor; ?>&welcome_color=<? print $welcomeTitleColor; ?>&welcome_name_color=<? print $welcomeTitleNameColor; ?>&title_color=<? print $titleFontColor; ?>&rooms=<? print $rooms; ?>&name=<? print $name; ?>">

<PARAM NAME=rooms VALUE="<? print $rooms; ?>">
<PARAM NAME=room VALUE="<? print $room; ?>">
<PARAM NAME=name VALUE="<? print $name; ?>">
<PARAM NAME=snd_leave VALUE="<? print $leaveRoomSound; ?>">
<PARAM NAME=snd_enter VALUE="<? print $enterRoomSound; ?>">
<PARAM NAME=snd_receive VALUE="<? print $receiveMsgSound; ?>">

<? print $modParam; ?>

<PARAM NAME=snd_send VALUE="<? print $sendMsgSound; ?>">
<PARAM NAME=show_profiles VALUE="<? print $profilePopup; ?>">
<PARAM NAME=init_vol VALUE="<? print $initialVolume; ?>">
<PARAM NAME=msg_color VALUE="<? print $messageFontColor; ?>">
<PARAM NAME=user_color VALUE="<? print $userlistFontColor; ?>">
<PARAM NAME=private_color VALUE="<? print $privateChatInviteColor; ?>">
<PARAM NAME=enter_color VALUE="<? print $welcomeColor; ?>">
<PARAM NAME=msg_font_size VALUE="<? print $messageFontSize; ?>">
<PARAM NAME=msg_font_face VALUE="<? print $messageFontType; ?>">
<PARAM NAME=user_font_size VALUE="<? print $userlistFontSize; ?>">
<PARAM NAME=user_font_face VALUE="<? print $userlistFontType; ?>">
<PARAM NAME=button_color VALUE="<? print $buttonColor; ?>">
<PARAM NAME=button_text_color VALUE="<? print $buttonTextColor; ?>">
<PARAM NAME=title_color VALUE="<? print $titleFontColor; ?>">
<PARAM NAME=welcome_color VALUE="<? print $welcomeTitleColor; ?>">
<PARAM NAME=welcome_name_color VALUE="<? print $welcomeTitleNameColor; ?>">
<PARAM NAME=bg_text_color VALUE="<? print $textBackgroundColor; ?>">
<PARAM NAME=quality VALUE=high>
<PARAM NAME=bgcolor VALUE="<? print $backgroundColor; ?>">
<PARAM NAME=input_text_color VALUE="<? print $inputTextColor; ?>">

<EMBED src="FlashChat.swf?show_profiles=<? print $profilePopup; ?>&button_text_color=<? print $buttonTextColor; ?>&button_color=<? print $buttonColor; ?>&init_vol=<? print $initialVolume; ?><? print $modParamString; ?>&snd_send=<? print $sendMsgSound; ?>&snd_receive=<? print $receiveMsgSound; ?>&snd_enter=<? print $enterRoomSound; ?>&snd_leave=<? print $leaveRoomSound; ?>&user_font_size=<? print $userlistFontSize; ?>&user_font_face=<? print $userlistFontType; ?>&msg_font_face=<? print $messageFontType; ?>&msg_font_size=<? print $messageFontSize; ?>&enter_color=<? print $welcomeColor; ?>&private_color=<? print $privateChatInviteColor; ?>&user_color=<? print $userlistFontColor; ?>&msg_color=<? print $messageFontColor; ?>&room=<? print $room; ?>&input_text_color=<? print $inputTextColor; ?>&bg_text_color=<? print $textBackgroundColor; ?>&welcome_color=<? print $welcomeTitleColor; ?>&welcome_name_color=<? print $welcomeTitleNameColor; ?>&title_color=<? print $titleFontColor; ?>&rooms=<? print $rooms; ?>&name=<? print $name; ?>" quality=high bgcolor="#<? print $backgroundColor; ?>" WIDTH=443 HEIGHT=540 TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></EMBED>
</OBJECT>

<?

if ( $SERVER_NAME == "tufat.com" )
	copyright();

?>

</body>
</html>

