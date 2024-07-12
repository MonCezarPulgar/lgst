<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        /* Custom styles for sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
            overflow-x: hidden;
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: gray;
			color: cyan;
        }

        .sidebar .nav-item {
            margin-bottom: 10px;
        }

        /* Page content */
        .content {
            margin-left: 250px; /* Should match sidebar width */
            padding: 20px;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="" class="active"><img src="images/logoo.png" height="50px" class="rounded-pill"></a>
        <a href=""><i class="fas fa-house"></i> User Management</a>
        <a href="u"><i class="fas fa-person"></i> Language Management</a>
		<div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-circle-info"></i> Payment
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item text-dark" href="reports.php">Billing</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-circle-info"></i> Reports
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item text-dark" href="reports.php">Total Languages</a></li>
                <li><a class="dropdown-item text-dark" href="reports2.php">Total Users</a></li>
				<li><a class="dropdown-item text-dark" href="reports2.php">Current Signups</a></li>
            </ul>
        </div>
		<div class = "">
			<a href=""><i class="fas fa-lock"></i> Change Password</a>
			<a href=""><i class="fas fa-lock"></i> Log-Out</a>
		</div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
