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
			margin-bottom: 310apx;
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
			margin-right:100px;
        }

        .menu ul li a:hover {
            color: #00c6ff;
        }
		
        .main-content {
			padding: 20px;
			max-width: 800px;
			margin: 80px auto 20px; /* Adjust the top margin as needed */
			background: #fff;
			box-shadow: 100px 100px 100px rgba(0,0,0,0.1);
			border-radius: 8px;
		}
        .login {
            text-align: right;
            margin-bottom: 20px;
        }
        .login a {
            color: #0072ff;
            text-decoration: none;
            font-weight: bold;
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
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">PremTranslate</div>
        <div class="menu-btn"></div>
		<div class="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
			</ul>
		</div>
    </div>
	
    <div class="main-content">
        <!-- Removed login section -->
        <div class="translator">
            <h1>PREMTRANSLATE: LANGUAGE TRANSLATOR</h1>
            <div class="columns">
                <div class="column">
                    <h2>Select Language</h2>
                    <select id="select-language">
                        <option value="Filipino" data-country="Philippines" data-flag="phillipines.png">Filipino</option>
                        <option value="English" data-country="United States" data-flag="https://upload.wikimedia.org/wikipedia/commons/a/a4/Flag_of_the_United_States.svg">English</option>
                        <option value="Spanish" data-country="Spain" data-flag="https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Spain.svg">Spanish</option>
                        <option value="French" data-country="France" data-flag="https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg">French</option>
                        <option value="Chinese" data-country="China" data-flag="https://upload.wikimedia.org/wikipedia/commons/f/fa/Flag_of_the_People%27s_Republic_of_China.svg">Chinese</option>
                        <!-- Add more languages as needed -->
                    </select>
                    <textarea class="input-text" id="source-text" rows="5"></textarea>
                </div>
                <div class="column">
                    <h2 id="target-language-label">Based on Location</h2>
                    <textarea id="target-text" rows="4"></textarea>
                </div>
            </div>
        </div>
        <div class="signup">
            <p>Want to continue to try other languages? Click <a href="#signup">here</a>!</p>
        </div>
    </div>

    <!-- Removed Login Form Section -->

    <!-- Signup Form Section -->
    <div class="signup">
            <div class="card">
                <h2>Sign Up</h2>
                <form action="signup.php" method = "POST">
                <?php
                        include 'generateuserid.php';
                        $userID = generateUSERID();
                    ?>
                <div class = "row p-4">
                        <div class = "col-md-12">
                            <label><i class = "fas fa-user ms-2" ></i> UserId</label>
                            <input type="text" name="userid" id="userid" class="form-control text-center" value="<?php echo $userID; ?>" readonly>
                        </div>
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

    <script>
        // Function to get user's country
        async function getUserCountry() {
            try {
                const response = await fetch('https://ipapi.co/json/');
                const data = await response.json();
                return data.country_name;
            } catch (error) {
                console.error('Error fetching user location:', error);
                return null;
            }
        }

        // Set target language based on user's country
        async function setTargetLanguage() {
            const country = await getUserCountry();
            const selectLanguage = document.getElementById('select-language');
            const targetLanguageLabel = document.getElementById('target-language-label');
            
            if (country) {
                switch (country) {
                    case 'Philippines':
                        targetLanguageLabel.textContent = 'Filipino';
                        selectLanguage.value = 'Filipino';
                        break;
                    case 'United States':
                    case 'United Kingdom':
                        targetLanguageLabel.textContent = 'English';
                        selectLanguage.value = 'English';
                        break;
                    case 'Spain':
                        targetLanguageLabel.textContent = 'Spanish';
                        selectLanguage.value = 'Spanish';
                        break;
                    case 'France':
                        targetLanguageLabel.textContent = 'French';
                        selectLanguage.value = 'French';
                        break;
                    case 'China':
                        targetLanguageLabel.textContent = 'Chinese';
                        selectLanguage.value = 'Chinese';
                        break;
                    default:
                        targetLanguageLabel.textContent = 'English';
                        selectLanguage.value = 'English';
                        break;
                }
                
                // Trigger change event to update flag
                updateLanguageFlag();
            } else {
                targetLanguageLabel.textContent = 'English';
                selectLanguage.value = 'English';
            }
        }

        // Function to update language flag based on selected language
        function updateLanguageFlag() {
            const selectLanguage = document.getElementById('select-language');
            const selectedOption = selectLanguage.options[selectLanguage.selectedIndex];
            const flagUrl = selectedOption.getAttribute('data-flag');
            selectLanguage.style.backgroundImage = `url(${flagUrl})`;
        }

        // Set the initial target language based on user's location
        setTargetLanguage();

        // Event listener for language selection change
        document.getElementById('select-language').addEventListener('change', function() {
            updateLanguageFlag();
        });

        document.querySelector('.signup a').addEventListener('click', function() {
            document.getElementById('signup').style.display = 'block';
            window.scrollTo(0, document.getElementById('signup').offsetTop);
        });
    </script>
</body>
</html>
