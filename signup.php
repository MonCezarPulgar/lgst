<?php
include_once 'Class/user.php';

if (isset($_POST['btnsignup'])) {
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
    if ($pass == $con) {
        $result = $u->signup($subsid, $planname, $duration, $price, $description, $fname, $mname, $lname, $addr, $zip, $bday, $email, $pass, $con);
        if ($result == 'Signup Successful!') {
            header("Location: payment.php?subsid=$subsid&planname=$planname&price=$price");
            exit();
        } else {
            echo '<script>alert("PremTranslate Says: ' . $result . '");</script>';
        }
    } else {
        echo '<script>alert("Password did not match");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
        }

        .navbar {
            background-color: #333;
            padding: 10px 20px;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand {
            color: #ff7200;
            font-size: 35px;
            font-family: Arial, sans-serif;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .navbar-nav .nav-link {
            color: white;
            margin-left: 20px;
        }

        .navbar-nav .nav-link:hover {
            color: #ff7200;
        }

        .container {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #ff7200;
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 0;
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            background-color: #f9f9f9;
            border-top: 0;
        }

        .modal-content {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            border-bottom: 0;
        }

        .modal-title {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: none;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #ff7200;
            box-shadow: 0 0 0 0.2rem rgba(255, 114, 0, 0.25);
        }

        .btn-primary {
            background-color: #ff7200;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e65c00;
        }

        .modal-footer .btn {
            border-radius: 20px;
            padding: 10px 20px;
        }

        .card-title {
            font-size: 1.25rem;
        }

        .card-text {
            color: #333;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                margin-left: 0;
                text-align: center;
                margin-top: 10px;
            }

            .navbar-nav .nav-link {
                margin-left: 0;
                display: block;
                padding: 10px 0;
            }

            .card {
                margin: 10px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">PremTranslate</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mb-4">Choose Your Plan</h1>
        <?php
            include_once 'Class/user.php';
            $u = new User();
            $data = $u->displayplan();
        ?>
        <div class="row">
            <?php
                while ($row = $data->fetch_assoc()) {
                    echo '
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header text-center">
                                ' . htmlspecialchars($row['PlanName']) . '
                            </div>
                            <div class="card-body">
                                <p>' . htmlspecialchars($row['Description']) . '</p>
                                <h3>' . htmlspecialchars($row['Duration']) . '</h3>
                                <p class="mt-3"><strong>Included Languages:</strong></p>';
                    
                    $languages = explode(' ', $row['IncludedLanguages']);
                    foreach ($languages as $language) {
                        echo '<p>' . htmlspecialchars(trim($language)) . '</p>';
                    }
                    
                    echo '
                                <h4 class="mt-3">$' . htmlspecialchars($row['Price']) . '</h4>
                            </div>
                            <div class="card-footer text-center">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Payment" onclick="displayplan(\'' . htmlspecialchars($row['PlanName']) . '\',\'' . htmlspecialchars($row['Duration']) . '\', \'' . htmlspecialchars($row['Price']) . '\', \'' . htmlspecialchars($row['Description']) . '\')">Continue to Signup</button>
                            </div>
                        </div>
                    </div>';
                }
            ?>
        </div>
    </div>

    <!-- Modal for Signup-->
    <div class="modal fade" id="Payment" tabindex="-1" aria-labelledby="PaymentLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="PaymentLabel">Signup Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php
                            include 'generatesubsid.php';
                            $subsID = generateSUBSID();
                        ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="subsid" class="form-label">Subscription ID</label>
                            <input type="text" class="form-control" id="subsid" name="subsid" value="<?php echo $subsID; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="planname" class="form-label">Plan Name</label>
                            <input type="text" class="form-control" id="planname" name="planname" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" required>
                        </div>
                        <div class="mb-3">
                            <label for="mname" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="mname" name="mname">
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" required>
                        </div>
                        <div class="mb-3">
                            <label for="addr" class="form-label">Address</label>
                            <input type="text" class="form-control" id="addr" name="addr" required>
                        </div>
                        <div class="mb-3">
                            <label for="zip" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zip" name="zip" required>
                        </div>
                        <div class="mb-3">
                            <label for="bday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="bday" name="bday" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pass" name="pass" required>
                        </div>
                        <div class="mb-3">
                            <label for="con" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="con" name="con" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="btnsignup" class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Password match validation
        document.getElementById('confpassword').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            const message = document.getElementById('passwordMatchMessage');

            if (confirmPassword && confirmPassword !== password) {
                message.textContent = 'Passwords do not match';
            } else {
                message.textContent = '';
            }
        });

        // Email validation
        document.getElementById('email').addEventListener('input', function() {
            const email = this.value;
            const message = document.getElementById('emailValidationMessage');

            fetch('https://api.hunter.io/v2/email-verifier?email=${email}&api_key=${API_KEY}')
                .then(response => response.json())
                .then(data => {
                    if (data.is_valid) {
                        message.textContent = '';
                    } else {
                        message.textContent = 'Invalid email address';
                    }
                })
                .catch(error => {
                    message.textContent = 'Error validating email address';
                });
        });

        // Fill form fields from the modal
        function displayplan(planName, duration, price, description) {
            document.getElementById('planname').value = planName;
            document.getElementById('duration').value = duration;
            document.getElementById('price').value = price;
            document.getElementById('description').value = description;
        }
    </script>
</body>
</html>
