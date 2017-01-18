<?php  require "mysql.php";
//header("Content-Type:application/json;charset=utf-8");


function nextTuesdayDate($mysql){
	
}

function userExists($mysql, $mobile){
	$sql = "select * from user where mobile={$mobile}";
	$result = $mysql->select($sql);
	
	return $result?true:false;
}

$name = $_REQUEST["name"];
$mobile = $_REQUEST["mobile"];
$tea_age = $_REQUEST["tea_age"];
$amount = $_REQUEST["amount"];
$date = trim($_REQUEST["date"]);

// echo var_dump($_REQUEST);


// todo: check the data if is empty
// ...

$t_age_range = explode("-", $tea_age)
$tea_age_from
$tea_age_to

if ($count($t_age_range) < 2){
	$tea_age_from = substr(trim($tea_age), 1)
	$tea_age_to = 99
} else {
	$tea_age_from = $t_age_range[0]
	$tea_age_to = $t_age_range[1]
}


exit();


$mysql = new Mysql();

if (!userExists($mysql, $mobile)){
	// create user for the first time
	$sql = "insert into user values(null, '" . $name . "',null, ". $mobile .", " . $tea_age .", CURRENT_TIMESTAMP)";
	$result = $mysql->insert($sql);
//	$err_msg = $mysql->get_err();
}

// check if activity registered 
//$sql_sel_register = "select * from tea_activity where DATE(reg_date)=CURDATE() and mobile={$mobile}";
//echo $date;
$d = explode(" ", $date);
$d_1 = $d[0];
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