//查询设备和设备管理界面切换
var ipAddr = "127.0.0.1"

function divSwitch(e){
	e = e || window.event;
	if(e.target.id == "label_search"){
		window.location.href="http://" + ipAddr + "/diviceManageSYS/"
		//$("#label_search").css("color","white");
		//$("#label_manage").css("color","#dddddd");
		//$("#show_devices").css("display","block");
		//$("#device_manage").css("display","none");
	}else if(e.target.id == "label_manage")
	{
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAll.php" + req;
		//window.location.href="http://192.168.1.106/diviceManageSYS/devManage.php"
		//$("#label_search").css("color","#dddddd");
		//$("#label_manage").css("color","white");
		//$("#show_devices").css("display","none");
		//$("#device_manage").css("display","block");
	}
}

//弹出登陆界面或注册页面
function divLogin(e){
	e = e||window.event;
	if (e.target.id == "label_login"){
		window.location.href="http://" + ipAddr + "/diviceManageSYS/login.php"
		//$("#main").css("display","none");
		//$("#login_panel").css("display","block");
		//$("#registe_panel").css("display","none");
	}else if(e.target.id == "label_register"){
		window.location.href="http://" + ipAddr + "/diviceManageSYS/register.php"
		//$("#main").css("display","none");
		//$("#login_panel").css("display","none");
		//$("#registe_panel").css("display","block");		
	}
}

//关闭登陆界面
function closeLogin(e){
	window.location.href="http://" + ipAddr + "/diviceManageSYS/"
	//e = e||window.event;
	//$("#main").css("display","block");
	//$("#login_panel").css("display","none");
	//$("#registe_panel").css("display","none");
}

//关闭注册界面
function closeRegister(e){
	window.location.href="http://" + ipAddr + "/diviceManageSYS/"
	//e = e||window.event;
	//$("#main").css("display","block");
	//$("#login_panel").css("display","none");
	//$("#registe_panel").css("display","none");
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

	if(device_name == "" || device_mode == ""){
		alert("【设备名】和【型号】不能为空！")
	}else{
		$.get("http://" + ipAddr + "/diviceManageSYS/php/addDevice.php", {device_name:device_name,device_mode:device_mode,pixel:pixel,ram:ram,cpu_hz:cpu_hz,screen_size:screen_size,color:color,for_camara:for_camara,back_camara:back_camara,sim_number:sim_number,sdcard:sdcard,platform:platform},
		function(data){
			alert(data);
		});
	}
	
//	alert(device_name + device_mode + pixel + ram + cpu_hz + screen_size + color + for_camara + back_camara + sim_number + sdcard);
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
		//$("#div_add_dev").css("display","block");
		//$("#div_manage_dev").css("display","none");
		//$("#div_search_dev").css("display","none");
	}else if(e.target.id == "div_manage_but"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAll.php" + req;
		//window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAll.php"
		//$("#div_add_dev").css("display","none");
		//$("#div_manage_dev").css("display","block");
		//$("#div_search_dev").css("display","none");
	}else if(e.target.id == "div_search_but"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAll.php" + req;
		//window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAll.php"
		//$("#div_add_dev").css("display","none");
		//$("#div_manage_dev").css("display","none");
		//$("#div_search_dev").css("display","block");
	}
}

function searchDevice(e){
	e = e || window.event;
	if(e.target.id == "ctrl_div2_all"){
		var strcookie=document.cookie.split(";")[0].split("=")[1];
		var req = "?info=" + strcookie;
		window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAll.php" + req;
		//window.location.href="http://" + ipAddr + "/diviceManageSYS/devManageSearchAll.php"
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
			//window.location.href="http://" + ipAddr + "/diviceManageSYS/";
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
		//window.location.href="http://" + ipAddr + "/diviceManageSYS/"
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
