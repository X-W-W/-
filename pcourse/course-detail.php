<?php
header("Content-type:text/html;charset=utf-8");

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = new mysqli("localhost", "students", "password", "course_site");
mysqli_query($connection, 'set names utf8');
$errors = "";

session_start();
// Starting Session
// Storing Session
if (isset($_SESSION['user'])) {
	$login_session = $_SESSION['user'];
}

if (isset($_SESSION['search'])) {
	$search_session = $_SESSION['search'];
	$ses_sql = $connection -> query("select * from course where id = '$search_session'");
	$row = $ses_sql -> fetch_assoc();
	$coursename = $row['coursename'];
	$info = $row['info'];
	$cover = $row['thumbnail'];
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>课程详情 - 淘课</title>

		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Custom styles for this template -->
		<link href="css/shop-item.css" rel="stylesheet">
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

			<div class="row">

				<div class="col-lg-3">
					<h1 class="my-4"><?php echo $coursename?></h1>
					<div class="list-group">
						<a href="#class-info" class="list-group-item active">课程简介</a>
						<a href="#booklist" class="list-group-item">课程书目</a>
						<a href="#resource" class="list-group-item">课程资源</a>
					</div>
				</div>
				<!-- /.col-lg-3 -->

				<div class="col-lg-9">

					<div class="card mt-4" id="class-info">
						<img class="card-img-top img-fluid" src="<?php echo $cover?>" alt="">
						<div class="card-body">
							<h3 class="card-title"><?php echo $coursename?></h3>
							<!--<h4>张小健</h4>-->
							<p class="card-text"><?php echo $info?></p>
							<span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
						</div>
					</div>
					<!-- /.card -->

					<div class="card card-outline-secondary my-4" id="class-comment">
						<div class="card-header">
							课程评价
						</div>


						<div class="card-body">																					
							<!-- Teachers Widget -->
					          <div class="card card-outline-secondary my-4" id="class-comment">
					            <h5 class="card-header">教师列表</h5>
					            <div class="card-body">
					              <div class="row">
					                <div class="col-lg-12">
					                  <!-- 胶囊菜单 -->
									    <ul class="nav nav-pills">
									    	<?php
									    		$ses_sql=$connection->query("select teacher_name from courseteacher where course_id = '$search_session'");
												while($row = $ses_sql->fetch_assoc()){ 
									    	?>
									    		<li class="nav-item">
									        		<a class="nav-link" data-toggle="pill" href="#<?php echo $row['teacher_name']?>"><?php echo $row['teacher_name']?></a>
									      		</li>
									      	<?php	
												}
											?>									 
									    </ul>
									
									    <!-- 菜单对应内容 -->
									    <div class="tab-content">
									    	<?php
									    		$ses_sql=$connection->query("select teacher_name from courseteacher where course_id = '$search_session'");
									    		while($row = $ses_sql->fetch_assoc()){ 
									    			$teacher_name = $row['teacher_name'];
									    	?>
									    	<div class="tab-pane container" id="<?php echo $row['teacher_name']?>">
									    	<?php		
									    			$s_sql=$connection->query("select text, username, date from comment where course_id = '$search_session' AND teacher_name = '$teacher_name'");
													while($result = $s_sql->fetch_assoc()){ 																										
									    	?>		
									    			<p><?php echo $result['text']?></p>
													<small class="text-muted">Posted by <?php echo $result['username']?> on <?php echo $result['date']?></small>
													<hr>																																												    		
									      	<?php
									      			}	
									      	
									      	?>
									      	</div>	
									      	<?php
												}
											?>										      									      
									    </div>
					                </div>
					              </div>
					            </div>
					          </div>
					          
						<div class="card-body">
							<?php 
								$ses_sql=$connection->query("select text, username, date from comment where course_id = '$search_session'");
								while($row = $ses_sql->fetch_assoc()){
							?>
								<p><?php echo $row['text']?></p>
								<small class="text-muted">Posted by <?php echo $row['username']?> on <?php echo $row['date']?></small>
								<hr>
							<?php
									}
							?>

							
							<a href="#" name="booklist"></a>

							<div class="card my-4">
								<h5 class="card-header">您的评价：</h5>
								<div class="card-body">
									<form>
										<div class="form-group">
											<textarea class="form-control"  rows="3"></textarea>
											<div class="stars">
												<span>评分：</span>
												<i>★</i>
												<i>★</i>
												<i>★</i>
												<i>★</i>
												<i>★</i>
												<input type="text" style="margin-left:20px;float:left;width: 30px;" readonly="true" hidden="true" />
											</div>
										</div>
										<button type="submit" class="btn btn-primary">提交</button>
									</form>
								</div>
							</div>
						</div>
						<!-- /.card -->

					</div>
					<!-- /.col-lg-9 -->
						
						<a href="#" name="booklist"></a>

						<div class="card card-outline-secondary my-4">
							<div class="card-header">
								课程书目
							</div>
							<div class="card-body">
								<?php 
								$ses_sql=$connection->query("select bookname from textbook where course_id = '$search_session'");
								while($row = $ses_sql->fetch_assoc()){
								?>
								<p><?php echo $row['bookname']?></p>
								<hr>
								<?php
									}
								?>
							</div>
						</div>
						<!-- /.card -->

						<div class="card card-outline-secondary my-4" id="resource">
							<div class="card-header">
								课程资源
							</div>
							
							<div class="card-body">
								<?php 
								$ses_sql=$connection->query("select href, resource_name, updatedate from eresource where course_id = '$search_session'");
								while($row = $ses_sql->fetch_assoc()){
								?>
								<a href="<?php echo $row['href']?>"><?php echo $row['resource_name']?></a>
								<small class="text-muted">sumited on <?php echo $row['updatedate']?></small>
								<hr>
								<?php
									}
								?>
							</div>
						</div>
						<!-- /.card -->

					</div>
					<!-- /.col-lg-9 -->

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
<?php
			$connection -> close();
			// Closing Connection
		?>  
		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script>$(function() {
	/*
	 * 鼠标点击，该元素包括该元素之前的元素获得样式,并给隐藏域input赋值
	 * 鼠标移入，样式随鼠标移动
	 * 鼠标移出，样式移除但被鼠标点击的该元素和之前的元素样式不变
	 * 每次触发事件，移除所有样式，并重新获得样式
	 * */
	var stars = $('.stars');
	var Len = stars.length;
	//遍历每个评分的容器
	for(i = 0; i < Len; i++) {
		//每次触发事件，清除该项父容器下所有子元素的样式所有样式
		function clearAll(obj) {
			obj.parent().children('i').removeClass('on');
		}
		stars.eq(i).find('i').click(function() {
			var num = $(this).index();
			clearAll($(this));
			//当前包括前面的元素都加上样式
			$(this).addClass('on').prevAll('i').addClass('on');
			//给隐藏域input赋值
			$(this).siblings('input').val(num);
		});
		stars.eq(i).find('i').mouseover(function() {
			var num = $(this).index();
			clearAll($(this));
			//当前包括前面的元素都加上样式
			$(this).addClass('on').prevAll('i').addClass('on');
		});
		stars.eq(i).find('i').mouseout(function() {
			clearAll($(this));
			//触发点击事件后input有值
			var score = $(this).siblings('input').val();
			for(i = 0; i < score; i++) {
				$(this).parent().find('i').eq(i).addClass('on');
			}
		});
	}
})</script>
	</body>

</html>