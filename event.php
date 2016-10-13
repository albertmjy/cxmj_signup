<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title></title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/main.css" />
		<script type="text/javascript" src="js/angular.min.js" ></script>
	</head>



	<body>
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

$appId = "wx5f08243f1028e98e";
$appSecret = "7ad6fcbb9aff7c8c6fb1ac9995bf0574";

// get token info 
$tokenUrl = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appId}&secret={$appSecret}&code={$code}&grant_type=authorization_code";
$token = http_get($tokenUrl);
$tokenInfo = json_decode($token);
// get user info
$userInfoUrl = "https://api.weixin.qq.com/sns/userinfo?access_token={$tokenInfo->access_token}&openid={$tokenInfo->openid}&lang=zh_CN";
$userInfoString = http_get($userInfoUrl);
$userInfo = json_decode($userInfoString);


?>

		
		
		
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
				<!--<img class="logo" src="img/1244782443.jpg" alt="logo" />-->
				<h2 style="text-align: center;">评茶报名</h2>
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


				
				
				<form enctype="application/x-www-form-urlencoded" id="reg_activity" action="model/reg_activity.php">
					<!--<div class="form-group">
						<label for="mobile" class="sr-only">mobile:</label>
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-phone"></span>
								</span>
							<input required="required" type="number" class="form-control" name="mobile" id="mobile" placeholder="您的手机号..." />
						</div>
					</div>-->
					<div class="form-group">
						<span>手机号：</span>
						<input class="txtbox" />
					</div>
					
					<div class="form-group">
				    	<span>选择日期：</span>
				    	<?php include "lib/util.php";
							$tue = nextTuesday();
							$sun = nextSunday();
							$t_text = date_format($tue, "Y-m-d, l");
							$t_value = date_format($tue, "Y-m-d H:i:s");
							$s_text = date_format($sun, "Y-m-d, l");
							$s_value = date_format($sun, "Y-m-d H:i:s");
							
//							echo "<option value='". $t_value . "'>" . $t_text . "</option>";
//							echo "<option value='". $s_value . "'>" . $s_text . "</option>";
							echo "<label class='label label-default'>{$t_text}</label>";
							echo "<label class='label label-default'>{$s_text}</label>";
						?>
				    </div>
					
					
				    <div class="form-group">
				    	<span>茶龄（年）：</span><br />
				    	<label class="label label-default">0-3</label>
				    	<label class="label label-default">3-5</label>
				    	<label class="label label-default">5-10</label>
				    	<label class="label label-default">>10</label>
				    </div>
				    
				    
				    <div>
				    	<span>报名人数：</span>
				    	<span class=""> - </span>
				    	<input type="text" class="txtbox numbox" placeholder="人数">
				    	<span class=""> + </span>
				    </div>
				    
				    <!--<div class="input-group">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="button">-</button>
				      </span>
				      <input type="text" class="form-control" placeholder="人数">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="button">+</button>
				      </span>
				    </div>
				    -->
				    
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