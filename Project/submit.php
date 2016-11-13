<?php


// $a_qst=[];
// $a_qst_ans=[];
// echo count($temp);S
// $sum=0;
// $length_attempted=count($temp);

// while ( $length_attempted!=0) {
// 	$a_qst[i] = $temp[i].Question_No;
// 	$i++;
// 	$length_attempted--;
// }

// for ($i=0; $i <count($temp) ; $i++) { 
// 	$a_qst[$i]=$temp[$i].Question_No;
// 	$a_qst_ans[$i]=$temp[$i].Answer;
// }
$temp=[];
$temp=$_POST["data"];



$q_count=count($temp);
$sum=0;
$i=0;

// $temp2=json_encode($temp);


	$con = mysql_connect('localhost','root','root123')or die("Failed to connect to MySQL: " . mysql_error());
	mysql_select_db("projectdb");

	while($q_count>0){

		$qNo = $temp[$i]["Question_No"];
		// $Q_no=$qNo["Question_No"];

		$get_ans_query="Select Correct_Option from q_answers where Question_id=".$qNo;
		$result = mysql_query($get_ans_query);
		$row = mysql_fetch_array($result);

		if (!$result) {
			// echo "Could not successfully run query ($L1_qst_query) from DB :" .mysql_error();
			$sum = 5;
			exit();
		}

		$a=$temp[$i]["Answer"];
	
		 if($row["Correct_Option"]==$a){
			$sum++;
		 }
		$q_count--;
		$i++;

	}

// do no edit this

// $data["sum"]=count($temp);
// $data["sum"] = $a_qst[];

$data["sum"]=$sum;

echo json_encode($data);

?>
