<?php include('./php/header.php') ?>


<!--================End Tracking Box Area =================-->

<div class="content-wrapper">
    <section class="content-header">
      <br/><br/><br/><br/>
    </section>
    <section class="content container-fluid">


        <?php
        if(isset($_POST['submit']))
        {
            $qry="u";
        }
        ?>



<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title"></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tbody><tr>
			  <th width="50px">ID</th>
			  <th width="100px">User</th>
                <th width="100px">Coin</th>
                <th width="100px">Voucher</th>
			  <th width="100px">Action</th>
			</tr>



<?php
$qry = "SELECT * FROM claim where status=1";
$result = $con->query($qry);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
?>
<tr>
	<td><?php echo $row['UserId']; ?></td>
    <?php
    $qry1 = "SELECT * FROM users where UserId='".$row['UserId']."'";
    $result1 = $con->query($qry1);

        $row1 = $result1->fetch_assoc()
    ?>
	<td><?php echo $row1['FirstName']; ?></td>
	<td><?php echo $row['coin']; ?></td>
    <td><?php echo $row['voucher']; ?></td>
    <td>

       <a href="apis/payout.php?uid=<?php echo $row['UserId']?>&uname=<?php echo  $row1['FirstName']?>&coin=<?php echo $row['coin'] ?>&coupen=<?php echo $row['voucher'] ?>"><i class="fa fa-add"></i>Pay</a>


    </td>


</tr>
<?php
	}
}
?>
		  </tbody></table>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
  </div>

    </section>
  </div>


<!--oyyyy-->
<div class="modal fade" id="modal-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Add Voucher</h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h4>Add Voucher Code</h4>
                        </span>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['EmailAddress'] ?>" required>
                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="pay">Pay</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- start footer Area -->

<?php include './php/footer.php'; ?>

<!-- End footer Area -->




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
