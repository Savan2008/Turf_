<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Turf Booking</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #1e3c72, #2a5298);
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      animation: fadeIn 1.5s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .logo {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin-bottom: 20px;
      animation: pop 1.2s ease-in-out;
    }

    @keyframes pop {
      0% { transform: scale(0.5); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }

    h1 {
      font-size: 36px;
      margin-bottom: 10px;
    }

    p {
      font-size: 18px;
      max-width: 600px;
      text-align: center;
    }

    .button {
      margin-top: 30px;
      background: white;
      color: #2a5298;
      padding: 12px 25px;
      border: none;
      border-radius: 25px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .button:hover {
      background: #e0e0e0;
    }

    @media (max-width: 600px) {
      h1 { font-size: 28px; }
      p { font-size: 16px; }
      .logo { width: 120px; height: 120px; }
    }
  </style>
</head>
<body>

  <!-- Logo -->
  <img src="turflogo.png" alt="Turf Booking Logo" class="logo">

  <!-- Heading -->
  <h1>Welcome to Turf Booking</h1>

  <!-- Description -->
  <p>Book your favorite turf with just a few clicks. Whether it’s cricket, football, or a weekend tournament, reserve your slot in seconds with real-time availability and instant confirmation.</p>

  <!-- Button -->
  <a href="login_otp.php"><button class="button">Book Now</button></a>

</body>
</html>
