<?php 
//require '../cfg/config.php';

function isRequire($str){
	$arrs  = get_included_files();
	$len = count($arrs);
	$i=0;	
	while($i < $len){
		if(strstr($arrs[$i],"config.php"))
		{
			return "yes";
		}
		$i++;
	}
	return "no";
}
$judge = isRequire("config.php");
if($judge == "yes"){

}else if($judge == "no"){
	require '../cfg/config.php';
}


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
		$username = $_GET['loginname'];
		$password = $_GET['password'];

		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "SELECT loginname,password FROM users WHERE loginname='$username'";
		self::setCoding();
		$result = mysql_query($querry);
		$row = mysql_fetch_array($result);
		$search = $row['loginname'];
		$search1 = $row['password'];
		mysql_close($con);
		if($password == $search1 && $username == $search){
			$info = self::getSession(11);
			$con = self::connectMysql();
			self::setCoding();
			mysql_select_db("deviceSYS", $con);
			$querry = "UPDATE users SET session='$info' WHERE loginname='$username'";			
			mysql_query($querry);
			mysql_close($con);
			echo $info;
		}else{
			echo "fail";
		}
	}

	
	
	//退出登录
	public function logout(){
		//$session = $_GET['info'];	
		$session = "kmoyDHSX6$%";
		$con = self::connectMysql();
		self::setCoding();
		mysql_select_db("deviceSYS", $con);
		$querry = "UPDATE users SET session='' WHERE session='$session'";	
		mysql_query($querry);
		mysql_close($con);
	}

	//判断是否登录
	public function islogin(){
		$session = $_GET['info'];
		$con = self::connectMysql();
		self::setCoding();
		mysql_select_db("deviceSYS", $con);
		$querry = "SELECT session FROM users WHERE session='$session'";	
		$result = mysql_query($querry);
		$row = mysql_fetch_array($result);
		mysql_close($con);
		if($row['session'] != ""){
			return "yes";
		}else{
			return "no";
		}
	}

	//获取用户权角色
	public function getRole(){
		$session = $_GET['info'];
		$con = self::connectMysql();
		self::setCoding();
		mysql_select_db("deviceSYS", $con);
		$querry = "SELECT role FROM users WHERE session='$session'";	
		$result = mysql_query($querry);
		$row = mysql_fetch_array($result);
		$role = $row["role"];
		return $role;
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
		'@','#', '$', '%', '^', '*', '(', ')', '-', '_',  
		'[', ']', '{', '}', '<', '>', '~', '`', '+', '=', ',',);	

		// 在 $chars 中随机取 $length 个数组元素键名  
		$keys = array_rand($chars,$length);
		$password = "";  
		for($i = 0; $i < $length; $i++)  
		{  
			// 将 $length 个数组元素连接成字符串  
			$password .= $chars[$keys[$i]];  
		}  
		return $password;  
	} 
}


//$obj = new userManage;
//$obj->logout();
?>