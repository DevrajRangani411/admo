<?php include('php/header.php') ?>
<!-- End Header Area -->


<div class="container contact">
  <div class="row" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="col-md-3">
      <div class="contact-info">
        <img src="img/contact.png" alt="image" />
        <h2>Contact Us</h2>
        <h4>We would love to marketing your advertisement !</h4>
      </div>
    </div>
    <div class="col-md-9">
      <div class="contact-form">
        <div class="form-group">
          <label class="control-label col-sm-2" for="fname">First Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="lname">Last Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="comment">Comment:</label>
          <div class="col-sm-10">
            <textarea class="form-control" rows="5" id="comment"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php include './php/footer.php'; ?>


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