<?php	
	$username=$_POST['username'];
	$photoslist = json_decode(stripslashes($_POST['photoslist']));
	require("GetuserId.php");
	$userID= getuserid($username);
	require("ConnectServe.php");
	//以上是选择打开数据库
	foreach($photoslist as $imgurl){
		//删除文件
		$imgurl_real="../".$imgurl;
	 	unlink($imgurl_real);
		$sql ="DELETE FROM `userzone_photos` WHERE `images`='".$imgurl."'and  `userID`='".$userID."'"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			$arr_Deletephoto["code"]="1";
			$arr_Deletephoto["message"]="删除照片成功 ";
		}else{
			$arr_Deletephoto["code"]="0";
			$arr_Deletephoto["message"]="删除照片失败 ";
		}
	}
	echo json_encode($arr_Deletephoto);
	

?>