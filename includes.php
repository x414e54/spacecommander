<?

/*******************************************************/
/* THESE VARIABLES MUST BE CHANGED TO SUIT YOUR SERVER */
/*******************************************************/


/** This quickly gets around the "register_globals = off" setting
being the default in later PHP. Contributed by FVC. */

ini_set('error_reporting',7); import_request_variables("GPC");

require("./global.php");
/** MySQL Configuration */

$username3 = $user;		// The mysql database username
$host = $server;			// The mysql host

$moderatorPassword = "mod123";	// to login as a moderator
$spyPassword = "spypass";		// to login as a spy

/** The amount of time, in seconds, that an IP address is banned for. */

$banTime = 3600;

/** If you want the chat room to be in a page other than index.php,
change this variable to match the new file name. Same for the private
chat page. */

$indexPath = "index.php?content=talk";
$privateChatPath = "privatetalk.php";

/** The options that follow affect the chat look and feel, as well
as the available rooms, and behavior in special cirumstances, e.g.
private chats and if Flash 6 is not detected. Instead of giving you a
detailed explanation of each variable, it is much better for you to
experiment with the options to see how they affect the chat. */

/** The page to display if the user does not have Flash 6 */
$noFlash = "noFlash.php";

/** The possible chat rooms (infinitely many possible). */
$rooms = "Churchill Commander";

/** Private chat room layout. For a visual description of these
private chat options, see privateChat.php */

$privateChatStyle = 4;	// see below. Also read comments in privateChat.php

//  1 = profiles are columns, chat is a column between profiles
//	2 = profiles are in left column, chat is right side of page
//  3 = only the *other user* profile is displayed, on the left side
//  4 = no profile information is displayed, only the chat itself

/** Sounds: To disable any individual sound, set its variable to
false. To disable all sounds, set all variables to false. */

$leaveRoomSound = false;	// door-shut sound when user leaves room
$enterRoomSound = false;	// Jetsons sound when user enters room
$receiveMsgSound = true;	// when user receives a message
$sendMsgSound = true;	// when user sends a messages

$initialVolume = 80;	// the initial volume setting (0-100)

/** Font color and style of the "... has entered..." text. */

$welcomeColor = "FFFF00";
$welcomeTimeFormat = "h:i:s a";		// only valid on *nix servers

/** Background Color. */

$textBackgroundColor = "333366";	// message & userlist areas
$inputTextColor = "FFFFFF";			// input text area
$backgroundColor = "24244F";		// entire room background color

/** Font color and style of the main chat window. */

$messageFontType = "Arial";		// values: "Arial", "Courier", "Times"
$messageFontSize = 12;			// values: 8,10,12,14,16,18
$messageFontColor = "FFFFFF";	// values: any Hex color value

/** Font color and style of the user list window. */

$userlistFontType = "Arial";	// values: "Arial", "Courier", "Times"
$userlistFontSize = 12;			// values: 8,10,12,14,16,18
$userlistFontColor = "FFFFFF";
//$userlistItemsBold = false;
//$userlistItemsUnderline = true;

/** Colors of main chat window buttons. */

$buttonColor = "7777FF";
$buttonTextColor = "FFFFFF";

/** The font color of the Flash window text (e.g. "Type Your Message:",
"Who's Here", "The Chat", "Privat chat with:") */

$titleFontColor = "EBC04B";

/** The font color of the Welcome in "Welcome <name>". */

$welcomeTitleColor = "FFFFFF";

/** The font color of the name in "Welcome <name>". */

$welcomeTitleNameColor = "FFFF00";

/** The color for the private chat invitation messages, E.g. "Dear <name>,
user <user> has invited you to a private chat..." */

$privateChatInviteColor = "CCF0FF";

/** If users are to be automatically logged in - i.e., the login form
is NOT to be displayed, then set this variable to false. If this
variable is set to false, then you should pass a PHP variable to this
script called $name, which will be the user name in the chat room. */

$displayLoginForm = true;

/** This is the popup window when a user clicks on a user name in the 'users' window.
If no popup, set $profilePopup variable to false. */

$profilePopup = false;
$popupPath = "profile.php";
$popupHeight = 500;
$popupWidth = 400;
$popupLeftOffset = 10;
$popupRightOffset = 10;
$popupOptions = "resizable,scrollbars";

/** Message to display to other users when a user is in a private room. */

//$inPrivateNotification = "(in private)";

/** Message to display to other users when a user is a moderator. */

//$isModeratorNotification = "(moderator)";

/** User list and message windows sizes and offsets (in pixels). The user list
and message list width sum should NOT exceed the overall width of the movie. */

/** NOTE: be careful when adjusting these values, because the 'whos here' window
will overlap with the Pause and Save buttons if the userlistXOffset is too large
(i.e., too large negative). The values shown here are just about as large as they
can be before overlap starts to occur. */

/** These options have been disabled as of FlashChat v.3
$userlistWidth = 100;
$userlistXOffset = -16;		// left offset of user list
$messagelistWidth = 290;
$messagelistXOffset = 0;	// left offset of message list
*/


/*******************************************************/
/********** DO NOT MODIFY THE CONTENTS BELOW ***********/
/*******************************************************/

define( "INCLUDES", 1 );


/** General database access class. If using a database other than MySQL, simply
modify the functions below accordingly. */

class DBConnection
{
	var $connection;
	var $database3;
	var $username3;
	var $password3;
	var $host;
	var $queryString;

	function DBConnection()	// connect to the appropriate mysql database
	{
		global $database, $username3, $password, $host;

		$this->database = $database;
		$this->username = $username3;
		$this->password = $password;
		$this->host = $host;

		$this->connection = mysql_connect ( $this->host, $this->username, $this->password )
			or die ( "There was a MySQL configuration problem - your host name, username, or password is incorrect!" );

		mysql_select_db ( $this->database )
			or die ( "Unable to make connection to MySQL database: $this->database. The system connected to MySQL, but did not find the specified database source." );
	}

	/** Iterator. */
	function next( $result )
	{
		return mysql_fetch_row( $result );
	}

	/** Return the number of rows in a result set. */
	function rowsInResult( $result )
	{
		if ( !$result )
			return 0;

		return mysql_num_rows( $result );
	}

	/** Return only the first item of the first row of a query - useful with "SELECT ID" queries. */
	function getValue( $query )
	{
		$result = mysql_query( $query );

		if ( !$result || mysql_num_rows( $result ) == 0 )
			return "";

		return mysql_result( $result, 0, 0 ); // something like this should work...?
	}

	/** Execute a plain query string, return the result set. */
	function query( $query )
	{
		$this->queryString = $query;
		return mysql_query( $query );
	}

	/** Close the database connection. */
	function close()
	{
		mysql_close();
	}

	/** Returns true if the executed query retrieves a record, or false if no record is returned by executing the query */
	function exists ( $table, $whereClause = "" )
	{
		$query = "SELECT ID FROM $table $whereClause LIMIT 1";

		$result = mysql_query ( $query );

		if ( !$result )
			return false;	// if the query was invalid, return false

		return mysql_num_rows ( $result ) != 0;
	}
}

?>