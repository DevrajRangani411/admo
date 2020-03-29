<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>ADMO</title>

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>



<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="img/favicon.png" alt=""></a>

					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">

						<ul class="nav navbar-nav navbar-right">

						</ul>
					</div>
				</div>
			</nav>
		</div>
		</div>
	</header>
	<!-- End Header Area -->



	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">

				<div class="col-lg-6">
					<div class="login_form_inner">
						<div class="login_part_form_iner">
							<?php
							if (isset($_POST['uname']) && $_POST['uname'] != "") {
								$uname = $_POST['uname'];
								$upass = $_POST['upass'];
								require("php/connect_db.php");
								$qry = "SELECT * FROM users WHERE EmailAddress='" . $uname . "'";
								$result = $con->query($qry);
								require("php/close_db.php");
								if ($result->num_rows > 0) {
									$row = $result->fetch_assoc();
									if ($row['password'] == $upass) {
										session_start();

										$_SESSION['sid'] = $row['UserId'];
										$_SESSION['a_id'] = $row['AppartmentId'];
										$_SESSION['name'] = $row['FirstName'];
										$_SESSION['Email'] = $row['EmailAddress'];
										$_SESSION['status'] = $row['status'];
										$_SESSION['bno'] = $row['BlockNumber'];


										// if ($row['status'] == 0) {
										// header("Location: Registration-choise.php");
										// } else {
										header("Location: index.php");
										// }
									} else {
										echo '<div><h3 color="red">Username or password is incorrect.</h3>';
									}
								} else {
									echo "<p>EmailAddress is incorrect.</p>";
								}
							}

							?>

							<h3>Log in to enter</h3>
							<form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="name" name="uname" placeholder="Email" required>
								</div>
								<div class="col-md-12 form-group">
									<input type="password" class="form-control" id="password" name="upass" value="" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
								</div>
								<div class="col-md-12 form-group">
									<button type="submit" value="submit" class="primary-btn">Log In</button>
									<a href="forgotPwd.php">Forgot Password?</a>
								</div>
							</form>
						</div>
						<div class="col-md-12 form-group">
							<h3>New User ? Sign Up now.</h3>
							<form action="registration.php" method="post" novalidate="novalidate">
								<button type="submit" value="submit" class="primary-btn">Sign Up</button>
							</form>
						</div>
					</div>
				</div>
			</div>
	</section>


	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>