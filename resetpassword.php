<?php
    session_start();
    include_once 'Class/user.php';

    $u = new User();

    if (isset($_GET['token'])) {
        $token = $_GET['token'];

        // Verify the token
        $resetRequest = $u->verifyResetToken($token);

        if ($resetRequest) {
            if (isset($_POST['btnresetpassword'])) {
                $newPassword = $_POST['newpassword'];
                $email = $resetRequest['email'];

                // Update the password
                $u->updatePassword($email, $newPassword);

                // Delete the reset token
                $u->deleteResetToken($token);

                echo '<script>alert("Your password has been reset successfully."); window.location.href = "index.php";</script>';
            }
        } else {
            echo '<script>alert("Invalid or expired token."); window.location.href = "index.php";</script>';
        }
    } else {
        echo '<script>alert("No token provided."); window.location.href = "index.php";</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form method="post">
            <div class="mb-3">
                <label for="newpassword" class="form-label">Enter your new password:</label>
                <input type="password" name="newpassword" class="form-control" id="newpassword" required>
            </div>
            <button type="submit" name="btnresetpassword" class="btn btn-primary">Reset Password</button>
        </form>
    </div>
</body>
</html>
