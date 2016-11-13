<?php
	define("DB_HOST", 'localhost');
	define("DB_NAME", 'projectdb');
	define("DB_USER", 'root');
	define("DB_PWD", 'root123');
	
	$con = mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("Failed to connect to MySQL: " . mysql_error());
	$db = mysql_select_db(DB_NAME,$con);

	if (isset($_POST["Submit"])) {

		$reg_fName = $_POST["fName"];
		$reg_lName = $_POST["lName"];
		$reg_userName = $_POST["userName"];
		$reg_password = $_POST["password"];
		$reg_email = $_POST["email"];

		if (!empty($reg_email) && !empty($reg_password) && !empty($reg_userName) && !empty($reg_fName) && !empty($reg_lName)) {
			$Name = $reg_fName." ".$reg_lName;
			$sql=mysql_query("INSERT INTO Users values('".$reg_userName."','".$reg_password."','".$Name."','".$reg_email."')");


			if ($sql) {
				echo "
						<script>
							alert(\"New record Successfully added\");
							location.href=\"login.php\";
						</script>
					";
			}
			else{
				echo "Error";
			}
		}

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Register</title>
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
			<h1>REGISTER</h1>	
		</div>
		<div id="container">
			<article>
			<form action="" method="post">
				<table>
					<tr>
						<td> FIRST NAME:</td>
						<td><input type="text" id="fName" name="fName" placeholder="Enter your first name" required="required"></td>
					</tr>
					<tr>
						<td>LAST NAME:</td>
						<td><input type="text" id="lName" name="lName" placeholder="Enter your last name" required="required"></td>
					</tr>
					<tr>
						<td>USER NAME:</td>
						<td><input type="text" id="userName" name="userName" placeholder="Provide user name" required="required"></td>
					</tr>
					<tr>
						<td>PASSWORD:</td>
						<td><input type="password" id="password" name="password" placeholder="Enter your password" required="required"></td>
					</tr>
					<tr>
						<td>E-MAIL ID:</td>
						<td><input type="text" id="email" name="email" placeholder="Enter your emailID" required="required"></td>
					</tr>
					<tr>
						<td>GENDER:</td>
						<td><input type="radio" id="male" name="gender">Male<br/>
						<input type="radio" id="female" name="gender">Female<br/></td>
					</tr>
					<tr>
						<td><input type="submit" value="SUBMIT" id="Submit" name="Submit">
					</tr>
				</table>
				</form>
			</article>
		</div>
	</body>
</html>