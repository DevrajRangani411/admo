<?php include('./php/header.php') ?>
<?php
if(isset($_POST['claim']))
{
    if($_POST['coin']>=100){
    $qry1="select * from wallet where UserId='".$_SESSION['sid']."'";
    $result=$con->query($qry1);
    $row=$result->fetch_assoc();
    if($row['coin'] >= $_POST['coin']){
    $remain=$row['coin']-$_POST['coin'];
     $qry = 'INSERT INTO claim (UserId,coin) VALUES ("' .$_SESSION['sid'] .    '","'  . $_POST['coin'] . '")';
        $con->query($qry);

        $qry3="update wallet set coin=$remain , transection_history= '".$_POST['coin']."' where UserId='".$_SESSION['sid'] ."'";
        $con->query($qry3);


}
    }
    else{
        echo "minimum amount100 required";
    }
}

?>

<!-- Collect the nav links, forms, and other content for toggling -->

<!--================Tracking Box Area =================-->
<div class="container">
    <section class="tracking_box_area section_gap">

        <?php

            $qry = "SELECT * from wallet where UserId ='".$_SESSION['sid']."'";
            $result = $con->query($qry);
            $row = $result->fetch_assoc();
           ?>
        <h2>Your Coins : <?php echo $row['coin'] ?></h2>
        <div class="container">
            <div class="tracking_box_inner">
                <p>You can withdrow your money from here</p>

                <?php
					if (isset($_POST['submit'])) {
						$coin = $_POST['coin'];
                    }
                ?>

                <form class="row tracking_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="order" name="order" placeholder="Paytam Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Paytm Number'">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="email" class="form-control" id="email" name="coin" placeholder="Enter money here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter money for claim'">
                    </div>

                                <?php if( $row['coin']>10) { ?>
                    <div class="col-md-12 form-group">


       <button type="submit" value="submit" class="primary-btn" name="claim">Claim</button>

                             </div>



                    <?php
}
            else{



    ?>
                    <div class="col-md-12 form-group">
                        <h3>Claim button is atomatic show when your coin is grater than 100.</h3>
                    </div>

                    <?php
            }
            ?>

                </form>
            </div>
        </div>
    </section>
</div>
<!--================End Tracking Box Area =================-->

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
