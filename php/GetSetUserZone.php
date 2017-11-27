<?php
	//$token=$_GET["token"];
	$userID=$_POST["userID"];
	$username=$_POST['username'];
	$status=$_POST["status"];    //get代表获取   set代表 修改 
	require("UserZone.php");
	if($status=="get"){
		$arr=GetUserZone($userID);
		$arr["code"]="1";
		$arr["meassage"]="用户zone信息获取成功";
		$arr["State"]="success";
		echo  json_encode($arr);
	}
	if($status=="set"){
		$images=$_POST["imgurl"];
		$poem=$_POST["poem"];
		$saysay=$_POST["saysay"];
		$leaveword=$_POST["leaveword"];
		
		$imgdata = substr($images,strpos($images,",") + 1);
		$decodedData = base64_decode($imgdata);
		file_put_contents('../img/zone/userphotos/'.$username.time().'.png',$decodedData );
		
		if(SetUserZone($userID,$images,$poem,$saysay,$leaveword))
		{
			$arr["code"]="1";
			$arr["meassage"]="用户zone信息修改成功";
			$arr["State"]="success";
			echo json_encode($arr);
			
		}else{
			$arr["code"]="0";
			$arr["meassage"]="用户zone信息修改失败";
			$arr["State"]="fail";
			echo json_encode($arr);
			
		}
	}
?>