<?php
	$username=$_GET['username'];
	require("GetuserId.php");
	$userID= getuserid($username);
	$array_lw_yes=array();
	$array_lw=array();
	$array_lwm=array();
	require("ConnectServe.php");
	//以上是选择打开数据库
	$sql ="SELECT * FROM `userzone_leaveword` WHERE  userID=".$userID; //SQL语句
	$result = mysql_query($sql); //查询
	if($result){
		while($row = mysql_fetch_array($result)){
			if($row["userID"]){
				$array_lw_yes["userID"]=$row["userID"];
			};
			if($row["username"]){
				$array_lw_yes["username"]=$row["username"];
			};
			if($row["word"]){
				$array_lw_yes["word"]=$row["word"];
			};
			if($row["wordid"]){
				$array_lw_yes["wordid"]=$row["wordid"];
			};
			if($row["visiter"]!=null){
				$array_lw_yes["visiter"]=$row["visiter"];
			};
			if($row["nowtime"]!=null){
				$array_lw_yes["nowtime"]=$row["nowtime"];
			};
			array_push($array_lwm,$array_lw_yes);
		}
	}
	$array_lw["data"]=$array_lwm;
	$array_lw["counter"]=count($array_lw);
	$array_lw["code"]="success";
	$array_lw["message"]="用户留言获取成功";
	echo json_encode($array_lw);
?>