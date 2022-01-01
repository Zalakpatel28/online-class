<?php
include('header.php');
if(isset($_POST['register']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $contact=$_POST['contact'];
  $subject=$_POST['subject'];
  $gender=$_POST['gender'];
  $add=$_POST['address'];
  $dob=$_POST['dob'];
  $photo=$_FILES['photo']['name'];//name is its property like tempname,type,size

  $sql="insert into student values('','$fname','$lname','$email','$pass'
  ,'$contact','$subject','$gender','$add','$dob','$photo')";
  $conn->query($sql);
  move_uploaded_file($_FILES['photo']['tmp_name'],"studentimg/".$photo);
  header("location:login.php");

  $msg="THANK YOU FOR THE REGISTRATION";
  mail($email,"Registerstion succesful",$msg);
}
$sql2="select * from subject ";
$que2=$conn->query($sql2);


?><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>New User</h2>
        
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

     

          <div class="col-lg-12 mt-5 mt-lg-0">

            <form method="post" role="form" class="php-email-form" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" required name="fname" class="form-control" id="name" placeholder="Your First Name">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" required class="form-control" name="lname" id="email" placeholder="Your Last Name">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="subject" placeholder="Your Email" >
              </div>
              <div class="form-group mt-3">
                <input type="password" required class="form-control" name="password" id="subject" placeholder="Your Password" >
              </div>
              <div class="form-group mt-3">
                <input type="text"required class="form-control" name="contact" id="subject" placeholder="Your Contact" >
              </div>
              <div class="form-group mt-3">
              <select class="form-control" name="subject" id="subject" placeholder="Your Subject" >
                        <?php
                            while($row2=$que2->fetch_object())
                            {    
                               
                        ?>
                                <option value="<?php echo $row2->subid ?>"><?php echo $row2->subname ?></option>
                        <?php
                                
                            }
                        ?>
                </select> </div>
              <div class="form-group">
                <input type="radio" style="height:20px" class="form-check-input" name="gender" value="male" > Male
                <input type="radio" style="height:20px" class="form-check-input" name="gender" value="female">  Female
            </div>
           
             
              <div class="form-group mt-3">
                <textarea class="form-control" name="address" rows="5" placeholder="Address" ></textarea>
              </div>
              <div class="form-group mt-3">
                <input type="date" class="form-control" name="dob"  placeholder="Your DOB" >
              </div>
              <div class="form-group mt-3">
                <input type="file" class="form-control" name="photo" id="subject" placeholder="Your Photo" >
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" name="register">Registration</button></div>
            </form>
            <br>
                <h6 align="center">OR</h6>
            
            <div class="text-center"><a href="login.php">Sign In</a></div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<!-- ======= Footer ======= -->
<?php
include('footer.php');

?>