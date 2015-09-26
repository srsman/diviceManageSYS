<html>
  <head>
  	<title>设备管理系统</title>
  </head>
  <body>
  	<link href="css/devManageSearchAndroid.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
	<?php  
		require 'php/userManage.php';
		$obj = new userManage;
		$result = $obj->islogin(); 
		$role = $obj->getRole(); 
		if($result == "yes" && $role != 2){
	
		}else{
			echo "<script language='javascript'>";
			echo "jumpToIndex();";
			echo "</script>";
		}
	?>
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
	        <button>所有设备</button>
		    <button>借出设备</button>
		    <button>剩余设备</button>
	      </div>
	    </div>	
	    <div id="device_manage">
		  <div id="ctrl_div1">
		    <button  onclick="manDevSwitch(event)" id="div_manage_but">管理设备</button>
	        <button  onclick="manDevSwitch(event)" id="div_add_but">添加设备</button>
			<button  onclick="manDevSwitch(event)" id="user_manage_but">管理用户</button>
	      </div>
		  <div id="div_add_dev">
			  <div id="info">
				<table border="0" id="info_table">
				  <tr>
					<th><label class="need_star">*</label><label>设备名：</label><input style="text" id="device_name" value="小米"></input></th>
					<th><label class="need_star">*</label><label>型号：</label><input style="text" id="device_mode" value="2S"></input></th>
					<th><label class="need_star"></label><label>分辨率：</label><input style="text"
					id="pixel" value="1024*768"></input></th>
				  </tr>
				  <tr>
					<th><label class="need_star"></label><label>内存：</label><input style="text" id="ram" value="2"></input></th>
					<th><label class="need_star"></label><label>cpu频率：</label><input style="text" id="cpu_hz" value="2"></input></th>
					<th><label class="need_star"></label><label>屏幕尺寸：</label><input style="text" id="screen_size" value="4.0"></input></th>
				  </tr>
				  <tr>
					<th><label class="need_star"></label><label>颜色：</label><input style="text"
					id="color" value="黑色"></input></th>
					<th><label class="need_star"></label><label>前置摄像：</label><input style="text" id="for_camara" value="200"></input></th>
					<th><label class="need_star"></label><label>后置摄像：</label><input style="text" id="back_camara" value="800"></input></th>
				  </tr>
				  <tr>
					<th><label class="need_star"></label><label>SIM卡：</label><input style="text" id="sim_number"></input></th>
					<th><label class="need_star"></label><label>SD卡：</label><input style="text" id="sdcard"></input></th>
				  </tr>
				</table>
				<button id="add_divice_button" onclick="addDevice(event)">添加</button>
				<button id="clear_button" onclick="clearInfo(event)">清空</button>
				<button id="default_button" onclick="defaultInfo(event)">默认</button>
			  </div>
		  </div>
		  <div id="div_manage_dev"></div>
		  <div id="div_search_dev">
			<div id="ctrl_div2">
	          <button id="ctrl_div2_all" onclick="searchDevice(event)">所有设备</button>
		      <button id="ctrl_div2_borrowing" onclick="searchDevice(event)">借出设备</button>
		      <button id="ctrl_div2_noborrow" onclick="searchDevice(event)">剩余设备</button>
			  <button id="ctrl_div2_applying" onclick="searchDevice(event)">申请中</button>
			  <button id="ctrl_div2_android" onclick="searchDevice(event)">Android</button>
			  <button id="ctrl_div2_ios" onclick="searchDevice(event)">ios</button>
	        </div>
			<div>
			<table id="head_info" border="1">
			  <tr>
				<th>id</th><th>设备名</th><th>型号</th><th>系统版本</th><th>分辨率</th><th>内存</th><th>屏幕尺寸</th><th>SIM卡</th><th>申请人</th><th>借出时间</th><th>删除</th><th>修改</th><th>归还</th>
			  </tr>
			</table>
			  <?php 
			    require 'php/devManage.php';
			    $obj = new devManage;
				$result = $obj->getAndroidShow(); 
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
			  echo $jsonObj->result[$i]->sys_version;
			  echo "</th><th>";
			  echo $jsonObj->result[$i]->pixel;
			  echo "</th><th>";
			  echo $jsonObj->result[$i]->ram;
			  echo "</th><th>";
			  echo $jsonObj->result[$i]->screen_size;
			  echo "</th><th>";
			  echo $jsonObj->result[$i]->sim_number;
			  echo "</th><th>";
			  if($jsonObj->result[$i]->status == 0 || $jsonObj->result[$i]->status == 1){
					
			  }else{
					echo $jsonObj->result[$i]->borrower;
			  }
			  echo "</th><th>";
			  if($jsonObj->result[$i]->status == 2){
				  $borrow_time = $jsonObj->result[$i]->borrow_time;
				  $return_time = $jsonObj->result[$i]->return_time;
				  echo $borrow_time;
			  }
			  echo "</th><th>";
			  echo "<button id='";
			  echo $jsonObj->result[$i]->id;
			  echo "'";
			  echo  " onclick='delDevice(event)'>删除设备</button>";
			  echo "</th><th>";
			  echo "<button id='";
			  echo "modify".$jsonObj->result[$i]->id;
			  echo "'";
			  echo  " onclick='toModifyDevPage(event)'>修改设备</button>";
			  echo "</th><th>";
			  if($jsonObj->result[$i]->status == 2){
				  echo "<button id='";
				  echo "return".$jsonObj->result[$i]->id;
				  echo "'";
				  echo  " onclick='verifyBack2(event)'>归还</button>";
			  }
			  echo "</th></tr></table>";
			  } ?>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </body>
</html>
