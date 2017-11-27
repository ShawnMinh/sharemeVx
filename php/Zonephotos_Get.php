<?php
	$username=$_POST['username'];
	//保存pic到本地
	require("GetuserId.php");
	$userID= getuserid($username);
	$arr_img=array();
	require("ConnectServe.php");
	//以上是选择打开数据库
	$sql ="SELECT * FROM `userzone_photos` WHERE userID='".$userID."'"; //SQL语句
	$result = mysql_query($sql); //查询
	if($result){
		while($row = mysql_fetch_array($result)){
			if($row["images"]){
				array_push($arr_img,$row["images"]);
			};
		}
	}
	$arr_Getphoto=array("code"=>1);
	$arr_Getphoto["photos"]=$arr_img;
	echo json_encode($arr_Getphoto);
?>