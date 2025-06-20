<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Turf Booking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #e0f7fa, #80deea);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      min-height: 100vh;
    }

    .container {
      background: #ffffff;
      margin-top: 40px;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 600px;
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      color: #00796b;
      text-align: center;
      margin-bottom: 20px;
    }

    .info {
      margin-bottom: 30px;
    }

    .info div {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 10px 0;
      color: #333;
    }

    .info i {
      color: #00796b;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    input, textarea {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    textarea {
      resize: vertical;
      min-height: 80px;
    }

    button {
      padding: 12px;
      background: #00796b;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    button:hover {
      background: #004d40;
    }

    /* WhatsApp floating button */
    .whatsapp-float {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #25d366;
      color: white;
      border-radius: 50%;
      padding: 15px;
      font-size: 24px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      z-index: 1000;
      text-align: center;
    }

    .whatsapp-float:hover {
      background-color: #128c7e;
      text-decoration: none;
    }

    @media (max-width: 600px) {
      h2 {
        font-size: 22px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Contact Us</h2>

    <div class="info">
      <div><i class="fas fa-phone"></i> +91 94261 33325</div>
      <div><i class="fas fa-envelope"></i> cricorganizers@gmail.comn</div>
    </div>

    <form action="contact_process.php" method="POST">
      <input type="text" name="name" placeholder="Your Name" required />
      <input type="email" name="email" placeholder="Your Email" required />
      <input type="text" name="phone" placeholder="Your Phone Number" required />
      <textarea name="message" placeholder="Your Message..." required></textarea>
      <button type="submit">Send Message</button>
    </form>
  </div>

  <!-- WhatsApp floating button -->
  <a href="https://wa.me/+919426133325" class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>

</body>
</html>
