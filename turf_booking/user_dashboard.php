<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.html");
    exit();
}

$conn = new mysqli("localhost", "root", "", "box_booking");

$user_id = $_SESSION['user_id'];

$booking_query = "SELECT s.slot_date, s.slot_time, t.turf_name, t.location 
                  FROM slots s 
                  JOIN turfs t ON s.turf_id = t.id 
                  WHERE s.booked_by = $user_id";

$booking_result = $conn->query($booking_query);
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
  <style>
    body {
      font-family: Arial;
      background: #f7f9fc;
      padding: 20px;
    }
    h1 {
      color: #00c6ff;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    th, td {
      padding: 14px;
      border-bottom: 1px solid #eee;
      text-align: left;
    }
    th {
      background: #00c6ff;
      color: white;
    }
  </style>
</head>
<body>
  <h1>Welcome User</h1>
  <h2>Your Booked Slots:</h2>
  <table>
    <tr>
      <th>Date</th>
      <th>Time</th>
      <th>Turf Name</th>
      <th>Location</th>
    </tr>
    <?php while($row = $booking_result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['slot_date'] ?></td>
        <td><?= $row['slot_time'] ?></td>
        <td><?= htmlspecialchars($row['turf_name']) ?></td>
        <td><?= htmlspecialchars($row['location']) ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
