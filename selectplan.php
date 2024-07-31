<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PremTranslate: Language Translator</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="icon" type="image/x-icon" href="images/text.png">
    </head>
    <style>
         body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
        }
		.container {
			padding: 20px;
			margin-top: 15px;
			background-color: #f8f9fa; /* light background color */
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0.5, 0.5, 0.5, 0.5); /* Adds a subtle shadow */
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
			margin-top:50px;
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
		.selectplan h2 {
			text-align: center;
			margin-top: 50px;
			font-size: 80px;
			font-weight: bold;
			background: linear-gradient(135deg, #ffffff, #aeeeee);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			background-clip: text;
			text-fill-color: transparent;
			text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
		}
    </style>
    <body>
    <!-- Button to toggle the sidebar -->
    <button class="btn-toggle-sidebar" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-label="Toggle sidebar">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 id="sidebarLabel"></h5>
			<h3> PremTranslate</h3>
            <button type="button" class="btn-close mb-2 mt-1" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a href="" class="d-block mx-1 mb-1"><img src="images/voice.png" height="50px" alt="Logo"></a>
            <div class="links">
                <div class="dropdown mt-2">
                    <a class="dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-circle-info mx-2"></i> Profile
                    </a>
                    <ul class="dropdown-menu mx-2">
                        <li><a class="dropdown-item" href="profile.php">View Profile</a></li>
                        <li><a class="dropdown-item" href="updateplan.php">Edit Profile</a></li>
                    </ul>
                </div>
                <a href="userprofile.php"><i class="fas fa-house mx-2"></i> Home</a>
                <a href="languages.php"><i class="fas fa-language mx-2"></i> Learn A Language</a>
                <a href="faq.php"><i class="fas fa-question-circle mx-2"></i> FAQ's</a>
            </div>
            <div class="mt-3">
                <a href=""><i class="fas fa-lock mx-2"></i> Change Password</a>
                <a href="index.php"><i class="fas fa-sign-out-alt mx-2"></i> Log-Out</a>
            </div>
        </div>
    </div>
		
		<div class="selectplan">
			<h2> Select the Best Plan for You	 </h2>
		</div>
        <div class = "container text-center p-4 bg-light">
            <div class = "row">
                <form action = "payment.php">
                <?php
                        include_once 'Class/user.php';
                        $u = new User();
                        $data = $u->displayplan();
                    ?>
                    <div class = "row mt-3">
                        <?php
                            while($row = $data->fetch_assoc()){
                                echo '
                                <div class="col-md-4">
                                    <div class="card shadow-sm mb-4">
                                        <div class="card-header text-white bg-info">
                                            <h2 class="card-title">' . htmlspecialchars($row['PlanName']) . '</h2>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text text-dark">' . htmlspecialchars($row['Description']) . '</p><br>
                                            <h2 class="card-text text-dark">' . htmlspecialchars($row['Duration']) . '</h2><br>
                                            <label class = "text-dark">Included Languages</label>';
                            
                                // Split the IncludedLanguages string by commas and output each one on a new line
                                $languages = explode(' ', $row['IncludedLanguages']);
                                foreach ($languages as $language) {
                                    echo '<p class="card-text text-dark">' . htmlspecialchars(trim($language)) . '</p>';
                                }
                            
                                echo '
                                            <b><h2 class="card-text text-dark">$' . htmlspecialchars($row['Price']) . '</h2></b>
                                        </div>
                                        <div class="card-footer text-center bg-light">
                                            <button type="submit" class="btn btn-info">Continue to Payment</button>
                                        </div>
                                    </div>
                                </div>';
                            }                            
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
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
</script>