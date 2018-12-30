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

// SQL Query To Fetch Ad
$index = 1;
$ses_sql=$connection->query("select src from advertisement where label= '$index'");
$row = $ses_sql->fetch_assoc();
$ads1 = $row['src'];

$index = 2;
$ses_sql=$connection->query("select src from advertisement where label= '$index'");
$row = $ses_sql->fetch_assoc();
$ads2 = $row['src'];

$index = 3;
$ses_sql=$connection->query("select src from advertisement where label= '$index'");
$row = $ses_sql->fetch_assoc();
$ads3 = $row['src'];
?>

<!DOCTYPE html>
<html>
	
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>选好课，上淘课 - 淘课</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">

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
            <li class="nav-item active">
              <a class="nav-link" href="index.php">首页
                <span class="sr-only">(current)</span>
              </a>
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

      <!-- Heading Row -->
      <div class="row my-4">
        <div id="carouselExampleIndicators" class="carousel slide my-4 col-lg-8" data-ride="carousel" style="width: 100%;">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
            	<div class="carousel-item active">
                <img class="d-block img-fluid" src="<?php echo $ads1?>" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo $ads2?>" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo $ads3?>" alt="Third slide">
              </div>              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
          <h1>上淘课，选好课</h1>
          <p>淘课网致力于为每一位学生提供优质课程查询服务，在淘课网，您可以选择心仪的老师，您可以查看课程所需教材清单及电子资源，您还可以买卖教辅资料，发表您的课程评价！</p>


         	  	<form class="form-group" action="search.php" method="post">
					<div class="input-group">
					<input type="text" class="form-control" name="searchText" placeholder="走进性科学">
					<span class="input-group-btn">
						<input class="btn btn-primary" type="submit" name="sub" id="searchBtn" value="淘一淘" />
                	</span>
					</div>
            	</form>	

      
        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->
			
			<!-- Call to Action Well -->
      <div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">
          <p class="text-white m-0">好文分享</p>
        </div>
      </div>
      
      <!-- Content Row -->
      <div class="row">
      	<?php
      		for($index = 1;$index <= 3;$index++){
      			$ses_sql=$connection->query("select title, abstract from article where label= '$index'");
						$row = $ses_sql->fetch_assoc();
						$atrt1 = $row['title'];
						$atra1 = $row['abstract'];
      	?>
      	<div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title"><?php echo $atrt1;?></h2>
              <p class="card-text"><?php echo $atra1?></p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">了解一下</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->
      	<?php
      	}?>
      </div>
      <!-- /.row -->

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
	$connection->close(); // Closing Connection
?>  
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>

</html>
