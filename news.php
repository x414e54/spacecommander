<?
require('./global.php');
require('./time.php');
?>
<div id="blogmain">
<div class="header">News</div>
<?php

$query = "SELECT * FROM news ORDER BY news_time DESC";
$newser = mysql_query($query) or die("Select Failed!");

while ($news = mysql_fetch_array($newser))
 {
	$search[0] = "/</";
	$search[1] = "/>/";
	$search[2] = "/\n/";
	$search[3] = "/  /";
	$search[4] = "/   /";
	$search[5] = "/\[color=(.*?)\](.*?)\[\/color\]/";
	$search[6] = "/\[img\](.*?)\[\/img\]/";
	$search[7] = "/\[b\](.*?)\[\/b\]/";
	$search[8] = "/\[u\](.*?)\[\/u\]/";
	$search[9] = "/\[i\](.*?)\[\/i\]/";
	$search[10] = "/\[url=(.*?)\](.*?)\[\/url\]/";
	
	$replace[0] = "&lt;";
	$replace[1] = "&gt;";
	$replace[2] = "<BR>";
	$replace[3] = "&nbsp; ";
	$replace[4] = "&nbsp; &nbsp;";
	$replace[5] = "<span style=\"color:\\1;\">\\2</span>";
	$replace[6] = "<img src=\"\\1\">";
	$replace[7] = "<b>\\1</b>";
	$replace[8] = "<u>\\1</u>";
	$replace[9] = "<i>\\1</i>";
	$replace[10] = "<a href=\"\\1\">\\2</a>";

	$title = stripslashes(preg_replace($search, $replace, $news['news_title']));
	$poster = $news['news_poster'];
	$query2 = "SELECT * FROM users WHERE userid='$poster'";
	$email = mysql_query($query2) or die("Select Failed!");
	$email = mysql_fetch_array($email);
	$postername = $email['username'];
	$email = $email['email'];
	$content = stripslashes(preg_replace($search, $replace, $news['news_content']));
	$date=dateget($news['news_time']);
	$time=timeget($news['news_time']);
?>
		<div id="blog">
				<div id="blogtop">
				<br>
				<? echo $date; ?>
				<br>
				<br>
				<span class="title"><? echo $title; ?></span>
				</div>
				<div style="word-wrap: break-word; white-space: normal;"><br><? echo $content ?>
				</div>
				<hr>
				<div class="end">
				posted <? echo $time; ?> by <? echo "<a href=\"mailto:" . $email . "\">" . $postername . "</a>"; ?>
				</div>
		</div>
<?
 }
?>
<br>
</div>
