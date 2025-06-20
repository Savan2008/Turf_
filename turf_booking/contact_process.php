<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone   = htmlspecialchars(trim($_POST["phone"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        die("⚠️ Please fill in all fields.");
    }

    // Email details
    $to      = "hello@turfarena.in"; // Change to your turf email
    $subject = "New Contact Form Message from $name";
    $body    = "You have received a new message from the turf contact form:\n\n" .
               "Name: $name\n" .
               "Email: $email\n" .
               "Phone: $phone\n\n" .
               "Message:\n$message\n";

    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('✅ Message sent successfully!'); window.location.href='contact.php';</script>";
    } else {
        echo "<script>alert('❌ Failed to send message. Please try again.'); window.location.href='contact.php';</script>";
    }

    // Optional: Save to database
    /*
    $conn = mysqli_connect("localhost", "root", "", "turf_booking");

    if ($conn) {
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $message);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    */
} else {
    echo "⛔ Invalid request method.";
}
?>
