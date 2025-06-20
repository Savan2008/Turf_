<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone'];
    $_SESSION['phone'] = $phone;

    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;

    // FAST2SMS API SETUP
    $apiKey = "cggol7MJzXomiyGcASZGGacHlreABHRBIX3I5JPpRYaVG1Vow1SnJe4dlGUV"; // Replace this with your actual API key

    $fields = array(
        "sender_id" => "FSTSMS",
        "message" => "Your OTP for Turf Booking is $otp",
        "language" => "english",
        "route" => "q",
        "numbers" => $phone,
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($fields),
        CURLOPT_HTTPHEADER => array(
            "authorization: $apiKey",
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "<script>alert('OTP sending failed: $err'); window.location.href='login_otp.php';</script>";
    } else {
        echo "<script>alert('✅ OTP sent successfully!'); window.location.href='verify_otp.php';</script>";
    }
} else {
    header("Location: login_otp.php");
    exit();
}
?>
