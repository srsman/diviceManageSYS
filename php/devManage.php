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
		mysql_select_db("deviceSYS", $con);
		$querry = "INSERT INTO devices (device_name,device_mode,pixel,ram,screen_size,cpu_hz,for_camara,back_camara,color,numbers,sim_number,sdcard) VALUES ('三星','Glax2','1024*768','1','5.0','2.2','200','500','黑色','1','18611513354','8')";		
		mysql_query("SET NAMES 'UTF8'");  
		mysql_query("SET CHARACTER SET UTF8");  
		mysql_query("SET CHARACTER_SET_RESULTS=UTF8'"); 
		mysql_query($querry);

		//mysql_query("INSERT INTO devices (device_name,device_mode,pixel,ram,screen_size,cpu_hz,for_camara,back_camara,color,numbers,sim_number,sdcard) VALUES ('三星','Glax2','1024*768','1','5.0','2.2','200','500','黑色','1','18611513354','4')");2015/8/5
		mysql_close($con);
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

