<?php

	$con = mysql_connect('localhost','root','root123');
	mysql_select_db("projectdb");
	$a=3;
	$i=0;

	$get_ans_query=mysql_query("Select * from q_answers");

	while ($list=mysql_fetch_assoc($get_ans_query)) {
		while ($a>0) {
			if ($temp[i].Question_No==$list['Question_id']) {
				if ($temp[i].Answer==$list['Correct_option']) {
					$sum+=1;
					$i++;
					break;
				}
				else
					$i++;
			}
			else
				$i++;
		}
	}

?>