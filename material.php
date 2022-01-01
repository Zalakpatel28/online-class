<?php
include('afterloginheader.php');
//session_start();
$id=$_SESSION['studentlogin1'];

$sql="select * from material join  subject on subject.subid=material.subid 
join student on student.subid=subject.subid where student.sid='$id'";
$que=$conn->query($sql);

if(isset($_REQUEST['dn']))
{
  $dn=$_GET['dn'];
  
$file_url = 'C:\xampp\htdocs\parita\studentpanel'.$dn;  
header('Content-Type: application/octet-stream');  
header("Content-Transfer-Encoding: utf-8");   
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");   
readfile($file_url);

}

?>
<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Material Details</h2>
        <p>                                </p>
      </div>
    </div><br>
    <div class="container" data-aos="fade-up">
      <div class="row">
      
    <div class="col-lg-12 pt-4 pt-lg-0  content">
     
        <table class="table table-bordered">
                      <th>Subject Name</th>
                      <th>Material</th>
                      
                      <th>Action</th>
                     
                     <?php
                        while($row=$que->fetch_object())
                        {
                     ?>
                     <tr>
                      <td><?php echo $row->subname; ?></td>
                      <td><?php echo $row->file; ?></td>
                      
                      <td>
                          <div class="options2__dropdown js-options-dropdown">
                              <a class="options2__link" href="material.php?dn=<?php echo $row->file ?>">
                              Download</a>
                        </td>
                        </tr>
                        
                        <?php
                        }
                    ?>
                        </table>
                        </div>
                      </div>
                    </div>

                  </div>
                   
</div>
<?php
include('footer.php');
?>