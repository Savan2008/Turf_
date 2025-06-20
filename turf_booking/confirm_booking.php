<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "box_booking");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$turf_id = $_POST['turf_id'];
$date = $_POST['booking_date'];
$slot = $_POST['time_slot'];

$q = "INSERT INTO bookings (user_id, turf_id, booking_date, time_slot, status)
      VALUES ('$user_id', '$turf_id', '$date', '$slot', 'Upcoming')";

if (mysqli_query($con, $q)) {
    echo "<script>alert('Booking Confirmed!'); window.location.href='home.php';</script>";
} else {
    echo "<script>alert('Error booking turf!'); history.back();</script>";
}
?>
