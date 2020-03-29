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

    <script>
        function validate1() {

            alert("Full Name can't be blank");
            return false;

        }
    </script>
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
                            <h3>Sign Up </h3>
                            <?php
                            if (isset($_POST['create_user'])) {
                                require("php/connect_db.php");
                                $str = '';
                                $qry1 = "select * from users";
                                $result = $con->query($qry1);

                                $flagmail = 0;
                                while ($row = $result->fetch_assoc()) {
                                    if (strtolower($row['EmailAddress']) == strtolower($_POST['email'])) {
                                        $flagmail = 1;
                                    }
                                }
                                if ($flagmail == 1) {
                                    echo "<h3><p>EmailAddress is already Registered.</p></h3>";
                                }
                                if ($flagmail == 0) {
                                    $qry = "INSERT INTO users(FirstName,LastName,password,MobileNumber,EmailAddress) VALUES ('" . $_POST['firstname'] . "','" . $_POST['lastname'] . "','" . $_POST['upass'] . "','" . $_POST['mobile'] . "','" . $_POST['email'] . "')";

                                    if ($con->query($qry)) {
                                        $str = '<div class="callout callout-success"><h3>You Successfully Register.Please Login </h3></div>';
                                    } else {
                                        $str = '<div class="callout callout-danger"><h3><p>Problem occurred. Please try again.</p></h3></div>';
                                    }
                                }
                                include("php/close_db.php");
                                echo $str;
                            } ?>
                            <form name="register" class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="name" name="firstname" placeholder="FirstName" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="name" name="lastname" placeholder="LastName" onfocus="this.placeholder = ''" onblur="this.placeholder = 'LastName'" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" id="password" name="upass" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="number" class="form-control" id="name" name="mobile" placeholder="Phone Number" pattern="[0-9]{10}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="Email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" name="create_user" class="primary-btn">Register</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 form-group">
                            <h3>After Registration Please Login</h3>
                            <form action="login.php" method="post" novalidate="novalidate">
                                <button type="submit" value="submit" name="create_user" class="primary-btn">Login</button>
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