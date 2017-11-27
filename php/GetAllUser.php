<?php
	require("ConnectServe.php");
	$arrrrr=array();
	//以上是选择打开数据库
	$sql ="SELECT * FROM user WHERE 1"; //SQL语句
	$result = mysql_query($sql); //查询
	if($result){
		$arry=array('code'=>'1','state'=>'success','message'=>'获取成功');
		$i=0;
		while($row = mysql_fetch_array($result)){
			$arrx["username"]=$row["username"];
			$arrx["power"]=$row["power"];
			$arrx["photo"]=$row["photo"];
			array_push($arrrrr,$arrx);
		}
		$arry["data"]=$arrrrr;
		echo json_encode($arry);
	}else{
		echo json_encode(array('code'=>'0','state'=>'fail','message'=>'获取失败'));
	}

?>