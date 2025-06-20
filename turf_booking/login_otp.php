<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Turf Booking - Login with OTP</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #283e51, #485563);
      font-family: 'Segoe UI', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background: #fff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
      max-width: 400px;
      width: 100%;
      animation: fadeIn 0.7s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      text-align: center;
      color: #283e51;
      margin-bottom: 20px;
    }

    input[type="text"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    .checkbox-group {
      display: flex;
      align-items: flex-start;
      margin: 15px 0;
      font-size: 14px;
    }

    .checkbox-group input {
      margin-top: 2px;
      margin-right: 10px;
    }

    .checkbox-group label {
      line-height: 1.4;
    }

    .checkbox-group a {
      color: #007bff;
      text-decoration: none;
    }

    .checkbox-group a:hover {
      text-decoration: underline;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #283e51;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #1e2e3e;
    }

    .footer {
      text-align: center;
      margin-top: 15px;
      font-size: 13px;
      color: #555;
    }

    .logo {
      display: block;
      margin: 0 auto 20px;
      width: 80px;
    }
  </style>

  <!-- Firebase Scripts -->
  <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-auth-compat.js"></script>

  <!-- ✅ Put in <script> -->
<script>
  const firebaseConfig = {
    apiKey: "AIzaSyCNqoBT4Sp7vdGhlmiaxOFJE_JfIJT0fJA",
    authDomain: "turfotp.firebaseapp.com",
    projectId: "turfotp",
    storageBucket: "turfotp.appspot.com",
    messagingSenderId: "363462494",
    appId: "1:363462494:web:3455aa9e4864f7596f99cf"
  };
  firebase.initializeApp(firebaseConfig);

  let confirmationResult;

  window.onload = function () {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
      size: 'normal',
      callback: function (response) {
        console.log("reCAPTCHA verified");
      },
      'expired-callback': function () {
        alert("reCAPTCHA expired. Please refresh and try again.");
      }
    });
    recaptchaVerifier.render().then(function (widgetId) {
      window.recaptchaWidgetId = widgetId;
    });
  };

  function sendOTP() {
    const phone = document.getElementById("phone").value;
    const terms = document.getElementById("terms").checked;

    if (!terms) {
      alert("Please accept the Terms and Conditions.");
      return;
    }

    if (!/^\+[0-9]{10,15}$/.test(phone)) {
      alert("Enter a valid phone number with country code (e.g. +91...)");
      return;
    }

    firebase.auth().signInWithPhoneNumber(phone, window.recaptchaVerifier)
      .then(function (result) {
        confirmationResult = result;
        document.getElementById("login-status").innerHTML = "✅ OTP sent successfully.";
      }).catch(function (error) {
        console.error("Firebase error:", error);
        alert("OTP send failed: " + error.message);
      });
  }

  function verifyOTP() {
    const otp = document.getElementById("otp").value;
    confirmationResult.confirm(otp).then(function (result) {
      const user = result.user;
      document.getElementById("login-status").innerHTML = "✅ Logged in as " + user.phoneNumber;
      window.location.href = "home.php";
    }).catch(function (error) {
      alert("❌ Invalid OTP");
    });
  }
</script>

</head>
<body>

  <div class="container">
    <img src="turflogo.png" alt="Turf Logo" class="logo" />
    <h2>Login via OTP</h2>

    <input type="text" name="phone" id="phone" placeholder="Enter phone with +91..." required />

    <div class="checkbox-group">
      <input type="checkbox" id="terms" required>
      <label for="terms">
        I agree to the
        <a href="terms.php" target="_blank">Terms & Conditions</a> and
        <a href="privacy.php" target="_blank">Privacy Policy</a>.
      </label>
    </div>

    <div id="recaptcha-container"></div>
    <button onclick="sendOTP()">Send OTP</button>

    <input type="text" id="otp" placeholder="Enter OTP" style="margin-top:15px;">
    <button onclick="verifyOTP()">Verify OTP</button>

    <div class="footer">Powered by Turf Booking System</div>
    <div id="login-status" style="text-align:center; margin-top:10px;"></div>
  </div>

  <script>
    let confirmationResult;

    window.onload = function () {
  window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
    'size': 'normal',
    'callback': function (response) {
      // reCAPTCHA solved - allow sendOTP
      console.log("Recaptcha verified");
    },
    'expired-callback': function () {
      alert("reCAPTCHA expired. Please refresh and try again.");
    }
  });
  recaptchaVerifier.render().then(function(widgetId) {
    window.recaptchaWidgetId = widgetId;
  });
};

    function sendOTP() {
      const phone = document.getElementById("phone").value;
      const terms = document.getElementById("terms").checked;

      if (!terms) {
        alert("Please accept the Terms and Conditions.");
        return false;
      }

      if (!/^\+[0-9]{10,15}$/.test(phone)) {
        alert("Please enter a valid phone number with country code (e.g., +91...)");
        return false;
      }

      firebase.auth().signInWithPhoneNumber(phone, window.recaptchaVerifier)
        .then(function(result) {
          confirmationResult = result;
          document.getElementById("login-status").innerHTML = "✅ OTP sent successfully.";
        }).catch(function(error) {
          console.error(error);
          alert("OTP send failed: " + error.message);
        });
    }

    function verifyOTP() {
      const otp = document.getElementById("otp").value;
      confirmationResult.confirm(otp).then(function(result) {
        const user = result.user;
        document.getElementById("login-status").innerHTML = "✅ Logged in as " + user.phoneNumber;
        window.location.href = "home.php";
      }).catch(function(error) {
        alert("❌ Invalid OTP");
      });
    }
  </script>
</body>
</html>
