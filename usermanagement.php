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
    
    <?php include_once 'sidebar.php'; ?>

    <!-- Main Content -->
    <div class="content container p-1">
        <h1 class="text-center">Users Management</h1>
        <form action="" method="POST">
            <div class="table-responsive">
                <table class="table table-hover p-4" id="tbl">
                    <thead class="bg-info">
                        <tr>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Zip Code</th>
                            <th>Birthdate</th>
                            <th>Email Address</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                        <?php
                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);

                        include_once 'Class/user.php';
                        $u = new User();
                        $data = $u->displayusers();
                        if ($data) {
                            while ($row = $data->fetch_assoc()) {
                                echo '
                                    <tr>
                                        <td>' . htmlspecialchars($row['Subscription_ID']) . '</td>
                                        <td>' . htmlspecialchars($row['FirstName']) . '</td>
                                        <td>' . htmlspecialchars($row['MiddleName']) . '</td>
                                        <td>' . htmlspecialchars($row['LastName']) . '</td>
                                        <td>' . htmlspecialchars($row['Address']) . '</td>
                                        <td>' . htmlspecialchars($row['ZipCode']) . '</td>
                                        <td>' . htmlspecialchars($row['Birthdate']) . '</td>
                                        <td>' . htmlspecialchars($row['EmailAddress']) . '</td>
                                        <td>' . htmlspecialchars($row['Password']) . '</td>
                                        <td>' . htmlspecialchars($row['Role']) . '</td>
                                        <td>' . htmlspecialchars($row['Status']) . '</td>
                                        <td><button type="button" name="btndelete" class="btn shadow-none" data-bs-toggle="modal" data-bs-target="#DeleteModal" onclick="deleteuser(\''.$row['Subscription_ID'].'\')"><i class="fas fa-trash ms-2 text-dark"></i></button></td>
                                    </tr>
                                ';
                            }
                        } else {
                            echo '<tr><td colspan="12">No users found</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal for Delete User -->
            <div class="modal fade" id="DeleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="staticBackdropLabel"><b><i class="fas fa-user ms-2"></i> Delete User</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <h1>Confirm to DELETE this user.</h1>
                                <div class="col-md-6">
                                    <label for="subsid" class="form-label">User ID</label>
                                    <input type="text" name="subsid" id="subsid" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="btndelete" class="btn btn-danger rounded-pill"><i class="fas fa-trash ms-2 text-dark"></i> Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        new DataTable("#tbl");

        function deleteuser(userid) {
            document.getElementById("subsid").value = userid;
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

if (isset($_POST['btndelete'])) {
    $subsid = $_POST['subsid']; // Updated to match the hidden input field name
    $u = new User();
    $result = $u->deleteuser($subsid);
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
