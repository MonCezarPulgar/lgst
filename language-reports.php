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
        }

        .btn-close {
            color: #ffffff;
            background-color: transparent;
            border: none;
        }

        .container {
            padding: 20px;
            margin-top: 50px;
            max-width: 900px;
        }

        .report-container {
            background-color: #ffffff;
            color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: (0, 0, 0, 0.1);
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
    </style>
</head>
<body>
    
    <?php
    include_once 'sidebar.php';
    ?>

    <div class="container">
        <!-- Display the language report -->
        <div class="report-container">
            <?php $user->displayReport(); ?>
        </div>
    </div>

    <script>
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
