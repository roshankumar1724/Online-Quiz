<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Subject Selection </title>
		<script src="jquery.min.js"></script>
		<script type="text/javascript" src="select_jquery.js"></script>
	</head>
	<body>
			<header>
			<h1> PICT PLACEMENT BOARD</h1>
			<ul>
				<li>Home</li>
				<li>About us</li>
				<li>Contact us</li>
				<li>Feedback</li>
			</ul>
		</header>
		<div id="heading">
			<h3> 
			<?php
				echo "WELCOME    " . $_SESSION["Name"] . "<br/>";

			?>

			</h3>
			<h1>SUBJECT SELECTION</h1>	
		</div>
		<div id=container>
			<article>
				<form method="post" action="question.php">
					<table>
						<tr>
							<td>Select your choice:</td>
							<td><select name="subject" id="subject">
								<option>--Select--</option>
								<option>THEORY_SUBJECT</option>
								<option>LANGUAGE</option>
							</select>		
							</td>
						</tr>
						<tr>
							<td>Select the Subject:</td>
							<td>
								<select name="subtopic" id="subtopic">
									<!-- Dependent Select option field-->									
								</select>	
							</td> 
						</tr>
						<tr>
							<td>Select the Topic:</td>
							<td>
								<select name="subsubtopic" id="subsubtopic">
									<!-- Dependent Select option field-->									
								</select>	
							</td> 
						</tr>
						<tr>
							<td><input type="submit" id="subject_submit"></td>
						</tr>
					</table>	
				</form>
			</article>
		</div>
	</body>
</html>