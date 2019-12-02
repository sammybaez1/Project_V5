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

		<div class="container bg-light">
<form>

			<?php
			require '../database-connection.php';

			$result = query("SELECT * FROM countries");


			echo '<select id="fromCountry" name="name">';
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<option value="' . $row['code'] . '">' . "" . " " . $row['name'] . '</option>';
			}
			echo '</select>';

			echo '<p>TO<p>';

			$result = query("SELECT * FROM countries");


			echo '<select id="toCountry" name="name2">';
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<option value="' . $row['code'] . '">' . "" . " " . $row['name'] . '</option>';
			}
			echo '</select>';





			echo '
<input type="date" name="fromDate" id="fromDate">

<input type="date" name="toDate" id="toDate">

<button onclick="myFunction()">Try it</button>
<input type="submit" name="submit" value="Get Selected Values" />
</form>



<p id="SearchTerm">Result</p>

<script>
	function myFunction() {
		var x = document.getElementById("fromCountry");
		var a = x.selectedIndex;

		var y = document.getElementById("toCountry");
		var b = y.selectedIndex;

		var z = document.getElementById("fromDate").value;
		var w = document.getElementById("toDate").value;

		document.getElementById("SearchTerm").innerHTML = "From " + x.options[a].text + " to " + y.options[b].text + ", Between " + z + " and " + w;

	}
</script>
';


			$result = query("SELECT * FROM flights");

			$countryID = query("select countryID from countries where name='Australia'");



			
			if(isset($_POST['submit'])){
			// As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
			foreach ($_POST['Color'] as $select)
			{
			echo "You have selected :" .$select; // Displaying Selected Value
			}
			}
			




			print "<table  class='sortable'>";
			while ($row = mysqli_fetch_assoc($result)) {
				$flightID = $row['flightID'];
				$bookingPage = $row['bookingPage'];
				$airline = $row['airline'];
				$startAirport = $row['startAirport'];
				$endAirport = $row['endAirport'];
				$departureTime = $row['departureTime'];
				$arrivalTime = $row['arrivalTime'];
				$capacity = $row['capacity'];
				$fare = $row['fare'];
				$status = $row['status'];

				print

					"<tr>
	<td>" . $flightID . "<td>
	<td>" . $bookingPage . "<td>
	<td>" . $airline . "<td>
	<td>" . $startAirport . "<td>
	<td>" . $endAirport . "<td>
	<td>" . $departureTime . "<td>
	<td>" . $arrivalTime . "<td>
	<td>" . $capacity . "<td>
	<td>" . $fare . "<td>
	<td>" . $status . "<td>
		<tr>";
			}
			print "</table>";
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