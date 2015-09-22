<html>
  <head>
  	<title>设备管理系统</title>
  </head>
  <body>
  	<link href="css/userManagePage.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
	<!-- <?php  
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
	?> -->
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
	    <div id="user_manage">
		  <div id="ctrl_div1">
		    <button  onclick="manDevSwitch(event)" id="div_manage_but">管理设备</button>
	        <button  onclick="manDevSwitch(event)" id="div_add_but">添加设备</button>
			<button  onclick="manDevSwitch(event)" id="user_manage_but">添加设备</button>
	      </div>
		  <div id="div_manage_user">
			  <table id="head_info" border="1">
			  <tr>
				<th>id</th><th>登录名</th><th>用户名</th><th>密码</th><th>角色</th><th>session</th><th>删除</th><th>修改</th>
			  </tr>
			</table>
			<?php 
			  $obj = new userManage;
		      $result = $obj->getAllUserInfo(); 
			  $jsonObj = json_decode($result);
			  for($i=0;$i<count($jsonObj->result);$i++){
				  echo "<table id='head_info' border='1'><tr><th>";
				  echo $i + 1;	
				  echo "</th><th>";
				  echo $jsonObj->result[$i]->loginname;	
				  echo "</th><th>";
				  echo $jsonObj->result[$i]->username;
				  echo "</th><th>";
				  echo $jsonObj->result[$i]->password;		
				  echo "</th><th>";
				  echo $jsonObj->result[$i]->role;		
				  echo "</th><th>";
				  echo $jsonObj->result[$i]->session;	
				  echo "</th><th>";
				  echo "<button id='";
				  echo $jsonObj->result[$i]->id;
				  echo "'";
				  echo  " onclick='delDevice(event)'>删除</button>";
				  echo "</th><th>";
				  echo "<button id='";
				  echo "modify".$jsonObj->result[$i]->id;
				  echo "'";
				  echo  " onclick='toModifyUserPage(event)'>修改</button>";
				  echo "</th></tr></table>";
			  } 
			  ?>
		  </div>
		</div>
	  </div>
	</div>
  </body>
</html>
