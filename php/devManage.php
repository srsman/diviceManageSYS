<?php
require '../cfg/config.php';

class devManage{
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

	//创建一个设备
	public function createAccount(){
		$con = self::connectMysql();
		mysql_select_db("my_db", $con);
		$qurry = ""
		echo $con;
	}

	public function test(){
		echo "happy<br/>";
		$aaa = new Config;
		echo $aaa->username;
	}

	public function test1(){
		echo "test1";
	}
}

	$obj = new devManage;
	$obj->createAccount();
?>

