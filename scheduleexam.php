<?php
include('afterloginheader.php');
if(isset($_SESSION['studentlogin']))
{
    $email=$_SESSION['studentlogin'];
    $sql="select * from exam join faculty on faculty.fid=exam.fid 
    join student on student.sid=exam.sid where student.email='$email'";
    $que=$conn->query($sql);

}

?>
<!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Exam Schedule</h2>
        <p>                                </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
  
    <!-- ======= Counts Section ======= -->
   
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">
      <div class="row">
      <br>
      <div class="col-lg-12 pt-4 pt-lg-0  content">
         <table class="table table-bordered">
                <th>Exam Date</th>
                <th>Exam Time</th>
                <!-- <th>faculty Name</th> -->
                <th>Total Marks</th>
                <th>Action</th>
            <?php
                    while($row=$que->fetch_object())
                    {
            ?>
                <tr>
                        <td><?php echo $row->edate ?></td>
                        <td><?php echo $row->etime ?></td>
                      
                        <td><?php echo $row->totalmarks ?></td>

                        <td>
<?php
date_default_timezone_set("Asia/Kolkata");
//$now = new DateTime(null, new DateTimeZone('Asia/Kolkata'));
//$now->setTimezone(new DateTimeZone('Asia/Kolkata'));    // Another way
//echo date("H:i:s");

?>
                                <button class="btn btn-primary">
                                    <?php
                                  //  echo strtotime(date("H:i:s"))."<br>";
                                  //  echo strtotime($row->examtime);

                                     if(date("Y-m-d")==$row->edate && strtotime(date("H:i:s"))>=strtotime($row->etime))
                                    {
                                      $mktime=strtotime($row->etime)+3600;
                                     //echo $mktime;echo "<br>";
                                    //echo time();
                                        if($mktime<=time())
                                        {
                                    ?>  
                                            <span >Your Exam Time Has Been EXPIRED!</span>
                                             
                                    <?php
                                        }else{
                                    ?>
                                            <a href="exam.php?eid=<?php echo $row->eid ?>"><span class="btn__text">Start Exam</span></a>
                                    <?php
                                        }
                                    }
                                    else if(date("Y-m-d")>$row->edate)
                                    {
                                    ?>
                                        <span class="btn__text">Exam Completed</span>
                                  
                                    <?php
                                      }
                                      else
                                      {
                                    ?>
                                         <span class="btn__text">Upcomming Exam</span>
                                    <?php
                                      }
                                    ?>
                                    </button>
                                </td>
                      </div>
                    </div>
                   <?php
                    }
                   ?>
                </tr>

            <?php
                    //}
            ?>
         </table>


     </div>
         
        </div>
    

      
      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <?php
include('footer.php');

?>