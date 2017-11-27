<?php	
	$username=$_POST['username'];
	$moodID=$_POST['moodID'];
	$status=$_POST['status'];   //de就是删除   lo就是点赞   cc就是关闭评论  ms就是心情察看状态 

	require("GetuserId.php");
	$userID= getuserid($username);
	require("ConnectServe.php");
	//以上是选择打开数据库
	//关闭评论
	if($status=='cc'){
		$closeComm=$_POST['closeComm'];
		$sql ="UPDATE `userzone_moods` SET `cancomment`='".$closeComm."' where `userID`='".$userID."' AND `moodID`='".$moodID."'"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			$arr_Deletephoto["code"]="1";
			$arr_Deletephoto["message"]="评论权限操作成功 ";
			if($closeComm==0){
				$arr_Deletephoto["当前状态"]="开启评论";	
			}else{
				$arr_Deletephoto["当前状态"]="关闭评论";	
			}
			
		}else{
			$arr_Deletephoto["code"]="0";
			$arr_Deletephoto["message"]="评论权限操作失败 ";
		}
		echo json_encode($arr_Deletephoto);
	}
//	//心情察看状态
	if($status=='ms'){
		$alone=$_POST['alone'];
		$sql ="UPDATE `userzone_moods` SET `alone`='".$alone."' where `userID`='".$userID."' AND `moodID`='".$moodID."'"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			$arr_Deletephoto["code"]="1";
			$arr_Deletephoto["message"]="心情状态改变成功 ";
			$arr_Deletephoto["当前状态"]="";
			if($alone==0){
				$arr_Deletephoto["当前状态"]="公开";	
			}else{
				$arr_Deletephoto["当前状态"]="私密";	
			}
		}else{
			$arr_Deletephoto["code"]="0";
			$arr_Deletephoto["message"]="心情状态改变失败 ";
		}
		echo json_encode($arr_Deletephoto);
	}


	//点赞 
	if($status=='lo'){
		$loud=$_POST['loud'];
		$sql ="UPDATE `userzone_moods` SET `loud`='".$loud."' where `userID`='".$userID."' AND `moodID`='".$moodID."'"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			$arr_Deletephoto["code"]="1";
			$arr_Deletephoto["message"]="点赞成功 ";
			$arr_Deletephoto["当前赞"]=$loud;
		}else{
			$arr_Deletephoto["code"]="0";
			$arr_Deletephoto["message"]="点赞失败 ";
		}
		echo json_encode($arr_Deletephoto);
	}
	
	
	//删除文件
	if($status=='de'){
		$sql ="DELETE FROM `userzone_moods` WHERE `moodID`='".$moodID."'and  `userID`='".$userID."'"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			$arr_Deletephoto["code"]="1";
			$arr_Deletephoto["message"]="删除心情成功 ";
		}else{
			$arr_Deletephoto["code"]="0";
			$arr_Deletephoto["message"]="删除心情失败 ";
		}
		echo json_encode($arr_Deletephoto);
	}
	
	

	

?>