<?php
	$saytowho=$_GET["saytowho"];
	$message=$_GET["message"];
	$time=$_GET["time"];
	require("ConnectServe.php");
	//插入信息
	$sql="INSERT INTO `commentmessage`(`userID`, `message`, `time`,`saytowho`) VALUES (1,'$message','$time','$saytowho')";
	$result=mysql_query($sql);
	if($result){
		echo 1;
	}else{
		echo 0;
	}
?>