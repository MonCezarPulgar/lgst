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
    <div class="main">

        <div class="content">
            <div class="card">
                <h2>Sign Up</h2>
                <div class="alert">Sign-Up Successful</div>
                <form action="signup.php" method = "POST">
                <div class = "row p-4">
                        <div class = "col-md-6">
                            <label><i class = "fas fa-user ms-2" ></i> First Name</label>
                            <input type="text" name = "fname" id = "fname" class = "form-control text-center">
                        </div>
                        <div class = "col-md-6">
                            <label><i class = "fas fa-user ms-2" ></i> Middle Name</label>
                            <input type="text" name = "mname" id = "mname" class = "form-control text-center">
                        </div>
                        <div class = "col-md-6">
                            <label><i class = "fas fa-user ms-2" ></i> Last Name</label>
                            <input type="text" name = "lname" id = "lname" class = "form-control text-center">
                        </div>
                        <div class = "col-md-6">
                            <label><i class = "fas fa-home ms-2" ></i> Address</label>
                            <input type="text" name = "addr" id = "addr" class = "form-control text-center">
                        </div>
                        <div class = "col-md-6">
                            <label><i class = "fas fa-file-zipper ms-2" ></i> Zip Code</label>
                            <input type="text" name = "zip" id = "zip" class = "form-control text-center">
                        </div>
                        <div class = "col-md-6">
                            <label><i class = "fas fa-calendar ms-2" ></i> Birthdate</label>
                            <input type="date" name = "bday" id = "bday" class = "form-control text-center">
                        </div>
                        <div class = "col-md-12">
                            <label><i class = "fas fa-envelope ms-2" ></i> Email Address</label>
                            <input type="email" name = "email" id = "email" class = "form-control text-center" required>
                        </div>
                        <div class = "col-md-12">
                            <label><i class = "fas fa-lock ms-2" ></i> Password</label>
                            <input type="password" name = "pass" id = "pass" class = "form-control text-center" required>
                        </div>
                        <div class = "col-md-12">
                            <label><i class = "fas fa-lock ms-2" ></i>Confirm Password</label>
                            <input type="password" name = "con" id = "pass" class = "form-control text-center" required>
                        </div>
                    </div>
                    <div class = "col-md 12">
                    <button type="submit" name = "btnsignup" class = "btn btn-warning">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>..
</body>
</html>
<?php
include_once 'Class/user.php';
if(isset($_POST['btnsignup'])){
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
                alert("'.$u->signup($fname, $mname, $lname, $addr, $zip, $bday, $email, $pass, $con).'");
            </script>
        ';
    }else{
        echo'
        <script>
            alert("Password did not match");
            window.open("plan.php");
        </script>
        ';
    }
}
?>
