<?php

date_default_timezone_set('Asia/Shanghai');

function nextTuesday(){
	// $now = date("Y-m-d H:i:s"); // mysql date format
	
	$date=date_create(); // now
//	$year = getdate()["year"];
	$wday = idate("w"); //getdate()["wday"];
//	$mday = getdate()["mday"];
//	$month = getdate()["mon"];
	
	$date_diff = 2 - $wday;
	if($wday>=0 && $wday<=2){
		$date->modify("{$date_diff} days");
	} else {
		$date->modify($date_diff+7 . " days");
	}
	
	return $date;
}


function nextSunday(){
//	$date = date_create(); // now
	
	$date = date_create("next Sunday");
	return $date;
	
//	$date = date_create();
//	$wday = idate("w");
//	$date_diff = 0 - $wday;
//	date_modify($date, "{$date_diff} days");
//	return $date;
	
}

function nextFriday(){
	$date = date_create("next Friday");
	return $date;
}

function nextSaturday(){
	$date = date_create("next Saturday");
	return $date;
}
	
?>