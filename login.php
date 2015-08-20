<html>
  <head>
  	<title>设备管理系统</title>
  </head>
  <body>
  	<link href="css/login.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
	<div id="login_panel">	
      <div id="close_login" onclick="closeLogin()"></div>
	  <div id="div_login">
	    <div>
		  <label>登录名：</label><input style="text" id="login"/>
		</div>
		<div>
		  <label>密码：</label><input style="text" id="password" type="password"/>
		</div>
		<div>
		  <button id="login_but" onclick="login(event)">登录</button>
		</div>
	  </div>
	</div>
  </body>
</html>
