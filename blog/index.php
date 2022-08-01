<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Literature Zone</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="../common/assets/logo.png">
		<link rel="stylesheet" href="../common/css/bootstrap.min.css">
		<link rel="stylesheet" href="../common/awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../common/css/navbar-fixed.css">
		<link rel="stylesheet" href="../common/css/scroll.css">
		<link rel="stylesheet" href="../common/css/common.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body class="text-justify">
		<div id="idk0" class="second-body text-light">

			<!--NAVIGATION BAR-->

			<nav class="custm-nav navbar navbar-dark navbar-expand-md fixed-top">
				<a class="navbar-brand">
					<img height=40px; src="../common/assets/logo.png" alt="">
					<span class="ml-2">Literature Zone</span>
				</a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#hdnv">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="hdnv">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item ml-auto"><a class="nav-link" href="../home/index.php">Home</a></li>
						<li class="nav-item ml-auto"><a class="nav-link" href="../archive/index.php">Archive</a></li>
						<li class="nav-item ml-auto"><a class="nav-link" href="../about_me/index.php">About me</a></li>
						<li class="nav-item ml-auto"><a class="nav-link" href="../projects/index.php">Projects</a></li>
					</ul>
				</div>
			</nav>


			<!--BREADCRUMB-->
			<div class="inner">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../archive/index.php">Archive</a></li>
					<li class="breadcrumb-item">
					<?php
						echo $_GET['name'];
					?>
					</li>
				</ol>
			</div>

			<span><a class="btn pos kol1 btn-outline-secondary" href="#idk0"><i class="fa fa-2x fa-arrow-circle-up"></i></a></span>

			<?php
			
			$name= $_GET['name'];
			$mysqli = new mysqli("localhost","root","","lit_zone");

			if ($mysqli -> connect_errno) {
			echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
			exit();
			}

			$sql = "SELECT * FROM blog WHERE name='".$name."'";

			if ($result = $mysqli -> query($sql)) {
			while ($row = $result -> fetch_row()) {
				if($row[5]){
					if(isset($_SESSION['username'])){
						if ($result1 = $mysqli -> query("SELECT premium FROM users WHERE username='".$_SESSION['username']."'")) {
							while ($row1 = $result1 -> fetch_row()) {
								if(!$row1[0]){
									header("Location: ../payment/index.php");
									die();
								}
							}
							$result1 -> free_result();
						}
					}
					else{
						header("Location: ../login/index.php");
						die();
					}
					
				}
				echo "<div class='headbar'>".$row[1]."</div>";
				echo $row[2];
				echo "-".$row[3]."<br>";
			}
			$result -> free_result();
			}

			$mysqli -> close();
			?>


			<footer class="text-center text-light py-5">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2>Literature Zone</h2>
							<p>Copyright &copy; 2022</p>
							<div class="my-2">Contact us:</div>
							<a href="https://web.facebook.com/profile.php?id=100052971997237" target="_blank" class="text-light">
								<i class="fa fa-facebook-official fa-2x"></i></a>
							<a href="../page_not_found/index.php" target="_blank" class="text-light ml-2">
								<i class="fa fa-youtube-play fa-2x"></i></a>
							<!--<a href="../page_not_found/index.php" class="text-light ml-2"><i class="fa fa-whatsapp fa-2x"></i></a>-->
							<a href="../page_not_found/index.php" class="text-light ml-2"><i class="fa fa-twitter fa-2x"></i></a>
						</div>
					</div>
				</div>
			</footer>
		
		<script src="../common/js/jquery.js"></script>
		<script src="../common/js/popper.min.js"></script>
		<script src="../common/js/bootstrap.min.js"></script>
		<script src="../common/js/navbar-fixed.js"></script>
		<script src="../common/js/clipboard.min.js"></script>
		<script src="../common/js/common.js"></script>
	</body>
</html>
