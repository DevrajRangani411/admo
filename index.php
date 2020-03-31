<!-- Start Header Area -->

<?php include('php/header.php') ?>

<!-- End Header Area -->

<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="active-banner-slider owl-carousel">
                    <!-- single-slide -->

                    <div class="row single-slide align-items-center d-flex">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1>AD <br>Poster 1</h1>
                                <p>Latest Product Ads.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="img-fluid" src="img/banner/banner-img.png" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- single-slide -->
                    <div class="row single-slide">

                        <div class="col-lg-5">
                            <div class="banner-content">
                                <h1>AD <br>Poster 2</h1>
                                <p>Upcoming AD.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="img-fluid" src="img/banner/banner-img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->


<!-- Start category Area -->
<!-- End category Area -->

<!-- start product Area -->
<section>
    <!-- single product slide -->

    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Latest Offers Near By You</h1>
                        <p>Stand Your Product , All Amoung Big Brands.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single product -->
                <?php

            $qry = "SELECT * FROM advertisement where ad_approved=1";
             $result = $con->query($qry);
            if($result->num_rows > 0){

                while($row = $result->fetch_assoc()){

            ?>

                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="./img/product/<?php echo $row['ad_image']; ?>" alt="not found">
                        <div class="product-details">
                            <h6><?php echo $row['ad_title']; ?></h6>
                            <div class="price">
                                <div class="star-rating">
                                    <span class="fa fa-star-o" data-rating="1"></span>
                                    <span class="fa fa-star-o" data-rating="2"></span>
                                    <span class="fa fa-star-o" data-rating="3"></span>
                                    <span class="fa fa-star-o" data-rating="4"></span>
                                    <span class="fa fa-star-o" data-rating="5"></span>
                                    <input type="hidden" name="whatever3" class="rating-value" value="4.1">
                                    (03 Reviews)
                                </div>
                                <details>
                                    <summary class="l-through">View More</summary>
                                    <div class="container">
                                        <div class="row">
                                            <p>Rate Us </p>
                                            <div class="col-lg-12">

                                                <div class="star-rating">
                                                    <span class="fa fa-star-o" data-rating="1"></span>
                                                    <span class="fa fa-star-o" data-rating="2"></span>
                                                    <span class="fa fa-star-o" data-rating="3"></span>
                                                    <span class="fa fa-star-o" data-rating="4"></span>
                                                    <span class="fa fa-star-o" data-rating="5"></span>
                                                    <input type="hidden" name="whatever3" class="rating-value" value="4.1">
                                                </div>
                                            </div>
                                            <p><?php echo $row['ad_description']; ?></p>
                                        </div>
                                    </div>
                                </details>
                            </div>
                            <div class="prd-bottom">

                                <a href="apis/inswishlist.php?ad_id=<?php echo $row['ad_id']?>&ad_title=<?php echo $row['ad_title']?>&ad_image=<?php echo $row['ad_image']?>&UserId=<?php echo $_SESSION['sid']?>" class="social-info">

                                    <span class="ti-bag"></span>
                                    <p class="hover-text">Wishlist</p></a>


                                <a href="apis/coin.php?UserId=<?php echo $_SESSION['sid']?>&ad_id=<?php echo $row['ad_id']?>" class="social-info">
                                    <span class="lnr lnr-diamond"></span>
                                    <p class="hover-text">Coins</p>
                                </a>

                                <a href="" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">Share</p>
                                </a>
                     <a href="https://api.whatsapp.com/send?&text=Look At This Attractive Offer. ">Share To WhatsApp</a>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
                }
            }
            ?>
            </div>

        </div>
    </div>


</section>
<!-- end product Area -->



<!-- start footer Area -->


<?php include './php/footer.php'; ?>

<!-- End footer Area -->

<script src="js/rating.js"></script>
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/countdown.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/rating.js"></script>


<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js"></script>
<script src="js/main.js"></script>


</body>

</html>
