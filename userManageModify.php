<html>
  <head>
  	<title>设备管理系统</title>
  </head>
  <body>
  	<link href="css/userManageModify.css" rel="stylesheet" type="text/css"/>
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
	修改用户信息
	<div id="close" onclick="modifyDevPageBack()"></div>
	</div>
		  <div id="div_add_dev">
			  <div id="info">
				<table border="0" id="info_table">
				<?php
				require 'php/devManage.php';
				$id = $_GET["id"];
			    $obj = new userManage;
				$result = $obj->getTheUserInfo(); 
				$jsonObj = json_decode($result);	
				
				echo '"></input></th>
						<th><label class="need_star">*</label><label>密码：</label><input style="text"
						id="password" value="';
				echo $jsonObj->result[0]->password;
				echo '"></input></th>
					  </tr>
					  <tr>
						<th><label class="need_star"></label><label>角色：</label><input style="text" id="role" value="';
				echo $jsonObj->result[0]->role;
				echo '"></input></th>
						<th><label class="need_star"></label><label>session：</label><input style="text" id="session" value="';
				echo $jsonObj->result[0]->session;
				echo '"></input></th></tr>"';
				echo '<tr><th><button id="commit_user_button" onclick="modifyUserInfo()">提交</button></th></tr>';
				?>
				<?php
				echo '<label id="user_id" style="display:none">';
				echo $id;
				echo '</label>';
				echo '<label id="the_role" style="display:none">';
				echo $jsonObj->result[0]->role;
				echo '</label>';
				?>
				</table>
			  </div>
		  </div>
	</div>
  </body>
</html>
