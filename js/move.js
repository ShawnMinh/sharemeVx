
//s 上传图片
//商品图片上传、移动
var webimg = []; //存储图片链接
var fileM = document.getElementById("file");
$("#file").on("change", function() {
	//获取文件对象,files是文件选取控件的属性，存储的是文件选取控件的文件对象，类型是一个数组类型
	var fileObj = fileM.files[0];
	//创建FormData对象,formData用来存储表单的数据，表单的数据是以键值对的形式存储
	var formData = new FormData();
	formData.append("file", fileObj);
	//创建ajax对象
	var ajax = new XMLHttpRequest();
	ajax.open("POST", "../php/move_file.php");
	ajax.send(formData);
	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4) {
			if(ajax.status >= 200 && ajax.status < 300 || ajax.status == 304) {
				console.log(ajax.responseText);
				var obj = JSON.parse(ajax.responseText);
				console.log(obj);
				
				var img = $('<img src="' + obj.msg + '" alt="" />');
				$(".show_icon").append(img); //在id为con的标签内添加图片
				webimg.push(obj.msg);

				//表单数据插入数据库******************************************************
				var sub = document.getElementById("btn");
				console.log(webimg);
				sub.onclick = function() {
						$.ajax({
							type: "get",
							url: "../php/userphoto.php",
							data: {
								"uid": uid,
								"handle": "insert",
								"wid": wid,
								"photo": obj.msg
							},
							success: function(res) {
								console.log(res);
								//								console.log()
								if(res.photoinfo.err == 0) {
									//									var img1 = $('<img src="' + obj.msg + '" alt="" />');
									//									$(".albums-tab-thumb").append(img1);
									//追加到后面
									var box = document.createElement("div");
									box.className = "box_img";
									var img = document.createElement("img");
									var del_img = document.createElement("span");
									del_img.innerText = "删除";
									del_img.className = "del_img";
									img.src = obj.msg;
									box.appendChild(img);
									box.appendChild(del_img);
									$(".albums-tab-thumb").append(box);
//									if(uid == web_uid) {
//										del_img.style.display = "inline-block";
//									} else {
//										del_img.style.display = "none";
//									}
									//追加到后面
									var showIcon = document.getElementsByClassName("show_icon")[0];
									showIcon.innerHTML = "";
									alert("照片上传成功");
								}
							},
							error: function(res) {
								console.log("cw" + res);
							}
						});
					}
					//e 上传图片
			}
		}
	}
});

//
