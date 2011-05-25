<?
	if (!isset($content) && empty($_SESSION["username"])){
		$content="terms";
		require('./index.php');
	} else {
?><br>
<div class="header">Terms of Service</div><br>
This game is provided "as is", absolutely no warranty is expressed or otherwise.<br>
<br>
We may not be held responsible for any disruption of service, loss of data, game play malfunction, or other events or conditions that are undesirable to the user, under any circumstances.<br>
<br>
We make no guarantees of the quality or consistency of service and we are under no obligation to deliver any service of anykind.<br>
<br>
We take no responsibility whatsoever for the opinions expressed or the actions taken by users.<br>
<br><br>
The use of this service is a privalage not a right and therefore we reserve the right to ban, suspend, delete, or modify accounts at any time for any or no reason. <br>
<br>
<div class="bold">By playing Space Commander you agree to the above terms.</div><br>
<?
	}
?>