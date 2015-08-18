<html>
  <head>
  	<title>设备管理系统</title>
  </head>
  <body>
  	<link href="css/register.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
	<div id="registe_panel">
	  <div id="close_register" onclick="closeRegister()"></div>
	  <div id="div_register">
	    <div>
		  <label>登录名：</label><input id="loginname" style="text" />
		</div>
		<div>
		  <label>用户名：</label><input id="username" style="text" />
		</div>
		<div>
		  <label>密码：</label><input id="password" style="text"  type="password"/>
		</div>
		<div>
		  <label>确认密码：</label><input id="repassword" style="text" type="password"/>
		</div>
		<div>
		  <button id="register_but" onclick="register(event)">注册</button>
		</div>
	  </div>
	</div>
  </body>
</html>
