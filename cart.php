<?php include('php/header.php') ?>
<!-- End Header Area -->

<!-- Start Banner Area -->

<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>

                        <th scope="col">Remove</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
            $qry = "SELECT * FROM wishlist where status=1 ";
             $result = $con->query($qry);
            if($result->num_rows > 0){

                while($row = $result->fetch_assoc()){

            ?>


                    <tr>
                        <td>


                            <div class="media">
                                <div class="d-flex">
                                    <img src="image/product/<?php echo $row['image']; ?>" alt="not found">
                                </div>
                                <div class="media-body">
                                    <p><?php echo $row['ad_title']; ?></p>
                                </div>

                            </div>
                        </td>

                        <td>
                            <div class="product_count">
                                <a href="apis/wishlist.php?ad_id=<?php echo $row['ad_id']?>">
                                    <i class="fa fa-remove" style="font-size:36px;"></i></a>
                            </div>
                        </td>

                    </tr>

                    <?php
                }
            }
?>

                </tbody>
            </table>


        </div>
    </div>
    </div>
</section>
<!--================End Cart Area =================-->

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
