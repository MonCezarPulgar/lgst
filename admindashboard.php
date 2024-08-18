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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <link rel="icon" type="image/x-icon" href="images/text.png">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
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
        .card {
            cursor: pointer; /* Add pointer cursor to indicate clickable */
        }
    </style>
</head>
<body>
    <?php
    include_once 'sidebar.php';
    ?>
    
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
            </div>
        </div>
        <div class = "row">
             <div class="col-md-4 col-sm-6 mb-3">
                <div class="card text-center" id="totalLanguageCard">
                    <div class="card-body">
                        <h5 class="card-title">Total Language</h5>
                        <p class="card-text" style="font-size:24px;"><?php echo $totalLanguage; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class = "row">
            <div class="col-md-4 col-sm-12 mb-3">
                <div class="card text-center" id="currentPlanCard">
                    <div class="card-body">
                        <h5 class="card-title">Current Plan</h5>
                        <p class="card-text" style="font-size:24px;">Plan Reports</p>
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

        document.addEventListener("DOMContentLoaded", function() {
            var totalUserCard = document.getElementById("totalUserCard");
            var totalLanguageCard = document.getElementById("totalLanguageCard");
            var currentPlanCard = document.getElementById("currentPlanCard");

            totalUserCard.addEventListener("click", function() {
                window.location.href = "usermanagement.php";
            });

            totalLanguageCard.addEventListener("click", function() {
                window.location.href = "languages.php";
            });

            currentPlanCard.addEventListener("click", function() {
                window.location.href = "subscription-report.php";
            });
        });
        
    </script>
</body>
</html>
