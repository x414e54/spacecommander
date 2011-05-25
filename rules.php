<?
	if (!isset($content) && empty($_SESSION["username"])){
		$content="rules";
		require('./index.php');
	} else {
?><br>
<div class="header">Rules</div><br>
By playing Space Commander you agree to obey the following rules:<br><br>
<ul><li>You will not try to gain an unfair advantage.</li>
<li>You will not cheat or try to cheat in anyway.</li>
<li>You will not register more than one account.</li>
<li>You will not use more than one account.</li>
<li>You will not use another person's account.</li>
<li>You will not let your account be used by another person.</li>
<li>You will not submit any forms with any unintended values or use anything other than this site to submit forms to their respective ("action") pages.</li>
<li>You will not connect to, download, use or view this site on anything else than a web browser.</li>
<li>You will not decompile, reverse engineer, or view the source code of, this game and site.</li>
<li>You will not exploit any programming, bugs or holes and will submit any error found to an Admin IMEDIATELY</li>
<li>You will not cause any harm or damage to any of the servers the Space Commander uses.</li>
<li>You will not repeatedly refresh pages with or without the intention to slow the server.</li>
<li>You will not use any offensive or obscene language or submit links to any offensive, obscene or illicit sites.</li>
<li>You will not submit any links to any sites which contain illegal content or "warez".</li>
<li>You will accept the fact that we can suspend, ban, alter or delete any account with or without notice for any or no reason.</li>
</ul>
<br><br>
Failure to comply with the above rules may result in account suspension or account deletion.<br>
<br>
<div class="bold">We reserve the right to change any of these rules at any time, with or without notification.</div>
<br>
<?
	}
?>