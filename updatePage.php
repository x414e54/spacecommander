<?

if ( !defined( "INCLUDES" ) )
	include( "includes.php" );


$output = "";

$connection = new DBConnection();

// delete users that have not had their 'update time' renewed in X seconds

$connection->query( "UPDATE chat_users SET datetime = NOW() WHERE name = '$name' AND room = '$room'" );

// updates users in ALL rooms...
$connection->query( "DELETE FROM chat_users WHERE datetime < NOW() - 12" );

// general maintenence.. delete all chat messages from all rooms older than 12 hours (assumes no chat will last that long)
$connection->query( "DELETE FROM chat_messages WHERE datetime < NOW() - 43200" );

function parseURL( $inputString )
{
	$inputTokens = explode( " ", $inputString );

	$input = "";

	foreach( $inputTokens as $token )
	{
		if ( eregi( "^[0-9a-z]([-_.]?[0-9a-z]*)*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-z]*$", $token, $check ) )
		{
			$token = "<U><A HREF=\"mailto:" . $token . "\">" . $token . "</A></U>";
		}
		else if( eregi( "^https?://[A-Za-z0-9\%\?\_\:\~\/\.-]+$", $token ) )
		{
			$token = "<U><A TARGET=\"linkWindow\" HREF=\"" . $token . "\">" . $token . "</A></U>";
		}
		else if( eregi( "^w{3}\.[A-Za-z0-9\%\?\_\:\~\/\.-]+\.[a-z]*$", $token ) )
		{
			$token = "<U><A TARGET=\"linkWindow\" HREF=\"http://" . $token . "\">" . $token . "</A></U>";
		}

		$input .= $token . " ";
	}

	return trim( $input );
}

if ( $input )
{
	$input = trim( $input );


	if ( $userto )
	{
		// determine which room $userto is in so that we may direct our private message appropriately, excluding private rooms
		$toroom = $connection->getValue( "SELECT room FROM chat_users WHERE name = '$userto' AND NOT ( room REGEXP '[0-9]' )" );
	}

	if ( $input == "admin::invite" )	// "admin::invite" is generated from "INVITE" button, not from textfield
	{
		// check to see if the person doing the inviting is in a private chat. If so, then use that room name

		$roomName = $connection->getValue( "SELECT room FROM chat_users WHERE name = '$userfrom' AND room REGEXP '[0-9]'" );

		if ( $roomName )
			$inPrivateRoom = true;
		else
			$roomName = date( "Gis" );

		// using the welcome color as the private chat invite color, although this could be changed.

		if ( $inPrivateRoom )
		{
			$input = "<private><B>[Private chat invite]</B>: $userfrom is in a private chat, and has invited you! <U><A HREF=\"javascript:privateChat(\'$userto\',\'$userfrom\',\'$roomName\');\">Click here to accept.</A></U>";
		}
		else
		{
			$input = "<private><B>[Private chat invite]</B>: $userfrom has invited you to a private chat. <U><A HREF=\"javascript:privateChat(\'$userto\',\'$userfrom\',\'$roomName\');\">Click here to accept.</A></U>";
		}

		$connection->query( "INSERT INTO chat_messages VALUES ( NULL, '$toroom', '$userto', '$input', NOW() )" );

		// insert a notification to the person who *requested* the private chat

		if ( $inPrivateRoom )
		{
			$input = "<private><notify><B>[Private chat invite]</B>: $userto has been notified of your invitation to join this private chat.";
		}
		else
		{
			$input = "<private><B>[Private chat invite]</B>: $userto has been notified of your invitation. <U><A HREF=\"javascript:privateChat(\'$userfrom\',\'$userto\',\'$roomName\');\">Click here to enter the room.</A></U>";
		}

		$connection->query( "INSERT INTO chat_messages VALUES ( NULL, '$room', '$userfrom', '$input', NOW() )" );
	}

	else if ( $input == "admin::private" )
	{
		if ( $connection->getValue( "SELECT ID FROM chat_users WHERE name = '$userfrom' AND room REGEXP '[0-9]'" ) )
			$notify = "<notify>";
		else
			$notify = "";

		$private_message = parseURL( $private_message );

		$input = "<private><B>[Private from $userfrom]</B>: $private_message";

		$connection->query( "INSERT INTO chat_messages VALUES ( NULL, '$toroom', '$userto', '$input', NOW() )" );

		// insert a notification to the person who *requested* the private chat

		$input = "<private>" . $notify . "<B>[Private to $userto]</B>: $private_message";

		$connection->query( "INSERT INTO chat_messages VALUES ( NULL, '$room', '$userfrom', '$input', NOW() )" );
	}

	else if ( $input == "admin::reset" )
	{
		$connection->query( "DELETE FROM chat_users WHERE room = '$room'" );
		$connection->query( "DELETE FROM chat_messages WHERE room = '$room'" );
	}

	else if ( $input == "admin::history" )
	{
		$ID = 1;
	}

	else if ( $input == "admin::banall" )	// ban user from all rooms
	{
		$input = "<banall><private><B>[Boot]</B>: $userfrom has booted you from all rooms in this chat session. You are now logged-out.";

		$connection->query( "INSERT INTO chat_messages VALUES ( NULL, '$toroom', '$userto', '$input', NOW() )" );

		$input = "<private><B>[Boot]</B>: $userto has been booted from all rooms in this chat session.";

		$connection->query( "INSERT INTO chat_messages VALUES ( NULL, '$room', '$userfrom', '$input', NOW() )" );
	}

	else if ( $input == "admin::banroom" )	// ban user from this room only
	{
		$input = "<banroom><private><B>[Boot]</B>: $userfrom has booted you from the $room room for this chat session.";

		$connection->query( "INSERT INTO chat_messages VALUES ( NULL, '$toroom', '$userto', '$input', NOW() )" );

		$input = "<private><B>[Boot]</B>: $userto has been booted from $room.";

		$connection->query( "INSERT INTO chat_messages VALUES ( NULL, '$room', '$userfrom', '$input', NOW() )" );
	}

	else if ( $input == "admin::banip" )
	{
		$userip = $connection->getValue( "SELECT ip FROM chat_ip WHERE name = '$userto'" );

		// get the IP address of this banned user and input into the chat_banned table
		// (effectively preventing them from re-logging in should they refresh their screen)

		$connection->query( "INSERT INTO chat_banned VALUES( '$userip', NOW() )" );

		// now boot this user name from all rooms (effectively booting them from the chat)

		$input = "<banall><private><B>[Ban]</B>: $userfrom has banned you from the chat. Your IP address ($userip) has been logged to prevent future chat re-entry.";

		$connection->query( "INSERT INTO chat_messages VALUES ( NULL, '$toroom', '$userto', '$input', NOW() )" );

		// send the moderator a notification of the ban

		$input = "<private><B>[Ban]</B>: $userto has been banned from the chat. $userto\'s IP address ($userip) has been logged to prevent future chat re-entry.";

		$connection->query( "INSERT INTO chat_messages VALUES ( NULL, '$room', '$userfrom', '$input', NOW() )" );
	}

	else
	{
		$input = parseURL( $input );

		$connection->query( "INSERT INTO chat_messages VALUES ( NULL, '$room', '<b>$name</b>', ': $input', NOW() )" );
	}
}

if ( $action == "get_users" )	// get the values to update the "users" window
{
	// update profile hidden status
	$connection->query( "UPDATE chat_users SET hide_profile = '$hp' WHERE name = '$name'" );

	// use regexp to skip private rooms, since private rooms are numbered numerically

	//$result = $connection->query( "SELECT name, room, moderator, hide_profile FROM chat_users WHERE room = '$room' ORDER BY ID Desc" );

	$result = $connection->query( "SELECT name, room, moderator, hide_profile FROM chat_users ORDER BY ID Desc" );

	$output = "output=";

	while( list( $userName, $userRoom, $isModerator, $hideProfile ) = $connection->next( $result ) )
	{
		if ( !is_numeric( $userRoom ) )
		{
			$inPrivate = $connection->getValue( "SELECT ID FROM chat_users WHERE name = '$userName' AND room REGEXP '[0-9]' AND room <> '$userRoom'" );

			$output .= "<U>";

			if ( $inPrivate )
				$output .= "<V>";

			if ( $isModerator )
				$output .= "<M>";

			if ( $hideProfile == 1 )	// only link is hidden
				$output .= "<H>";
			else if ( $hideProfile == 2 )	// completely hidden (spy mode)
				$output .= "<S>";

			$output .= "$userName<R>$userRoom";
		}
		else
		{
			$output .= "<U>";

			if ( $isModerator )
				$output .= "<M>";

			if ( $hideProfile == 1 )	// only link is hidden
				$output .= "<H>";
			//else if ( $hideProfile == 2 )	// completely hidden (spy mode)
			//	$output .= "<S>";

			$output .= "$userName<R>$userRoom";
		}
	}
}
else if ( $action == "get_messages" )	// get the values to update the "messages" window. Do not execute unless we have a valid ID
{
	$outputString = "";

	// do a ->query instead of a ->getValue here in case we have two users with the same name in different rooms
	$numUsersResult = $connection->query( "SELECT ID FROM chat_users WHERE name = '$name' AND room = '$room'" );

	// check to see if this is a new entry to the chat room. Do not allow entry of blank $name/$room values
	if ( $room && $name && $connection->rowsInResult( $numUsersResult ) == 0 && !$spy )
	{
		// if we are the first person entering a room, then delete all previous messages in this room

		if ( !$connection->getValue( "SELECT ID FROM chat_users WHERE room = '$room'" ) )
		{
			$connection->query( "DELETE FROM chat_messages WHERE room = '$room'" );
			//$ID = $maxID = 0;
		}
		else
		{
			// get the new maxID *for this room*
			$maxID = $connection->getValue( "SELECT MAX(ID) FROM chat_messages WHERE room = '$room'" );
			$ID = $maxID;
		}

		$time = date( $welcomeTimeFormat );

		// the date() function does not work on NT servers, so here is an alternative

		if ( !$time )
			$time = " the room";
		else
			$time = " on " . $time;

		$welcomeMsg = "<enter><B>[$room]</B>: $name entered" . $time;

		$connection->query( "INSERT INTO chat_messages VALUES ( NULL, '$room', '', '$welcomeMsg', NOW() )" );

		// final 0 means that chat profile is *not* hidden by default, although user may opt to hide it
		if ( !$spy )
			$hidden = "0";
		else
			$hidden = "2";	// 2 = spy mode (no profile entry at all!)

		$connection->query( "INSERT INTO chat_users VALUES ( NULL, '$name', '$room', NOW(), '$moderator', $hidden )" );


		// remove old room references (do not need to do this because it will time out!)
		//$connection->query( "DELETE FROM chat_users WHERE name = '$name' AND room <> '$room'" );
	}

	// NOTE: the 'OR name = '$name' clause is so that people can receive private messages even from people in other rooms

	$result = $connection->query( "SELECT ID, name, message FROM chat_messages WHERE room = '$room' AND ID > $ID ORDER BY ID ASC" );

	while( list( $ID, $thisName, $thisMessage ) = $connection->next( $result ) )
	{
		// check for private chat invites. Skip those that don't belong to us

		if ( strstr( $thisMessage, "<private>" ) )
		{
			if ( $thisName != $name || ( strstr( $thisMessage, "<notify>" ) && !is_numeric( $room ) ) )
				continue;
			else
				$thisName = "";
		}

		$outputString .= "<ID=$ID>" . $thisName . $thisMessage . "<BR>";

		//$outputString .= "<LN>" . $thisName . $thisMessage . "<BR>";
	}

	if ( $outputString != "" )
		$output = "output=$outputString";
	else
		$output = "output=";

	if ( !$maxID )	// this is an actual input to the chat, not just a "...has entered the chat..."
		$maxID = $connection->getValue( "SELECT MAX(ID) FROM chat_messages WHERE room = '$room'" );

	// get the max ID so that we dont have to return as much data in each transmission
	$output .= "&maxID=$maxID";
}


// get the moderator message and append to output string
//$output .= "&moderator=" . $connection->getValue( "SELECT message FROM chat_moderator WHERE ID=1" );


if ( $numUsersWithSameName )
	$output .= "&newName=" . $name;	// update name

// format the output
$output = str_replace( " ", "+", $output );

$connection->close();

header("Content-type: application/octetstream");
header("Pragma: no-cache");
header("Expires: 0");

print $output;

?>