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
     <!-- Default styles -->
     <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: #fff;
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

        .form-control {
            margin-bottom: 15px;
        }

        .white-shadow {
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
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

        .dashboard h2 {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 0;
            font-size: 60px;
            font-weight: bold;
            background: linear-gradient(135deg, #ffffff, #aeeeee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .container {
            margin-top: 10px;
            max-width: 5000px; /* Increased max-width for a wider layout */
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .report-container {
            color: #333;
            background-color:white;
            padding: 20px;
            border-radius:10px;
            margin-top:20px;
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

        /* Print-specific styles */
        @media print {
            @page {
                margin: 2cm; /* Adjust the margin as needed */
            }
            body {
                margin: 0;
                padding: 0;
            }
            a[href]:after {
                content: "" !important;
            }
            a {
                text-decoration: none; /* Removes underline from links */
                color: inherit; /* Inherit the text color */
            }

            .report-container {
                margin: 0;
                width: 100%; /* Full width for printing */
            }

            .report-container h2 {
                text-align: center;
                font-size: 24px;
                color: #000;
                margin-bottom: 20px;
            }

            .report-container ul {
                padding: 0;
            }

            .report-container li {
                padding: 10px;
                border-bottom: 1px solid #ccc;
                margin-bottom: 10px;
            }

            .print-header {
                text-align: center;
                margin-bottom: 20px;
            }

            .print-header img {
                max-width: 150px;
                margin-bottom: 10px;
            }

            .print-header h1 {
                font-size: 28px;
                margin: 0;
            }

            .print-header p {
                margin: 0;
                font-size: 14px;
            }

            .btn, .navbar, .offcanvas {
                display: none; /* Hide navigation and buttons */
            }

            header, footer {
                display: none;
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
            <a href="admindashboard.php"><i class="fa-solid fa-folder mx-2"></i>  Admin Dashboard</a>
            <a href="usermanagement.php"><i class="fa-solid fa-list-check mx-2"></i>  User Management</a>
            <a href="languages.php"><i class="fa-solid fa-list-check mx-2"></i>  Language Management</a>
            <a href="messages.php"><i class="fa-solid fa-message mx-2"></i> Messages</a>
            <div class="dropdown mt-2">
                <a class="dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-list-check mx-2"></i> Plan
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-white" href="plan.php">Add Plans</a></li>
                    <li><a class="dropdown-item text-white" href="updateplan.php">Plan Management</a></li>
                </ul>
            </div>
            <div class="dropdowns">
                <a class="dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-credit-card mx-2"></i> Payment
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-white" href="reports.php">Billing</a></li>
                </ul>
            </div>
            <div class="dropdowns">
                <a class="dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-circle-info mx-2"></i> Reports
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-white" href="language-reports.php">Language Report</a></li>
                    <li><a class="dropdown-item text-white" href="users-report.php">Users Report</a></li>
                </ul>
            </div>
            <div style="margin-top:130px;">
                <a href=""><i class="fas fa-lock mx-2"></i> Change Password</a>
                <a href="index.php"><i class="fa-solid fa-right-from-bracket mx-2"></i> Log-Out</a>
            </div>
        </div>
    </div>

    <div class="dashboard">
        <h2>Users Report</h2>
    </div>
    <!-- Main content -->
    <div class="container">
        <div class="report-container white-shadow">
            <?php $user->displayUsersReport(); ?>
        </div>
    </div>

    <!-- Existing scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebarToggleButton = document.querySelector('.btn-toggle-sidebar');
            var sidebar = document.querySelector('#sidebar');
                
            sidebar.addEventListener('shown.bs.offcanvas', function() {
                sidebarToggleButton.classList.add('hidden');
            });
                
            sidebar.addEventListener('hidden.bs.offcanvas', function() {
                sidebarToggleButton.classList.remove('hidden');
            });
        });

    function printUser(subscriptionId) {
        var elementId = 'users-' + subscriptionId; // Add the 'users-' prefix
        var element = document.getElementById(elementId);
        if (element) {
            var originalContents = document.body.innerHTML;
            var printContents = element.innerHTML;
            document.body.innerHTML = `
                <div class="print-header text-dark">
                    <img src="images/logo.png" alt="PremTranslate Logo">
                    <h1>PremTranslate Users Report</h1>
                    <p>Generated on: ${new Date().toLocaleDateString()}</p>
                </div>
                <div class="text-dark">${printContents}</div>`;
            window.print();
            document.body.innerHTML = originalContents;
        } else {
            console.error('Element with ID ' + elementId + ' not found.');
        }
    }

    function printAllUser() {
        var originalContents = document.body.innerHTML;
        var printContents = document.querySelector('.report-container').innerHTML;
        document.body.innerHTML = `
            <div class="print-header text-dark">
                <img src="images/logo.png" alt="PremTranslate Logo">
                <h1>PremTranslate Users Report</h1>
                <p>Generated on: ${new Date().toLocaleDateString()}</p>
            </div>
            <div class="text-dark">${printContents}</div>`;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>
</body>
</html>