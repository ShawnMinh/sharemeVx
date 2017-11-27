var username = localStorage.getItem("username");
var token = localStorage.getItem("token");
var visiter = localStorage.getItem("visiter");
var power = 0;
if(!visiter) {
	alert("缓存损坏!马上跳转")
	location.href = "index.html";
}
$(function() {
	$(".inner").height(window.innerHeight);
	if(window.screen.width <= 700) {
		$(".zonestylephone").attr("href", "css/zone-phone.css");
		$(".userworks").prepend("<div class='cli'></div>");
		$(".cli").css("height", "50px");
		$(".cli").click(function() {
			console.log("aaa")
		})

		$(".cli").on("click", function() {
			this.index = !this.index;
			if(this.index) {
				$(".worksXXX").css("display", "block");
			} else {
				$(".worksXXX").css("display", "none");
			}
		})

	}

	//svg宽度
	$("embed").attr("height", $(window).height() + 100);

	//检测屏幕设置手机端网页
	//没登陆就跳转到首页
	if(!username) {
		location.href = "index.html";
	}
	if(username != visiter) {
		$(".set").hide();
		$(".tips").html("欢迎您来参观！");
	} else {
		$(".tips").html("主人回来啦！");
	}
	if(username != null) {
		$.ajax({
			type: "get",
			url: "php/UserInfo_Get.php",
			data: {
				username: username,
			},
			success: function(data) {
				var data = JSON.parse(data);
				console.log(data);
				if(data.code) {
					console.log(data.photo)
					$(".user_photo").prop("src", data.photo);
					$(".user_name").html(data.username);
					$(".user_age").html(data.age);
					$(".user_autograph").html(data.autograph);
					$(".user_constellation").html(data.constellation);
					$(".user_city").html(data.city);
					$(".tel").html(data.tel);
				} else {
					alert("系统错误");
				}

			}

		});
	}

})