<?php
    include_once 'Class/user.php';

    $u = new User();
    $totalUsers = $u->getTotalUsers();
    $users = $u->getUserList();
    
    $totalLanguage = $u->getTotalLanguage();
    $LanguageList = $u->getLanguageList();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PremTranslate: Language Translator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="images/text.png">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
        }
        .main-container {
            flex: 1;
            display: flex;
        }
        .btn-close {
            color: #ffffff; /* Sets the icon color to white */
            background-color: transparent; /* Ensures the button background is transparent */
            border: none; /* Removes any default border */
        }

        .btn-close:hover {
            color: #ffffff; /* Ensures the icon color remains white on hover */
            background-color: rgba(255, 255, 255, 0.1); /* Adds a subtle background color on hover for visibility */
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
        }
        .form-control {
            margin-bottom: 15px;
        }
        .white-shadow {
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
        }
        .btn-toggle-sidebar {
            background-color: #282c34; /* Bright color for visibility */
            border: none;
            width: 50px; /* Adjust width to be circular */
            height: 50px; /* Adjust height to be circular */
            border-radius: 50%;
            padding: 10px;
            color: #fff;
            font-size: 24px;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1050; /* Ensure it's above other content */
        }
        .btn-toggle-sidebar:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        .btn-toggle-sidebar:focus {
            outline: none; /* Remove default focus outline */
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5); /* Custom focus outline */
        }
        .btn-toggle-sidebar.hidden {
            display: none; /* Hide the button when the sidebar is open */
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
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0.5, 0.5, 0.5, 0.5); /* Adds a subtle shadow */
        }
        .hidden {
            display: none;
        }
        @media (max-width: 576px) {
            .btn-toggle-sidebar {
                width: 40px;
                height: 40px;
                font-size: 20px;
            }
            .dashboard h2 {
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
                    <li><a class="dropdown-item text-white" href="subscription-report.php">Subscription Report</a></li>
                    <li><a class="dropdown-item text-white" href="users-report.php">Users Report</a></li>
                </ul>
            </div>
            <a href="adminlogout.php"><i class="fa-solid fa-right-from-bracket mx-2"></i> Logout</a>
        </div>
    </div>
    
    <div class="dashboard">
        <h2> Admin Dashboard </h2>
    </div>
    
    <div class="container">
        <div class="row">
            <!-- First Column with Card -->
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card text-center" id="totalUserCard">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text" style="font-size:24px;"><?php echo $totalUsers; ?></p>
                    </div>
                </div>
                <div class="card hidden mt-4" id="userListCard">
                    <div class="card-body">
                        <h5 class="card-title">User List</h5>
                        <ul class="list-group" id="userList">
                            <?php foreach ($users as $u): ?>
                                <?php   
                                ?>
                                <li class="list-group-item">
                                    <?php echo 'Full Name: ' . htmlspecialchars($u['FirstName']) . ' ' . htmlspecialchars($u['LastName']).'<br>Email Address: ' . htmlspecialchars($u['EmailAddress']); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            
             <div class="col-md-4 col-sm-6 mb-3">
                <div class="card text-center" id="totalLanguageCard">
                    <div class="card-body">
                        <h5 class="card-title">Total Language</h5>
                        <p class="card-text" style="font-size:24px;"><?php echo $totalLanguage; ?></p>
                    </div>
                </div>
                <div class="card hidden mt-4" id="languageListCard">
                    <div class="card-body">
                        <h5 class="card-title">Language List</h5>
                        <ul class="list-group" id="LanguageList">
                            <?php foreach ($LanguageList as $l): ?>
                                <li class="list-group-item">
                                    <?php echo 'Language ID: ' . htmlspecialchars($l['Language_ID']) . '<br>Language: ' . htmlspecialchars($l['Language']) . '<br>Country: ' . htmlspecialchars($l['Country']); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-12 mb-3">
                <div class="card text-center" id="currentPlanCard">
                    <div class="card-body">
                        <h5 class="card-title">Current Plan</h5>
                        <p class="card-text" style="font-size:24px;">Content for</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
    
        document.addEventListener("DOMContentLoaded", function() {
            var totalUserCard = document.getElementById("totalUserCard");
            var userListCard = document.getElementById("userListCard");

            totalUserCard.addEventListener("click", function() {
                if (userListCard.classList.contains("hidden")) {
                    userListCard.classList.remove("hidden");
                } else {
                    userListCard.classList.add("hidden");
                }
            });

            // Add event listener for the Total Language card
            var totalLanguageCard = document.getElementById("totalLanguageCard");
            var languageListCard = document.getElementById("languageListCard");

            totalLanguageCard.addEventListener("click", function() {
                if (languageListCard.classList.contains("hidden")) {
                    languageListCard.classList.remove("hidden");
                } else {
                    languageListCard.classList.add("hidden");
                }
            });
        });
        
    </script>
</body>
</html>
