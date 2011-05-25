<?
	if (!isset($content) && empty($_SESSION["username"])){
		$content="credits";
		require('./index.php');
	} else {
?>
<br>
<div class="header">Credits</div><br>
<div class="bold">Producer</div>
Anthony Bills
<br><br>
<div class="bold">Game Designers</div>
Anthony Bills<br>
Jonathon Page<br><br>
<div class="bold">Programmers</div>
Anthony Bills<br>
Jonathon Page<br>
<br>
<div class="bold">Theme Designers</div>
Erethral - Anthony Bills<br>
x          - Richard Madders<br>
<br>
<div class="bold">Storywriters</div>
Michael Page - The History of the Humans<br>
<br>
<div class="bold">Audio</div>
Superiority (Main page theme) - Anthony Bills<br>
Laugh of the Seaguls (Alien theme) - Anthony Bills<br>
<br>
<br>
<div class="bold">Beta Testers</div>
Top beta testers will be listed here
<br><br>
<?
	}
?>