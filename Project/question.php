<?php
$con=mysql_connect("localhost","root","root123");
mysql_select_db("projectdb");
$counter=0;
$GLOBALS["sub_id"]=0;

$selected_topic=$_POST["subsubtopic"];
switch ($selected_topic) {
	case 'st1':
	$sub_id=0;		
	break;

	case 'st2':
	$sub_id=0;		
	break;

	case 'st3':
	$sub_id=0;		
	break;

	case 'fun':
	$sub_id=4;		
	break;

	case 'str':
	$sub_id=0;		
	break;

	case 'ptr':
	$sub_id=0;		
	break;

	case 'arr':
	$sub_id=0;		
	break;
}

	// function get_question($sub_id)
	// {	
		/*$Q_query=mysql_query(" Select Question_id from Allotment where Subtopic_id=1");
		if (!$Q_query) {
			die(mysql_error());
		}

		$Q_row=mysql_fetch_array($Q_query);
		print_r($Q_row['Question_id']);//
		$random_qst=array_rand($Q_row,1);
		echo "$random_qst";*/

		?>


		<!DOCTYPE html>
		<html lang="en">
		<head>
			<title>Question</title>
			<link rel="stylesheet" type="text/css" href="main.css">
			<link rel="stylesheet" type="text/css" href="question.css">

		</head>
		<body>

		<div class="sbmt">
			<form class="end" action="submit.php">
				<input type="submit" value="Submit">

			</form>

		</div>
			<header>
				<h1> PICT PLACEMENT BOARD</h1>
				<div class="tabs">
					<ul class="tabLinks">
						<li class="active"><a href="home.html">Home</a></li>
						<li><a href="aboutUs.html">About us</a></li>
						<li><a href="contact.html">Contact us</a></li>
						<li><a href="feedBack.html">Feedback</a></li>
					</ul>
				</div>
			</header>
			<article>
				<div id="Q_no">
				<h1 class="rslt"></h1>
					<h3>Question No. :
					</h3>
				</div>
				<div id="Qst">
					<div id="Q_desc">
						<?php
						//get_question($sub_id);

						$L1_qst_query="Select * from question where Level_id=1 and Subtopic_id=".$sub_id ." and provided=0 limit 4";
						$result_L1=mysql_query($L1_qst_query);


						if (!$result_L1) {
							echo "Could not successfully run query ($L1_qst_query) from DB :" .mysql_error();
							exit();
						}

						if (mysql_num_rows($result_L1)==0) {
							echo "No question found !!!";
							exit();
						}

						echo "<div class='q_wrap'>";
						$GLOBALS["sample"]=1;

						while ($GLOBALS["row"]=mysql_fetch_assoc($result_L1)){
							?>


							<div class=" question <?php echo $row['Question_id'] ?>" data-test="<?php echo $sample; $sample++;?>">
								<?php
								echo "<h3> ".++$counter."</h3>";
								echo $row["Description"];
								echo "<br />";
								echo "
										<img src=\"data:image/png;base64,". base64_encode($row['Image'])."\" />
									";
								?>

								<div class="options">

									<?php

									$opt_query="Select Option1,Option2,Option3,Option4 from q_options where Question_id= ".$row["Question_id"];

									$result_opt=mysql_query($opt_query);

									while ($GLOBALS["row1"]=mysql_fetch_assoc($result_opt)) {
										$GLOBALS["qText1"] = $row1["Option1"];
										$GLOBALS["qText2"] = $row1["Option2"];
										$GLOBALS["qText3"] = $row1["Option3"];
										$GLOBALS["qText4"] = $row1["Option4"];
									}
									
									?>

									<input type="radio" class="<?php echo $row['Question_id']; ?>" name="option" value="opt1"  /> <?php echo $qText1 ?>
									<input type="radio" class="<?php echo $row['Question_id']; ?>" name="option" value="opt2" /> <?php echo $qText2 ?> <br />
									<input type="radio" name="option" value="opt3"  class="<?php echo $row['Question_id']; ?>"/> <?php echo $qText3 ?>
									<input type="radio" name="option" value="opt4" class="<?php echo $row['Question_id']; ?>"/> <?php echo $qText4 ?> <br />

								</div>
								<br>
								<button onclick="next_ques();" >Next Question</button>

							</div>
						<?php
						}
						echo "</div>";
						?>
					</div>
				</div>
			</article>
			<script type="text/javascript" src="jquery.min.js"></script>
			<script type="text/javascript" src="question.js"></script>
</body>
</html>