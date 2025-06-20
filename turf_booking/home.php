<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Turf Booking - Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #a7ffeb, #1de9b6);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .main {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
      animation: fadeInUp 1s ease-in-out;
    }

    .main h1 {
      font-size: 32px;
      color: #004d40;
      margin-bottom: 10px;
    }

    .main p {
      font-size: 18px;
      color: #263238;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      width: 100%;
      display: flex;
      justify-content: space-between;
      background: #ffffff;
      border-top: 1px solid #ccc;
      padding: 10px 20px;
      z-index: 99;
    }

    .icon-button {
      text-align: center;
      flex: 1;
      color: #00796b;
      font-size: 20px;
      text-decoration: none;
      position: relative;
      transition: color 0.3s ease;
    }

    .icon-button:hover {
      color: #004d40;
    }

    .icon-button:hover .tooltip {
      opacity: 1;
      transform: translateY(-10px);
    }

    .tooltip {
      position: absolute;
      bottom: 35px;
      left: 50%;
      transform: translateX(-50%) translateY(0);
      background: #004d40;
      color: white;
      padding: 4px 8px;
      font-size: 12px;
      border-radius: 4px;
      white-space: nowrap;
      opacity: 0;
      pointer-events: none;
      transition: all 0.3s ease;
    }

    .center-icon {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      background: #ffffff;
      padding: 10px 20px;
      border-radius: 50%;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      animation: bounceIn 1s ease-in-out;
    }

    .center-icon a {
      font-size: 26px;
      color: #00796b;
      text-decoration: none;
    }

    @keyframes bounceIn {
      0% { transform: translate(-50%, 100px); opacity: 0; }
      60% { transform: translate(-50%, -10px); opacity: 1; }
      100% { transform: translate(-50%, 0); }
    }

    @media (max-width: 600px) {
      .main h1 {
        font-size: 24px;
      }
      .main p {
        font-size: 16px;
      }
      .icon-button i {
        font-size: 18px;
      }
    }

    
.book-btn {
    display: inline-block;
    background-color: #28a745;
    color: white;
    padding: 12px 24px;
    font-size: 18px;
    font-weight: bold;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
    margin: 20px auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.book-btn:hover {
    background-color: #218838;
    transform: scale(1.05); /* zoom effect */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* deeper shadow */
}

  </style>
</head>
<body>

  <div class="main">
    <h1>Welcome to Turf Booking</h1>
    <p>Book slots, view turfs, and manage your profile easily!</p><br>
    <a href="book_turf.php" class="book-btn">🏏 Book Your Turf</a>
  </div>

  <!-- Bottom navigation -->
  <div class="bottom-nav">
    <a href="settings.php" class="icon-button">
      <i class="fas fa-cog"></i><br>Settings
      <span class="tooltip">Settings</span>
    </a>
    <a href="contact.php" class="icon-button">
      <i class="fas fa-phone"></i><br>Contact
      <span class="tooltip">Contact Us</span>
    </a>
    <a href="booking.php" class="icon-button">
      <i class="fas fa-calendar-check"></i><br>Booking
      <span class="tooltip">Book Now</span>
    </a>
  </div>

  <!-- Center home icon -->
  <div class="center-icon">
    <a href="home.php"><i class="fas fa-home"></i></a>
  </div>

</body>
</html>
