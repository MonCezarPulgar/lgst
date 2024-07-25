<!DOCTYPE html>
<html lang="en">
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
        }
        .main-container {
            flex: 1;
            display: flex;
        }
        .sidebar {
            width: 250px; /* Adjust this width as needed */
            background-color: #f8f9fa;
            padding: 20px;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
    </style>
    <body>
        <!-- Button to toggle the sidebar -->
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 id="sidebarLabel">PremTranslate</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a href="" class="d-block mb-3"><img src="images/voice.png" height="50px" alt="Logo"></a>
            <div class="dropdown mt-2">
                <a class="dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-circle-info"></i> Profile
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-dark" href="plan.php">View Profile</a></li>
                    <li><a class="dropdown-item text-dark" href="updateplan.php">Edit Profile</a></li>
                </ul>
            </div>
            <a href="usermanagement.php"><i class="fas fa-house"></i> Home</a><br>
            <a href="languages.php"><i class="fas fa-house"></i> Learn A Language</a><br>
            <a href="languages.php"><i class="fas fa-house"></i> FAQ's</a>
            <div>
                <a href=""><i class="fas fa-lock"></i> Change Password</a><br>
                <a href="index.php"><i class="fas fa-lock"></i> Log-Out</a>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm bg-info navbar-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="mlibrary.php">
					<img src="images/text.png" height="50px">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link text-dark" href="userprofile.php"><i class="fas fa-user"></i> Select Plan</a>
					</ul>
					<div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
					
					</div>
				</div>
			</div>
		</nav>
        <div class = "container text-center p-4 bg-light">
            <div class = "row">
                <h1>Language Translator</h1>
                <div class = "col-md-6">
                    <select name="lang" id="" class = "form-control">
                    <option value="" selected disabled>Select Language</option>
                        <?php
                        include_once 'Class/user.php';
                        $u = new User();
                        $data = $u->takelanguage();
                        if ($data) {
                            while ($row = $data->fetch_assoc()) {
                                echo '
                                    <option>'.$row['Language'].'</option>
                                ';
                            }
                        }
                        ?>
                    </select>
                    <textarea name="toText" rows="10" placeholder="Type Here..." class = "form-control"></textarea>
                </div>
                <div class = "col-md-6">
                    <select name="lang" id="" class = "form-control">
                        <?php
                        include_once 'Class/user.php';
                        $u = new User();
                        $data = $u->takelanguage();
                        if ($data) {
                            while ($row = $data->fetch_assoc()) {
                                echo '
                                    <option value="" selected disabled>Select Language</option>
                                    <option>'.$row['Language'].'</option>
                                ';
                            }
                        }
                        ?>
                    </select>
                    <textarea name="toText" rows="10" placeholder="Translation will appear here..." class = "form-control"></textarea>
                </div>
            </div>
        </div>
    </body>
</html>
    <script>
        function displayplan(planid, planname, price, duration, desc) {
            document.getElementById("planid").value = planid;
            document.getElementById("planname").value = planname;
            document.getElementById("price").value = price;
            document.getElementById("duration").value = duration;
            document.getElementById("desc").value = desc;
        }
    </script>