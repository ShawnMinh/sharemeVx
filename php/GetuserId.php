<?php
function getuserid($username){
	require("ConnectServe.php");
	//以上是选择打开数据库
	$sql ="SELECT * FROM user WHERE username='".$username."'"; //SQL语句
	$result = mysql_query($sql); //查询
	if($result){
		$row = mysql_fetch_array($result);
		return $row["userID"];
	}
	}
?>