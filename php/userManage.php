<?php 
require '../cfg/config.php';

class userManage{
	//连接数据库，并返回连接对象
	public function connectMysql(){
		$dbInfo = new Config;
		$username = $dbInfo->username;
		$password = $dbInfo->userpass;
		$host = $dbInfo->dbhost;
		$database = $dbInfo->dbdatabase;
		$db_connect=mysql_connect($host,$username,$password);
		if($db_connect){
			return $db_connect;
		}else{
			return "EOR";
		}
	}

	//向数据库添加设备
	public function addUser(){
		$loginname = $_GET['loginname'];
		$username = $_GET['username'];
		$password = $_GET['password'];

		$con = self::connectMysql();
		self::setCoding();
		mysql_select_db("deviceSYS", $con);
		$querry = "INSERT INTO users (loginname,username,password) VALUES ('$loginname','$username','$password')";	
		//$querry = "INSERT INTO users (loginname,username,password) VALUES ('aaa','bbb','ccc')";
		mysql_query($querry);
		mysql_close($con);		
	}

	//设置访问数据库编码
	public function setCoding(){
		mysql_query("SET NAMES 'UTF8'");  
		mysql_query("SET CHARACTER SET UTF8");  
		mysql_query("SET CHARACTER_SET_RESULTS=UTF8'"); 
	}

	//登录判断密码是否正确
	public function login(){
		$username = $_GET['username'];
		$password = $_GET['password'];

		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "SELECT password FROM users WHERE loginname='admin'";
		self::setCoding();
		$result = mysql_query($querry);
		$row = mysql_fetch_array($result);
		$search = $row['password'];
		mysql_close($con);
		if($password == $search){
			$info = getSession(11);
			return $info;
		}else{
			return "fail";
		}
	}

	//获取登录的随机字符串
	function getSession($length)  
	{  	 
		// 密码字符集，可任意添加你需要的字符  
		$chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',  
		'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's',  
		't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D',  
		'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O',  
		'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z',  
		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!',  
		'@','#', '$', '%', '^', '&', '*', '(', ')', '-', '_',  
		'[', ']', '{', '}', '<', '>', '~', '`', '+', '=', ',',  
		'.', ';', ':', '/', '?', '|');	
		// 在 $chars 中随机取 $length 个数组元素键名  
		$keys = array_rand($chars,$length);
		$password = "";  
		for($i = 0; $i < $length; $i++)  
		{  
			// 将 $length 个数组元素连接成字符串  
			$password .= $chars[$keys[$i]];  
		}  
		echo $password;  
	} 
}

$obj = new userManage;
$obj->login();
?>