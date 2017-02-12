<?php  require "mysql.php";
//header("Content-Type:application/json;charset=utf-8");
session_start();

function nextTuesdayDate($mysql){
	
}

function userExists($mysql, $mobile){
	$sql = "select * from user where mobile={$mobile}";
	$result = $mysql->select($sql);
	
	return $result?true:false;
}

$token = $_REQUEST["token"];
$name = $_REQUEST["name"];
$mobile = $_REQUEST["mobile"];
$tea_age_in_range = $_REQUEST["tea_age_in_range"];
$amount = $_REQUEST["amount"];
$date = trim($_REQUEST["date"]);



// check the token to prevent the duplicated submission
// echo $_REQUEST["token"];
// echo "<br />";
// echo $_SESSION["token"];
// echo "<br />";

if (!isset($_SESSION['token']) || !isset($token)){
	echo "Exception on form submission!";
	exit();
}
if ($token != $_SESSION['token']){
	echo "Invalid token";
	exit();
}
// valid token, clear it
unset($_SESSION["token"]); 


// todo: check the data if is empty
// ...
$t_age_in_range = explode("-", $tea_age_in_range);

if (count($t_age_in_range) < 2){
	$tea_age_from = substr(trim($tea_age_in_range), 1);
	$tea_age_to = 99;
} else {
	$tea_age_from = $t_age_in_range[0];
	$tea_age_to = $t_age_in_range[1];
}

// echo "from: {$tea_age_from}, to: {$tea_age_to}";
// echo var_dump($_REQUEST);

// echo "d: {eventForm.name.$touched}";
// exit();


$mysql = new Mysql();

if (!userExists($mysql, $mobile)){
	// create user for the first time
	$sql = "insert into user values(null, '" . $name . "',null, ". $mobile .", null , CURRENT_TIMESTAMP, null, null, {$tea_age_from}, {$tea_age_to})";
	$result = $mysql->insert($sql);
//	$err_msg = $mysql->get_err();
}

// check if activity registered 
//$sql_sel_register = "select * from tea_activity where DATE(reg_date)=CURDATE() and mobile={$mobile}";

// $d = explode(" ", $date);
$d_1 = substr($date, 0, 10);
$sql_sel_register = "select * from tea_activity where DATE(activity_date)='{$d_1}' and mobile={$mobile}";
//echo $sql_sel_register ;

$reg_arr = $mysql->select($sql_sel_register);


if( !$reg_arr){// insert activity
	$sql_activity = "insert into tea_activity values({$mobile}, NOW(), '{$date}', {$amount}, null)";
	echo $sql_activity;
	$rst = $mysql->insert($sql_activity);
	$err = $mysql->get_err();
	if ($rst){
		include "../view/success.php";
//		echo "success";
	} else {
		include "../view/fail.php";
//		echo "fail";
//		echo $err;
	}
} else {
//	echo "regisered {$date}";
	include "../view/registered.php";
}

exit

// insert activity
//$sql_activity = "insert into tea_activity values({$mobile}, NOW(), null, {$amount}, null)";
//
//$reg_arr = $mysql->select($sql_sel_register);


//// registered user
//$pattern = "/^Duplicate entry/";
//if (!$result && preg_match($pattern, $err_msg)){
//	echo "registed mobile: " . $mobile;
//}
//
//
//// check if activity registered 
//$sql_sel_register = "select * from tea_activity where DATE(reg_date)=CURDATE() and mobile={$mobile}";
//
//// insert activity
//$sql_activity = "insert into tea_activity values({$mobile}, NOW(), null, {$amount}, null)";
//$result_2;
//$err_msg_2;
//
//$reg_arr = $mysql->select($sql_sel_register);
//if(!$reg_arr){
//	// insert activity
//	$result_2 = $mysql->insert($sql_activity);
//	$err_msg_2 = $mysql->get_err();
//	
//	if ($result_2){
//		include "../view/success.php";
//	} else {
//		include "../view/fail.php";
//	}
//}


//echo $sql_activity . "-<br />";
//echo "result: -" . $result . "-<br />";
//echo $mysql->get_err();

//if ($result && $result_2){
//	include "../view/success.php";
//} else {
//	include "../view/fail.php";
//}


//echo json_encode($info);
	
?>