<?php
include('afterloginheader.php');
if(isset($_SESSION['studentlogin']))
{
    $email=$_SESSION['studentlogin'];
    $sql="select * from student where email='$email'";
    $que=$conn->query($sql);
    $row=$que->fetch_object();

}

?>
<!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Profile</h2>
        <p>                               </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
  
    <!-- ======= Counts Section ======= -->
   
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">
      <div class="row">
      <br>
      <div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-2  content">
            <p>Name: <?php echo $row->firstname." ".$row->lastname?></p>
            <p>Email: <?php echo $row->email ?></p>
            <p>Contact: <?php echo $row->contect?></p>
            <p>Gender: <?php echo $row->gender ?></p>
            <p>Address: <?php echo $row->address ?></p>

            <p><a href="editprofile.php?email=<?php echo $row->email ?>">Change Profile Details</a>

            


     </div>
          <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-left" data-aos-delay="100">
            <img src="studentimg/<?php echo $row->photo ?>" class="img-fluid" alt="">
          </div>
         
        </div>
    

      
      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <?php
include('footer.php');

?>