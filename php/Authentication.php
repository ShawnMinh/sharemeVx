<?php

	function Authentication($username,$token){
		require("ConnectServe.php");
		//以上是选择打开数据库
		$sql ="SELECT * FROM user WHERE username='".$username."'"; //SQL语句
		$result = mysql_query($sql); //查询
		if($result){
			$row = mysql_fetch_array($result);
			if(md5($row["userID"])==$token)
			{
				return 1;
			}else{
				return 0;
			}
		}

	}
?>