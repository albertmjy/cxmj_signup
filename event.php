<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="Cache-control" content="public">

		<title>茶昔茗今 - 评茶报名</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/event.css" />
		<script type="text/javascript" src="js/angular.min.js" ></script>
		<script type="text/javascript" src="js/angular-touch.js" ></script>
		<script type="text/javascript" src="js/fastclick.js"></script>
		<script type="text/javascript">
			window.addEventListener( "load", function() {
			    FastClick.attach( document.body );
			}, false );
			
		</script>
	</head>



	<body>
		<img width='0' height='0' style='position:absolute' src="img/124478443.jpg" />
		<?php include "lib/wechat.class.php";
function http_get($url){
		$oCurl = curl_init();
		if(stripos($url,"https://")!==FALSE){
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
			curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
		}
		curl_setopt($oCurl, CURLOPT_URL, $url);
		curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
		$sContent = curl_exec($oCurl);
		$aStatus = curl_getinfo($oCurl);
		curl_close($oCurl);
		if(intval($aStatus["http_code"])==200){
			return $sContent;
		}else{
			return false;
		}
	}

$code = $_REQUEST["code"];

$appId = "wx714f5947cbbc1c57";
$appSecret = "fe536bccab50fbc6131836ed88588dc2";

// get token info 
$tokenUrl = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appId}&secret={$appSecret}&code={$code}&grant_type=authorization_code";
$token = http_get($tokenUrl);
$tokenInfo = json_decode($token);
// get user info
$userInfoUrl = "https://api.weixin.qq.com/sns/userinfo?access_token={$tokenInfo->access_token}&openid={$tokenInfo->openid}&lang=zh_CN";
$userInfoString = http_get($userInfoUrl);
$userInfo = json_decode($userInfoString);


?>

		
		<!-- <br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br /> -->
		
	<!-- top nav bar -->
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">
		      	<img class="brand" alt="Brand" src="img/getheadimg.jpeg" alt="logo" />
		      	
		      </a>
		      
		    </div>
		    
		    
		    <div class="nav-user-info" id="">
			  <img class="img-circle head-img" src='<?php echo $userInfo->headimgurl?>' />
			  <span><?php echo $userInfo->nickname ?></span>
		  	</div>
		  </div>
		  
		  
		</nav>

		<!-- main body -->
		<div ng-app="eventApp" class="container-fluid">
		<div ng-controller="eventCtrl" class="panel">
			
			<div class="panel-heading">
				<div class='header'>
					<!--<img class="logo" src="img/1244782443.jpg" alt="logo" />-->
					<h2 style="text-align: center;color:#F3840A;"><img style='height:15px;vertical-align:middle' src='img/tealeaf.jpg'>评茶报名</h2>
				</div>
			</div>
			<div class="panel-body">
				 <!--<img class="img-circle img-thumbnail head-img" src="http://wx.qlogo.cn/mmopen/9M0PhLTmTIch24EL86awR6CUoGEpXaaSDFjNruCsQRNULdkJqWkQxIibUchz0h5vTI9jnhWfpStCAuia47xN7ZU2GqtP7FEegN/0" />-->
				 

<?php

//echo "<img class='img-circle head-img' src='{$userInfo->headimgurl}' />";
//echo "<span class='nickname'>{$userInfo->nickname}</span>";


// echo "<p>{$type}___</p>";
	// $tok = $weObj->getOauthAccessToken();
	// echo json_encode($tok);


// $tokenUrl = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx5f08243f1028e98e&secret=7ad6fcbb9aff7c8c6fb1ac9995bf0574";
// $tk = (string)http_get($tokenUrl);
// // $userInfoUrl = "https://api.weixin.qq.com/cgi-bin/user/info?access_token={$tk}&openid=OPENID&lang=zh_CN";
// // $userinfo = http_get($userInfoUrl);

// $token = json_decode(trim($tk));
	
// $menuUrl = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token={$token->access_token}";
// $menuInfo = http_get($menuUrl);


// echo "<p>{$menuInfo}</p>";
// echo "----" . $token->access_token . "___token<br /><br /><br /><br />";




?>


				
				<form ng-submit='cacheData()' class="event-form" name="eventForm" enctype="application/x-www-form-urlencoded" id="reg_activity" action="model/new_reg_activity.php" novalidate >
					
					<div class="form-group nowrap">

						<span class='item-name'>称呼</span>:
						<input type="text" ng-model="name" class="txtbox item-value" name="name" ng-pattern=/^[0-9a-zA-Z_\u4e00-\u9eff]+$/ required  />

						<span  ng-cloak ng-show="eventForm.name.$touched" style="margin-left:-22px" >
							<span ng-show="eventForm.name.$valid" class="glyphicon glyphicon-ok-sign" style="color:green"></span>
						</span>
						<div  ng-cloak ng-show="eventForm.name.$dirty && eventForm.name.$invalid" style="color:red">
							<span ng-show="eventForm.name.$error.pattern">不允许特殊字符</span>
						</div>
					</div>
					<div class="form-group nowrap">
						<span class='item-name'>手机号</span>:
						<input type="number" ng-model="mobile" class="txtbox item-value" name="mobile" ng-keypress="" ng-maxlength="11" ng-blur="mobileValidation(mobile)" required />
						<span  ng-cloak ng-show="eventForm.mobile.$touched" style="margin-left:-22px" >
							<span ng-show="mobValid" class="glyphicon glyphicon-ok-sign" style="color:green"></span>
							<span ng-show="!mobValid" class="glyphicon glyphicon-exclamation-sign" style="color:red"></span>
						</span>

						<div  ng-cloak ng-show="eventForm.mobile.$dirty && eventForm.mobile.$invalid" style="color:red">
							<span ng-show="eventForm.mobile.$error.required">请填写您的手机号</span>
							<span ng-show="eventForm.mobile.$error.number">有史以来手机号只能为数字</span>
							<span ng-show="eventForm.mobile.$error.maxlength">请确保您的手机号不超过11位</span>
							<span ng-show="eventForm.mobile.$error.minlength">请确保您过11位</span>
						</div>

						<!-- <div ng-show="eventForm.mobile.$dirty" style="color:red">
							<span ng-show="!mobCompleted">请检查您的手机号为11位</span>
						</div> -->
						


					</div>
					
					<!-- <input type="number" name="uiui"> -->
					<div  ng-cloak class="form-group">
				    	<p>参与时间：</p>
				    	<?php include "lib/util.php";
// 							$tue = nextTuesday();
// 							$sun = nextSunday();
// 							$t_text = date_format($tue, "Y-m-d, l");
// 							$t_value = date_format($tue, "Y-m-d H:i:s");
// 							$s_text = date_format($sun, "Y-m-d, l");
// 							$s_value = date_format($sun, "Y-m-d H:i:s");
							
// 							$t_text = str_replace("Tuesday", "星期二", $t_text);
// 							$s_text = str_replace("Sunday", "星期日", $s_text);

// //							echo "<option value='". $t_value . "'>" . $t_text . "</option>";
// //							echo "<option value='". $s_value . "'>" . $s_text . "</option>";
// 							// echo "<span ng-click='selectDate(\"tue\")' class='sel-label' ng-class=" . "{'label-success':dateSelected['tue']}" . ">$t_text</span>";

// 							echo "<span ng-click='selectDate(2)' class='sel-label' ng-class={'label-success':dateSelected[2]}>$t_text</span>";
// 							echo "<span ng-click='selectDate(0)' class='sel-label' ng-class={'label-success':dateSelected[0]}>$s_text</span>";
// 							echo "<input type='hidden' name='date' value='{{date}}' />";

						?>

						<!-- <label ng-click="newSelectDate(2)" class="sel-label" ng-class="{'label-success':dateSelected[2]}">{{next_tuesday}}</label>
						<label ng-click="newSelectDate(0)" class="sel-label" ng-class="{'label-success':dateSelected[0]}">{{next_sunday}}</label>
						 -->
						<!-- <button type='button' ng-click="newSelectDate(2)" class="sel-label" ng-class="{'label-success':dateSelected[2]}"><span>{{next_tuesday}}</span></button>
						<button type='button' ng-click="newSelectDate(0)" class="sel-label" ng-class="{'label-success':dateSelected[0]}"><span>{{next_sunday}}</span></button>
						<input type="hidden" name="date" ng-model='date' value="{{date}}" required /> -->

						<div class="btn-group btn-block" data-toggle="buttons" >
						  <label class="btn btn-success col-xs-6" ng-click='dateSelect()' >
						    <input type="radio" name="date" ng-model='sel_date' id="date1" autocomplete="off" value='{{next_tuesday}}' > {{next_tuesday}}
						  </label>
						  <label class="btn btn-success col-xs-6" ng-click='dateSelect()' >
						    <input type="radio" name="date" ng-model='sel_date' id="date2" autocomplete="off" value='{{next_sunday}}' > {{next_sunday}}
						  </label>
						</div>
				    </div>
					


				    <div  ng-cloak class="form-group">
				    	<p>茶龄（年）：</p>
				    	<!-- <label ng-click="selectTeaAge($index)" ng-repeat="x in tea_age_range" class="sel-label" ng-class="{'label-success':teaAgeSelected[$index]}">
				    		{{x}}
				    	</label> -->
				    	<!-- <div class='flex space-bet'>
					    	<button type="button" ng-click="selectTeaAge($index)" ng-repeat="x in tea_age_range" class="sel-label" ng-class="{'label-success':teaAgeSelected[$index]}">
					    		<span>{{x}}</span>
					    	</button>
				    	</div>
						<input type="hidden" name="tea_age" ng-model='tea_age' value="{{tea_age}}" required /> -->

				    	<!-- <input ng-click="selectTeaAge($index)" ng-repeat="x in tea_age_range" class="sel-label" ng-class="{'label-success':teaAgeSelected[$index]}" name="tea_age" ng-model='x'/>
 -->
				    	<!-- <span  ng-click="selectTeaAge($index)" ng-repeat="x in tea_age_range" class="sel-label" ng-class="{'label-success':teaAgeSelected[$index]}">
				    		<input type="radio" name="tea_age" ng-model='tea_age' value="123" /> {{tea_age_range[$index]}}
				    	</span>
 -->

				    </div>
				    
				    <div  ng-cloak class="form-group">
				    	<div class="btn-group btn-block" data-toggle="buttons" ng-init=''>
				    		<label class="btn btn-success col-xs-3" ng-repeat='(i, x) in tea_age_range' ng-click='tst()' ng-class="{'active':($index==idx)}">
							    <input type="radio" name="tea_age_in_range" ng-model="tea_age_arr" id="option{{$index}}" autocomplete="off" value='{{x}}' ng-checked="$index==idx"> {{x}}
							  </label>

						  <!-- <label class="btn btn-success active">
						    <input type="radio" name="options" id="option1" autocomplete="off" checked> 0-3
						  </label>
						  <label class="btn btn-success">
						    <input type="radio" name="options" id="option2" autocomplete="off"> 3-5
						  </label>
						  <label class="btn btn-success">
						    <input type="radio" name="options" id="option3" autocomplete="off"> 5-10
						  </label> -->
						</div>
				    </div>


				   
				    <div class="form-group">
				    	<span>报名人数：</span>
				    	<button type='button' href="#" class="adj-button btn btn-default" ng-click="minusPerson()"><span class="glyphicon glyphicon-minus"></span></button>
				    	<input type="number" class="txtbox numbox" placeholder="人数" name="amount" ng-model='amount' readonly value="100">
				    	<button type='button' href="#" ng-click="pulsPerson()" class="adj-button btn btn-default"><span class="glyphicon glyphicon-plus"></span></button>

				    </div>
				    
				    <div class="submit">

				    	<button type="submit" class="btn btn-info btn-block" ng-disabled="!mobCompleted || !dateSelected || eventForm.$invalid ">确认报名！</button>
				    </div>
				</form>


			</div>
		
		</div>
		</div>
		
		<footer>
			<nav class="navbar">
				<hr />
			  <!--<p>&copy; 2016 Company, Inc.</p>-->
		</nav>
		</footer>
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		<script type="text/javascript" src="js/event.js"></script>
	</body>

	<script type="text/javascript">
		
	</script>
</html>