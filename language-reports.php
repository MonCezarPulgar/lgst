<?php
include_once "Class/user.php";
$user = new User();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PremTranslate: Language Translator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="images/text.png">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: #fff;
        }

        .main-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-close {
            color: #ffffff;
            background-color: transparent;
            border: none;
        }

        .btn-close:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .offcanvas {
            background: #282c34;
            color: #ffffff;
            width: 290px;
            display: flex;
            flex-direction: column;
        }

        .offcanvas .offcanvas-header {
            border-bottom: 1px solid #444851;
            padding: 20px;
        }

        .offcanvas .offcanvas-body {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .offcanvas .offcanvas-body .links {
            flex: 1;
        }

        .offcanvas .offcanvas-body a {
            color: #ffffff;
            text-decoration: none;
            margin-top: 15px;
            font-size: 18px;
            display: block;
        }

        .offcanvas .offcanvas-body a:hover {
            color: #ffffff;
            background-color: #3a3f47;
            border-radius: 5px;
            padding: 10px;
        }

        .offcanvas .dropdown-menu {
            background: #3a3f47;
        }

        .offcanvas .dropdown-item {
            color: #d1d1d1;
        }

        .offcanvas .dropdown-item:hover {
            color: #ffffff;
            background-color: #3a3f47;
        }

        .navbar {
            background-color: #17a2b8;
        }

        .navbar .navbar-brand img {
            height: 50px;
        }

        .navbar .nav-link {
            color: #fff;
        }

        .navbar .nav-link:hover {
            color: #e9ecef;
        }

        .container {
            padding: 20px;
            margin-top: 50px;
            max-width: 900px;
        }

        .report-container {
            background-color: #ffffff;
            color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: (0, 0, 0, 0.1);
        }

        .report-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #0072ff;
        }

        .report-container ul {
            list-style-type: none;
            padding: 0;
        }

        .report-container li {
            background-color: #f4f4f9;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .report-container li .language-name {
            flex: 1;
            font-weight: bold;
        }

        .report-container li .language-info {
            font-size: 16px;
            color: #0072ff;
        }

        .btn-toggle-sidebar {
            background-color: #282c34;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            padding: 10px;
            color: #fff;
            font-size: 24px;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1050;
        }

        .btn-toggle-sidebar:hover {
            background-color: #0056b3;
        }

        .btn-toggle-sidebar:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5);
        }

        .btn-toggle-sidebar.hidden {
            display: none;
        }

        @media (max-width: 576px) {
            .btn-toggle-sidebar {
                width: 40px;
                height: 40px;
                font-size: 20px;
            }

            .container {
                padding: 10px;
            }

            .report-container h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Button to toggle the sidebar -->
    <button class="btn-toggle-sidebar" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-label="Toggle sidebar">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 id="sidebarLabel">PremTranslate</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a href="admindashboard.php"><i class="fas fa-house"></i> Admin Dashboard</a><br>
            <a href="usermanagement.php"><i class="fas fa-house"></i> User Management</a><br>
            <a href="languages.php"><i class="fas fa-house"></i> Language Management</a>
            <a href="messages.php"><i class="fas fa-house"></i> Messages</a>
            <div class="dropdown mt-2">
                <a class="dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-circle-info"></i> Plan
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-dark" href="plan.php">Add Plans</a></li>
                    <li><a class="dropdown-item text-dark" href="updateplan.php">Plan Management</a></li>
                </ul>
            </div>
            <div class="dropdown mt-2">
                <a class="dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-circle-info"></i> Payment
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-dark" href="reports.php">Billing</a></li>
                </ul>
            </div>
            <a href="language-reports.php"><i class="fas fa-house"></i> Reports</a>
            <div class="mt-2">
                <a href=""><i class="fas fa-lock"></i> Change Password</a><br>
                <a href="index.php"><i class="fas fa-lock"></i> Log-Out</a>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Display the language report -->
        <div class="report-container">
            <?php $user->displayReport(); ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var sidebarToggleButton = document.querySelector('.btn-toggle-sidebar');
            var sidebar = document.querySelector('#sidebar');

            sidebar.addEventListener('shown.bs.offcanvas', function () {
                sidebarToggleButton.classList.add('hidden');
            });

            sidebar.addEventListener('hidden.bs.offcanvas', function () {
                sidebarToggleButton.classList.remove('hidden');
            });
        });
    </script>
</body>
</html>
