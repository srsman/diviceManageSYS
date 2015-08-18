<html>
  <head>
  	<title>设备管理系统</title>
  </head>
  <body>
  	<link href="css/index.css" rel="stylesheet" type="text/css"/>
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
				<th>id</th><th>设备名</th><th>型号</th><th>分辨率</th><th>内存</th><th>屏幕尺寸</th><th>SIM卡</th><th>申请设备</th><th>申请人</th>
			  </tr>
			</table>
			  <?php 
			    require 'php/devManage.php';
			    $obj = new devManage;
				$result = $obj->getIosDataShow(); 
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
			  <?php if($jsonObj->result[$i]->status == 0 || $jsonObj->result[$i]->status == 1){ ?>
				  <?php echo "<button id='" ?>
				  <?php echo $jsonObj->result[$i]->id; ?>
				  <?php echo "'" ?>			  
				  <?php if($jsonObj->result[$i]->status == 0){ ?>
				  <?php echo " onclick='applyForDev(event)'>申请设备</button>" ?>
				  <?php }else if($jsonObj->result[$i]->status == 1){ ?>
				  <?php echo " onclick='cancleApplyForDev(event)'>取消申请</button>" ?>
				  <?php } ?>
			  <?php } ?>
			  <?php echo "</th><th>" ?>
			  <?php if($jsonObj->result[$i]->status == 0){ ?>
					<?php echo "<input style='text' class='input_name' id='input" . $jsonObj->result[$i]->id. "' value=''/>" ?>
					<?php //echo "<input style='text' class='input_name' id='input"?>
					<?php //echo $jsonObj->result[$i]->id ; ?>
				    <?php //echo "'></input>" ?>
			  <?php }else{ ?>
					<?php echo $jsonObj->result[$i]->borrower; ?>
			  <?php } ?>
			  <?php //echo $jsonObj->result[$i]->borrower; ?>
			  <?php echo "</th></tr></table>"; ?>
			  <?php } ?>
		  </div>
	    </div>	
	  </div>
	</div>
  </body>
</html>
