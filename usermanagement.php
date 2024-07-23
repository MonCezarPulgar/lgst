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
            <a href="" class="d-block mb-3"><img src="images/logoo.png" height="50px" class="rounded-pill" alt="Logo"></a>
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

    <!-- Main Content -->
    <div class="content">
        <h1 class="text-center">Users Management</h1>
        <form action="" method="POST">
            <div class="table-responsive">
                <table class="table table-hover p-4">
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
                                        <td>' . htmlspecialchars($row['UserId']) . '</td>
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
                                        <td><button type="button" name="btndelete" class="btn shadow-none" data-bs-toggle="modal" data-bs-target="#DeleteModal" onclick="deleteuser(&quot;'.$row['UserId'].'&quot;)"><i class="fas fa-trash ms-2 text-dark"></i></button></td>
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
                                    <label for="userid" class="form-label">User ID</label>
                                    <input type="text" name="userid" id="userid" class="form-control" readonly>
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

    <script>
        function deleteuser(userid) {
            document.getElementById("userid").value = userid;
        }
    </script>
</body>
</html>

<?php
include_once 'Class/user.php';

if (isset($_POST['btndelete'])) {
    $userid = $_POST['userid'];
    $u = new User();
    $result = $u->deleteuser($userid);
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
