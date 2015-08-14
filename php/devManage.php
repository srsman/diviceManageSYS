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

	//向数据库添加一个设备
	public function createAccount(){
		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "INSERT INTO devices (device_name,device_mode,pixel,ram,screen_size,cpu_hz,for_camara,back_camara,color,numbers,sim_number,sdcard) VALUES ('三星','Glax2','1024*768','1','5.0','2.2','200','500','黑色','1','18611513354','8')";		
		self::setCoding();
		mysql_query($querry);
		mysql_close($con);
		echo $con;
	}

	//查询数据库中所有数据
	public function getAllData(){
		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "SELECT * FROM devices";
		self::setCoding();
		$result = mysql_query($querry);
		$arr = array();
		while($row = mysql_fetch_array($result)){
			//echo var_dump($row);
			$arr[] = $row;
			//echo json_encode($row);
			//echo "<br/>";
		}
		mysql_close($con);
		echo json_encode($arr);
		//echo $result;
	}

	//设置访问数据库编码
	public function setCoding(){
		mysql_query("SET NAMES 'UTF8'");  
		mysql_query("SET CHARACTER SET UTF8");  
		mysql_query("SET CHARACTER_SET_RESULTS=UTF8'"); 
	}

	//向数据库添加设备
	public function addDevice(){
		$device_name = $_GET['device_name'];
		$device_mode = $_GET['device_mode'];
		$pixel = $_GET['pixel'];
		$ram = $_GET['ram'];
		$cpu_hz = $_GET['cpu_hz'];
		$screen_size = $_GET['screen_size'];
		$color = $_GET['color'];
		$for_camara = $_GET['for_camara'];
		$back_camara = $_GET['back_camara'];
		$sim_number = $_GET['sim_number'];
		$sdcard = $_GET['sdcard'];

		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "INSERT INTO devices (device_name,device_mode,pixel,ram,screen_size,cpu_hz,for_camara,back_camara,color,numbers,sim_number,sdcard) VALUES ('$device_name','$device_mode','$pixel','$ram','$screen_size','$cpu_hz','$for_camara','$back_camara','$color','1','$sim_number','$sdcard')";	
//		$querry = "INSERT INTO devices (device_name) VALUES ('$device_name')";
		self::setCoding();
		mysql_query($querry);
		mysql_close($con);
		
		echo "设备添加成功！";
	}
}

	$obj = new devManage;
	$obj->addDevice();
?>

