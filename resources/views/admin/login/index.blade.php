<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>后台登录</title>
    <meta name="author" content="DeathGhost" />
    <link rel="stylesheet" type="text/css" href="/indexlogin/style.css" />
    <style>
        body{height:100%;background:#16a085;overflow:hidden;}
        canvas{z-index:-1;position:absolute;}
    </style>
    <script src="/indexlogin/jquery.js"></script>
    <script src="/indexlogin/verificationNumbers.js"></script>
    <script src="/indexlogin/Particleground.js"></script>
    <script>
        $(document).ready(function() {
          //粒子背景特效
          $('body').particleground({
            dotColor: '#5cbdaa',
            lineColor: '#5cbdaa'
          });
          //验证码
          createCode();
          //测试提交，对接程序删除即可
          $(".submit_btn").click(function(){
        	  location.href="index.blade.php";
        	  });
        });
    </script>
</head>
<body>
    <dl class="admin_login">
    <dt>
        <div><span style="color:green;">{{session('error')}}</span></div><br><br>

        <strong>唯品会后台管理系统</strong>
        <em>Management System</em>
    </dt>
    <form action="/admin/login/dologin" method="post">
        {{ csrf_field() }}
        <dd class="user_icon">
            <input type="text" name="name" placeholder="账号:" value=""    class="login_txtbx"/>
        </dd>
        <dd class="pwd_icon">
            <input type="password" name="pw" placeholder="密码:" value="" class="login_txtbx"/>
        </dd>
        <dd class="val_icon">
            <div id="gai" style='width:195px;float:left'>
            <input type="text" name='code' id="J_codetext" placeholder="验证码" maxlength="5" class="login_txtbx">  </div>
            <div > <img style='width:100px;float:right' src="/code" alt="" title="点击刷新" onclick="this.src=this.src+'?a=1'"></div>

        </dd>
        <dd>
            <input type="submit" value="立即登陆" class="submit_btn"/>
        </dd>
    </form>
    <dd>
        <p>© 2015-2016 DeathGhost 版权所有</p>
        <p>陕B2-20080224-1</p>
    </dd>
</dl>
</body>
</html>
