<html>
  <head>
  	<title>设备管理系统</title>
  </head>
  <body>
  	<link href="css/devManageSearchAll.css" rel="stylesheet" type="text/css"/>
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
				<th>id</th><th>设备名</th><th>型号</th><th>分辨率</th><th>内存</th><th>屏幕尺寸</th><th>SIM卡</th><th>申请人</th><th>确认申请</th><th>否定申请</th>
			  </tr>
			</table>
			  <?php 
			    require 'php/devManage.php';
			    $obj = new devManage;
				$result = $obj->getApplyforDataShow(); 
				$jsonObj = json_decode($result);
				for($i=0;$i<count($jsonObj->result);$i++){
			  ?>
			  <?php
				//$search_result = "<table id='head_info' border='1'><tr><th></th><th>型号</th><th>分辨率</th><th>内存</th><th>屏幕尺寸</th><th>SIM卡</th><th>修改</th><th>删除</th></tr></table>";
				//echo $search_result;
				//echo $jsonObj->result[0]->device_name;
				echo "<table id='head_info' border='1'><tr><th>"
			  ?>
			  <?php echo $i + 1; ?>				
			  <?php echo "</th><th>" ?>
			  <?php echo $jsonObj->result[$i]->device_name; ?>				
			  <?php echo "</th><th>" ?>
			  <?php echo $jsonObj->result[$i]->device_mode; ?>
			  <?php echo "</th><th>" ?>
			  <?php echo $jsonObj->result[$i]->pixel; ?>
			  <?php echo "</th><th>" ?>
			  <?php echo $jsonObj->result[$i]->ram; ?>
			  <?php echo "</th><th>" ?> 
			  <?php echo $jsonObj->result[$i]->screen_size; ?>
			  <?php echo "</th><th>" ?>
			  <?php echo $jsonObj->result[$i]->sim_number; ?>
			  <?php echo "</th><th>" ?>
			  <?php echo $jsonObj->result[$i]->borrower; ?>
			  <?php echo "</th><th>" ?>
			  <?php echo "<button id='" ?>
			  <?php echo $jsonObj->result[$i]->id; ?>
			  <?php echo "'" ?>
			  <?php echo  " onclick='verifyBorrow(event)'>确认申请</button>" ?>
			  <?php echo "</th><th>" ?>
			  <?php echo "<button id='" ?>
			  <?php echo $jsonObj->result[$i]->id; ?>
			  <?php echo "'" ?>
			  <?php echo  " onclick='refuseBorrow(event)'>否定申请</button>" ?>
			  <?php echo "</th></tr></table>"; ?>
			  <?php } ?>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </body>
</html>
