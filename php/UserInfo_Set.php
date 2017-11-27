<?php
	$username=$_POST["username"];
	$token=$_POST["token"];
	$age= $_POST["age"];
	$city= $_POST["city"];
	$constellation= $_POST["constellation"];
	$autograph= $_POST["autograph"];
	$tele= $_POST["tele"];
	$photourl=$_POST["photourl"];
	//验证身份 ,成功1  失败0
	require("Authentication.php");
	require("topinyin.php");
	if(	Authentication($username,$token)){
		//用户头像存在服务器
		$usernametopinyin=pinyin($username);
		$imgdata = substr($photourl,strpos($photourl,",") + 1);
		$decodedData = base64_decode($imgdata);
		$imgrealurl='img/zone/userhead/'.$usernametopinyin.time().'.png';
		$imgurr='../'.$imgrealurl;
		file_put_contents($imgurr,$decodedData );
		
		require("ConnectServe.php");
		//以上是选择打开数据库
		$sql ="UPDATE `user` SET `photo`='$imgrealurl',`age`='$age',`autograph`='$autograph',`constellation`='$constellation',`city`='$city',`tel`='$tele' WHERE `username`='$username'"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			echo json_encode(array('code'=>'1','state'=>'success','message'=>'获取成功'));
		}else{
			echo json_encode(array('code'=>'0','state'=>'fail','message'=>'更新失败'));
		}
	}else{
		echo json_encode(array('code'=>'0','state'=>'fail','message'=>'口令不匹配'));
	}

?>