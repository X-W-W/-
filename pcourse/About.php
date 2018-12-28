<?php
header("Content-type:text/html;charset=utf-8"); 

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = new mysqli("localhost", "students", "password","course_site");
mysqli_query($connection,'set names utf8');
$errors="";

session_start();// Starting Session
// Storing Session
if(isset($_SESSION['user'])){
$login_session =$_SESSION['user'];
}
?>
<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>关于我们 - 淘课</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/round-about.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="course.php">淘课</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">首页</a>
            </li>
<?php 
	if(!isset($login_session)){
		$connection->close(); // Closing Connection
?>
            <li class="nav-item">
            	<a class="nav-link" data-toggle="modal" data-target="#login" href="">登录</a>
            </li>
<?php
	}else{
?>					
			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $login_session; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">个人信息</a>
          <a class="dropdown-item" href="#">消息</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">退出</a>
        </div>
      </li>
<?php			
	}
?>
            <li class="nav-item active">
              <a class="nav-link" href="About.php">关于</a>
              <span class="sr-only">(current)</span>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Introduction Row -->
      <h1 class="my-4">我们
        <small>很高兴遇见您！</small>
      </h1>
      <p>淘课网致力于为每一位学生提供优质课程查询服务，在淘课网，您可以选择心仪的老师，您可以查看课程所需教材清单及电子资源，您还可以买卖教辅资料，发表您的课程评价！</p>

      <!-- Team Members Row -->
      <div class="row">
        <div class="col-lg-12">
          <h2 class="my-4">我们的团队</h2>
        </div>
        
        <div class="col-lg-6 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" width="200px" height="200px" src="img/pw.jpg" alt="">
          <h3>彭巍
            <small>计软</small>
          </h3>
          <p>负责网站设计与构建，提供技术支持</p>
        </div>

        <div class="col-lg-6 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" width="200px" height="200px" src="img/xxw.jpg" alt="">
          <h3>冼文威
            <small>计软</small>
          </h3>
          <p>负责网站设计与构建，提供技术支持</p>
        </div>
        
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Wei Wei Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>
		
		<!-- 注册窗口 -->
    <div id="register" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-title">
                    <h1 class="text-center">注册</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group" action="register.php" method="post">
                            <div class="form-group">
                                <label for="">用户名</label>
                                <input class="form-control" type="text" placeholder="6-15位字母或数字" name="username">
                            </div>
                            <div class="form-group">
                                <label for="">密码</label>
                                <input class="form-control" type="password" placeholder="至少6位字母或数字" name="password_1">
                            </div>
                            <div class="form-group">
                                <label for="">再次输入密码</label>
                                <input class="form-control" type="password" placeholder="至少6位字母或数字" name="password_2">
                            </div>
                            <div class="form-group">
                                <label for="">邮箱</label>
                                <input class="form-control" type="email" placeholder="例如:123@123.com" name="email">
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary" type="submit" name="reg_user">提交</button>
                                <button class="btn btn-danger" data-dismiss="modal">取消</button>
                            </div>
                            <a href="" data-toggle="modal" data-dismiss="modal" data-target="#login">已有账号？点我登录</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- 登录窗口 -->
    <div id="login" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-title">
                    <h1 class="text-center">登录</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group" action="login.php" method="post">
                            <div class="form-group">
                                <label for="">用户名</label>
                                <input class="form-control" type="text" name="username" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">密码</label>
                                <input class="form-control" type="password" name="password" placeholder="">
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary" type="submit" name="submit">登录</button>
                                <button class="btn btn-danger" data-dismiss="modal">取消</button>
                            </div>
                            <a href="" data-toggle="modal" data-dismiss="modal" data-target="#register">还没有账号？点我注册</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script>/**
 * Copyright (c) 2016 hustcc
 * License: MIT
 * Version: v1.0.1
 * GitHub: https://github.com/hustcc/canvas-nest.js
 **/
!
function() {
	function n(n, e, t) {
		return n.getAttribute(e) || t
	}

	function e(n) {
		return document.getElementsByTagName(n)
	}

	function t() {
		var t = e("script"),
			o = t.length,
			i = t[o - 1];
		return {
			l: o,
			z: n(i, "zIndex", -1),
			o: n(i, "opacity", .5),
			c: n(i, "color", "0,0,0"),
			n: n(i, "count", 99)
		}
	}

	function o() {
		a = m.width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth,
			c = m.height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight
	}

	function i() {
		r.clearRect(0, 0, a, c);
		var n, e, t, o, m, l;
		s.forEach(function(i, x) {
				for(i.x += i.xa, i.y += i.ya, i.xa *= i.x > a || i.x < 0 ? -1 : 1, i.ya *= i.y > c || i.y < 0 ? -1 : 1, r.fillRect(i.x - .5, i.y - .5, 1, 1), e = x + 1; e < u.length; e++) n = u[e],
					null !== n.x && null !== n.y && (o = i.x - n.x, m = i.y - n.y, l = o * o + m * m, l < n.max && (n === y && l >= n.max / 2 && (i.x -= .03 * o, i.y -= .03 * m), t = (n.max - l) / n.max, r.beginPath(), r.lineWidth = t / 2, r.strokeStyle = "rgba(" + d.c + "," + (t + .2) + ")", r.moveTo(i.x, i.y), r.lineTo(n.x, n.y), r.stroke()))
			}),
			x(i)
	}
	var a, c, u, m = document.createElement("canvas"),
		d = t(),
		l = "c_n" + d.l,
		r = m.getContext("2d"),
		x = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
		function(n) {
			window.setTimeout(n, 1e3 / 45)
		},
		w = Math.random,
		y = {
			x: null,
			y: null,
			max: 2e4
		};
	m.id = l,
		m.style.cssText = "position:fixed;top:0;left:0;z-index:" + d.z + ";opacity:" + d.o,
		e("body")[0].appendChild(m),
		o(),
		window.onresize = o,
		window.onmousemove = function(n) {
			n = n || window.event,
				y.x = n.clientX,
				y.y = n.clientY
		},
		window.onmouseout = function() {
			y.x = null,
				y.y = null
		};
	for(var s = [], f = 0; d.n > f; f++) {
		var h = w() * a,
			g = w() * c,
			v = 2 * w() - 1,
			p = 2 * w() - 1;
		s.push({
			x: h,
			y: g,
			xa: v,
			ya: p,
			max: 6e3
		})
	}
	u = s.concat([y]),
		setTimeout(function() {
				i()
			},
			100)
}();</script>
  </body>

</html>
