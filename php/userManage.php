<?php 
require '../cfg/config.php';

class userManage{
	//�������ݿ⣬���������Ӷ���
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

	//�����ݿ�����豸
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

	//���÷������ݿ����
	public function setCoding(){
		mysql_query("SET NAMES 'UTF8'");  
		mysql_query("SET CHARACTER SET UTF8");  
		mysql_query("SET CHARACTER_SET_RESULTS=UTF8'"); 
	}

	//��¼�ж������Ƿ���ȷ
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

	//��ȡ��¼������ַ���
	function getSession($length)  
	{  	 
		// �����ַ������������������Ҫ���ַ�  
		$chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',  
		'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's',  
		't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D',  
		'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O',  
		'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z',  
		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!',  
		'@','#', '$', '%', '^', '&', '*', '(', ')', '-', '_',  
		'[', ']', '{', '}', '<', '>', '~', '`', '+', '=', ',',  
		'.', ';', ':', '/', '?', '|');	
		// �� $chars �����ȡ $length ������Ԫ�ؼ���  
		$keys = array_rand($chars,$length);
		$password = "";  
		for($i = 0; $i < $length; $i++)  
		{  
			// �� $length ������Ԫ�����ӳ��ַ���  
			$password .= $chars[$keys[$i]];  
		}  
		echo $password;  
	} 
}

$obj = new userManage;
$obj->login();
?>