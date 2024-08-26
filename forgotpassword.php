<?php
    session_start();
    include_once 'Class/user.php';

    $u = new User();

    if (isset($_POST['btnreset'])) {
        $email = $_POST['email'];

        // Check if the email exists in the database
        $user = $u->getUserByEmail($email);
        if ($user) {
            $token = bin2hex(random_bytes(50)); // Generate a unique token

            // Store the token in the password_resets table
            $u->storeResetToken($email, $token);

            // Send reset link via email
            $resetLink = "http://yourdomain.com/resetpassword.php?token=$token";
            $subject = "Password Reset Request";
            $message = "Click the following link to reset your password: $resetLink";
            $headers = "From: no-reply@yourdomain.com";

            if (mail($email, $subject, $message, $headers)) {
                echo '<script>alert("A password reset link has been sent to your email address.");</script>';
            } else {
                echo '<script>alert("Failed to send the email. Please try again.");</script>';
            }
        } else {
            echo '<script>alert("Email not found!");</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Enter your email address:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <button type="submit" name="btnreset" class="btn btn-primary">Send Reset Link</button>
        </form>
    </div>
</body>
</html>
