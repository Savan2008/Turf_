<?php
include 'db.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        $error = "Email already registered. Please use a different email.";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (role, name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $role, $name, $email, $password);

        if ($stmt->execute()) {
            $success = "Registration successful!";
        } else {
            $error = "Error: " . $stmt->error;
        }
    }

    $check_stmt->close();
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Turf Booking - Register</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #1c92d2, #f2fcfe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }

        .register-container h2 {
            text-align: center;
            color: #1c92d2;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .form-group button {
            width: 100%;
            background-color: #1c92d2;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        .form-group button:hover {
            background-color: #0d6efd;
        }

        .message {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
        }

        .message.success {
            color: green;
        }

        .message.error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>

        <?php if (!empty($success)): ?>
            <div class="message success"><?= $success ?></div>
        <?php elseif (!empty($error)): ?>
            <div class="message error"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <input type="hidden" name="role" value="user">

            <div class="form-group">
                <input type="text" name="name" placeholder="Full Name" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
