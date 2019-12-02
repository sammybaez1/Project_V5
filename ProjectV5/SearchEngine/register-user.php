<!doctype html>
<html>
<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start()
?>

<head>
	<meta charset="utf-8">
	<title>Register | BookingSite </title>
	<style>
		#account {
			color: white;

		}

		.account {
			color: white;
		}
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container-fluid">
		<!-- nav -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
			<a class="navbar-brand" href="index.php">Booking</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="booking.php">Booking</a>
					</li>
					<?php
					//change nav if signed in
					if ($_SESSION['BookingLoggedin']) {
						print '

					<li class="nav-item">
						<a class="nav-link" href="myprofile.php">My Flights</a>
					</ li>
					';
					}
					?>
				</ul>
			</div>
			<div id="account">

				<?php
				//change nav if signed in
				if (!$_SESSION['BookingLoggedin']) {
					print '
							<a id="userAccount" class="account" href="login.php">Log in</a>
							<a id="registerAccount" class="account" S href="Register.php">Register</a>
							';
				} else {
					print " Logged In: ";
					print '<a id="myprofile" class="account" S href="myprofile.php">   ' . $_SESSION['BookingUser'] . '  </a>';
					print " | ";
					print '<a id="logOut" class="account" S href="logout.php">Log Out</a>';
				}
				?>
			</div>

		</nav>
		<!-- nav -->
		<!-- nav -->

		<div class="container bg-light">
			<?php
			require '../database-connection.php';
			?>

			<?php echo "User Name: " . $_POST["user"]; ?><br>
			<?php echo "Password: " . $_POST["pass"]; ?><br>
			<?php echo "Email: " . $_POST["email"]; ?><br>
			<?php echo "First Name: " . $_POST["firstname"]; ?><br>
			<?php echo "Last Name: " . $_POST["lastname"]; ?><br>
			<?php echo "Question: " . $_POST["secretquestion"]; ?><br>
			<?php echo "Answer: " . $_POST["secretanswer"]; ?><br>

			<?php

			//Data 
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$secretquestion = $_POST['secretquestion'];
			$secretanswer = $_POST['secretanswer'];
			$isAdmin = 0;

			//Check if user already exists


			$query = 'SELECT user_id FROM Customers WHERE user_id =' . "'" . $user . "'";
			$result = $mysqli->query($query);

			if ($result->num_rows > 0) {
				echo "Registration failed, user already exists";
				echo '<br><a href="register.php">Register</a>';
			} else { // Add user to database 
				$query = "INSERT INTO Customers VALUES('" . $user . "', '" . $pass . "', '" . $firstname . "', '" . $lastname . "', '" . $email . "', '" . $secretquestion . "', '" . $secretanswer . "')";
				$result = $mysqli->query($query);
				if ($result) {
					echo "Registration Successful";
					echo '<br><a href="login.php">Login</a>';
				} else {
					echo $mysqli->error;
					echo '<br><a href="register.php">Register</a>';
				}
			}


			?>

		</div>
		<!-- Footer -->
		<footer class="page-footer font-small indigo">
			<div class="footer text-center py-3">Booking
			<a class="nav-link" href="../directory.php">Directory</a>
			</div>
		</footer>
		<!-- Footer -->
	</div>
</body>

</html>