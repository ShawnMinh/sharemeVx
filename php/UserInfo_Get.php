<?php
	$username=$_GET["username"];
	require("ConnectServe.php");
	//以上是选择打开数据库
	$sql ="SELECT * FROM user WHERE username='".$username."'"; //SQL语句
	$result = mysql_query($sql); //查询
	if($result){
		$row = mysql_fetch_array($result);
		echo json_encode(array('code'=>'1','state'=>'success','message'=>'获取成功',"username"=>$row["username"],"power"=>$row["power"],"tel"=>$row["tel"],"age"=>$row["age"],"autograph"=>$row["autograph"],"constellation"=>$row["constellation"],"city"=>$row["city"],"userid"=>$row["userID"],"photo"=>$row["photo"]));
	}else{
		echo json_encode(array('code'=>'0','state'=>'fail','message'=>'获取失败'));
	}

?>