<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/main.css" />
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
				<?php require "model/mysql.php";
				$mysql = new Mysql();
//				$sql = "select * from activity";
				
				$sql = "select name, a.mobile, amount, tea_age, Date(activity_date) as dt from tea_activity as a left join user as u on a.mobile=u.mobile where activity_date>=Date(NOW()) order by activity_date;";
				
				$result = $mysql->select($sql);
				
//				echo $result;
				
				foreach ($result as $row){
					echo $row["name"] . ", " . $row["mobile"] . ", " . $row["tea_age"] . "年, " . $row["amount"] . "人, " . $row["dt"];
					echo "<br />";
				}
				
				?>
				
				
			</div>
			
		</div>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>
</html>
