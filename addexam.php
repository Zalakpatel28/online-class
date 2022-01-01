<?php
ob_start();
include('header.php');
if(isset($_POST['addexam']))
{
  $edate=$_POST['edate'];
  $etime=$_POST['etime'];
  $fid=$_SESSION['flogin1'];
  $studentname=$_POST['sid'];
  $marks=$_POST['totalmarks'];
  $subid=$_POST['subid'];
  $sql="insert into exam values('','$etime','$edate','$fid','$studentname','$marks','$subid')";
 // echo $sql;exit;
  $conn->query($sql);
  header("location:viewexam.php");
  $sql2="select * from student where sid='$studentname'";
  $que2=$conn->query($sql2);
  $row2=$que2->fetch_object();
  $sendto=$row2->email;
  
  $msg="Exam Schedule
  Exam Date: ".$edate.
  "Exam Time:".$etime;
  //echo $msg;
  mail($sendto,"Exam Schedule",$msg);

}
if(isset($_REQUEST['eeid']))
{
  $id=$_GET['eeid'];
  $sql1="select * from exam join faculty  on faculty.fid=exam.fid 
  join subject on exam.subid=subject.subid join student on student.sid=exam.sid where exam.eid='$id'";
  $que1=$conn->query($sql1);
  $row1=$que1->fetch_object();

    if(isset($_POST['updateexam']))
    {
      $edate=$_POST['edate'];
      $etime=$_POST['etime'];
      $fid=$_SESSION['flogin1'];
      $studentname=$_POST['sid'];

      $marks=$_POST['totalmarks'];
      $subid=$_POST['subid'];
      $sql="update  exam set edate='$edate',etime='$etime',
      fid='$fid',sid='$studentname',totalmarks='$marks',subid='$subid' where eid='$id'";
   // echo $sql;
      $conn->query($sql);

      header("location:viewexam.php");
     
    }
}
$sql="select * from student";
$que=$conn->query($sql);

$sql11="select * from subject";
$que11=$conn->query($sql11);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Schedule Exam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add exam</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <?php
          if(isset($_REQUEST['eeid']))
          {
        ?>
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add exam</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                
                   <div class="form-group">
                   
                    
                   
                    <div class="form-check">
                    <label for="exampleInputFile">Date</label>
                        <input type="date" class="form-control" id="exampleInputdate" name="edate" value="<?php echo $row1->edate ?>">
                        <br>
                        <label for="exampleInputFile">Time</label>
                        <input type="time" class="form-control"id="exampleInputtime" name="etime" value="<?php echo $row1->etime ?>">
                        
                    </div><br>
                  <div class="form-check">
                  <label for="exampleInputFile">Student Name</label>
                  <select name="sid" class="form-control" id=exmapleInputstudentname" name ="studentname" value=<?php echo $row1->studentname?>>
                        <option value="<?php echo $row1->sid ?>"><?php echo $row1->email ?></option>
                        <?php
                      while($row=$que->fetch_object())
                      {
                        if($row->email!=$row1->email)
                        {
                      ?>
                    <option value="<?php echo $row->sid ?>"><?php echo $row->email ?></option>

                      <?php
                        }
                      }
                      ?>
                  </select>
                  <br>
                  <label for="exampleInputFile">Total Marks</label>
                  <input type="text" class="form-control" name="totalmarks" placeholder="Enter Total Marks" value="<?php echo $row1->totalmarks ?>">
                  <br>
                  <label for="exampleInputFile">subject Name</label>
                  <select name="subid" class="form-control" id=exmapleInputstudentname" name ="studentname" value=<?php echo $row1->studentname?>>
                        <option value="<?php echo $row1->sid ?>"><?php echo $row1->email ?></option>
                        <?php
                      while($row11=$que11->fetch_object())
                      {
                        if($row11->subid!=$row1->subid)
                        {
                      ?>
                    <option value="<?php echo $row11->subid ?>"><?php echo $row11->subname ?></option>

                      <?php
                        }
                      }
                      ?>
                  </select>
                  <br>

                  <input class="btn btn-primary" type="submit" name="updateexam" value="Update Exam">
                  </div>  
                  </div>
                  
                  
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->
           
            <!-- /.card -->

          </div>
          <!-- ./col -->
        </div>
        <?php
          }
         else
          {
        ?>
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add exam</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                
                   <div class="form-group">
                   
                    
                   
                    <div class="form-check">
                    <label for="exampleInputFile">Date</label>
                        <input type="date" class="form-control" id="exampleInputdate" name="edate">
                        <br>
                        <label for="exampleInputFile">Time</label>
                        <input type="time" class="form-control"id="exampleInputtime" name="etime" >
                        
                    </div><br>
                  <div class="form-check">
                  <label for="exampleInputFile">Student Name</label>
                  <select name="sid" class="form-control" id="exmapleInputstudentname" name ="studentname">
                        <option>Select Student</option>
                        <?php
                      while($row=$que->fetch_object())
                      {
                                             ?>
                    <option value="<?php echo $row->sid ?>"><?php echo $row->email ?></option>

                      <?php
                        
                      }
                      ?>
                  </select>
                  <br>
                  <label for="exampleInputFile">Total Marks</label>
                  <input type="text" class="form-control" name="totalmarks" placeholder="Enter Total Marks">
                  <br>
                  <label for="exampleInputFile">subject Name</label>
                  <select name="subid" class="form-control" id="exmapleInputstudentname">
                     <option>Select Subject</option>
                        <?php
                      while($row11=$que11->fetch_object())
                      {
                       
                      ?>
                    <option value="<?php echo $row11->subid ?>"><?php echo $row11->subname ?></option>

                      <?php
                      
                      }
                      ?>
                  </select>
                  <br>
                  <input class="btn btn-primary" type="submit" name="addexam" value="Schedule Exam">
                  </div>  
                  </div>
                  
                  
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->
           
            <!-- /.card -->

          </div>
          <!-- ./col -->
        </div>
        <?php
          }
        ?>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include('footer.php');
ob_flush();
  ?>