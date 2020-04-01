<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <style>


ul {
    margin: 0px;
    padding: 10px 0px 0px 0px;
}

li.star {
    list-style: none;
    display: inline-block;
    margin-right: 5px;
    cursor: pointer;
    color: #777777;
}

li.star.selected {
    color: #ff6e00;
}


</style>

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
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/my.css">
	<link rel="stylesheet" href="css/rating.css">
</head>

<body>

	<!-- Start Header Area -->

	<?php $page = "home";
	  require_once('./php/header.php');
    ?>

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
	<section >
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1 >Latest Offers Near By You</h1>
							<p>Stand Your Product , All Amoung Big Brands.</p>
						</div>
					</div>
				</div>
				<div class="column">
				<!-- single product -->
					<!--<div class="col-lg-3 col-md-6">-->
						<div class="single-product">

	                        <?php
require_once "db.php";
require_once "functions.php";
require_once "./php/connect_db.php";
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id
$userId = $_SESSION['sid'];

$query = "SELECT * FROM advertisement where ad_approved like 1 ORDER BY ad_id ASC ";

$result = mysqli_query($conn, $query);


$outputString = '';

foreach ($result as $row) {
	$sum=0;
	$row1=0;
    $avg=0;
    $query1 = "select * from rating where ad_id='".$row['ad_id']."'";
    $result1 = $con->query($query1);
    $count=$result1->num_rows;
    if($result1->num_rows >0){
        while($row1=$result1->fetch_assoc())
        {
            $sum=$sum+$row1['rating'];

        }
    $avg=$sum/$count;
    }


    $userRating = userRating($userId, $row['ad_id'], $conn);
    $totalRating = totalRating($row['ad_id'], $conn);
    $outputString .= '
         <div class="col-lg-3">
		<img class="img-fluid" src="./img/product/'.$row['ad_image'].'" alt="not found">
		<div class="row-title"> <h6>' . $row['ad_title'] . '</h6></div>
  <div class="response" id="response-' . $row['ad_id'] . '"></div>
  <div class="star-rating">
 <ul class="list-inline"  onMouseLeave="mouseOutRating(' . $row['ad_id'] . ',' . $userRating . ');">';
    for ($count = 1; $count <= 5; $count ++) {
        $starRatingId = $row['ad_id'] . '_' . $count;

        if ($count <= $userRating) {

            $outputString .= '<li value="' . $count . '" id="' . $starRatingId . '" class="star selected">&#9733;</li>';
        } else {
            $outputString .= '<li value="' . $count . '"  id="' . $starRatingId . '" class="star" onclick="addRating(' . $row['ad_id'] . ',' . $count . ');" onMouseOver="mouseOverRating(' . $row['ad_id'] . ',' . $count . ');">&#9733;</li>';
        }
    } // endFor

    $outputString .= '
 </ul>

 <p class="review-note">Total Reviews: ' . $totalRating . '</p>

<p class="review-note">Average Reviews: ' . $avg . '</p>

 <p class="text-address">' . $row["ad_description"] . '</p>
</div>
<div class="product-details">

								<div class="prd-bottom">

									<a href="apis/inswishlist.php?ad_id='.$row["ad_id"].'&ad_title='.$row["ad_title"].'&ad_image='.$row["ad_image"].'&UserId='.$_SESSION["sid"].'"  class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="apis/coin.php?UserId='.$_SESSION["sid"].'&ad_id='.$row["ad_id"].'"  class="social-info">
										<span class="lnr lnr-diamond"></span>
										<p class="hover-text">Coins</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">Share</p>
									</a>
								</div>
							</div>
                            </div>
                            <hr>
 ';
}
echo $outputString;
?>

						</div>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
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

<script type="text/javascript">

    function showRestaurantData(url)
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("restaurant_list").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();

    }

    function mouseOverRating(restaurantId, rating) {

        resetRatingStars(restaurantId)

        for (var i = 1; i <= rating; i++)
        {
            var ratingId = restaurantId + "_" + i;
            document.getElementById(ratingId).style.color = "#ff6e00";

        }
    }

    function resetRatingStars(restaurantId)
    {
        for (var i = 1; i <= 5; i++)
        {
            var ratingId = restaurantId + "_" + i;
            document.getElementById(ratingId).style.color = "#9E9E9E";
        }
    }

   function mouseOutRating(restaurantId, userRating) {
	   var ratingId;
       if(userRating !=0) {
    	       for (var i = 1; i <= userRating; i++) {
    	    	      ratingId = restaurantId + "_" + i;
    	          document.getElementById(ratingId).style.color = "#ff6e00";
    	       }
       }
       if(userRating <= 5) {
    	       for (var i = (userRating+1); i <= 5; i++) {
	    	      ratingId = restaurantId + "_" + i;
	          document.getElementById(ratingId).style.color = "#9E9E9E";
	       }
       }
    }

    function addRating (restaurantId, ratingValue) {
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function ()
            {
                if (this.readyState == 4 && this.status == 200) {

                    showRestaurantData('getRatingData.php');

                    if(this.responseText != "success") {
                    	   alert(this.responseText);
                    }
                }
            };

            xhttp.open("POST", "insertRating.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var parameters = "index=" + ratingValue + "&restaurant_id=" + restaurantId;
            xhttp.send(parameters);
    }
</script>
</body>

</html>
