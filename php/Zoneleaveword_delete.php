<?php	
	$username=$_GET['username'];
	$wordid=$_GET['wordid'];
	require("GetuserId.php");
	$userID= getuserid($username);
	require("ConnectServe.php");
	//以上是选择打开数据库
	//删除文件
		$sql ="DELETE FROM `userzone_leaveword` WHERE `wordid`='".$wordid."'and `userID`='".$userID."'"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			$arr_Deletephoto["code"]="1";
			$arr_Deletephoto["message"]="删除留言成功 ";
		}else{
			$arr_Deletephoto["code"]="0";
			$arr_Deletephoto["message"]="删除留言失败 ";
		}
		echo json_encode($arr_Deletephoto);
	
	

	

?>