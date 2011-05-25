<?
$br="<BR>";
$interest=200;
echo $interest;
echo $br;
$interest=(100+$interest)/100;
echo $interest;
echo $br;
$amount=100;
echo $amount;
echo $br;
$time=48;
echo $time;
echo $br;
$base=exp(1);
echo $base;
echo $br;
$ln2=log($interest,exp(1));
echo $ln2;
echo $br;
$ln2720=exp($ln2/$time);
echo $ln2720;
echo $br;
$total=exp($ln2/$time);
echo $total;
echo $br;
$interest=$total;
echo $interest;
echo $br;
$inc=$amount;
echo $inc;
echo $br;
$amount=round($amount*$interest);
echo $amount;
echo $br;


?>