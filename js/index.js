//查询设备和设备管理界面切换
function divSwitch(e){
	e = e || window.event;
	if(e.target.id == "label_search"){
		$("#label_search").css("color","white");
		$("#label_manage").css("color","#dddddd");
		$("#show_devices").css("display","block");
		$("#device_manage").css("display","none");
		console.log("111");
	}else if(e.target.id == "label_manage")
	{
		$("#label_search").css("color","#dddddd");
		$("#label_manage").css("color","white");
		$("#show_devices").css("display","none");
		$("#device_manage").css("display","block");
		console.log("222");
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
	var device_name = $("device_name").val();
	var device_mode = $("device_mode").val();
	var pixel = $("pixel").val();
	var ram = $("ram").val();
	var cpu_hz = $("cpu_hz").val();
	var screen_size = $("screen_size").val();
	var color = $("color").val();
	var for_camara = $("for_camara").val();
	var back_camara = $("back_camara").val();
	var sim_number = $("sim_number").val();
	var sdcard = $("sdcard").val();

	alert(device_name + device_mode + pixel);
}