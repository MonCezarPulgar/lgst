<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/css/bootstrap.min.css">
    <script src="bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    /* Style the navbar */
    .navbar {
            background-color: #007bff;
        }

        .navbar-brand {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: white;
            font-size: 20px;
            margin: 20px 10px; /* Adjusted margin */
            padding: 10px;
            transition: background-color 0.3s; /* Added transition for hover effect */
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Suitable hover effect */
        }

    /* Style the main content */
    .main {
        margin-left: 160px; /* Same as the width of the sidenav */
        padding: 0px 10px;
    }

    .container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .username,
    .email,
    .password{
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        margin-top:30px;
    }

    .input{
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .submit {
        display: block;
        width: 50%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-left: 90px;
        margin-top:20px;
    }

    .submit:hover {
        background-color: #0056b3;
    }

    .alert {
        width: 100%;
        background-color: #28a745;
        padding: 10px 20px;
        border-radius: 5px;
        text-align: center;
        font-size: 20px; /* Change this line */
        font-weight: 900;
        display: none;
    }

    .login {
        padding-bottom: 100px; /* Adjusted to accommodate the footer */
    }

    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 0; /* Increased padding for better visibility */
    }

    @media (max-width: 768px) {
        footer {
            position: relative; /* Adjust position for smaller screens */
            margin-top: 20px;
        }
    }
</style>

<body>

    <div class="login">
        <form action="" id="LoginForm">
            <div class="container">
                <h2>Login</h2>
                <div class="alert">Login Successful</div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="email">Email:</label>
                        <input class="input" type="email" id="email" name="email" required>
                    </div>
                    <div class="col-md-12">
                        <label class="password">Password:</label>
                        <input class="input" type="password" id="password" name="password" rows="4" required>
                    </div>
                </div>
                    <button class="submit" name="LoginForm" type="submit">Login</button>
            </div>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 PremTranslate. All Rights Reserved.</p>
    </footer>

    
</body>
</html>
