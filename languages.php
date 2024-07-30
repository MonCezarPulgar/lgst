<?php
include_once 'Class/user.php';

$u = new User();

if (isset($_POST['btnAddLanguage'])) {
    $language = $_POST['language'];
    $country = $_POST['country'];
    $language_code = $_POST['language_code'];
    echo '
        <script>
            alert("'.$u->addlanguage($language, $country, $language_code).'");
        </script>
    ';
}

// Handle language update form submission
if (isset($_POST['btnUpdateLanguage'])) {
    $lid = $_POST['update_language_id'];
    $language = $_POST['update_language'];
    $country = $_POST['update_country'];
    $language_code = $_POST['language_code'];
    $result = $u->updatelanguage($lid, $language, $country, $language_code);
    echo '
        <script>
            alert("'.$result.'");
        </script>
    ';
}

if (isset($_POST['btnDeleteLanguage'])) {
    $lid = $_POST['delete_language_id'];
    $result = $u->deletelanguage($lid);
    echo '
        <script>
            alert("'.$result.'");
        </script>
    ';
}
$languages = $u->getLanguages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Language Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
        h1, h2 {
            color: #0072ff;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        form input, form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        form input {
            background: #f9f9f9;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        form button {
            background-color: #0072ff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form button:hover {
            background-color: #005bb5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #0072ff;
            color: white;
        }
		
		.button {
			color: white;
			border: none;
			padding: 5px 10px;
			cursor: pointer;
			border-radius: 4px;
			transition: background-color 0.3s ease;
			margin-top: 5px;
			font-size: 16px; /* Ensure consistent font size */
			display: inline-block; /* Ensure consistent width */
		}

		.update-btn {
			background-color: #0072ff;
		}

		.update-btn:hover {
			background-color: #005bb5;
		}

		.delete-btn {
			background-color: #e74c3c;
		}

		.delete-btn:hover {
			background-color: #c0392b;
		}

		/* Ensure buttons are the same size and alignment */
		form button {
			width: auto; /* Ensure buttons do not stretch */
		}
        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
		.actions{
			padding: 5px 10px;
		}
        .main-container {
            flex: 1;
            display: flex;
            flex-wrap: wrap;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        @media screen and (max-width: 768px) {
            .offcanvas {
                width: 100%;
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
            <a href="" class="d-block mb-3"><img src="images/logoo.png" height="50px" class="rounded-pill" alt="Logo"></a>
            <a href="admindashboard.php"><i class="fas fa-house"></i> Admin Dashboard</a><br>
            <a href="usermanagement.php"><i class="fas fa-house"></i> User Management</a><br>
            <a href="languages.php"><i class="fas fa-house"></i> Language Management</a>
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
            <div class="dropdown mt-2">
                <a class="dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-circle-info"></i> Reports
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-dark" href="reports.php">Total Languages</a></li>
                    <li><a class="dropdown-item text-dark" href="reports2.php">Total Users</a></li>
                    <li><a class="dropdown-item text-dark" href="reports2.php">Current Signups</a></li>
                </ul>
            </div>
            <div class="mt-2">
                <a href=""><i class="fas fa-lock"></i> Change Password</a><br>
                <a href="index.php"><i class="fas fa-lock"></i> Log-Out</a>
            </div>
        </div>
    </div>
    <div class="main-content container p-4">
        <h1>Add New Language</h1>
        <form method="POST" action="">
            <label for="language">Language:</label>
            <input type="text" id="language" name="language" required>
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" required>
            <label for="language_code">Language Code:</label>
            <input type="text" id="country" name="language_code" required>
            <button type="submit" name="btnAddLanguage">Add Language</button>
        </form>
	</div>
	<div class="main-content container p-4">
        <h2>Languages List</h2>
        <table>
            <thead>
                <tr>
                    <th>Language ID</th>
                    <th>Language</th>
                    <th>Country</th>
                    <th>Language Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($languages as $language): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($language['Language_ID']); ?></td>
                        <td><?php echo htmlspecialchars($language['Language']); ?></td>
                        <td><?php echo htmlspecialchars($language['Country']); ?></td>
                        <td><?php echo htmlspecialchars($language['LanguageCode']); ?></td>
                        <td class="actions">
                            <!-- Update Button -->
							<button class="button update-btn" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="openUpdateModal('<?php echo htmlspecialchars($language['Language_ID']); ?>', '<?php echo htmlspecialchars($language['Language']); ?>', '<?php echo htmlspecialchars($language['Country']); ?>', '<?php echo htmlspecialchars($language['LanguageCode']); ?>')">Update</button>

							<!-- Delete Button -->
							<form method="POST" style="display:inline;">
								<input type="hidden" name="delete_language_id" value="<?php echo htmlspecialchars($language['Language_ID']); ?>">
								<button type="submit" name="btnDeleteLanguage" class="button delete-btn">Delete</button>
							</form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <span class="close">&times;</span>
            <h2>Update Language</h2>
            <form method="POST" action="">
                <input type="hidden" id="update_language_id" name="update_language_id">
                <label for="update_language">Language:</label>
                <input type="text" id="update_language" name="update_language" required>
                <label for="update_country">Country:</label>
                <input type="text" id="update_country" name="update_country" required>
                <label for="language_code">Language Code:</label>
                <input type="text" id="language_code" name="language_code" required>
                <button type="submit" name="btnUpdateLanguage">Update Language</button>
            </form>
                </div>
            </div>
        </div>

    <script>
        function openUpdateModal(id, language, country, language_code) {
            document.getElementById('update_language_id').value = id;
            document.getElementById('update_language').value = language;
            document.getElementById('update_country').value = country;
            document.getElementById('language_code').value = language_code;
            document.getElementById('updateModal').style.display = 'block';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('updateModal')) {
                closeUpdateModal();
            }
        }

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
    </script>
</body>
</html>
