<?php

	define("DB_HOST", 'localhost');
	define("DB_NAME", 'projectdb');
	define("DB_USER", 'root');
	define("DB_PWD", 'root123');
	
	$con = mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("Failed to connect to MySQL: " . mysql_error());
	$db = mysql_select_db(DB_NAME,$con);

	if (isset($_POST["login"])) {

		$form_userName = $_POST["userName"];
		$form_password = $_POST["password"];

		$sqlQuery = mysql_query("SELECT Password FROM Users WHERE UserName = '".$form_userName."' LIMIT 1");
		if (!$sqlQuery) {
			die(mysql_error());
		}

		$row = mysql_fetch_array($sqlQuery);

		if ($form_password === $row['Password']) {
			session_start();
			$name_query=mysql_query("SELECT Name from Users WHERE UserName='".$form_userName."'");
			if (!$name_query) {
				die(mysql_error());
			}

			$row2 = mysql_fetch_array($name_query);
			$name=$row2['Name'];

			$_SESSION["Name"]=$name;
			redirect("mainPage.php");
		}
		else {
			echo "
					<script>
					alert(\"LOGIN FAILED... PLEASE TRY AGAIN ! \");
					</script>
				";
		}
	}

	function redirect($url)
	{
		ob_start();
		header('Location: '.$url);
		ob_end_flush();
		die();
	}

?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<base target="_self" />
	</head>
	<body id="l">
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
		<div id="heading">
			<h1>LOGIN</h1>	
		</div>
		<div id="container">
			<article>
			<fieldset style="width:30%"><legend>LOG-IN HERE</legend>
				<form method="post">
					<table>
						<tr>
							<td>USERNAME:</td>
							<td><input type="text" id="userName" name="userName" placeholder="Enter your USERNAME" required="required"></td>
						</tr>
						<tr>
							<td>PASSWORD:</td>
							<td><input type="password" id="password" name="password" placeholder="Enter your password" required="required"></td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="LOGIN" id="login" name="login">
							</td>
							<td>
								New User? <a href="register.php">REGISTER HERE</a>
							</td>
						</tr>
					</table>
				</form>
			</fieldset>
			</article>
		</div>
	</body>
</html>