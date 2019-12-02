<?php
session_start();

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>JetRed</title>
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
                    <li class="nav-item active">
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
                    if(isset($_SESSION['JetRedAdmin'])){
                        	print '

					<li class="nav-item">
						<a class="nav-link" href="admin.php">Admin Settings</a>
					</ li>
					';
                    }
					else if (isset($_SESSION['JetRedUser'])) {
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
				if (!isset($_SESSION['JetRedUser'])) {
					print '
							<a id="userAccount" class="account" href="login.php">Sign in</a>
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
            <form action="processFlightCreation.php" method="post" id="flightForm">
                <label for="flightNumber">Flight #</label>
                <input type="number" name="flightNumber" min=1 value=412>
                <label for="from">From</label>
                <select name="fromAirport" id="from" onchange="changeOptions()">
                    <option value="AirQueens">AirQueens</option>
                    <option value="AirBrooklyn">AirBrooklyn</option>
                    <option value="AirManhattan">AirManhattan</option>
                </select>
                <label for="toAirport">To</label>
                <select name="toAirport" id="toAirport">
                    <option value="AirBrooklyn">AirBrooklyn</option>
                    <option value="AirManhattan">AirManhattan</option>
                </select>
                <label for="fromTime">Departure Time</label>
                <input type="datetime-local" name="fromTime" min="2019-12-03T00:00:00" max="2019-12-31T23:59:59" value="2019-12-03T00:00:00" id="leftRange" onchange="changeMinDate()">
                <label for="toTime">Arrival Time</label>
                <input type="datetime-local" name="toTime" min="2019-12-03T00:00:00" max="2019-12-31T23:59:59" value="2019-12-03T00:00:00" id="rightRange">
                <label for="capacity">Capacity</label>
                <input type="number" name="capacity" min=0 value=20>
                <label for="fare">Fare</label>
                <input type="number" name="fare" min=0 value=300>
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="On Time">On Time</option>
                    <option value="Delayed">Delayed</option>
                    <option value="Canceled">Canceled</option>
                </select>
                <input type="submit" name="Submit" value="Create Flight">
            </form>

            <script>
                function changeMinDate() {
                    var max = document.getElementById("leftRange");
                    var min = document.getElementById("rightRange");
                    min.min = max.value;
                    min.value = max.value;
                }




                function changeOptions() {
                    var airportOptions = document.getElementById("to");
                    var airportValue = document.getElementById("from").value;
                    switch (airportValue) {
                        case "AirQueens":
                            airportOptions.options.length = 0;
                            var option_1 = document.createElement("option");
                            option_1.text = "AirBrooklyn";
                            option_1.value = "AirBrooklyn";
                            airportOptions.add(option_1);
                            var option_2 = document.createElement("option");
                            option_2.text = "AirManhattan";
                            option_2.value = "AirManhattan";
                            airportOptions.add(option_2);
                            break;
                        case "AirBrooklyn":
                            airportOptions.options.length = 0;
                            var option_1 = document.createElement("option");
                            option_1.text = "AirQueens";
                            option_1.value = "AirQueens";
                            airportOptions.add(option_1);
                            var option_2 = document.createElement("option");
                            option_2.text = "AirManhattan";
                            option_2.value = "AirManhattan";
                            airportOptions.add(option_2);
                            break;
                        case "AirManhattan":
                            airportOptions.options.length = 0;
                            var option_1 = document.createElement("option");
                            option_1.text = "AirQueens";
                            option_1.value = "AirQueens";
                            airportOptions.add(option_1);
                            var option_2 = document.createElement("option");
                            option_2.text = "AirBrooklyn";
                            option_2.value = "AirBrooklyn";
                            airportOptions.add(option_2);
                            break;
                            break;
                    }
                }

            </script>
        </div>






    </div>
    <!-- Footer -->
    <footer class="page-footer font-small indigo">
        <div class="footer text-center py-3">JetRed
        </div>
    </footer>
    <!-- Footer -->
</body>

</html>
