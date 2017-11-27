<?php
	function userreg($username,$password,$power){
	require("ConnectServe.php");
	$sql="SELECT * FROM `user` WHERE  username='$username'";
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);
	if($row["username"]!=null){  //防止重复注册
		return 0;
	}
	
	//以上是选择打开数据库
	$userid=time();  //获取当前时间给用户 ，让他得到唯一id
	$sql="INSERT INTO `user`(`username`, `password`, `power`,`userID`) VALUES ('$username','$password','$power','$userid')";
	$result= mysql_query($sql);
	if($result){
		return 1;
	}else{
		return 0;
	}
	mysql_close($conn);
	}
?>