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
	        <button>所有设备</button>
		    <button>借出设备</button>
		    <button>剩余设备</button>
	      </div>
	    </div>	
	  </div>
	</div>
  </body>
</html>
