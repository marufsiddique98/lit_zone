<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Kosai Limited</title>
		<link rel="shortcut icon" type="image/x-icon" href="../common/assets/logo.png">
		<link rel="stylesheet" href="../common/css/bootstrap.min.css">
		<link rel="stylesheet" href="../common/awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../common/css/navbar-fixed.css">
		<link rel="stylesheet" href="../common/css/scroll.css">
		<link rel="stylesheet" href="style.css">

	</head>
	<body>
		<div id="idk0" class="second-body text-light">

			<!--NAVIGATION BAR-->

			<nav class="custm-nav navbar navbar-dark navbar-expand-md fixed-top">
				<a class="navbar-brand" href="#idk0">
					<img height=40px; src="../common/assets/logo.png" alt="">
					<span class="ml-2">Literature Zone</span>
				</a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#hdnv">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="hdnv">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item ml-auto"><a class="nav-link" href="../home/index.php">Home</a></li>
						<li class="nav-item ml-auto"><a class="nav-link disabled" href="#">Archive</a></li>
						<li class="nav-item ml-auto"><a class="nav-link" href="../about_me/index.php">About me</a></li>
						<li class="nav-item ml-auto"><a class="nav-link" href="../projects/index.php">Projects</a></li>
					</ul>
				</div>
			</nav>
			
			<div class="inner">
				<h1 class="text-center terms_center">Archive</h1>
			</div>
			<div class="year">2022</div>
			<ul class="ml-4 archive_ul">
			<?php
			$mysqli = new mysqli("localhost","root","","lit_zone");

			if ($mysqli -> connect_errno) {
			echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
			exit();
			}

			$sql = "SELECT created, name, paid FROM blog";

			if ($result = $mysqli -> query($sql)) {
			while ($row = $result -> fetch_row()) {
				echo "<li>";
				echo "<span class='time'>".$row[0]."</span>";
				echo "<a href='../blog/index.php?name=".$row[1]."'>".$row[1]."</a>";
				if($row[2]){						//$row[2]=Premium or not column						
					echo "<span class='badge bg-danger ml-3'>Premium</span>";
				}
				
				echo "</li>";
			}
			$result -> free_result();
			}

			$mysqli -> close();
			?>
			</ul>
		</div>

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

	</body>
</html>


