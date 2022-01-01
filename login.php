<?php
include('header.php');
error_reporting(0);
$msg="";
if(isset($_POST['studentlogin']))
{
  $uname=$_POST['email'];//email is name of textbox name,uname is a variable to store textbox value
  $pas=$_POST['password'];
  $sql="select * from student where email='$uname' and pasword='$pas'";
  //echo $sql;exit;
  $que=$conn->query($sql);//query is inbuilt fun for execute query
  $row=$que->fetch_object();//to fetch data from db
  if(count($row)>0)
  {
    $_SESSION['studentlogin']=$row->email;
    $_SESSION['studentlogin1']=$row->sid;
    header("location:studentprofile.php");
  }
  else
  {
    $msg="Wrong Email or Password!";
  }
}
?>
<body data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="0">

  <!-- ======= Header ======= -->
  
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs aos-init aos-animate" data-aos="fade-in">
      <div class="container">
        <h2>Login</h2>
        
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      

      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="row mt-5">

     

          <div class="col-lg-12 mt-5 mt-lg-0">
          <?php
                echo '<p style="color:red">'.$msg."</p>";
          ?>
            <form method="post" role="form" class="php-email-form" enctype="multipart/form-data">
              <div class="row">
      
              </div>
              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="subject" placeholder="Your Email">
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" id="subject" placeholder="Your Password">
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" name="studentlogin">Login</button></div>
            </form>
            
            
           

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Smart Learning</h3>
            <p>
              
              <strong>Phone:</strong>76219275532
              <br>7434953328 <br>
              <strong>Email:</strong> paritapatel2001@gmail.com
              <br>
             <h7 align="center"> pdolly289@gmail.com</h7>
            <br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Course</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Content</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Biology</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Mathematics</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Chemistry</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Physics</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">English</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Computer</a></li>
            </ul>
          </div>

          <section id="contact" class="contact">
      <div data-aos="fade-up" class="aos-init">
        <iframe style="border:0; width: 50%; height: 100px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen=""></iframe>
      </div>

      <div class="container aos-init" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
           

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
         </div>

        </div>

      </div>
    </section>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          © Copyright <strong><span>Smart Learning</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">Parita &amp; Zalak</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



</body></html>