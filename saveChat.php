<?

if ( !defined( "INCLUDES" ) )
	include( "includes.php" );

$connection = new DBConnection();

$result = $connection->query( "SELECT name, message FROM chat_messages WHERE room = '$room' ORDER BY ID ASC" );

$output = "<html>";

while( list( $name, $message ) = $connection->next( $result ) )
{
	// remove extraneous <FONT> tags
	$name = strip_tags( $name );
	$message = strip_tags( $message );

	$output .= "<b>$name</b> $message<br>\r\n";
}

$output .= "</html>";

$connection->close();

$ext = "html";				// the file extension of the download
$today = date("m_d_y");		// chat date
$len = strlen( $output );	// size of the download

// generate the download file name
$filename = str_replace( " ", "_", $room );
$filename = $filename . "_" . $today . ".$ext";

header("Cache-control: private");
header("Content-type: application/$ext");
header("Content-Length: $len");
header("Content-Disposition: inline; filename=$filename");

print $output;

?>