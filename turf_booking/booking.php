<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "box_booking");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$turf_id = $_GET['turf_id'];
$date = $_POST['booking_date'] ?? date('Y-m-d');

// Define fixed slots
$slots = ["6-7 AM", "7-8 AM", "8-9 AM", "9-10 PM", "10-11 PM", "11-12 PM"];

// Fetch booked slots
$booked = [];
$check_q = "SELECT time_slot FROM bookings WHERE turf_id='$turf_id' AND booking_date='$date'";
$res = mysqli_query($con, $check_q);
while ($row = mysqli_fetch_assoc($res)) {
    $booked[] = $row['time_slot'];
}

// Fetch turf info
$turf = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM turfs WHERE turf_id='$turf_id'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Turf - <?= $turf['turf_name'] ?></title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        h2 { text-align: center; margin-top: 30px; }
        form { text-align: center; margin: 20px; }
        select, input[type="date"] {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
        }
        .slot {
            display: inline-block;
            margin: 8px;
            padding: 12px 20px;
            border-radius: 8px;
            background: #e0e0e0;
            cursor: pointer;
        }
        .booked { background: #f44336; color: white; pointer-events: none; }
        .available:hover { background: #4caf50; color: white; }
        .submit-btn {
            background: #28a745;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h2>Book <?= $turf['turf_name'] ?> (<?= $turf['location'] ?>)</h2>

<form method="POST">
    <label>Select Date: </label>
    <input type="date" name="booking_date" value="<?= $date ?>" min="<?= date('Y-m-d') ?>">
    <button type="submit">Check Slots</button>
</form>

<form method="POST" action="confirm_booking.php">
    <input type="hidden" name="booking_date" value="<?= $date ?>">
    <input type="hidden" name="turf_id" value="<?= $turf_id ?>">

    <div style="text-align:center;">
        <?php
        foreach ($slots as $slot) {
            if (in_array($slot, $booked)) {
                echo "<div class='slot booked'>$slot</div>";
            } else {
                echo "<label class='slot available'>
                        <input type='radio' name='time_slot' value='$slot' required hidden> $slot
                      </label>";
            }
        }
        ?>
    </div>
    <div style="text-align:center;">
        <button type="submit" class="submit-btn">Confirm Booking</button>
    </div>
</form>

</body>
</html>
