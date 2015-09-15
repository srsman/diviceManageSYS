<html>
  <head>
  	<title>设备管理系统</title>
  </head>
  <body>
  	<link href="css/devManageModify.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
  	<div id="main">
  	<div id="top">
	修改设备信息
	<div id="close" onclick="modifyDevPageBack()"></div>
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
					<th><label class="need_star"></label><label>平台：</label><select id="platform">
						<option value="android">android</option>
						<option value="ios">ios</option>
					</select></th>
				  </tr>
				  <tr>
					<th><label class="need_star"></label><label>系统版本：</label><input style="text" id="sys_version"></input></th>
				  </tr>
				</table>
				<button id="commit_divice_button" onclick="addDevice(event)">提交</button>
			  </div>
		  </div>
	</div>
  </body>
</html>
