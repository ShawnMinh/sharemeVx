<?php
	$username=$_GET['username'];
	//获取用户id
	require("GetuserId.php");
	$userID= getuserid($username);
	require("ConnectServe.php");
	//以上是选择打开数据库	
	//发表内容
		$word=$_GET['word'];
		$nowtime=$_GET['nowtime'];
		$visiter=$_GET['visiter'];
		$arr["word"]=$word;
		$arr["nowtime"]=$nowtime;
		$arr["visiter"]=$visiter;
		$sql ="INSERT INTO `userzone_leaveword`(`userID`,`username`, `word`,`nowtime`,`visiter`) VALUES ('".$userID."','".$username."','".$word."','".$nowtime."','".$visiter."')"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			$arr["code"]="1";
			$arr["meassage"]="留言成功";
			$arr["State"]="success";
			echo json_encode($arr);
		}else{
			$arr["code"]="0";
			$arr["meassage"]="留言失败";
			$arr["State"]="fail";
			echo json_encode($arr);	
		}

		
?>