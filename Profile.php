<?php include('php/header.php') ?>
<!-- End Header Area -->

<!-- Start Banner Area -->

<!-- End Banner Area -->

<br />
<br /><br /><br />
<!--================Single Product Area =================-->
<?php
if(isset($_POST['updateuser'])){

    $qry3="update users set  FirstName='".$_POST['fname']."' ,LastName='".$_POST['lname']."' ,MobileNumber='".$_POST['mno']."',EmailAddress='".$_POST['email']."' where EmailAddress='".$_SESSION['Email']."'";
   if($con->query($qry3)){
       $_SESSION['Email']=$_POST['email'];

   }}
?>

<div class="container">
    <div class="row justify-content-center">
        <?php
                $qry = "SELECT * FROM users where UserId='".$_SESSION['sid']."'";
//                $qry1 = "SELECT * FROM  appartment where AppartmentId='".$_SESSION['a_id']."'";
//                   $result1=$con->query($qry1);
//                    $row1 = $result1->fetch_assoc();
                $result = $con->query($qry);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                }
            ?>
        <div class="col-lg-8">
            <div class="single_product_text text-center">
                <br><br>


                <div class="card card border-secondary">


                    <div class="card-body">

                        <h5 class="card-title">User No - <?php echo $row['UserId'] ?></h5>
                        <strong>
                            <p><?php echo $row['FirstName'];echo "  ";echo $row['LastName']  ?></p>
                        </strong>

                        <strong>
                            <p>Email Address : <?php echo $row['EmailAddress']?></p>
                        </strong>

                        <strong>
                            <p>
                                <b>Contact Detail: <?php echo $row['MobileNumber'] ?></b></p>
                        </strong>
                        <div class="box-tools"><br>
                            <button class="btn_3" data-toggle="modal" data-target="#modal-new-event"><i class="fa fa-pencil-square-o"></i> Edit</button>
                        </div><br/>
                        <?php

           // $qry = "SELECT * from users ";
            //$result = $con->query($qry);
           // $row = $result->fetch_assoc();
           ?>
                        <?php if( $row['UserId']== '1' && $row['EmailAddress']=="admin@admo.com") { ?>
                        <font size="5">
                        <a href="./admin.php"><i class="fa fa-user" aria-hidden="true" ></i> Admin</a>
                        <a href="./payout.php"><i class="fa fa-doller" aria-hidden="true" ></i> Payout</a>
                        </font>
                        <?php } ?>
                        <?php
                        if (isset($_SESSION['name'])) { ?>

                        <form method="post" action="">
                            <div class="form-group">
                                <br/>
                                <a><button type="submit" value="submit" name="logout" class="btn_3">
                                      <i class="fa fa-sign-out"></i>  Logout
                                    </button></a>
                            </div>
                        </form>

                        <?php  }

			?>

                    </div>
                </div>
                <br><br>



            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="modal-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Update User Detail</h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h4>First Name </h4>
                        </span>
                        <input type="text" class="form-control" name="fname" value="<?php echo $row['FirstName']?>" required>
                    </div><br>
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h4>Last Name </h4>
                        </span>
                        <input type="text" class="form-control" name="lname" value="<?php echo $row['LastName'] ?>" required>
                    </div><br>
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h4>Mobile Number</h4>
                        </span>
                        <input type="text" class="form-control" name="mno" pattern="[0-9]{10}" value="<?php echo $row['MobileNumber'] ?>" required>
                    </div><br>
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h4>Email Address</h4>
                        </span>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['EmailAddress'] ?>" required>
                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="updateuser">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--================End Single Product Area =================-->
<!-- subscribe part here -->

<!-- subscribe part end -->

<!-- hi-->

<!-- Add Product Button -->

<div class="content-wrapper" align="center">

    <section class="content container-fluid">
        <?php
					if (isset($_POST['submit'])) {
						$str = '';
						$file_name = date("m-d-H-i") . $_FILES['P_Image']['name'];
						$file_type = $_FILES['P_Image']['type'];
						$file_size = $_FILES['P_Image']['size'];
						$title1 = $_POST['title'];
						$smalldesc2 = $_POST['smalldesc1'];
						$web = $_POST['web'];



						if (strstr($file_name, ".exe")) {
							$str = '<div class="callout callout-danger"><p>.EXE files are not allowed</p></div>';
						}
						if ($file_size > 350000) {
							$str = '<div class="callout callout-danger"><p>File is too large...</p></div>';
						}

						$target = "./img/product/" . $file_name;

						if (move_uploaded_file($_FILES['P_Image']['tmp_name'], $target)) {
							$qry = 'INSERT INTO advertisement (ad_title,ad_description,ad_web,ad_image,UserId ) VALUES ("' . $title1 . '","' . $smalldesc2 . '","' . $web . '","' . $_FILES['P_Image']['name'] . '","' . $_SESSION['sid'] . '")';

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
        <div class="row" style="text-align:center;">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3  class="box-title"> </h3>
                        <div class="box-tools" >
                            <button  class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-new-event" >Add New AD</button>
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
                        <input type="text" name="smalldesc1" class="form-control" placeholder="Ad Description">
                    </div><br />
                    <div class="input-group">
                        <span class="input-group-addon">Web</span>
                        <input type="text" name="web" class="form-control" placeholder="Ad Weblink">
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
