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
	<!-- top nav bar -->
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">
		      	<!--<img class="logo" src="img/getheadimg.jpeg" alt="logo" />-->
		      	
		      </a>
		    </div>
		  </div>
		</nav>

		<!-- main body -->
		<div ng-app="eventApp" class="container-fluid">
		<div ng-controller="eventCtrl" class="panel">
			
			<div class="panel-heading">
				<img class="logo" src="img/1244782443.jpg" alt="logo" />
			</div>
			<div class="panel-body">
				<!-- <img class="head-img" src="http://wx.qlogo.cn/mmopen/9M0PhLTmTIch24EL86awR6CUoGEpXaaSDFjNruCsQRNULdkJqWkQxIibUchz0h5vTI9jnhWfpStCAuia47xN7ZU2GqtP7FEegN/0" />
				 -->

<?php 
// $json = http_get("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx5f08243f1028e98e&secret=7ad6fcbb9aff7c8c6fb1ac9995bf0574");


// $curl = curl_init();
//     curl_setopt ($curl, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx5f08243f1028e98e&secret=7ad6fcbb9aff7c8c6fb1ac9995bf0574");
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

//     $result = curl_exec ($curl);
//     curl_close ($curl);
//     echo $result;

$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx5f08243f1028e98e&secret=7ad6fcbb9aff7c8c6fb1ac9995bf0574';

$cURL = curl_init();

curl_setopt($cURL, CURLOPT_URL, $url);
curl_setopt($cURL, CURLOPT_HTTPGET, true);

curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
));

$result = curl_exec($cURL);

curl_close($cURL);



echo "__" . $result ."__" ;


// echo var_dump($content);
?>

				<div> let's get this?</div>

			</div>
		
		</div>
		</div>
		
		<footer>
			<nav class="navbar">
				<hr />
			  <p>&copy; 2016 Company, Inc.</p>
		</nav>
		</footer>
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/event.js"></script>
	</body>

	<script type="text/javascript">
		
	</script>
</html>