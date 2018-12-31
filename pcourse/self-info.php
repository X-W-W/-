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
    <div class="container p-5">
    	<div class="row">
    		<div class="col-lg-3">
    			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    				<a class="nav-link active" id="v-pills-info-tab" data-toggle="pill" href="#v-pills-info" role="tab" aria-controls="v-pills-info" aria-selected="true">
    					个人信息
    				</a>
    				<a class="nav-link disabled" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="false">
    					历史查询记录
    				</a>
    			</div>
    		</div>
    		<div class="col-lg-9">
    			<div class="tab-content" id="v-pills-tabContent">
    				<div class="tab-pane fade show active" id="v-pills-info" role="tabpanel" aria-labelledby="v-pills-info-tab">
    					<form method="post">
    						<div class="form-group">
    							<label for="nickname">昵称：</label>
    							<span id="nickname">X_W_W_</span>
    							<input type="text" class="form-control" id="nickname" placeholder="修改昵称">
    						</div>
    						<div class="form-group">
    							<label for="Email">邮箱：</label>
    							<span>123@qq.com</span>
    							<input type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="修改邮箱">
    							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    						</div>
    						<div class="form-group">
    							<label for="sex">性别：</label>
    							<span>男</span>
    							<select class="form-control" id="sex">
    								<option>男</option>
    								<option>女</option>
    								<option>不公开</option>
    							</select>
    						</div>
    						<div class="form-group">
    							<label for="phone">手机：</label>
    							<span>13888888888</span>
    							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="修改手机号">
    							<small id="emailHelp" class="form-text text-muted">We'll never share your phone-number with anyone else.</small>
    						</div>
    						<div class="form-group">
    							<label for="birthday">生日：</label>
    							<span>1999/10/28</span>
    							<input type="date" class="form-control" id="birthday" >
    						</div>
    						<div class="form-group">
    							<label for="City">城市：</label>
    							<span>广州</span>
    							<input type="text" class="form-control" id="City" placeholder="城市" required>
    						</div>
    						<div class="justify-content-md-center row">
	    						<button type="submit" class="btn btn-primary col-sm-5" style="margin: 10px;">提交</button>
	    						<button type="reset" class="btn btn-primary col-sm-5" style="margin: 10px;">重置</button >
    						</div>
    					</form>
    				</div>
    				<div class="tab-pane fade" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
    					Est quis nulla laborum officia ad nisi ex nostrud culpa Lorem excepteur aliquip dolor aliqua irure ex. Nulla ut duis ipsum nisi elit fugiat commodo sunt reprehenderit laborum veniam eu veniam. Eiusmod minim exercitation fugiat irure ex labore incididunt do fugiat commodo aliquip sit id deserunt reprehenderit aliquip nostrud. Amet ex cupidatat excepteur aute veniam incididunt mollit cupidatat esse irure officia elit do ipsum ullamco Lorem. Ullamco ut ad minim do mollit labore ipsum laboris ipsum commodo sunt tempor enim incididunt. Commodo quis sunt dolore aliquip aute tempor irure magna enim minim reprehenderit. Ullamco consectetur culpa veniam sint cillum aliqua incididunt velit ullamco sunt ullamco quis quis commodo voluptate. Mollit nulla nostrud adipisicing aliqua cupidatat aliqua pariatur mollit voluptate voluptate consequat non.
    				</div>
    			</div>
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
	$connection->close(); // Closing Connection
?>  
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/background.js" ></script>
  </body>

</html>
