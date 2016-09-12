<?php
class Mysql{
	var $host = "cxmj.ctv3njakg56i.ap-northeast-2.rds.amazonaws.com";
	var $user = "albert";
	var $pwd = "56474587";
	var $database = "tea_renaissance";
	var $conn = null;
	var $err = "";
	
	function __construct(){
//		var $db = $this->get_file(".config");
//		$this->$host = $db["host"];
//		$this->$user = $db["username"];
//		$this->$pwd = $db["password"];
//		$this->$database = $db["database"];
		
//		echo json_encode($this -> database);
	}
	
	function connect(){
		$this->conn = mysqli_connect($this->host, $this->user, $this->pwd, $this->database);
		mysqli_set_charset($this->conn, "utf8");
	}
	
	function close(){
		if ($this->conn){
			mysqli_close($this->conn);
		}
	}
	
	public function insert($sql){
		$this -> connect();
		$result = mysqli_query($this -> conn, $sql);
		if(!$result){
			$this->err = mysqli_error($this->conn);
		}
		
		$this -> close();
		return $result;
	}
	
	public function select($sql){
		$this -> connect();
		$result = mysqli_query($this -> conn, $sql);
		$arr = array();
		while ($row = $result->fetch_assoc()){
			array_push($arr, $row);
		}
		
		$this->close();
//		$json = json_encode($arr, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
		
		return $arr;
	}
	
	public function get_err(){
		return $this->err;
	}
	
	function get_file($filename) {
	    return trim(substr(file_get_contents($filename), 0));
	}
}
?>