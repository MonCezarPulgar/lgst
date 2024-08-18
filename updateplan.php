<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PremTranslate: Plan Management</title>
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
            flex-direction: column;
            min-height: 100vh;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
        }
        .main-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 2rem;
        }
        .content {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin: auto;
        }
        h1 {
            margin-bottom: 1.5rem;
            color: #0072ff;
            font-weight: 600;
        }
        .table {
            margin-top: 1rem;
        }
        .table thead {
            background-color: #0072ff;
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .modal-content {
            border-radius: 15px;
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-footer {
            border-top: none;
        }
        .btn-primary, .btn-danger {
            border-radius: 30px;
        }
        .btn-primary {
            background-color: #0072ff;
            border: none;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-close {
            background: transparent;
            border: none;
        }
    </style>
</head>
<body>
    
    <?php include_once 'sidebar.php'; ?>

    <div class="main-container">
        <div class="content">
            <h1 class="text-center">Plan Management</h1>
            <form action="" method="POST">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Plan ID</th>
                                <th>Plan Name</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Description</th>
                                <th>Included Languages</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            ini_set('display_errors', 1);
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);

                            include_once 'Class/user.php';
                            $u = new User();
                            $data = $u->displayplan();
                            if ($data) {
                                while ($row = $data->fetch_assoc()) {
                                    echo '
                                        <tr>
                                            <td>' . htmlspecialchars($row['PlanId']) . '</td>
                                            <td>' . htmlspecialchars($row['PlanName']) . '</td>
                                            <td>' . htmlspecialchars($row['Price']) . '</td>
                                            <td>' . htmlspecialchars($row['Duration']) . '</td>
                                            <td>' . htmlspecialchars($row['Description']) . '</td>
                                            <td>' . htmlspecialchars($row['IncludedLanguages']) . '</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateModal" onclick="displayPlan(\'' . htmlspecialchars($row['PlanId']) . '\', \'' . htmlspecialchars($row['PlanName']) . '\', \'' . htmlspecialchars($row['Price']) . '\', \'' . htmlspecialchars($row['Duration']) . '\', \'' . htmlspecialchars($row['Description']) . '\', \'' . htmlspecialchars($row['IncludedLanguages']) . '\')">
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    ';
                                }
                            } else {
                                echo '<tr><td colspan="7">No plans found</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Modal for Update Plan -->
                <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="UpdateModalLabel">Update Plan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <input type="hidden" name="planid" id="planid">
                                    <div class="mb-3">
                                        <label for="planname" class="form-label">Plan Name</label>
                                        <input type="text" name="planname" id="planname" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" name="price" id="price" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="duration" class="form-label">Duration</label>
                                        <select name="duration" id="duration" class="form-control">
                                            <option value="" selected disabled>Select Duration</option>
                                            <option value="1 Month">1 Month</option>
                                            <option value="6 Months">6 Months</option>
                                            <option value="1 Year">1 Year</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="desc" class="form-label">Description</label>
                                        <textarea id="desc" name="desc" rows="4" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="incl" class="form-label">Included Languages</label>
                                        <textarea id="incl" name="incl" rows="4" class="form-control"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="btnupdate" class="btn btn-primary">Update Plan</button>
                                        <button type="submit" name="btndelete" class="btn btn-danger">Delete Plan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function displayPlan(planid, planname, price, duration, desc, incl) {
            document.getElementById("planid").value = planid;
            document.getElementById("planname").value = planname;
            document.getElementById("price").value = price;
            document.getElementById("duration").value = duration;
            document.getElementById("desc").value = desc;
            document.getElementById("incl").value = incl;
        }
    </script>
</body>
</html>

<?php
include_once 'Class/user.php';

if (isset($_POST['btnupdate'])) {
    $planid = $_POST['planid'];
    $planname = $_POST['planname'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
    $desc = $_POST['desc'];
    $incl = $_POST['incl'];
    $u = new User();
    $result = $u->planupdate($planid, $planname, $price, $duration, $desc, $incl);
    echo '<script>
        alert("' . htmlspecialchars($result) . '");
        window.location.href = window.location.href.split("?")[0] + "?refresh=1";
    </script>';
}

if (isset($_POST['btndelete'])) {
    $planid = $_POST['planid'];
    $u = new User();
    $result = $u->deleteplan($planid);
    echo '<script>
        alert("' . htmlspecialchars($result) . '");
        window.location.href = window.location.href.split("?")[0] + "?refresh=1";
    </script>';
}

if (isset($_GET['refresh'])) {
    echo '<script>
        window.history.replaceState(null, null, window.location.href.split("?")[0]);
    </script>';
}
?>

