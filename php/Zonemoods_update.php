<?php
	$username=$_POST['username'];
	$status=$_POST['status'];    // 如果是fb 就是发表内容   如果是  pl 就是评论
	//获取用户id
	require("GetuserId.php");
	$userID= getuserid($username);
	require("ConnectServe.php");
	//以上是选择打开数据库	
	if($status=="pl"){
		$moodID=$_POST['moodID'];
		$comment=$_POST['comment'];
		$comment_username=$_POST['comment_username'];
		$sql ="INSERT INTO `userzone_moods`(`userID`,`username`, `comment`,`moodID`,`comment_username`) VALUES ('".$userID."','".$username."','".$comment."','".$moodID."','".$comment_username."')"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			$arr["code"]="1";
			$arr["meassage"]="评论成功";
			$arr["State"]="success";
			echo json_encode($arr);
		}else{
			$arr["code"]="0";
			$arr["meassage"]="评论失败";
			$arr["State"]="fail";
			echo json_encode($arr);	
		}
	}
	//发表内容
	if($status=="fb"){
		$moods=$_POST['moods'];
		$time=$_POST['time'];
		$timeID=substr(time(),1,10);
		$sql ="INSERT INTO `userzone_moods`(`userID`,`username`, `mood`,`moodID`,`moodtime`) VALUES ('".$userID."','".$username."','".$moods."','".$timeID."','".$time."')"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			$arr["code"]="1";
			$arr["meassage"]="心情发表成功";
			$arr["State"]="success";
			echo json_encode($arr);
		}else{
			$arr["code"]="0";
			$arr["meassage"]="心情发表失败";
			$arr["State"]="fail";
			echo json_encode($arr);	
		}
	}

		
?>