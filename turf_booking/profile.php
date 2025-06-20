<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

// Database connection
$conn = new mysqli("localhost", "root", "", "turf_booking");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Profile</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f4f4;
      padding: 40px;
    }
    .profile-card {
      max-width: 500px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #1e88e5;
    }
    .info {
      margin: 20px 0;
    }
    .info strong {
      color: #333;
    }
  </style>
</head>
<body>
  <div class="profile-card">
    <h2>👤 Welcome, <?= htmlspecialchars($user["name"]) ?></h2>
    <div class="info"><strong>Email:</strong> <?= htmlspecialchars($user["email"]) ?></div>
    <div class="info"><strong>Phone:</strong> <?= htmlspecialchars($user["phone"]) ?></div>
    <div class="info"><strong>Role:</strong> <?= htmlspecialchars($user["role"]) ?></div>
  </div>
</body>
</html>
