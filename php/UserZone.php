<?php
	//传入的 userid必须md5解密
	function GetUserZone($userID){
		$arr_img=array();
		$arr_poem=array();
		$arr_saysay=array();
		$arr_leaveword=array();
		$arr_img_count=array();
		$arr_poem_count=array();
		$arr_saysay_count=array();
		$arr_leaveword_count=array();
		$arr_allzone=array("userID"=>$userID);
		require("ConnectServe.php");
		//以上是选择打开数据库
		$sql ="SELECT * FROM userzone WHERE userID='".$userID."'"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
		while($row = mysql_fetch_array($result)){
				if($row["images"]){
					array_push($arr_img,$row["images"]);
				};
				if($row["poem"]){
					array_push($arr_poem,$row["poem"]);
				};
				if($row["saysay"]){
					array_push($arr_saysay,$row["saysay"]);
				};
				if($row["leaveword"]){
					array_push($arr_leaveword,$row["leaveword"]);
				}; 
				if($row["images_count"]){
					array_push($arr_img_count,$row["images_count"]);
				};
				if($row["poem_count"]){
					array_push($arr_poem_count,$row["poem_count"]);
				};
				if($row["saysay_count"]){
					array_push($arr_saysay_count,$row["saysay_count"]);
				};
				if($row["leaveword_count"]){
					array_push($arr_leaveword_count,$row["leaveword_count"]);
				};
			}
			$arr_allzone["images"]=$arr_img;
			$arr_allzone["poem"]=$arr_poem;
			$arr_allzone["saysay"]=$arr_saysay;
			$arr_allzone["leaveword"]=$arr_leaveword;
			$arr_allzone["images_count"]=$arr_img_count;
			$arr_allzone["poem_count"]=$arr_poem_count;
			$arr_allzone["saysay_count"]=$arr_saysay_count;
			$arr_allzone["leaveword_count"]=$arr_leaveword_count;
		}
		return $arr_allzone;
	}
	
	
	
	
	
	function SetUserZone($userID,$images="",$poem="",$saysay="",$leaveword=""){
		require("ConnectServe.php");
		//以上是选择打开数据库
		//赋予内容id
		$images_count=time();
		$poem_count=time();  //1505197267
		$saysay_count=time();
		$leaveword_count=time();
		$sql ="INSERT INTO `userzone`(`userID`, `images`, `images_count`, `poem`, `poem_count`, `saysay`, `saysay_count`, `leaveword`, `leaveword_count`) VALUES ('".$userID."','".$images."','".$images_count."','".$poem."','".$poem_count."','".$saysay."','".$saysay_count."','".$leaveword."','".$leaveword_count."')"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			return 1;
		}else{
			return 0;
		}
		
	}
?>