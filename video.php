<?php
include('afterloginheader.php');
if(isset($_SESSION['studentlogin']))
{
    $email=$_SESSION['studentlogin'];
    $sql="select * from video join faculty on faculty.fid=video.fid
    join student on student.subid=faculty.subid 
    join subject on student.subid=subject.subid where student.email='$email'";
    $que=$conn->query($sql);
    

}

?>
<!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Videos</h2>
        <p>                               </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
  
    <!-- ======= Counts Section ======= -->
   
    <!-- ======= Testimonials Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
<?php
    while($row=$que->fetch_object())
    {
?>
          <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <video controls height="400px" width="400px">
                    <source type="video/mp4" src="../faculty/uploadvideo/<?php echo $row->file ?>">
              </video>  
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                 
                </div>

                <h3><a href="course-details.html"><?php echo $row->subname ?></a></h3>
              
              </div>
            </div>
          </div> <!-- End Course Item-->
<?php
    }
?>

        </div>

     

      </div>
    </section><!-- End Courses Section -->

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <?php
include('footer.php');

?>