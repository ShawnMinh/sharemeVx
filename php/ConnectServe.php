<?php
	$mysql_server_name='localhost'; //改成自己的mysql数据库服务器
	$mysql_username='root'; //改成自己的mysql数据库用户名
	$mysql_password='7320azure+'; //改成自己的mysql数据库密码
	$mysql_database='shareme'; //改成自己的mysql数据库名
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password); //连接数据库
	mysql_query("set names utf8"); //数据库输出编码 应该与你的数据库编码保持一致.UTF-8 国际标准编码.
	mysql_select_db($mysql_database,$conn); //打开数据库
	//require("db_config.php");  调用此页
?>