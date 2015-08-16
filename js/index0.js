//查询设备和设备管理界面切换
var ipAddr = "192.168.1.106"

function divSwitch(e){
	e = e || window.event;
	if(e.target.id == "label_search"){
		window.location.href="http://192.168.1.106/diviceManageSYS/"
		//$("#label_search").css("color","white");
		//$("#label_manage").css("color","#dddddd");
		//$("#show_devices").css("display","block");
		//$("#device_manage").css("display","none");
	}else if(e.target.id == "label_manage")
	{
		window.location.href="http://192.168.1.106/diviceManageSYS/devManage.php"
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
		$("#main").css("display","none");
		$("#login_panel").css("display","block");
		$("#registe_panel").css("display","none");
	}else if(e.target.id == "label_register"){
		$("#main").css("display","none");
		$("#login_panel").css("display","none");
		$("#registe_panel").css("display","block");		
	}
}

//关闭登陆界面
function closeLogin(e){
	e = e||window.event;
	$("#main").css("display","block");
	$("#login_panel").css("display","none");
	$("#registe_panel").css("display","none");
}

//关闭注册界面
function closeRegister(e){
	e = e||window.event;
	$("#main").css("display","block");
	$("#login_panel").css("display","none");
	$("#registe_panel").css("display","none");
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

	if(device_name == "" || device_mode == ""){
		alert("【设备名】和【型号】不能为空！")
	}else{
		$.get("http://" + "192.168.1.106" + "/diviceManageSYS/php/addDevice.php", {device_name:device_name,device_mode:device_mode,pixel:pixel,ram:ram,cpu_hz:cpu_hz,screen_size:screen_size,color:color,for_camara:for_camara,back_camara:back_camara,sim_number:sim_number,sdcard:sdcard},
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
}

//设备管理界面切换
function manDevSwitch(e){
	e = e || window.event;
	if(e.target.id == "div_add_but"){
		$("#div_add_dev").css("display","block");
		$("#div_manage_dev").css("display","none");
		$("#div_search_dev").css("display","none");
	}else if(e.target.id == "div_manage_but"){
		$("#div_add_dev").css("display","none");
		$("#div_manage_dev").css("display","block");
		$("#div_search_dev").css("display","none");
	}else if(e.target.id == "div_search_but"){
		window.location.href="http://192.168.1.106/diviceManageSYS/devManageSearchAll.php"
		//$("#div_add_dev").css("display","none");
		//$("#div_manage_dev").css("display","none");
		//$("#div_search_dev").css("display","block");
	}

}