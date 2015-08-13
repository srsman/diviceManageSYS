function divSwitch(e){
	e = e||window.event;
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

function closeLogin(e){
	e = e||window.event;
	$("#main").css("display","block");
	$("#login_panel").css("display","none");
	$("#registe_panel").css("display","none");
}

function closeRegister(e){
	e = e||window.event;
	$("#main").css("display","block");
	$("#login_panel").css("display","none");
	$("#registe_panel").css("display","none");
}