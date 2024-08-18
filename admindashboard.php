<?php
    include_once 'Class/user.php';

    $u = new User();
    $totalUsers = $u->getTotalUsers();
    $users = $u->getUserList();
    
    $totalLanguage = $u->getTotalLanguage();
    $LanguageList = $u->getLanguageList();

    $totalNetWorth = $u->getTotalNetWorth();
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
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            cursor: pointer;
            background: white;
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #00c6ff;
        }
        .card-text {
            font-size: 36px;
            font-weight: 700;
            color: #00c6ff;
        }
        .dashboard {
            text-align: center;
        }
        .dashboard h2 {
            font-weight: bold;
            font-size: 32px;
            color: #ffffff;
            margin-bottom: auto;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: nowrap; /* Ensure the elements don't wrap */
        }

        .row {
            display: flex;
            flex-direction: column;
            width: 70%; /* Adjust the width based on how much space you want for the cards */
            margin-left:100px;
        }

        .chart-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30%; /* Adjust the width based on how much space you want for the chart */
            margin-right: 100px; /* Add some space between the cards and the chart */
            margin-top: 200px;
            font-size: 36px;
            font-weight: 700;
            color: #00c6ff;
        }

        .chart {
            border: 8px solid #00c6ff;
            border-radius: 50%;
            width: 250px;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #ffffff;
            font-weight: bold;
            margin-right:90px;
            margin-top:100px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .row, .chart-container {
                width: 100%;
            }

            .chart {
                width: 200px;
                height: 200px;
                font-size: 20px;
                margin-top: 20px; /* Add space between the cards and the chart on small screens */
            }
        }
    </style>
</head>
<body>
    <?php include_once 'sidebar.php'; ?>
    
    <div class="dashboard">
        <h2>Admin Dashboard</h2>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-6 mb-5 ms-5">
                <div class="card text-center" id="totalUserCard">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text"><?php echo $totalUsers; ?></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-7 col-sm-6 mb-5 ms-5">
                <div class="card text-center" id="totalLanguageCard">
                    <div class="card-body">
                        <h5 class="card-title">Total Languages</h5>
                        <p class="card-text"><?php echo $totalLanguage; ?></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-7 col-sm-12 mb-5 ms-5">
                <div class="card text-center" id="currentPlanCard">
                    <div class="card-body">
                        <h5 class="card-title">Current Plan</h5>
                        <p class="card-text">Plan Reports</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="chart text-center">
                Net worth <br>
            <?php echo '$' . number_format($totalNetWorth, 2); ?>
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