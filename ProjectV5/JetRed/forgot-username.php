<!doctype html>
<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start()
?>

<html>

<head>
	<meta charset="utf-8">
	<title>JetBlue</title>
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
		<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
			<a class="navbar-brand" href="index.php">JetRed</a>
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
					<li class="nav-item">
						<a class="nav-link" href="../directory.php">Directory</a>
					</li>

					<?php
					//change nav if signed in
					if (isset($_SESSION['JetRedAdmin'])) {
						print '

						<li class="nav-item">
					    <a class="nav-link" href="myprofile.php">My Flights</a>
					</ li>
					<li class="nav-item">
						<a class="nav-link" href="admin.php">Admin </a>
                    </ li>
					';
					} else if (isset($_SESSION['JetRedUser'])) {
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
			print ' <a> Today is  ' . $_SESSION['currentDate'] . '  </a><br>';
			?>

				<?php
				//change nav if signed in
				if (!isset($_SESSION['JetRedUser'])) {
					print '
							 <a id="userAccount" class="account" href="login.php">Log in</a>
                             | 
							<a id="registerAccount" class="account" S href="Register.php">Register</a>
							';
				} else {
					print " Logged In: ";
					print '<a id="myprofile" class="account" S href="myprofile.php">   ' . $_SESSION['JetRedUser'] . '  </a>';
					print " | ";
					print '<a id="signOut" class="account" S href="signout.php">Log Out</a>';
				}
				?>
			</div>

		</nav>
		<!-- nav -->

		<div class="container bg-light">
			<?php
			require '../database-connection.php';
			$email = $_POST['email'];
			$secretquestion = $_POST['secretquestion'];
			$secretanswer = $_POST['secretanswer'];
			$result = query("SELECT * FROM customers WHERE email='$email' AND  secretQuestion='$secretquestion' AND  secretAnswer='$secretanswer'");
			while ($row = mysqli_fetch_assoc($result)) {
				$user = $row['user_id'];
				print "<p>" . $password . "</p> ";
			}
			?>
		</div>


		<!-- Footer -->
		<footer class="page-footer font-small indigo">
			<div class="footer text-center py-3">JetBlue
			</div>
		</footer>
		<!-- Footer -->



	</div>
</body>

</html>