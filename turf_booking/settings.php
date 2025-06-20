<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Settings - Turf Booking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #e3f2fd, #ffffff);
      overflow-x: hidden;
    }

    .header {
      background-color: #1e88e5;
      padding: 20px;
      text-align: center;
      color: white;
      font-size: 24px;
      font-weight: bold;
      animation: slideDown 0.6s ease-out;
    }

    .settings-container {
      max-width: 600px;
      margin: 40px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      animation: fadeIn 1s ease;
    }

    .setting-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 14px 0;
      border-bottom: 1px solid #eee;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeSlideUp 0.8s ease forwards;
    }

    /* Delay each item for staggered animation */
    .setting-item:nth-child(1) { animation-delay: 0.2s; }
    .setting-item:nth-child(2) { animation-delay: 0.4s; }
    .setting-item:nth-child(3) { animation-delay: 0.6s; }
    .setting-item:nth-child(4) { animation-delay: 0.8s; }
    .setting-item:nth-child(5) { animation-delay: 1s; }

    .setting-item i {
      margin-right: 10px;
      color: #1e88e5;
    }

    .setting-label {
      display: flex;
      align-items: center;
      font-size: 18px;
    }

    .setting-action a {
      text-decoration: none;
      color: #1e88e5;
      font-size: 16px;
      transition: color 0.2s ease-in-out;
    }

    .setting-action a:hover {
      color: #1565c0;
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }

    @keyframes fadeSlideUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideDown {
      from { transform: translateY(-100%); }
      to { transform: translateY(0); }
    }
  </style>
</head>
<body>

  <div class="header">
    <i class="fas fa-cog"></i> Settings
  </div>

  <div class="settings-container">
    
    <div class="setting-item">
      <div class="setting-label"><i class="fas fa-user"></i> Profile</div>
      <div class="setting-action"><a href="profile.php">Edit</a></div>
    </div>

    <div class="setting-item">
      <div class="setting-label"><i class="fas fa-phone"></i> Phone Number</div>
      <div class="setting-action"><a href="change_phone.php">Change</a></div>
    </div>

    <div class="setting-item">
      <div class="setting-label"><i class="fas fa-lock"></i> Change Password</div>
      <div class="setting-action"><a href="change_password.php">Update</a></div>
    </div>

    <div class="setting-item">
      <div class="setting-label"><i class="fas fa-bell"></i> Notifications</div>
      <div class="setting-action"><a href="#">Manage</a></div>
    </div>

    <div class="setting-item">
      <div class="setting-label"><i class="fas fa-sign-out-alt"></i> Logout</div>
      <div class="setting-action"><a href="logout.php">Logout</a></div>
    </div>

  </div>

</body>
</html>
