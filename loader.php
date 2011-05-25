<?
	session_start();
	$url=$_SESSION["url"];
	$message1=$_SESSION["message1"];
?>
      <DIV class="errorhead" STYLE="text-align:center;font-size: 14pt;font-weight: bolder;"><? echo $message1;?></DIV><BR><BR>
	<DIV class="center">You will be redirected in 2 seconds.</DIV>
	<DIV class="center">Or alternatively click <a href="<? echo $url; ?>">[here]</a></DIV>