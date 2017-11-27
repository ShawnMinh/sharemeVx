<?php
	require("ConnectServe.php");
	$arr=array("code"=>"1");
	$arr_mess=array();
	$arr_towho=array();
	$sql="SELECT * FROM  `commentmessage`";
	$result=mysql_query($sql);
	while($row = mysql_fetch_array($result)){
		array_push($arr_mess,$row["message"]);
		array_push($arr_towho,$row["saytowho"]);
	}
	$arr["mes"]=$arr_mess;
	$arr["who"]=$arr_towho;
	echo json_encode($arr);
	//删除信息
	function delete($message){
		$sql="DELETE FROM `commentmessage` WHERE message='".$message."'";
		$result=mysql_query($sql);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

?>