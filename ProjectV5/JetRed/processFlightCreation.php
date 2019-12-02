<?php
    session_start();
    require '../database-connection.php';
    $flightNumber = $_POST['flightNumber'];
    $airline = 'JetRed';
    $fromAirport = $_POST['fromAirport'];
    $toAirport = $_POST['toAirport'];
    $fromTime = $_POST['fromTime'];
    $fromTime = str_replace('T',' ',$fromTime);
    $toTime = $_POST['toTime'];
    $toTime = str_replace('T',' ',$toTime);
    $capacity = $_POST['capacity'];
    $fare = $_POST['fare'];
    $status = $_POST['status'];
    $null = null;
    $bookingPage = 'JetRed';
    $stmt = $mysqli->prepare("Insert into flights values(?,?,?,?,?,?,?,?,?,?,?);");
    $stmt->bind_param('sissssssiis',$null,$flightNumber,$bookingPage,$airline,$fromAirport,$toAirport,$fromTime,$toTime,$capacity,$fare,$status);
    $stmt->execute();
    header('Location: index.php');
?>
