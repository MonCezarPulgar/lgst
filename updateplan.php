<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PremTranslate: Language Translator</title>
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
    </style>
</head>
<body>
    
    <?php
    include_once'sidebar.php';
    ?>

    <!-- Main Content -->
    <div class="content container p-1">
        <h1 class="text-center">Plan Management</h1>
        <form action="" method="POST">
            <div class="table-responsive">
                <table class="table table-hover p-4">
                    <thead class="bg-info">
                        <tr>
                            <th>Plan ID</th>
                            <th>Plan Name</th>
                            <th>Price</th>
                            <th>Duration</th>
                            <th>Description</th>
                            <th>Included Languages</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
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
                                        <td><button type="button" class="btn shadow-none" data-bs-toggle="modal" data-bs-target="#UpdateModal" onclick="displayplan(&quot;' . htmlspecialchars($row['PlanId']) . '&quot;, &quot;' . htmlspecialchars($row['PlanName']) . '&quot;, &quot;' . htmlspecialchars($row['Price']) . '&quot;, &quot;' . htmlspecialchars($row['Duration']) . '&quot;, &quot;' . htmlspecialchars($row['Description']) . '&quot;,&quot;' . htmlspecialchars($row['IncludedLanguages']) . '&quot;)"><i class="fas fa-pen-to-square ms-2 text-dark"></i></button></td>
                                    </tr>
                                ';
                            }
                        } else {
                            echo '<tr><td colspan="6">No plans found</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Modal for Update Plan-->
            <div class="modal fade" id="UpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="staticBackdropLabel"><b><i class="fas fa-user ms-2"></i> Update Plan</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="planid" class="form-label">Plan ID</label>
                                    <input type="text" name="planid" id="planid" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="planname" class="form-label">Plan Name</label>
                                    <input type="text" name="planname" id="planname" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" name="price" id="price" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="duration" class="form-label">Duration</label>
                                    <select name="duration" id="duration" class="form-control">
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
                                    <textarea id="desc" name="desc" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="col-md-12">
                                <label for="desc" class="form-label">Included Languages</label>
                                <textarea id="incl" name="incl" rows="4" class="form-control"></textarea>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="btnupdate" class="btn btn-info rounded-pill text-white"><i class="fas fa-pen-to-square ms-2 text-dark"></i> Update</button>
                            <button type="submit" name="btndelete" class="btn btn-danger rounded-pill"><i class="fas fa-trash ms-2 text-dark"></i> Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function displayplan(planid, planname, price, duration, desc, incl) {
            document.getElementById("planid").value = planid;
            document.getElementById("planname").value = planname;
            document.getElementById("price").value = price;
            document.getElementById("duration").value = duration;
            document.getElementById("desc").value = desc;
            document.getElementById("incl").value = incl;
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
