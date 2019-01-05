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

if(isset($_SESSION['error'])){
$errors=$_SESSION['error'];
$_SESSION['error']="";
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
		<link rel="stylesheet" href="css/button.css" />
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
          <a class="dropdown-item" href="self-info.php">个人信息</a>
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
				<form class="form-group" action="search.php" method="post">
					<div class="input-group">
					<input type="text" class="form-control" name="searchText" placeholder="走进性科学">
					<span class="input-group-btn">
						<input id="loginBtn" class="btn btn-primary" type="submit" name="sub" id="searchBtn" value="淘一淘" style="cursor:pointer;" ng-click="loginBtn()" />
          			</span>
					</div>
					<span><?php echo $errors?></span>
            	</form>	
			</div>

			<div class="row">
				<?php // SQL Query To Fetch Course
					for($index = 1; $index <= 6; $index++){
						$ses_sql=$connection->query("select * from course where id = '$index'");
						$row = $ses_sql->fetch_assoc();
						$coursename1 = $row['coursename'];
						$intro1 = $row['intro'];
						$thumbnail1 = $row['thumbnail'];
						$src1 = $row['src'];
				?>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="<?php echo $src1;?>"><img class="card-img-top" src="<?php echo $thumbnail1;?>" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
                			<a href="<?php echo $src1?>"><?php echo $coursename1;?></a>
             				</h4>
							<p class="card-text"><?php echo $intro1;?></p>
						</div>
					</div>
				</div>
				<?php
					}
				?>	
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
<?php 
	$connection->close(); // Closing Connection
?>  
		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/background.js" ></script>
	</body>
</html>