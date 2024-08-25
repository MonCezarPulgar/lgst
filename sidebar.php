<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PremTranslate: Language Translator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-4VOS44vv27sIozhx5sIkZsa0aPzKfG5l0Xz0nYtmNpuIQUMXheDjl+2sJw7X/ttm" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="images/text.png">
    <style>
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
        .container {
            padding: 20px;
            margin-top: 50px;
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
            margin-top: 50px;
            font-size: 60px;
            font-weight: bold;
            background: linear-gradient(135deg, #ffffff, #aeeeee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
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
            <a href="admindashboard.php"><i class="fa-solid fa-folder mx-2"></i> Admin Dashboard</a>
            <a href="usermanagement.php"><i class="fa-solid fa-list-check mx-2"></i> User Management</a>
            <a href="languages.php"><i class="fa-solid fa-list-check mx-2"></i> Language Management</a>
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
            <a href="users-report.php"><i class="fa-solid fa-folder mx-2"></i> Reports</a>
            <a href="subscription-report.php"><i class="fa-solid fa-folder mx-2"></i>Subscriptions</a>
            <div style="margin-top:130px;">
                <a href=""><i class="fas fa-lock mx-2"></i> Change Password</a>
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket mx-2"></i> Log-Out</a>
            </div>
        </div>
    </div>
</body>
</html>
