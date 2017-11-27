<?php
	//请求连接服务器保存的表的信息
	$username=$_POST["username"];
	$password=$_POST["password"];
	$power=$_POST["power"];
	$status=$_POST["status"];
	if($status == "login"){
		require("login.php");
		$issuccess=userlogin($username,$password,$power);
	}
	if($status == "register"){
		require("register.php");
		$issuccess=userreg($username,$password,$power);
	}
	
	//验证用户名密码是否符合规范 
	if(is_username($username)&&isPWD($password)){
		if($issuccess){
			//获得token
			require("GetuserId.php");
			$userid=getuserid($username);
			$userid=md5($userid);
			echo json_encode(array('code'=>'1','state'=>'success','message'=>'登录/注册成功','token'=>$userid));
		}else{
			echo json_encode(array('code'=>'0','state'=>'fail','message'=>'用户名重复或用户名密码错误'));
		}
	}else{
		echo json_encode(array('code'=>'0','state'=>'fail','message'=>'用户名或密码验证错误'));
	}	
		
		
	//用户名验证 
	function is_username($username) 
	{ 
	$strlen = strlen($username); 
	if (!preg_match("/^[a-zA-Z0-9_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]+$/", 
	$username)) //开源软件:phpfensi.com 
	{ 
	return false; 
	} elseif (20 < $strlen || $strlen < 2) 
	{ 
	return false; 
	} 
	return true; 
	}
	//密码验证
	function isPWD($value,$minLen=5,$maxLen=16){ 
	$match='/^[\\~!@#$%^&*()-_=+|{}\[\],.?\/:;\'\"\d\w]{'.$minLen.','.$maxLen.'}$/'; 
	$v = trim($value); 
	if(empty($v)) 
	return false; 
	return preg_match($match,$v); 
	}



?>