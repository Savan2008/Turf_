<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "box_booking");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from database
    $q = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $q);

    if (mysqli_num_rows($result) == 1) {
        $user_row = mysqli_fetch_assoc($result);

        // You can use password_verify if passwords are hashed
        if ($password == $user_row['password']) {
            // ✅ SET SESSION VARIABLE HERE
            $_SESSION['user_id'] = $user_row['user_id'];

            // Optional: store name or other info
            $_SESSION['name'] = $user_row['name'];

            // Redirect after login
            header("Location: home.php");
            exit();
        } else {
            echo "❌ Incorrect password.";
        }
    } else {
        echo "❌ Email not registered.";
    }
}
?>
