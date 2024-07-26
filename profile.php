<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit();
}

$id = $_SESSION['id'];
include_once 'Class/user.php';
$u = new User();
$data = $u->displayprof($id);

if ($row = $data->fetch_assoc()) {
    $userid = $row['UserId'];
    $fname = $row['FirstName'];
    $lname = $row['LastName'];
    $mname = $row['MiddleName'];
    $addr = $row['Address'];
    $zip = $row['ZipCode'];
    $bday = $row['Birthdate'];
    $email = $row['EmailAddress'];
}
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
                    <li><a class="dropdown-item text-dark" href="profile.php">View Profile</a></li>
                    <li><a class="dropdown-item text-dark" href="#">Edit Profile</a></li>
                </ul>
            </div>
            <a href="userprofile.php"><i class="fas fa-house"></i> Home</a><br>
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
                        <a class="nav-link text-dark" href="selectplan.php"><i class="fas fa-user"></i> Select Plan</a>
                    </li>
                </ul>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                </div>
            </div>
        </div>
    </nav>
    <form method="POST">
        <div class="container p-4 mt-3 bg-light">
            <h1 class="text-center">My Profile</h1>
            <div class="row">
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <img src="images/profile.png" alt="Profile Image" width="350px" height="350px" class="rounded-circle mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditProfile" onclick="displayprofile('<?php echo $userid; ?>', '<?php echo $fname; ?>', '<?php echo $lname; ?>', '<?php echo $mname; ?>', '<?php echo $addr; ?>', '<?php echo $zip; ?>', '<?php echo $bday; ?>', '<?php echo $email; ?>')">Edit Profile</button>
                </div>
                <div class="col-md-8">
                        <div class="col-md-6">
                            <input type="text" name="userid" id="profile_user" class="form-control rounded-pill" value="<?php echo $userid; ?>" hidden>
                        </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="profile_fname">First Name</label>
                            <input type="text" name="fname" id="profile_fname" class="form-control rounded-pill" value="<?php echo $fname; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="profile_lname">Last Name</label>
                            <input type="text" name="lname" id="profile_lname" class="form-control rounded-pill" value="<?php echo $lname; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="profile_mname">Middle Name</label>
                            <input type="text" name="mname" id="profile_mname" class="form-control rounded-pill" value="<?php echo $mname; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="profile_addr">Address</label>
                            <input type="text" name="addr" id="profile_addr" class="form-control rounded-pill" value="<?php echo $addr; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="profile_zip">Zip Code</label>
                            <input type="text" name="zip" id="profile_zip" class="form-control rounded-pill" value="<?php echo $zip; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="profile_bday">Birthdate</label>
                            <input type="text" name="bday" id="profile_bday" class="form-control rounded-pill" value="<?php echo $bday; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="profile_email">Email Address</label>
                            <input type="text" name="email" id="profile_email" class="form-control rounded-pill" value="<?php echo $email; ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for Edit Profile-->
        <div class="modal fade" id="EditProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="staticBackdropLabel"><b><i class="fas fa-user ms-2"></i> Edit Profile</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6">
                            <input type="text" name="modal_userid" id="modal_userid" class="form-control rounded-pill" hidden>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="modal_fname">First Name</label>
                                <input type="text" name="modal_fname" id="modal_fname" class="form-control rounded-pill">
                            </div>
                            <div class="col-md-6">
                                <label for="modal_lname">Last Name</label>
                                <input type="text" name="modal_lname" id="modal_lname" class="form-control rounded-pill">
                            </div>
                            <div class="col-md-6">
                                <label for="modal_mname">Middle Name</label>
                                <input type="text" name="modal_mname" id="modal_mname" class="form-control rounded-pill">
                            </div>
                            <div class="col-md-6">
                                <label for="modal_addr">Address</label>
                                <input type="text" name="modal_addr" id="modal_addr" class="form-control rounded-pill">
                            </div>
                            <div class="col-md-6">
                                <label for="modal_zip">Zip Code</label>
                                <input type="text" name="modal_zip" id="modal_zip" class="form-control rounded-pill">
                            </div>
                            <div class="col-md-6">
                                <label for="modal_bday">Birthdate</label>
                                <input type="date" name="modal_bday" id="modal_bday" class="form-control rounded-pill">
                            </div>
                            <div class="col-md-12">
                                <label for="modal_email">Email Address</label>
                                <input type="text" name="modal_email" id="modal_email" class="form-control rounded-pill">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="btnedit" class="btn btn-success">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
<script>
    function displayprofile(userid, fname, lname, mname, addr, zip, bday, email) {
        document.getElementById("modal_userid").value = userid;
        document.getElementById("modal_fname").value = fname;
        document.getElementById("modal_lname").value = lname;
        document.getElementById("modal_mname").value = mname;
        document.getElementById("modal_addr").value = addr;
        document.getElementById("modal_zip").value = zip;
        document.getElementById("modal_bday").value = bday;
        document.getElementById("modal_email").value = email;
    }
</script>
