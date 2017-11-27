<?php
	function userlogin($username,$password,$power){
	require("ConnectServe.php");
//	//以上是选择打开数据库
	$sql ="SELECT * FROM user"; //SQL语句
	$result = mysql_query($sql); //查询
	if($result){
		while($row = mysql_fetch_array($result)){
		 	if($row["username"]==$username&&$row["password"]==$password){
		 		mysql_close($conn);
		 		return 1;
		 	}
		}
		mysql_close($conn);
		 return 0;
		}else{
			mysql_close($conn);
		 	return 0;
		}	
	}
?>