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
		$querry = "SELECT * FROM devices where device_name='小米'";
		self::setCoding();
		$result = mysql_query($querry);
		$arr = array();
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$arr[] = $row;
		}
		mysql_close($con);
		echo json_encode(array('result'=>$arr));
	}

	//查询数据库中所有数据show
	public function getAllDataShow(){
		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "SELECT * FROM devices";
		self::setCoding();
		$result = mysql_query($querry);
		$arr = array();
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$arr[] = $row;
		}
		mysql_close($con);
		$resultJson = json_encode(array('result'=>$arr));
		return $resultJson;
	}

	//查询数据库中剩余的设备
	public function getNoApplyforDataShow(){
		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "SELECT * FROM devices WHERE status='0'";
		self::setCoding();
		$result = mysql_query($querry);
		$arr = array();
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$arr[] = $row;
		}
		mysql_close($con);
		$resultJson = json_encode(array('result'=>$arr));
		return $resultJson;
	}

	//查询数据库中申请签借的设备
	public function getApplyforDataShow(){
		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "SELECT * FROM devices WHERE status='1'";
		self::setCoding();
		$result = mysql_query($querry);
		$arr = array();
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$arr[] = $row;
		}
		mysql_close($con);
		$resultJson = json_encode(array('result'=>$arr));
		return $resultJson;
	}

	//查询数据库中借出的设备
	public function getBorrowedDataShow(){
		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "SELECT * FROM devices WHERE status='2'";
		self::setCoding();
		$result = mysql_query($querry);
		$arr = array();
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$arr[] = $row;
		}
		mysql_close($con);
		$resultJson = json_encode(array('result'=>$arr));
		return $resultJson;
	}

	//查询数据库中申请签还的设备
	public function getApplyforReturnDataShow(){
		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "SELECT * FROM devices WHERE status='3'";
		self::setCoding();
		$result = mysql_query($querry);
		$arr = array();
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$arr[] = $row;
		}
		mysql_close($con);
		$resultJson = json_encode(array('result'=>$arr));
		return $resultJson;
	}

	//查询数据库中Android设备
	public function getAndroidShow(){
		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "SELECT * FROM devices WHERE platform='android'";
		self::setCoding();
		$result = mysql_query($querry);
		$arr = array();
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$arr[] = $row;
		}
		mysql_close($con);
		$resultJson = json_encode(array('result'=>$arr));
		return $resultJson;
	}

	//查询数据库中ios设备
	public function getIosDataShow(){
		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "SELECT * FROM devices WHERE platform='ios'";
		self::setCoding();
		$result = mysql_query($querry);
		$arr = array();
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$arr[] = $row;
		}
		mysql_close($con);
		$resultJson = json_encode(array('result'=>$arr));
		return $resultJson;
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
		$platform = $_GET['platform'];

		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "INSERT INTO devices (device_name,device_mode,pixel,ram,screen_size,cpu_hz,for_camara,back_camara,color,numbers,sim_number,sdcard,platform) VALUES ('$device_name','$device_mode','$pixel','$ram','$screen_size','$cpu_hz','$for_camara','$back_camara','$color','1','$sim_number','$sdcard','$platform')";	
		self::setCoding();
		mysql_query($querry);
		mysql_close($con);		
		echo "设备添加成功！";
	}

	//申请设备
	public function applyFor(){
		$id = $_GET['id'];
		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "UPDATE devices SET status='1' WHERE id='$id'";
		self::setCoding();
		$result = mysql_query($querry);
		mysql_close($con);
		echo $id;
	}
	
	//取消申请
	public function cancleAplyFor(){
		$id = $_GET['id'];
		$con = self::connectMysql();
		mysql_select_db("deviceSYS", $con);
		$querry = "UPDATE devices SET status='0' WHERE id='$id'";
		self::setCoding();
		$result = mysql_query($querry);
		mysql_close($con);
		echo $id;
	}

}

	//$obj = new devManage;
	//$obj->applyFor();
?>

