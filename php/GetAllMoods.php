<?php
	$array_moods_yes=array();
	$array_moods=array();
	$array_mood=array();
	require("ConnectServe.php");
	//以上是选择打开数据库
	$sql ="SELECT * FROM `userzone_moods` WHERE 1"; //SQL语句
	$result = mysql_query($sql); //查询
	if($result){
		while($row = mysql_fetch_array($result)){
			$array_moods_yes["mood"]=$row["mood"];
			array_push($array_mood,$array_moods_yes);
		}
	}
	$array_moods["data"]=$array_mood;
	$array_moods["code"]="0";
	$array_moods["message"]="心情获取成功";
	echo json_encode($array_moods);
?>