<?php
include_once  'userManage.php';
//include_once  'devManage.php';

$arrs  = get_included_files();
$i=0;
while($i < 3){
	if(strstr($arrs[$i],"config.php"))
	{
		return "yes";
	}
	$i++;
}
?>
