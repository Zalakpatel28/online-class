<?php
include('afterloginheader.php');
//ob_start();
if(isset($_REQUEST['eid']))
{
	$eid=$_GET['eid'];
	$_SESSION['examid']=$eid;
	//echo $eid;
	//$_SESSION['start']=$eid;
//	setcookie("examstart", $eid, time()+3600);
//	echo $_COOKIE['examstart'];exit;
if(isset($_POST['submitexam']))
{
	$sql1="truncate table temp";
	$conn->query($sql1);

	if(count($_POST) > 0){
			
		foreach($_POST as $key=>$val){
			
			$queans[] = array('question' => $key,
							'answer' => $val,'eid'=>$eid);
		}
		
		for($j=0; $j<count($queans); $j++){
			
				$ins = "insert into temp(question_id,answer,eid) values('".$queans[$j]['question']."','".$queans[$j]['answer']."','".$queans[$j]['eid']."'); ";
				$ex = $conn->query($ins);
				
		}
		//header("location:summary.php");
	// /echo "<script>alert('Exam Submited Sucessfully!! Thank You!!');</script>";
	//echo "<script>window.location.href='temp.php'</script>";
	header("location:result.php");
	}
}
}
$name=$_SESSION['studentlogin1'];
if(isset($_REQUEST['eid']))
{
$eid=$_GET['eid'];
$sql="select * from question join subject on question.subid=subject.subid
join student on subject.subid=student.subid 
join exam on subject.subid=exam.subid where student.sid='$name' and 
exam.eid='$eid'";
 echo $sql;///exit;
$que=$conn->query($sql);
$row3=$que->fetch_object();
}

// $sql2="select * from exam join student on exam.user_id=student.user_id where student.user_name='$name'";
// $que2=$conn->$sql2;
// $row2=$que2->fetch_object();
// if($row2->date==date('Y-m-d'))
// {
// 	header("location:exam.php");
// }
// else
// {
// 	header("location:upcoming-exam.php");
// }
// if(!isset($_COOKIE['start']))
// {
//  header('location:upcoming-exam.php');
// }
?>
<div class="page__container">
    <div class="page__content">
	<?php 

//$phpvar="3600"; 

?> 
<!-- 
<script>

function countDown(secs,elem) {

var element = document.getElementById(elem);

element.innerHTML = "Timer: "+secs+" seconds";

if(secs < 1) {

clearTimeout(timer);

element.innerHTML = '<h2>End Exam</h2>';

//element.innerHTML += '<a href=" ">Reset</a>';

}

secs--;

var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);

}

</script> -->

<div id="status"style="font-size:30px;"></div>

<!-- <script>countDown(<?php echo $phpvar; ?>,"status");</script> -->
<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2022 <?php echo $row3->etime ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
 // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  //var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML =  minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
//   if (distance < 0) {
//     clearInterval(x);
//     document.getElementById("demo").innerHTML = "EXPIRED";
//   }
if(minutes==0)
{
	window.location.href="result.php";
}
}, 1000);
</script>

<br><br><br>
        <div class="container">
		<p id="demo"></p>
		<h2>Exam Paper</h3>
        <?php		
            while($r=$que->fetch_object())
			{
			?>
			<form method="post" name="frm">
			
		<table class="table">
			
		<tr>
			<td colspan="2"><h3><?php echo $r->question; ?></h3></td>
			
		</tr>	
		
			<tr>	
			<td width="50%"><input type="radio"  name="<?php echo $r->question_id ?>" value="<?php echo $r->answer1 ?>"/>
		<?php echo $r->answer1; ?></td>
			
		
		
							  
			<td><input type="radio" name="<?php echo  $r->question_id ; ?>" value="<?php echo $r->answer2 ?>"/>
			
			<?php echo $r->answer2; ?></td>
			
			<br>
			
			<tr>
			<td><input type="radio"   name="<?php echo  $r->question_id ; ?>" value="<?php echo $r->answer3 ?>"/>
			
			<?php echo $r->answer3; ?></td>
		
			
			<td><input type="radio"  name="<?php echo  $r->question_id ; ?>" value="<?php echo $r->answer4; ?>" />
			<?php echo $r->answer4; ?></td>
			</tr>
		<br>
		</table>		
		
		
		
	</tr>
		<?php
		}
		?>
		<br>
		<tr>
	    <td >		
			<button type="submit" name="submitexam" align="center" class="form-group btn btn-primary">
				Submit
			</button>
			
			
			<!--<button name="submit_ans"><h1>Submit Answer</h1></button><br />
		-->
		</td>
		</tr>
		</table>
		</form>
		
        </div>
    </div>
</div>
<br>
<?php
include('footer.php');
ob_flush();
?>