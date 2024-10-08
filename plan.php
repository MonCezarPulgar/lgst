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
            display: flex;
            flex-direction: column;
            flex: 1;
            padding: 20px;
        }
        .content {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
        }
        h1 {
            color: #0072ff;
            font-weight: 600;
        }
        .form-control, .btn {
            border-radius: 30px;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .form-label {
            font-weight: 600;
        }
        .row {
            margin-bottom: 1rem;
        }
        .col-md-12 textarea {
            height: auto;
        }
    </style>
</head>
<body>
    <?php include_once 'sidebar.php'; ?>

    <div class="main-container">
        <div class="container">
            <div class="content">
                <form action="" method="POST">
                    <?php
                        include 'generateid.php';
                        $planID = generatePlanID();
                    ?>
                    <h1 class="text-center">Adding Plan</h1>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="planid" class="form-label">Plan ID</label>
                            <input type="text" name="planid" id="planid" class="form-control" value="<?php echo htmlspecialchars($planID); ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="planname" class="form-label">Plan Name</label>
                            <input type="text" name="planname" id="planname" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                        </div>
                        <div class="col-md-4">
                            <label for="duration" class="form-label">Duration</label>
                            <select name="duration" id="duration" class="form-control" required>
                                <option value="" selected disabled>Select Duration</option>
                                <option value="1 Month">1 Month</option>
                                <option value="6 Months">6 Months</option>
                                <option value="1 Year">1 Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="desc" class="form-label">Description</label>
                            <textarea id="desc" name="desc" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="incl" class="form-label">Included Languages</label>
                            <textarea id="incl" name="incl" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="btnadd" class="btn btn-success">Add Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include_once 'Class/user.php';
    if (isset($_POST['btnadd'])) {
        $planid = $_POST['planid'];
        $planname = $_POST['planname'];
        $price = $_POST['price'];
        $duration = $_POST['duration'];
        $desc = $_POST['desc'];
        $incl = $_POST['incl'];
        $u = new User();
        echo '
            <script>
                alert("'.$u->addplan($planid, $planname, $price, $duration, $desc, $incl).'");
            </script>
        ';
    }
    ?>
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
</body>
</html>
