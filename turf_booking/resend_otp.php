<?php
session_start();

$phone = $_SESSION['phone'];
$email = $_SESSION['email'];

$otp = rand(100000, 999999);
$_SESSION['otp'] = $otp;

$subject = "🔁 Resent OTP for Turf Booking";
$message = "Your new OTP is: $otp";
$headers = "From: cricorganizers@gmail.com";

if (mail($email, $subject, $message, $headers)) {
    echo "<script>alert('✅ OTP resent to your email.'); window.location.href='send_email_otp.php';</script>";
} else {
    echo "❌ Failed to resend OTP.";
}
?>
