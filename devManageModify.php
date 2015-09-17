<html>
  <head>
  	<title>设备管理系统</title>
  </head>
  <body>
  	<link href="css/devManageModify.css" rel="stylesheet" type="text/css"/>
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
  	<div id="top">
	修改设备信息
	<div id="close" onclick="modifyDevPageBack()"></div>
	</div>
		  <div id="div_add_dev">
			  <div id="info">
				<table border="0" id="info_table">
				<?php
				require 'php/devManage.php';
				$id = $_GET["id"];
			    $obj = new devManage;
				$result = $obj->getDeviceInfo(); 
				$jsonObj = json_decode($result);				

				echo  '<tr><th><label class="need_star">*</label><label>设备名：</label><input style="text" id="device_name" value="';
				echo $jsonObj->result[0]->device_name;
				echo  '"></input></th>';
				echo  '<th><label class="need_star">*</label><label>型号：</label><input style="text" id="device_mode" value="';
				echo $jsonObj->result[0]->device_mode;
				echo '"></input></th>
						<th><label class="need_star"></label><label>分辨率：</label><input style="text"
						id="pixel" value="';
				echo $jsonObj->result[0]->pixel;
				echo '"></input></th>
					  </tr>
					  <tr>
						<th><label class="need_star"></label><label>内存：</label><input style="text" id="ram" value="';
				echo $jsonObj->result[0]->ram;
				echo '"></input></th>
						<th><label class="need_star"></label><label>cpu频率：</label><input style="text" id="cpu_hz" value="';
				echo $jsonObj->result[0]->cpu_hz;
				echo '"></input></th>
						<th><label class="need_star"></label><label>屏幕尺寸：</label><input style="text" id="screen_size" value="';
				echo $jsonObj->result[0]->screen_size;
				echo '"></input></th>
					  </tr>
					  <tr>
						<th><label class="need_star"></label><label>颜色：</label><input style="text"
						id="color" value="';
				echo $jsonObj->result[0]->color;
				echo '"></input></th>
						<th><label class="need_star"></label><label>前置摄像：</label><input style="text" id="for_camara" value="';
				echo $jsonObj->result[0]->for_camara;
				echo '"></input></th>
						<th><label class="need_star"></label><label>后置摄像：</label><input style="text" id="back_camara" value="';
				echo $jsonObj->result[0]->back_camara;
				echo '"></input></th>
					  </tr>
					  <tr>
						<th><label class="need_star"></label><label>SIM卡：</label><input style="text" id="sim_number" value="';
				echo $jsonObj->result[0]->sim_number;
				echo '"></input></th>
						<th><label class="need_star"></label><label>SD卡：</label><input style="text" id="sdcard" value="';
				echo $jsonObj->result[0]->sdcard;
				echo '"></input></th>
						<th><label class="need_star"></label><label>平台：</label><select id="platform" value="';
				echo $jsonObj->result[0]->platform;
				if($jsonObj->result[0]->platform == "android"){
					echo '">
								<option value="android" selected="selected">android</option>
								<option value="ios">ios</option>
							</select></th>
						  </tr>
						  <tr>
							<th><label class="need_star"></label><label>系统版本：</label><input style="text" id="sys_version" value="';
				}else if($jsonObj->result[0]->platform == "ios"){
					echo '">
							<option value="android">android</option>
							<option value="ios" selected="selected">ios</option>
						</select></th>
					  </tr>
					  <tr>
						<th><label class="need_star"></label><label>系统版本：</label><input style="text" id="sys_version" value="';
				}
				
				echo $jsonObj->result[0]->sys_version;
				echo '"></input></th>
					  </tr>';
				  ?>
				</table>
				<button id="commit_divice_button" onclick="addDevice(event)">提交</button>
				<?php
				echo '<label id="dev_id" style="display:none">';
				echo "modify".$id;
				echo '</label>';
				?>
			  </div>
		  </div>
	</div>
  </body>
</html>
