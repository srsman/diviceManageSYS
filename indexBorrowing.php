<html>
  <head>
  	<title>设备管理系统</title>
  </head>
  <body>
  	<link href="css/indexBorrowing.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
  	<div id="main">
  	  <div id="top_bar">
  	  	<label>炫一下设备管理系统</label>
  	  	<label onclick="divLogin(event)" id="label_login">登陆</label>
  	  	<label onclick="divLogin(event)" id="label_register">注册</label>
		<label onclick="divSwitch(event)" id="label_search">设备查询</label>
		<label onclick="divSwitch(event)" id="label_manage">设备管理</label>
  	  </div>	  
	  <div id="show">
	    <div id="show_devices">
		  <div id="ctrl_div">
	        <button id="ctrl_div_all" onclick="indexSearchDevice(event)">所有设备</button>
		    <button id="ctrl_div_borrowing" onclick="indexSearchDevice(event)">借出设备</button>
		    <button id="ctrl_div_noborrow" onclick="indexSearchDevice(event)">剩余设备</button>
			<button id="ctrl_div2_android" onclick="indexSearchDevice(event)">Android</button>
		    <button id="ctrl_div2_ios" onclick="indexSearchDevice(event)">ios</button>
	      </div>
		  <div>
			<table id="head_info" border="1">
			  <tr>
				<th>id</th><th>设备名</th><th>型号</th><th>分辨率</th><th>内存</th><th>屏幕尺寸</th><th>SIM卡</th><th>申请人</th>
			  </tr>
			</table>
			  <?php 
			    require 'php/devManage.php';
			    $obj = new devManage;
				$result = $obj->getBorrowedDataShow(); 
				$jsonObj = json_decode($result);
				for($i=0;$i<count($jsonObj->result);$i++){
				//$search_result = "<table id='head_info' border='1'><tr><th></th><th>型号</th><th>分辨率</th><th>内存</th><th>屏幕尺寸</th><th>SIM卡</th><th>修改</th><th>删除</th></tr></table>";
				//echo $search_result;
				//echo $jsonObj->result[0]->device_name;
				echo "<table id='head_info' border='1'><tr><th>";
			  echo $i + 1;				
			  echo "</th><th>";
			  echo $jsonObj->result[$i]->device_name;				
			  echo "</th><th>";
			  echo $jsonObj->result[$i]->device_mode;
			  echo "</th><th>";
			  echo $jsonObj->result[$i]->pixel;
			  echo "</th><th>";
			  echo $jsonObj->result[$i]->ram;
			  echo "</th><th>" ;
			  echo $jsonObj->result[$i]->screen_size;
			  echo "</th><th>";
			  echo $jsonObj->result[$i]->sim_number;
			  echo "</th><th>";
			  echo $jsonObj->result[$i]->borrower;		  
			  echo "</th></tr></table>";
			  } ?>
		  </div>
	    </div>	
	  </div>
	</div>
  </body>
</html>
