<?php include('php/header.php') ?>
<!-- End Header Area -->

<!-- Start Banner Area -->

<!-- End Banner Area -->


<div class="profile-block">
	<div class="panel text-center">
		<div class="user-heading"> <a href="#"><img src="img/l1.jpg" alt="" title=""></a>
			<h1>ADMO</h1>
			<p>ADMO1998@gmail.com</p>
			<p>Wallet Balance $50.00</p>
		</div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="#"><i class="fa fa-user"></i>Profile</a></li>
			<li><a href="#"><i class="fa fa-pencil-square-o"></i>Edit profile</a></li>
			<li><a href="#"><i class="fa fa-usd" aria-hidden="true"></i>Transaction History</a></li>
			<li><a href="./contectus.php"><i class="fa fa-usd" aria-hidden="true"></i>Contact US</a></li>
			<li><a href="./login.php"><i class="fa fa-sign-out"></i>Logout</a></li>

			<!-- Add Product Button -->

			<div class="content-wrapper">

				<section class="content container-fluid">
					<?php
					if (isset($_POST['submit'])) {
						$str = '';
						$file_name = date("m-d-H-i") . $_FILES['P_Image']['name'];
						$file_type = $_FILES['P_Image']['type'];
						$file_size = $_FILES['P_Image']['size'];
						$title1 = $_POST['title'];
						$smalldesc2 = $_POST['smalldesc1'];
						$metal2 = $_POST['metal1'];
						$avail2 = $_POST['avail1'];
						$model2 = $_POST['model1'];
						$brand2 = $_POST['brand1'];


						if (strstr($file_name, ".exe")) {
							$str = '<div class="callout callout-danger"><p>.EXE files are not allowed</p></div>';
						}
						if ($file_size > 350000) {
							$str = '<div class="callout callout-danger"><p>File is too large...</p></div>';
						}

						$target = "../image/product/" . $file_name;

						if (move_uploaded_file($_FILES['P_Image']['tmp_name'], $target)) {
							$qry = 'INSERT INTO product (title,smalldesc,Metal,Availability,Model,Brand,image) VALUES ("' . $title1 . '","' . $smalldesc2 . '","' . $metal2 . '","' . $avail2 . '","' . $model2 . '","' . $brand2 . '","' . $_FILES['P_Image']['name'] . '")';

							if ($con->query($qry)) {
								$str = '<div class="callout callout-success"><p>Image has been uploaded successfully.</p></div>';
							} else {
								$str = '<div class="callout callout-danger"><p>Problem occudtgjrsyuryrred while uploading image. Please try again.</p></div>';
							}
						} else {
							$str = '<div class="callout callout-danger"><p>Problem occurred while uploading image. Please try again.</p></div>';
						}


						echo $str;
					}
					?>
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title"> </h3>
									<div class="box-tools">
										<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-new-event">Add New AD</button>
									</div>
								</div>
								<!-- /.box-header -->

								<!-- /.box-body -->
							</div>
							<!-- /.box -->
						</div>
					</div>

				</section>
			</div>

			<div class="modal fade" id="modal-new-event">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Fill initial details</h4>
						</div>
						<form action="" method="post" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="input-group">
									<span class="input-group-addon">Image</span>
									<input type="file" class="form-control" placeholder="Ad Image" name="P_Image">
								</div><br />
								<div class="input-group">
									<span class="input-group-addon">Title</span>
									<input type="text" class="form-control" placeholder="Ad Title" name="title">
								</div><br />
								<div class="input-group">
									<span class="input-group-addon">Description</span>
									<input type="text" name="brand1" class="form-control" placeholder="Ad Description">
								</div><br />
								<div class="input-group">
									<span class="input-group-addon">Web</span>
									<input type="text" name="model1" class="form-control" placeholder="Ad Weblink">
								</div><br />
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary" name="submit">Submit AD</button>
							</div>
						</form>
					</div>
				</div>
			</div>


			<!-- End Add Product Button  -->
		</ul>
	</div>
</div>

<!--Footer-->

<?php include './php/footer.php'; ?>
<!--Footer-->


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