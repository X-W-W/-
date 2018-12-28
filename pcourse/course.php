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
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>课程列表 - 淘课</title>

		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/3-col-portfolio.css" rel="stylesheet">

	</head>

	<body>

		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#">淘课</a>
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
						<li class="nav-item">
							<a class="nav-link" href="About.php">关于</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Page Content -->
		<div class="container">

			<!-- Page Heading -->
			<h1 class="my-4">pick你的课
        <!--<small>课程发现</small>-->
			</h1>

			<!-- Search Widget -->
			<div class="card-body">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="走进性科学">
					<span class="input-group-btn">
            			<a class="btn btn-primary" href="course-detail.php">淘一淘</a>
          			</span>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="https://www.icourse163.org/course/FJNU-1001774009"><img class="card-img-top" src="img/走进性科学.jpg" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
                			<a href="https://www.icourse163.org/course/FJNU-1001774009">走进性科学</a>
             				</h4>
							<p class="card-text">《走进性科学》是大学生科学文化素质教育课程，以性生物学、性心理学、性社会学和性教育学等研究性科学发展规律的学科为理论基础，从人类性的生物属性、心理属性和社会属性等三个角度，联系学生生活实际，对大学生进行系统的性教育过程。</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="http://www.icourse163.org/course/NBU-1002336007"><img class="card-img-top" src="img/音乐与健康.jpg" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
                			<a href="http://www.icourse163.org/course/NBU-1002336007">音乐与健康</a>
              				</h4>
							<p class="card-text">音乐是人们日常生活中必不可少的心灵良药，而健康又是人们永恒的追求，那么这两者之间有什么关联之处呢？如何利用音乐来有效帮助人们的健康？本课程以人为本讲解了当下人们十分关注的健康问题。</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="https://www.icourse163.org/course/zju-93001"><img class="card-img-top" src="img/数据结构.jpg" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
                			<a href="https://www.icourse163.org/course/zju-93001">数据结构</a>
              				</h4>
							<p class="card-text">“数据结构”是计算机科学与技术专业、软件工程专业甚至于其它电气信息类专业的重要专业基础课程。它所讨论的知识内容和提倡的技术方法，无论对进一步学习计算机领域的其它课程，还是对从事大型信息工程的开发，都是重要而必备的基础。</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="http://www.icourse163.org/course/UESTC-1002268006"><img class="card-img-top" src="img/离散数学.png" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
                			<a href="http://www.icourse163.org/course/UESTC-1002268006">离散数学</a>
              				</h4>
							<p class="card-text">离散数学是计算机学科的经典核心基础课程。课程内容主要包括集合论，数理逻辑，关系理论，图论相关内容，为进一步学习计算机科学的基本理论和方法以及之后的专业课打下良好的基础。</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="https://www.icourse163.org/course/hit-1001516002"><img class="card-img-top" src="img/数据库系统.png" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
                			<a href="https://www.icourse163.org/course/hit-1001516002">数据库系统</a>
              				</h4>
							<p class="card-text">《数据库系统》不仅是计算机、软件工程等专业的核心课程，而且也是非计算机专业学生必修的信息技术课程。当前互联网+与大数据，一切都建立在数据库之上，以数据说话，首先需要聚集数据、需要分析和管理数据。</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="http://www.icourse163.org/course/WHJZY-1003194005"><img class="card-img-top" src="img/Web网站开发.png" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
                			<a href="http://www.icourse163.org/course/WHJZY-1003194005">Web网站开发</a>
              				</h4>
							<p class="card-text">本课程是针对Web网站开发岗位设置的是一门实践性和综合性较强的课程，是结合《网页美工》、《网站前端技术》以及《网站后台技术》知识，手把手教学生从网站规划，网页效果图设计，网站前台设计以及基于数据库技术的网站后台设计，从而构建一个完整的企业网站。</p>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->

			<!-- Pagination -->
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">1</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">2</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">3</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>

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
						<form class="form-group" action="">
							<div class="form-group">
								<label for="">用户名</label>
								<input class="form-control" type="text" placeholder="6-15位字母或数字">
							</div>
							<div class="form-group">
								<label for="">密码</label>
								<input class="form-control" type="password" placeholder="至少6位字母或数字">
							</div>
							<div class="form-group">
								<label for="">再次输入密码</label>
								<input class="form-control" type="password" placeholder="至少6位字母或数字">
							</div>
							<div class="form-group">
								<label for="">邮箱</label>
								<input class="form-control" type="email" placeholder="例如:123@123.com">
							</div>
							<div class="text-right">
								<button class="btn btn-primary" type="submit">提交</button>
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
						<form class="form-group" action="">
							<div class="form-group">
								<label for="">用户名</label>
								<input class="form-control" type="text" placeholder="">
							</div>
							<div class="form-group">
								<label for="">密码</label>
								<input class="form-control" type="password" placeholder="">
							</div>
							<div class="text-right">
								<button class="btn btn-primary" type="submit">登录</button>
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