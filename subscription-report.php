<?php
include_once "Class/user.php";

// Initialize the User object
$user = new User();

try {
    // Fetch the plans from the User object
    $plans = $user->getPlans();
} catch (Exception $e) {
    // Handle any exceptions that might be thrown by getPlans()
    $plans = [];
    echo 'Error fetching plans: ' . $e->getMessage();
}

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
            flex-direction: column; /* Align items vertically */
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
            margin-top: 30px;
            font-size: 60px;
            font-weight: bold;
            background: linear-gradient(135deg, #ffffff, #aeeeee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
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

        /* Canvas size adjustments */
        #planChart {
            max-width: 1000px;
            max-height: 1000px;
            margin: 20px auto; /* Center it within the container */
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
            <a href="adminlogout.php"><i class="fa-solid fa-right-from-bracket mx-2"></i> Logout</a>
        </div>
    </div>

    <!-- Main Container -->
    <div class="main-container">
        <div class="container dashboard">
            <h2>Plan Report</h2>
            <div class="report-container">
                <canvas id="planChart"></canvas>
            </div>
        </div>
    </div>

    <!-- User Details Modal -->
    <div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDetailsModalLabel">Users for <span id="modalPlanName"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="modalUserList" class="list-group">
                        <!-- User list will be populated here -->
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const planData = <?php echo json_encode($plans); ?>;
        console.log(planData); // Check this output in the browser console

        const ctx = document.getElementById('planChart').getContext('2d');
        const planNames = planData.map(plan => plan.PlanName);
        const planCounts = planData.map(plan => plan.userCount);

        const chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: planNames,
                datasets: [{
                    label: 'Plans',
                    data: planCounts,
                    backgroundColor: [
                        '#FF6F61', // Coral
                        '#6B5B95', // Purple
                        '#88B04B', // Green
                        '#F7CAC9', // Light Pink
                        '#92A8D1', // Light Blue
                        '#F5B7B1'  // Light Red
                    ],
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const totalUsers = context.raw;
                                const label = context.label || '';
                                return `${label}: ${totalUsers} users`; // Display user count
                            }
                        }
                    }
                },
                onClick: (evt, item) => {
                    if (item.length > 0) {
                        const index = item[0].index;
                        const selectedPlan = planNames[index];
                        fetchUsers(selectedPlan);
                    }
                }
            }
        });

        function fetchUsers(planName) {
            fetch('user.php?plan=' + encodeURIComponent(planName))
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const modalPlanName = document.getElementById('modalPlanName');
                    const modalUserList = document.getElementById('modalUserList');
                    modalPlanName.textContent = planName;
                    modalUserList.innerHTML = '';

                    if (data.error) {
                        modalUserList.innerHTML = `<li class="list-group-item text-danger">${data.error}</li>`;
                    } else {
                        data.forEach(user => {
                            const li = document.createElement('li');
                            li.classList.add('list-group-item');
                            li.textContent = `${user.FirstName} ${user.LastName} - ${user.Address}`;
                            modalUserList.appendChild(li);
                        });
                    }

                    // Show the modal
                    const userDetailsModal = new bootstrap.Modal(document.getElementById('userDetailsModal'));
                    userDetailsModal.show();
                })
                .catch(error => {
                    console.error('Error fetching users:', error);
                });
        }

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
