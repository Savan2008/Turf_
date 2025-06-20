<?php
$con = mysqli_connect("localhost", "root", "", "turf_booking");

$user_id = $_POST['user_id'];
$booking_date = $_POST['booking_date'];
$time_slot = $_POST['time_slot'];
$turf_name = $_POST['turf_name'];

$q = "INSERT INTO bookings (user_id, booking_date, time_slot, turf_name, status)
      VALUES ('$user_id', '$booking_date', '$time_slot', '$turf_name', 'Upcoming')";

if(mysqli_query($con, $q)){
    echo "Booking successful!";
    header("Location: home.php");
} else {
    echo "Booking failed.";
}
?>
