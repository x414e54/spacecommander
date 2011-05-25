<?
function dateget($dater) {
	$month=substr($dater, 4, 2);
	$hour=substr($dater, 8, 2);
	$hour=$hour - 1;
if ($hour<0) {
	$month=substr($dater, 4, 2);
	$day=substr($dater, 6, 2);
	$year=substr($dater, 0, 4);
	$mins=substr($dater, 10, 2);
	$day=$day-1;
if ($day==0) {
	$month=$month-1;
	switch ($month)
	{
	case 1:
		$day="31";
		break;
	case 2:
		$day="28";
		break;
	case 3:
		$day="31";
		break;
	case 4:
		$day="30";
		break;
	case 5:
		$day="31";
		break;
	case 6:
		$day="30";
		break;
	case 7:
		$day="31";
		break;
	case 8:
		$day="31";
		break;
	case 9:
		$day="30";
		break;
	case 10:
		$day="31";
		break;
	case 11:
		$day="30";
		break;
	case 12:
		$day="31";
		break;
	}
}
if ($month==0) {
	$year=$year-1;
	$month="12";
}
	switch ($month)
	{
	case 1:
		$month="January";
		break;
	case 2:
		$month="February";
		break;
	case 3:
		$month="March";
		break;
	case 4:
		$month="April";
		break;
	case 5:
		$month="May";
		break;
	case 6:
		$month="June";
		break;
	case 7:
		$month="July";
		break;
	case 8:
		$month="August";
		break;
	case 9:
		$month="September";
		break;
	case 10:
		$month="October";
		break;
	case 11:
		$month="November";
		break;
	case 12:
		$month="December";
		break;
	}
	$dater=$month . " " . $day . " " . $year;
	return $dater;
} else {
	switch ($month)
	{
	case 1:
		$month="January";
		break;
	case 2:
		$month="February";
		break;
	case 3:
		$month="March";
		break;
	case 4:
		$month="April";
		break;
	case 5:
		$month="May";
		break;
	case 6:
		$month="June";
		break;
	case 7:
		$month="July";
		break;
	case 8:
		$month="August";
		break;
	case 9:
		$month="September";
		break;
	case 10:
		$month="October";
		break;
	case 11:
		$month="November";
		break;
	case 12:
		$month="December";
		break;
	}
	$dater=$month . " " . substr($dater, 6, 2) . " " . substr($dater, 0, 4);
	return $dater;
}
}

function timeget($timer) {
	$hour=substr($timer, 8, 2);
	$hour=$hour - 1;
if ($hour<0) {
	$mins=substr($timer, 10, 2);
	$timer="0:" . $mins;
	return $timer;
} else {
	$timer=$hour . ":" . substr($timer, 10, 2);
	return $timer;
}
}
?>