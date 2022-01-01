<?php
include('afterloginheader.php');
$sql="select * from temp join question on temp.question_id=question.question_id";
$que=$conn->query($sql);

$count=0;
 
// foreach($row as $key=>$value)
// {
//   print_r($key);  
// }
//exit();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="page__container">

    <div class="page__content">
        <div class="dashboard">


            
<div id="">

				
		
		<form method="post" name="frm">
		<table  align="center" frame="box">
			<input type="hidden" name="correct_ans" value="<?php echo $rws['answer']; ?>">	
		
			<input type="hidden" name="st_ans" value="<?php echo $rws['correct_answer']; ?>">	
			
		
			
			
			</table><br />
		
	
			<table  align="center" class="table table-striped table-bordered">
			
			<tr>
				
				<th><h3 align="left">Question</h3></th>
				<th><h3 align="left">Correct Answer</h3></th>
				<th><h3 align="left">Your Answer</h3></th>
				<th><h3 align="left">Score</h3></th>
				<th><h3 align="left">True/false</h3></th>	
			</tr>
			<div class="container">
        <h2>Result</h2>
        <p>       
      </p>
      </div>
	
		<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
		 <h2>Test Result</h2>
       
      </div>
    </div>
	<br>
    <div class="container" data-aos="fade-up">
      <div class="row">	
		 <br/>
		             
		
			<?php 
					while($fetch_res=$que->fetch_object())
					{
			 ?>
			<tr>
				
				<td><?php echo $fetch_res->question; ?></td>
				<td><?php echo $fetch_res->correctAns; ?></td>
				<td><?php echo $fetch_res->answer; ?></td>
				<td ><?php
				if($fetch_res->correctAns==$fetch_res->answer)
				{
                    echo "1";
                    $count++;
				}
				else
				{
					echo "0";
				}
				?>	
				</td>
				<?php
				if($fetch_res->correctAns==$fetch_res->answer)
				{
				?>		
				<td align="center"><img src="assets/img/correct.png" height="20px" width="px"></td>				<?php
				}
				else
				{
				?>
				<td align="center"><img src="assets/img/wrong.png" height="20px" width="px"></td>							                <?php
				}
				?>
						
				
			</tr>
			<?php
			}
			?>
            
        </table>
        <br>
        <br>
		<h1 align="center">Your Score: <?php echo $count;
		// if($count>0)
		// {
		// 	$_SESSION['score']=$count;
		// 	$score=$_SESSION['score'];
		// 	$examid=$_SESSION['eid'];
		// 	$uid=$_SESSION['studentlogin1'];
		// 	$sql4="insert into result values('','$uid','$examid','1','$score')";
		// 	$conn->query($sql4);
		// 	//echo $sql4;
		// }
			
		?></h1>

        	</div>
			<div class="page_contain">
		
<!-- <table align="left" class="table table-stripped table-bordered" >
<br>
<br>	
		<h1 align="center" class=""><u>All Test Result</u></h1><br />
		
			<th><h3 align="left">Total Marks</h3></th>
			<th><h3 align="left">Obtain Marks</h3></th>
			<th><h3 align="left">Exam ID</h3></th>
			<th><h3 align="left">Exam Date</h3></th>
			<th><h3 align="left">Faculty Name</h3></th>
			<?php
				// $sql5="select * from result join exam on result.eid=exam.eid 
				// join faculty on faculty.fid=exam.fid
				// where result.sid='$uid'";
				// $que5=$conn->query($sql5);
				// while($row5=$que5->fetch_object())
				// {
			?>
			<tr>
		
			<td><?php// echo $row5->obtainmarks ?></td>
			<td><?php //echo $row5->eid ?></td>
			<td><?php //echo $row5->edate ?></td>
			<td><?php //echo $row5->firstname ?></td>
			</tr>
			<?php// } ?> -->
			</table>
</div> -->
            </div>
			
    </div>
	



</div>
<br><br><br>
<?php
include('footer.php');
?>