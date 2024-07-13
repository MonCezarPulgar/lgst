<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
</head>
<body>
    <div class="main-container">
        <div class="sidebar">
            <?php include_once 'trial.php'; ?>
        </div>
        <div class="content">
            <h1 class="text-center">Users Management</h1>
            <form action="" method="POST">
                <table class="table table-hover p-4">
                    <thead class = "bg-info">
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
                        include_once 'Class/User.php';
                        $u = new User();
                        $data = $u->displayusers();
                        while ($row = $data->fetch_assoc()) {
                            echo '
                                <tr>
                                    <td>' . $row['UserId'] . '</td>
                                    <td>' . $row['FirstName'] . '</td>
                                    <td>' . $row['MiddleName'] . '</td>
                                    <td>' . $row['LastName'] . '</td>
                                    <td>' . $row['Address'] . '</td>
                                    <td>' . $row['ZipCode'] . '</td>
                                    <td>' . $row['Birthdate'] . '</td>
                                    <td>' . $row['EmailAddress'] . '</td>
                                    <td>' . $row['Password'] . '</td>
                                    <td>' . $row['Role'] . '</td>
                                    <td>' . $row['Status'] . '</td>
                                    <td><button type="button" name="btndelete" class="btn shadow-none" data-bs-toggle="modal" data-bs-target="#DeleteModal" onclick="deleteuser(&quot;'.$row['UserId'].'&quot;)"><i class="fas fa-trash ms-2 text-dark"></i></button></td>
                                </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
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
    </div>
    <script>
        function deleteuser(userid) {
            document.getElementById("userid").value = userid;
        }
    </script>
</body>
</html>

<?php
include_once 'Class/User.php';
if (isset($_POST['btndelete'])) {
    $userid = $_POST['userid'];
    $u = new User();
    $result = $u->deleteuser($userid);
    echo '<script>
        alert("' . $result . '");
        window.location.href = window.location.href.split("?")[0] + "?refresh=1";
    </script>';
}
if (isset($_GET['refresh'])) {
    echo '<script>
        window.history.replaceState(null, null, window.location.href.split("?")[0]);
    </script>';
}
?>
