//查询设备和设备管理界面切换
var ipAddr = "127.0.0.1"

function divSwitch(e){
	e = e || window.event;
	if(e.target.id == "label_search"){
		window.location.href="http://" + ipAddr + "/diviceManageSYS/"
	}else if(e.target.id == "label_manage")
	{
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAll.php" + req;
	}
}

//弹出登陆界面或注册页面
function divLogin(e){
	e = e||window.event;
	if (e.target.id == "label_login"){
		window.location.href="http://" + ipAddr + "/diviceManageSYS/login.php"
	}else if(e.target.id == "label_register"){
		window.location.href="http://" + ipAddr + "/diviceManageSYS/register.php"		
	}
}

//关闭登陆界面
function closeLogin(e){
	window.location.href="http://" + ipAddr + "/diviceManageSYS/"
}

//关闭注册界面
function closeRegister(e){
	window.location.href="http://" + ipAddr + "/diviceManageSYS/"
}

//添加一个设备
function addDevice(e){
	e = e||window.event;
	var device_name = $("#device_name").val();
	var device_mode = $("#device_mode").val();
	var pixel = $("#pixel").val();
	var ram = $("#ram").val();
	var cpu_hz = $("#cpu_hz").val();
	var screen_size = $("#screen_size").val();
	var color = $("#color").val();
	var for_camara = $("#for_camara").val();
	var back_camara = $("#back_camara").val();
	var sim_number = $("#sim_number").val();
	var sdcard = $("#sdcard").val();
	var platform = $("#platform").val();
	var sys_version = $("#sys_version").val();

	if(device_name == "" || device_mode == ""){
		alert("【设备名】和【型号】不能为空！")
	}else{
		$.get("http://" + ipAddr + "/diviceManageSYS/php/addDevice.php", {device_name:device_name,device_mode:device_mode,pixel:pixel,ram:ram,cpu_hz:cpu_hz,screen_size:screen_size,color:color,for_camara:for_camara,back_camara:back_camara,sim_number:sim_number,sdcard:sdcard,platform:platform,sys_version},
		function(data){
			alert(data);
		});
	}
}

//修改设备信息
function addDevice(e){
	id = $("#dev_id").text();
	id = id.substr(6);

	var device_name = $("#device_name").val();
	var device_mode = $("#device_mode").val();
	var pixel = $("#pixel").val();
	var ram = $("#ram").val();
	var cpu_hz = $("#cpu_hz").val();
	var screen_size = $("#screen_size").val();
	var color = $("#color").val();
	var for_camara = $("#for_camara").val();
	var back_camara = $("#back_camara").val();
	var sim_number = $("#sim_number").val();
	var sdcard = $("#sdcard").val();
	var platform = $("#platform").val();
	var sys_version = $("#sys_version").val();

	if(device_name == "" || device_mode == ""){
		alert("【设备名】和【型号】不能为空！")
	}else{
		$.get("http://" + ipAddr + "/diviceManageSYS/php/modifyDevice.php", {id:id,device_name:device_name,device_mode:device_mode,pixel:pixel,ram:ram,cpu_hz:cpu_hz,screen_size:screen_size,color:color,for_camara:for_camara,back_camara:back_camara,sim_number:sim_number,sdcard:sdcard,platform:platform,sys_version},
		function(data){
			alert(data);
			var strcookie=document.cookie.split(";")[0].split("=")[1];
			var req = "&info=" + strcookie;
			window.location.href="http://" + ipAddr + "/diviceManageSYS/devManagemodify.php?id=" + id + req;
		});
	}
	
}

//清空设备信息
function clearInfo(e){
	$("#device_name").val("");
	$("#device_mode").val("");
	$("#pixel").val("");
	$("#ram").val("");
	$("#cpu_hz").val("");
	$("#screen_size").val("");
	$("#color").val("");
	$("#for_camara").val("");
	$("#back_camara").val("");
	$("#sim_number").val("");
	$("#sdcard").val("");
	$("#platform").val("");
}

//设置默认信息
function defaultInfo(e){
	$("#device_name").val("");
	$("#device_mode").val("");
	$("#pixel").val("1024*768");
	$("#ram").val("2");
	$("#cpu_hz").val("");
	$("#screen_size").val("4.5");
	$("#color").val("白色");
	$("#for_camara").val("200");
	$("#back_camara").val("800");
	$("#sim_number").val("");
	$("#sdcard").val("");
	$("#platform").val("android");
}

//设备管理界面切换
function manDevSwitch(e){
	e = e || window.event;
	if(e.target.id == "div_add_but"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageAdd.php" + req;
	}else if(e.target.id == "div_manage_but"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAll.php" + req;
	}else if(e.target.id == "div_search_but"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAll.php" + req;
	}else if (e.target.id == "user_manage_but"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/userManagePage.php" + req;
	}

}

function searchDevice(e){
	e = e || window.event;
	if(e.target.id == "ctrl_div2_all"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAll.php" + req;
	}else if(e.target.id == "ctrl_div2_borrowing"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchBorrowing.php" + req;
	}else if(e.target.id == "ctrl_div2_noborrow"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchNoborrowing.php" + req;
	}else if(e.target.id == "ctrl_div2_applying"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchApplying.php" + req;
	}else if(e.target.id == "ctrl_div2_android"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAndroid.php" + req;
	}else if(e.target.id == "ctrl_div2_ios"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchIos.php" + req;
	}
}

function indexSearchDevice(e){
	e = e || window.event;
	if(e.target.id == "ctrl_div_all"){
		window.location.href="http://" + ipAddr + "/diviceManageSYS/index.php"
	}else if(e.target.id == "ctrl_div_borrowing"){
		window.location.href="http://" + ipAddr + "/diviceManageSYS/indexBorrowing.php"
	}else if(e.target.id == "ctrl_div_noborrow"){
		window.location.href="http://" + ipAddr + "/diviceManageSYS/indexNoborrowing.php"
	}else if(e.target.id == "ctrl_div2_android"){
		window.location.href="http://" + ipAddr + "/diviceManageSYS/indexAndroid.php"
	}else if(e.target.id == "ctrl_div2_ios"){
		window.location.href="http://" + ipAddr + "/diviceManageSYS/indexIos.php"
	}
}

//申请设备
function applyForDev(e){
	e = e || window.event;
	id = e.target.id;
	textid = "#input" + id.replace(/\s+/g, "");
	borrower = $(textid).val();	
	var url = location.href;
	if(borrower != ""){
		$.get("http://" + ipAddr + "/diviceManageSYS/php/applyForDev.php", {id:id,borrower:borrower},
		function(data){
			window.location.href=url;
		});		
	}else{
		alert("必须填写申请者的名字！");
	}
}

//取消申请
function cancleApplyForDev(e){
	e = e || window.event;
	id = e.target.id;
	id = id.replace(/\s+/g, "");
	var url = location.href;
	$.get("http://" + ipAddr + "/diviceManageSYS/php/cancleApplyForDev.php", {id:id},
	function(data){
		window.location.href=url;
	});
}

//删除一个设备
function delDevice(e){
	e = e || window.event;
	con=confirm("确定删除该设备么?");
	if(con == true){
		id = e.target.id;
		url = location.href;
		id = id.replace(/\s+/g, "");
		$.get("http://" + ipAddr + "/diviceManageSYS/php/delDevice.php", {id:id},
			function(data){
			window.location.href=url;
		});
	}else{
	
	}
}

//确认申请设备
function verifyBorrow(e){
	e = e || window.event;
	id = e.target.id;
	var url = location.href;
	id = id.replace(/\s+/g, "");
	$.get("http://" + ipAddr + "/diviceManageSYS/php/verifyBorrow.php", {id:id},
		function(data){
		window.location.href=url;
	});
}

//拒绝申请设备
function refuseBorrow(e){
	e = e || window.event;
	id = e.target.id;
	url = location.href;
	id = id.replace(/\s+/g, "");
	$.get("http://" + ipAddr + "/diviceManageSYS/php/refuseBorrow.php", {id:id},
		function(data){
		window.location.href=url;
	});
}

//确认归还
function verifyBack(e){
	e = e || window.event;
	id = e.target.id;
	url = location.href;
	id = id.replace(/\s+/g, "");
	$.get("http://" + ipAddr + "/diviceManageSYS/php/verifyBack.php", {id:id},
		function(data){
		window.location.href=url;
	});
}

//确认归还
function verifyBack2(e){
	e = e || window.event;
	id = e.target.id;
	id = id.substr(6);
	url = location.href;
	id = id.replace(/\s+/g, "");
	$.get("http://" + ipAddr + "/diviceManageSYS/php/verifyBack.php", {id:id},
		function(data){
		window.location.href=url;
	});
}

//跳转到设备修改页面
function toModifyDevPage(e){
	e = e || window.event;
	id = e.target.id;
	id = id.substr(6);
	var strcookie=document.cookie.split(";")[0].split("=")[1];
	var req = "&info=" + strcookie;
	window.location.href="http://" + ipAddr + "/diviceManageSYS/devManagemodify.php?id=" + id + req;
}

//跳转到用户信息修改页面
function toModifyUserPage(e){
	e = e || window.event;
	id = e.target.id;
	id = id.substr(6);
	var strcookie=document.cookie.split(";")[0].split("=")[1];
	var req = "&info=" + strcookie;
	window.location.href="http://" + ipAddr + "/diviceManageSYS/userManagemodify.php?id=" + id + req;
}

//删除一个用户
function delAnUser(e){
	con=confirm("确定删除该用户么?");
	if(con == true){
		e = e || window.event;
		id = e.target.id;
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "&info=" + strcookie;
		url = location.href;
		$.get("http://" + ipAddr + "/diviceManageSYS/php/delAnUser.php", {id:id},
			function(data){
			window.location.href=url;
		});
	}else{
	
	}
	
}

//修改用户信息
function modifyUserInfo(e){
	var id = $("#user_id").text();
	var loginname = $("#loginname").val();
	var username = $("#username").val();
	var password = $("#password").val();
	var role = $("#role").val();
	var session = $("#session").val();

	url = location.href;

	if(loginname == "" || username == "" || password == ""){
		alert("红色星号为必填项！")
	}else{
		$.get("http://" + ipAddr + "/diviceManageSYS/php/modifyUserInfo.php", {id:id,loginname:loginname,username:username,
			password:password,role:role,session:session},
		function(data){
			window.location.href=url;
			alert(data);
		});
	}
}

function modifyDevPageBack(e){
	history.back(-1);
}

//注册
function register(e){
	e = e || window.event;
	var loginname = $("#loginname").val();
	var username = $("#username").val();
	var password = $("#password").val();
	var repassword = $("#repassword").val();

	if(loginname == ""){
		alert("登录名不能为空！");
	}else if(username == ""){
		alert("用户名不能为空！");
	}else if(password == ""){
		alert("密码不能为空！");
	}else{
		if(password == repassword){
			$.get("http://" + ipAddr + "/diviceManageSYS/php/addUser.php",{loginname:loginname,username:username,password:password},
				function(data){
				alert("注册成功。\n请联系管理员，修改权限后即可登录！");
				window.location.href="http://" + ipAddr + "/diviceManageSYS/"
			});
		}else{
			alert("两次输入的密码不一致！");
		}
	}
}

//登录
function login(e){
	e = e || window.event;
	var loginname = $("#login").val();
	var password = $("#password").val();

	if(login == ""){
		alert("登录名不能为空！");
	}else if(password == ""){
		alert("密码不能为空！");
	}else{
		$.get("http://" + ipAddr + "/diviceManageSYS/php/toLogin.php",{loginname:loginname,password:password},
			function(data){
			if(data != "fail"){
				document.cookie="info="+data;
				//alert(document.cookie);
				var strcookie=document.cookie.split(";")[0].split("=")[1];
				var req = "?info=" + strcookie;
				window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAll.php" + req;
			}else{
				alert("用户名或密码错误！");
			}				
		});
	}
}

function jumpToIndex(){
	window.location.href="http://" + ipAddr + "/diviceManageSYS/";
}
