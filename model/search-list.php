


<?php include "mysql.php";
	function quoats(&$value, $key){
		$value = "'" . $value . "'"; 
	}


	$filter = $_REQUEST["filter"];
//	$filter = '';
	
	
	$mysql = new Mysql();
	
	if ($filter){
		$prod_name = $_REQUEST["prod_name"];
		$brand = $_REQUEST["brand"];
		$weight = $_REQUEST["weight"];
		$technic = $_REQUEST["technic"];
		$prod_year = $_REQUEST["prod_year"];
		$price_low = $_REQUEST["price_low"];
		$price_high = $_REQUEST["price_high"];
		
		$sql = "select * from tea left join price on tea.prod_id=price.prod_id and price_year=2016"; 
		
		$s = "";
		if ($prod_name){
			$s .= "and tea.prod_name='{$prod_name}'";
		}
		if ($brand){
			$s .= "and brand='{$brand}'";
		}
		if ($weight){
			$s .= "and weight='{$weight}'";
		}
		if ($technic){
			$arr = explode(",", $technic);
			array_walk($arr, "quoats");
			$arr_next = implode(",", $arr);
			$s .= "and technic in ({$arr_next})";
		}
		if ($prod_year){
//			$s .= "and prod_year='{$prod_year}'";
			$s .= "and prod_year in ({$prod_year})";
		}

		if ($s){
			$s = substr($s, 3);
			$sql .= " where " . $s;
		}
//		echo explode(",", $prod_year);
		
//		echo $sql;

		$result = $mysql -> select($sql);
		echo json_encode($result);
		
	} else {
		// select * from tea left join price on tea.prod_id=price.prod_id group by prod_id having price_year=max(price_year)
		// since mysql bug for 'having',  ugly sql below 
		$sql = "select * from tea left join price on tea.prod_id=price.prod_id and price_year=2016"; 
		
		$result = $mysql -> select($sql);
		
			
//		echo json_encode($result,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
		echo json_encode($result);
		
	}
	
?>