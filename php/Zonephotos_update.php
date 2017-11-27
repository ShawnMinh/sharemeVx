<?php
	$imgurl=$_POST['imgurl'];
	$username=$_POST['username'];
	//保存pic到本地
	$imgdata = substr($imgurl,strpos($imgurl,",") + 1);
	$decodedData = base64_decode($imgdata);
	require("topinyin.php");
	$imgrealurl='img/zone/userphotos/'.pinyin($username).'-'.time().'.png';
	$imgurr='../'.$imgrealurl;
	file_put_contents($imgurr,$decodedData );
	//获取用户id
	require("GetuserId.php");
	$userID= getuserid($username);
	require("ConnectServe.php");
	//以上是选择打开数据库
	$sql ="INSERT INTO `userzone_photos`(`userID`,`username`, `images`) VALUES ('".$userID."','".$username."','".$imgrealurl."')"; //SQL语句
	$result = mysql_query($sql); //查询
	if($result){
		$arr["code"]="1";
		$arr["meassage"]="皂片上传成功";
		$arr["State"]="success";
		$arr["images"]=$imgrealurl;
		echo json_encode($arr);
	}else{
		$arr["code"]="0";
		$arr["meassage"]="皂片上传失败";
		$arr["State"]="fail";
		echo json_encode($arr);
			
	}
?>