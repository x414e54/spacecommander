<html>
<title>Profile</title>

<h1>Profile Window</h1>

<h3>Here is the profile for <? print $username; ?></h3>

This file contains personal information about <? print $username; ?>.

Such information might be retrieved from some other database using the PHP $username variable as the 'key'.

<p>

You can change the parameters of the popup window by editing the variables in the includes.php file:

<pre>
$profilePopup = true;
$popupPath = "profile.php";
$popupHeight = 500;
$popupWidth = 400;
$popupLeftOffset = 10;
$popupRightOffset = 10;
$popupOptions = "resizable,scrollbars";
</pre>

Instead of giving you a detailed explanation of each of these parameters, try adjusting them yourself and see what happens! To disable the popup from appearing when a user clicks on a username in the chat room, set the $profilePopup variable to false.

</html>