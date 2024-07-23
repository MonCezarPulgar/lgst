<?php
session_start();
include_once 'Class/user.php';

$u = new User();

// Handle contact form submission
if(isset($_POST['btnsignup'])){
    $userid = $_POST['userid'];
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
                alert("'.$u->signup($userid,$fname, $mname, $lname, $addr, $zip, $bday, $email, $pass, $con).'");
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Translator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 18px;
        }
		
		/* Navbar styles */
        .navbar {
            background-color: #0072ff;
            color: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
        }

        .menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .menu ul li {
            margin-left: 20px;
        }

        .menu ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 24px;
            transition: color 0.3s;
        }

        .menu ul li a:hover {
            color: #00c6ff;
        }
		
        .main-content {
            padding: 20px;
            max-width: 800px;
            margin: 80px auto 20px; /* Adjust the top margin as needed */
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .translator {
            text-align: center;
            margin-bottom: 20px;
        }
        .translator h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #0072ff;
        }
        .translator .columns {
            display: flex;
            justify-content: space-between;
            gap: 20px; /* Adjust the gap between columns */
        }
        .translator .column {
            width: 45%;
            padding: 15px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 8px;
            box-sizing: border-box; /* Ensure padding doesn't affect width */
        }
        .translator .column h2 {
            color: #00c6ff;
            font-size: 20px;
            margin-bottom: 10px;
        }
        .translator select {
            width: calc(100% - 20px); /* Adjust width to account for margin */
            padding: 10px;
            margin: 10px; /* Add margin on all sides */
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: #f9f9f9;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url('path/to/your/dropdown-icon.png'); /* Add custom dropdown icon */
            background-position: right 10px center;
            background-repeat: no-repeat;
            background-size: 20px;
        }
        .translator select option {
            background-repeat: no-repeat;
            background-size: 20px;
            padding-left: 30px; /* Add padding to accommodate the flag */
        }
        .translator select option[data-country="Philippines"] {
            background-image: url('phillipines.png'); /* Flag of the Philippines */
        }
        .translator select option[data-country="United States"] {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/a/a4/Flag_of_the_United_States.svg'); /* Flag of the United States */
        }
        .translator select option[data-country="Spain"] {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Spain.svg'); /* Flag of Spain */
        }
        .translator select option[data-country="France"] {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg'); /* Flag of France */
        }
        .translator select option[data-country="China"] {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/f/fa/Flag_of_the_People%27s_Republic_of_China.svg'); /* Flag of China */
        }
        .translator textarea {
            width: calc(100% - 20px); /* Adjust width to account for margin */
            padding: 10px;
            margin: 10px; /* Add margin on all sides */
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: #f9f9f9;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        .signup {
            margin-top: 20px;
            text-align: center;
        }
        .signup a {
            color: #0072ff;
            text-decoration: none;
            font-weight: bold;
        }
        .form-container {
            width: 50%;
            margin-left: 23%;
            display: none;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .form-container input, .form-container textarea, .form-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input, .form-container textarea {
            background: #f9f9f9;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        .form-container button {
            background-color: #0072ff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .form-container button:hover {
            background-color: #005bb5;
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
            color: #0072ff;
        }

        /* Card styles */
        .card {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            color: #0072ff;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
            color: #333;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .translator .columns {
                flex-direction: column;
                align-items: center;
            }
            .translator .column {
                width: 100%;
                margin-bottom: 20px;
            }
            .form-container {
                width: 100%;
                margin: 20px auto;
            }
        }

        @media (max-width: 480px) {
            .translator h1 {
                font-size: 24px;
            }
            .translator .column h2 {
                font-size: 18px;
            }
            .translator select, .translator textarea {
                font-size: 14px;
            }
            .navbar {
                flex-direction: column;
                text-align: center;
            }
            .menu ul {
                flex-direction: column;
                align-items: center;
            }
            .menu ul li {
                margin: 10px 0;
            }
            .main-content {
                margin-top: 120px; /* Adjust top margin for smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">PremTranslate: Language Translator</div>
        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <div class="translator">
            <h1>Language Translator</h1>
            <div class="columns">
                <div class="column">
                    <h2>Translate From:</h2>
                    <select name="fromLanguage">
                        <option value="en" data-country="United States">English</option>
                        <option value="fil" data-country="Philippines">Filipino</option>
                        <option value="es" data-country="Spain">Spanish</option>
                        <option value="fr" data-country="France">French</option>
                        <option value="zh" data-country="China">Chinese</option>
                    </select>
                    <textarea name="fromText" rows="10" placeholder="Enter text here..."></textarea>
                </div>
                <div class="column">
                    <h2>Translate To:</h2>
                    <select name="toLanguage">
                        <option value="en" data-country="United States">English</option>
                        <option value="fil" data-country="Philippines">Filipino</option>
                        <option value="es" data-country="Spain">Spanish</option>
                        <option value="fr" data-country="France">French</option>
                        <option value="zh" data-country="China">Chinese</option>
                    </select>
                    <textarea name="toText" rows="10" placeholder="Translation will appear here..."></textarea>
                </div>
            </div>
        </div>
        <div class="signup">
            <p>Don't have an account? <a href="#" onclick="showForm()">Sign up here!</a></p>
        </div>
        <div class="form-container" id="form-container">
            <h2 class="form-header">Sign Up</h2>
            <form method="POST">
                    <?php
                        include 'generateuserid.php';
                        $userID = generateUSERID();
                    ?>
                <label for="userid" hidden>User ID</label>
                <input type="text" id="userid" name="userid" value = "<?php echo $userID; ?>" hidden>
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" required>
                <label for="mname">Middle Name</label>
                <input type="text" id="mname" name="mname">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" required>
                <label for="addr">Address</label>
                <textarea id="addr" name="addr" rows="3" required></textarea>
                <label for="zip">ZIP Code</label>
                <input type="text" id="zip" name="zip" required>
                <label for="bday">Birthday</label>
                <input type="date" id="bday" name="bday" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="pass">Password</label>
                <input type="password" id="pass" name="pass" required>
                <label for="con">Confirm Password</label>
                <input type="password" id="con" name="con" required>
                <button type="submit" name="btnsignup">Sign Up</button>
            </form>
        </div>
    </div>
    <script>
        function showForm() {
            document.getElementById('form-container').style.display = 'block';
        }
    </script>
</body>
</html>
