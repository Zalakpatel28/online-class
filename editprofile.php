<?php
include('afterloginheader.php');
if(isset($_REQUEST['email']))
{
    $mail=$_GET['email'];
    $sql1="select * from student join subject on student.subid=subject.subid
     where email='$mail'";
    $que1=$conn->query($sql1);
    $row1=$que1->fetch_object();

    if(isset($_POST['editprofile']))
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

    $sql="update student set firstname='$fname',lastname='$lname',email='$email',pasword='$pass'
    ,contect='$contact',subid='$subject',gender='$gender',address='$add',dob='$dob',photo='$photo' where email='$mail'";
    $conn->query($sql);
    move_uploaded_file($_FILES['photo']['tmp_name'],"studentimg/".$photo);
    header("location:studentprofile.php");

    }
 //   echo $sql;
}
$sql2="select * from subject ";
$que2=$conn->query($sql2);

?><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>My Profile</h2>
        
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
                  <input type="text" name="fname" class="form-control" id="name" placeholder="Your First Name" value="<?php echo $row1->firstname ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="lname" id="email" placeholder="Your Last Name" value="<?php echo $row1->lastname ?>">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="subject" placeholder="Your Email" value="<?php echo $row1->email ?>">
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" id="subject" placeholder="Your Password" value="<?php echo $row1->pasword ?>">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="contact" id="subject" placeholder="Your Contact" value="<?php echo $row1->contect ?>">
              </div>
              <div class="form-group mt-3">
                <select class="form-control" name="subject" id="subject" placeholder="Your Subject" >
                        <option value="<?php echo $row1->subid ?>"><?php echo $row1->subname ?></option>
                        <?php
                            while($row2=$que2->fetch_object())
                            {    
                                if($row2->subid!=$row1->subid)
                                {
                        ?>
                                <option value="<?php echo $row2->subid ?>"><?php echo $row2->subname ?></option>
                        <?php
                                }
                            }
                        ?>
                </select>
              </div>
              <div class="form-group">
                <input type="radio" style="height:20px" class="form-check-input" name="gender" value="male" 
                            <?php
                                if($row1->gender=='male')
                                {
                                    echo "checked";
                                }
                            ?>
                > Male
                <input type="radio" style="height:20px" class="form-check-input" name="gender" value="female"
                <?php
                                if($row1->gender=='female')
                                {
                                    echo "checked";
                                }
                            ?>
                >  Female
            </div>
           
             
              <div class="form-group mt-3">
                <textarea class="form-control" name="address" rows="5" placeholder="Address" >
                                <?php
                                echo $row1->address
                                ?>
                </textarea>
              </div>
              <div class="form-group mt-3">
                <input type="date" class="form-control" name="dob"  placeholder="Your DOB" value="<?php
                                echo $row1->dob
                                ?>" >
              </div>
              <div class="form-group mt-3">
                <input type="file" class="form-control" name="photo" id="subject" placeholder="Your Photo" value="<?php
                                echo $row1->photo
                                ?>" >
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" name="editprofile">Update</button></div>
            </form>
            </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<!-- ======= Footer ======= -->
<?php
include('footer.php');

?>