<?php
	$username=$_POST['username'];
	require("GetuserId.php");
	$userID= getuserid($username);
	$array_moods_yes=array();
	$array_moods=array();
	require("ConnectServe.php");
	//以上是选择打开数据库
	$sql ="SELECT * FROM `userzone_moods` WHERE userID='".$userID."' GROUP BY `moodID`"; //SQL语句
	$result = mysql_query($sql); //查询
	if($result){
		while($row = mysql_fetch_array($result)){
			if($row["userID"]){
				$array_moods_yes["userID"]=$row["userID"];
			};
			if($row["username"]){
				$array_moods_yes["username"]=$row["username"];
			};
			if($row["mood"]){
				$array_moods_yes["mood"]=$row["mood"];
			};
			if($row["moodID"]){
				$array_moods_yes["moodID"]=$row["moodID"];
			};
			if($row["loud"]!=null){
				$array_moods_yes["loud"]=$row["loud"];
			};
			if($row["moodtime"]!=null){
				$array_moods_yes["moodtime"]=$row["moodtime"];
			};
			if($row["moodtime"]!=null){
				$array_moods_yes["alone"]=$row["alone"];
			};
			if($row["moodtime"]!=null){
				$array_moods_yes["cancomment"]=$row["cancomment"];
			};
			array_push($array_moods,$array_moods_yes);
		}
	}
	
	for($i=0;$i<count($array_moods);$i++){
		$moodid=$array_moods[$i]['moodID'];
		$sql ="SELECT * FROM `userzone_moods` WHERE userID='".$userID."' and moodID='".$moodid."' "; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			while($row = mysql_fetch_array($result)){
				$array_comments=array();
				if($row["comment"]){
					array_push($array_comments,$row["comment"]);
				};
				if($row["comment_username"]){
					array_push($array_comments,$row["comment_username"]);
				};
			}
		}
		$array_moods[$i]["comment"]=$array_comments;
	}
	$array_moods["counter"]=count($array_moods);
	$array_moods["code"]="success";
	$array_moods["message"]="心情获取成功";
	echo json_encode($array_moods);
?>