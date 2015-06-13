<?php /* Smarty version 2.6.28, created on 2014-11-24 09:30:59
         compiled from index.html */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>登录界面</title>
	<link rel="stylesheet" href="public/template/css/oms/super.css"/>
	<script type="text/javascript" src="public/template/js/jquery-1.8.3.js" ></script>
	<script type="text/javascript" src="public/template/js/oms/main.js" ></script>
</head>
<body id="login_page">
    <div class="login_main">
        <div class="logo">
            <img src="public/template/img/logo.jpg">
        </div>
        <div class="main">
            <h3>管理登录</h3>
            <hr>
            <form autocomplete="off" action="?r=oms/User/Login" method="post">
                <div class="select">
                    <label><input type="radio" name="role" value="staff" checked>员工</label>
                    <label><input type="radio" name="role" value="boss">老板</label>
                </div>
                <div class="inp-row"><span class="lab-email lab"></span><input type="text" name="email" value="billgate@outlook.com" placeholder="Email"></div>
                <div class="inp-row"><span class="lab-pass lab"></span><input type="password" name="password" value="123456" placeholder="Password"></div>
                <div class="btn">
                    <div class="sub"><input type="submit" value="登录"><input type="button" value="注册"></div>
                </div>
                <h4>版本：v1.0</h4>
                <h4>版权：广州闻商信息科技有限公司</h4>
            </form>
        </div>
    </div>
    <script>
    <?php echo '
    	$(function(){
      			$("form").on("submit", function() {
				var $email = $("input[name=email]").parent().css("border-color", "#ddd").end();
				var $pass = $("input[name=password]").parent().css("border-color", "#ddd").end();
				var str_role = $("input[name=role]:checked").val();

				if (str_role == "boss") {
					$("form").attr("action", "?r=oms/User/BossLogin");
				} else {
					$("form").attr("action", "?r=oms/User/Login");
				}

				if (!$email.val()) {
					Fun_hint($email);
				} else if (!verifyEmail($email.val())) {
					Fun_hint($email);
					alert("请输入正确的邮箱格式...");
				} else if (!$pass.val()) {
					Fun_hint($pass);
				} else {
					return true;
				}
				return false;
			});

			$("input[type=button]").on("click", function(e) {
				location = "?r=oms/User/OwnResiger";
			});

			$("body").css({
				background: "#4A7AA2"
			});
    		
    	})
    	'; ?>

    </script>
</body>
</html>