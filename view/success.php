<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/main.css" />
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">
		      
		      </a>
		    </div>
		  </div>
		</nav>
		
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<img class="logo" src="../img/1244782443.jpg" alt="logo" />
				</div>
				<div class="panel-body">
					<div class="alert alert-success" role="alert">报名成功!</div>
					<div class="well">
						<div>称呼：<?php echo $name ?></div>
						<div>手机：<?php echo $mobile ?></div>
						<div>茶龄：<?php echo $tea_age ?></div>
						<div>人数：<?php echo $amount ?></div>
						<div>日期：<?php echo $date ?></div>
					</div>
				</div>
			</div>
			
		</div>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</body>
</html>
