$(".gotologin").click(function(){
				$(".login").show();
				$(".register").hide();
			})
			$(".gotoreg").click(function(){
				$(".login").hide();
				$(".register").show();
})


document.documentElement.style.overflow = 'hidden';
			$(function() {
				var px = 0;
				//以下是注册点击后事件 
				$(".btn_reg").click(function() {
					if($(".reg_password").val().length<5 || $(".reg_username").val().lenght<2){
						alert("密码长度必须大于5，用户名长度必须大于2");
						return;
					}
					if($(".reg_password").val() == $(".reg_password2").val()) {

						$.ajax({
							type: "post",
							url: "php/Checkuser.php",
							datatype: "json",
							data: {
								"username": $(".reg_username").val(),
								"password": $(".reg_password").val(),
								"power": 0,
								"status": "register",
							},
							success: function(data) {
								var data = JSON.parse(data);
								console.log(data);
								if(data.code == 1) {
									$(".login").show();
									$(".username").val($(".reg_username").val());
									$(".password").val($(".reg_password").val());
									$(".register").hide();
								} else {
									alert("用户已注册");
									$(".reg_username").parent().css("background-color", "red");
									$(".reg_password2").parent().css("background-color", "red");
									$(".reg_password").parent().css("background-color", "red");
								}
							}
						});
					} else {
						alert("两次 密码 不一致 ");
						$(".reg_password").parent().css("background-color", "red");
						$(".reg_password2").parent().css("background-color", "red");
					}
				})
			})