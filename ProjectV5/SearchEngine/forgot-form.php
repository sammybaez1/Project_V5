<!doctype html>
<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start()
?>

<html>

<head>
	<meta charset="utf-8">
	<title>BookingSite </title>
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
					<li class="nav-item active">
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
					} else { }
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

		<div class="container bg-light">


			<form id="forgotUsername" action="forgot-username.php" method="post">
				<fieldset>
					<legend class="h4 mb-4">Forgot Username</legend>
					<label for="email">Email Address</label>
					<input name="email" id="email" type="email" class="form-control mb-4">
					<label for="secretquestion">Security Question</label>
					<select name="secretquestion" id="secretquestion" type="secretquestions" class="form-control mb-4">
						<option value="sq1">What is your mother's maiden name?</option>
						<option value="sq2">What was your first pet?</option>
						<option value="sq3">What was the model of your first car?</option>
						<option value="sq4">In what city were you born?</option>
					</select>
					<label for="secretanswer">Answer</label>
					<input name="secretanswer" id="secretanswer" type="secretanswer" class="form-control mb-4">
					<input type="submit">
				</fieldset>
				<br>
			</form>

			<form id="forgotPassword" action="forgot-password.php" method="post">
				<fieldset>
					<legend class="h4 mb-4">Forgot Password</legend>
					<label for="user">Username</label>
					<input name="user" id="user" type="user" class="form-control mb-4">
					<label for="email">Email Address</label>
					<input name="email" id="email" type="email" class="form-control mb-4">
					<label for="secretquestion">Secret Question</label>
					<select name="secretquestion" id="secretquestion" type="secretquestions" class="form-control mb-4">
						<option value="sq1">What is your mother's maiden name?</option>
						<option value="sq2">What was your first pet?</option>
						<option value="sq3">What was the model of your first car?</option>
						<option value="sq4">In what city were you born?</option>
					</select>
					<label for="secretanswer">Secret Answer</label>
					<input name="secretanswer" id="secretanswer" type="secretanswer" class="form-control mb-4">
					<input type="submit">
				</fieldset>
			</form>

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