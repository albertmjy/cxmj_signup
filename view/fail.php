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
					<div class="alert alert-danger" role="alert">Oh My God！出了一些问题!</div>
					<div>name: <?php echo $name ?></div>
					<div>mobile: <?php echo $mobile ?></div>
					<div>tea age: <?php echo $tea_age_in_range ?></div>
					<div>amount <?php echo $amount ?></div>
					<div>date <?php echo $date ?></div>
					<div><?php echo $mysql->get_err() ?></div>
				</div>
			</div>
			
		</div>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</body>
</html>
