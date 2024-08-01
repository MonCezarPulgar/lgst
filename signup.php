<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box; /* added */
        }

        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            padding: 10px 20px;
        }

        .logo {
            color: #ff7200;
            font-size: 35px;
            font-family: Arial;
            float: left;
            margin-top: 10px; /* adjusted */
        }

        .menu {
            float: right; /* adjusted */
            margin-top: 10px; /* adjusted */
        }

        ul {
            list-style-type: none; /* changed */
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        ul li {
            display: inline-block;
            margin-left: 20px;
        }

        ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        ul li a:hover {
            background-color: #555;
        }

        ul li a.active {
            background-color: #555; /* Change background color for active link */
        }

        .content {
            text-align: center; /* added */
            padding: 20px;
        }

        .content h1 {
            font-size: 32px; /* adjusted */
            color: #333;
        }

        .content p {
            max-width: 80%;
            margin: 20px auto; /* adjusted */
            font-size: 18px;
            color: #555;
        }

        .content img {
            max-width: 30%; /* adjusted */
            height: auto; /* adjusted */
            margin-top: 20px;
        }

        @media screen and (max-width: 830px) {
            .main {
                height: 180vh;
            }

            .card {
                width: 80%; /* Adjusted */
            }
        }

        .card {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            margin: 0 auto; /* Center the card horizontally */
            margin-bottom: 20px;
            margin-top: 30px;
        }

        .card h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .input:focus {
            border-color: #ff7200;
        }

        .submit {
            width: 100%;
            padding: 10px;
            background-color: #ff7200;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit:hover {
            background-color: #555;
        }

        .alert {
            display: none;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            margin-top: 20px;
        }

        .alert-un {
            display: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            font-size: 10px;
            margin-top: 0px;
            background-color: #f44336;
        }

        .alert-email {
            display: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            font-size: 10px;
            margin-top: 0px;
            background-color: #f44336;
        }

        .menu-btn {
            background: none;
            border: none;
            font-size: 24px;
            color: white;
            cursor: pointer;
            float: right;
            margin-top:10px;
        }

        @media screen and (max-width: 600px) {
            /* Adjustments for smaller screens */

            .menu {
                display: none;
                float: none;
                margin-top: 50px;
                text-align: center;
            }

            .menu.active {
                display: block;
            }

            ul li {
                display: block;
                margin: 10px 0;
            }

            ul li a {
                padding: 10px;
            }

            .card {
                width: 95%; /* Adjust width for smaller screens */
                margin-top: 10px; /* Adjust margin-top for smaller screens */
            }
        }

        @media screen and (min-width: 601px) {
            .menu-btn {
                display: none;
            }
        }
    </style>
</head>
<body>
    <form method = "POST">
    <div class="main">
        <div class = "container p-4">
                <?php
                    include_once'Class/user.php';
                    $u = new User();
                    $data = $u->displayplan();
                ?>
                <div class="row mt-3">
                    <?php
                        while($row = $data->fetch_assoc()){
                            echo '
                            <div class="col-md-4">
                                <div class="card shadow-sm mb-4">
                                    <div class="card-header text-white bg-info">
                                        <h2 class="card-title">' . htmlspecialchars($row['PlanName']) . '</h2>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-dark">' . htmlspecialchars($row['Description']) . '</p><br>
                                        <h2 class="card-text text-dark">' . htmlspecialchars($row['Duration']) . '</h2><br>
                                        <label class="text-dark">Included Languages</label>';
                        
                            // Split the IncludedLanguages string by commas and output each one on a new line
                            $languages = explode(' ', $row['IncludedLanguages']);
                            foreach ($languages as $language) {
                                echo '<p class="card-text text-dark">' . htmlspecialchars(trim($language)) . '</p>';
                            }
                        
                            echo '
                                        <b><h2 class="card-text text-dark">$' . htmlspecialchars($row['Price']) . '</h2></b>
                                    </div>
                                    <div class="card-footer text-center bg-light">
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Payment" onclick="displayplan(\'' . htmlspecialchars($row['PlanName']) . '\',\'' . htmlspecialchars($row['Duration']) . '\', \'' . htmlspecialchars($row['Price']) . '\', \'' . htmlspecialchars($row['Description']) . '\')">Continue to Signup</button>
                                    </div>
                                </div>
                            </div>';
                        }                            
                    ?>
        </div>
        <!-- Modal for Update Plan-->
<div class="modal fade" id="Payment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><b><i class="fas fa-user ms-2"></i> Proceed to Payment?</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                    include 'generatesubsid.php';
                    $subsID = generateSUBSID();
                ?>
                <form method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="subsid" class="form-label">Subscription ID</label>
                            <input type="text" name="subsid" id="subsid" class="form-control" value="<?php echo $subsID; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="planname" class="form-label">Plan Name</label>
                            <input type="text" name="planname" id="planname" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" name="duration" id="duration" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" readonly></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="mname" class="form-label">Middle Name</label>
                            <input type="text" name="mname" id="mname" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="addr" class="form-label">Address</label>
                            <input type="text" name="addr" id="addr" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="zip" class="form-label">Zip Code</label>
                            <input type="text" name="zip" id="zip" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="bday" class="form-label">Birth Date</label>
                            <input type="date" name="bday" id="bday" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" name="pass" id="pass" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="con" class="form-label">Confirm Password</label>
                            <input type="password" name="con" id="con" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" name="btnsignup" class="btn btn-info rounded-pill text-white">
                    <i class="fas fa-pen-to-square ms-2 text-dark"></i> Sign-Up
                </button>
            </div>
        </div>
    </div>
</div>

    </form>
</body>
</html>
<?php
include_once 'Class/user.php';
if(isset($_POST['btnsignup'])){
    $subsid = $_POST['subsid'];
    $planname = $_POST['planname'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $addr = $_POST['addr'];
    $zip = $_POST['zip'];
    $bday = $_POST['bday'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $con = $_POST['con'];
    $u = new User();
    if($pass == $con){
        echo'
            <script>
                alert("'.$u->signup($subsid, $planname, $duration, $price, $description, $fname, $mname, $lname, $addr, $zip, $bday, $email, $pass, $con).'");
            </script>
        ';
    }else{
        echo'
        <script>
            alert("Password did not match");
            window.open("index.php");
        </script>
        ';
    }
}
?>

<script>
    function displayplan(planname, duration, price, description) {
        document.getElementById("planname").value = planname;
        document.getElementById("duration").value = duration;
        document.getElementById("price").value = price;
        document.getElementById("description").value = description;
    }
</script>
