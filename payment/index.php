
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'lit_zone');
 
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
$username = $trans = "";
$amount = $account = 0;
$username_err = $account_err = $amount_err = $trans_err = "";

 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$amount=$_POST['amount'];
	$account=$_POST['account'];
	$username=$_POST['username'];
	$trans=$_POST['trans'];
	
 
	if(empty($username)){
		$username_err="Please enter a username";
	}elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
		$username_err = "Username can only contain letters, numbers, and underscores.";
	}else{
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = $conn->query($sql);

		if ($result = $conn -> query($sql)) {
			while ($row = $result -> fetch_row()) {
				$username_err="";
			}
			$result -> free_result();
		}
		else{
			$username_err="No user found!!";
		}
	}
	if(strlen($account) !=11){
        $account_err = "Account Number must have 11 digits.";
    }
	if(empty($amount)){
        $amount_err = "Amount cannot be empty.";
    }
	if(empty($trans)){
        $trans_err = "Transaction ID must have 11 digits.";
    }
	if(empty($username_err) && empty($account_err) && empty($amount_err) && empty($trans_err)){
		$sql = "INSERT INTO payment (username, account, amount, trans) VALUES ('$username', $account, $amount, '$trans')";

		if ($conn->query($sql) === TRUE) {
			echo "Payment was successful. Wait for the admin response!!";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
    mysqli_close($conn);
}
?>


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
		<style>
			.wrapper{
            width: 360px; 
            padding: 20px; 
            background:#2D2A2E;
            border-radius:10px;
        }
		</style>

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
			
				<h1 class="text-center terms_center">Payment</h1>
			</div>
			<p>Steps of payment:</p>
			<ol>
				<li>Dial *247#</li>
				<li>Choose Option 1 :- Send Money</li>
				<li>Enter Number :- 017XXXXXXXX</li>
				<li>Enter Amount :- 100</li>
				<li>Enter Reference :- rupokblog</li>
				<li>Enter Your Pin</li>
				<li>Give Your Account Number and Transaction Number in the Given Form</li>
				<li>Thank You</li>
			</ol>
			<div class="wrapper">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Account No</label>
                <input type="number" name="account" class="form-control">
                <span class="invalid-feedback"><?php echo $account_err; ?></span>
            </div>  
            <div class="form-group">
                <label>Amount</label>
                <input type="number" name="amount" class="form-control">
                <span class="invalid-feedback"><?php echo $amount_err; ?></span>
            </div>  
            <div class="form-group">
                <label>Transaction ID</label>
                <input type="text" name="trans" class="form-control">
                <span class="invalid-feedback"><?php echo $trans_err; ?></span>
            </div>
            <div class="form-group d-flex justify-content-end"> <br>
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
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

