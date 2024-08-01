<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include_once 'Class/user.php';

$u = new User();

// Handle sign-up form submission
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

    // Check if passwords match
    if($pass != $con){
        echo '<script>
            alert("Password did not match");
            window.location.href = "index.php";
        </script>';
        exit();
    }

    // Calculate age
    $birthDate = new DateTime($bday);
    $today = new DateTime('today');
    $age = $today->diff($birthDate)->y;

    // Validate age
    if($age < 19){
        echo '<script>
            alert("You must be 19 years old or older to sign up");
            window.location.href = "index.php";
        </script>';
        exit();
    }

    // Proceed with sign-up
    $signupResult = $u->signup($userid, $fname, $mname, $lname, $addr, $zip, $bday, $email, $pass, $con);
    echo '<script>
        alert("'.$signupResult.'");
        if("'.$signupResult.'" === "Signup successful") {
            window.location.href = "profile.php";
        } else {
            window.location.href = "index.php";
        }
    </script>';
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
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/f/fa/Flag_of_China.svg'); /* Flag of China */
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }

        .card img {
            border-radius: 10px;
            margin-bottom: 10px;
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .card h2 {
            color: #0072ff;
            margin-bottom: 10px;
        }

        .card p {
            color: #333;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">PremTranslate: Language Translator</div>
        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>
    </nav>
    <div class="main-content">
        <div class="translator">
            <h1>Language Translator</h1>
            <div class="columns">
                <div class="column">
                    <h2>Input Text</h2>
                    <textarea id="inputText" rows="6" placeholder="Enter text here..."></textarea>
                    <select id="inputLanguage">
                        <option value="" selected disable>Select Language</option>
                        <?php
                        include_once 'Class/user.php';
                        $u = new User();
                        $data = $u->takelanguagefree();
                        if ($data) {
                            while ($row = $data->fetch_assoc()) {
                                echo '<option value="'.$row['LanguageCode'].'">'.$row['Language'].'</option>';
                            }
                        }
                        ?>
                    </select>
                    <button onclick="startSpeechRecognition()" class="btn btn-secondary"><i class = "fas fa-microphone"></i></button>
                </div>
                <div class="column">
                    <h2>Translated Text</h2>
                    <textarea id="outputText" rows="6" placeholder="Translation will appear here..."></textarea>
                    <select id="outputLanguage">
                        <option value="" selected disable>Select Language</option>
                        <?php
                        include_once 'Class/user.php';
                        $u = new User();
                        $data = $u->takelanguagefree();
                        if ($data) {
                            while ($row = $data->fetch_assoc()) {
                                echo '<option value="'.$row['LanguageCode'].'">'.$row['Language'].'</option>';
                            }
                        }
                        ?>
                    </select>
                    <button onclick="speakTranslatedText()" class="btn btn-secondary"><i class = "fas fa-microphone"></i></button>
                </div>
            </div>
            <button onclick="translateText()" class="btn btn-primary mt-3">Translate</button>
        </div>
		
		<div class="signup">
            <!-- Button trigger modal -->
            <a href="signup.php">Create an account</a>
        </div>

        <!-- Sign-Up Modal -->
        <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="signupForm" method="POST" action="signup.php">
                            <div class="form-group">
                            <?php
                                include 'generateuserid.php';
                                $userID = generateUSERID();
                            ?>
                                <input type="text" name="userid" id="userid" class="form-control text-center" value="<?php echo $userID; ?>" hidden>
                            </div>
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" required>
                            </div>
                            <div class="form-group">
                                <label for="mname">Middle Name</label>
                                <input type="text" class="form-control" id="mname" name="mname">
                            </div>
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" required>
                            </div>
                            <div class="form-group">
                                <label for="addr">Address</label>
                                <input type="text" class="form-control" id="addr" name="addr" required>
                            </div>
                            <div class="form-group">
                                <label for="zip">Zip Code</label>
                                <input type="text" class="form-control" id="zip" name="zip" required>
                            </div>
                            <div class="form-group">
                                <label for="bday">Birthday</label>
                                <input type="date" class="form-control" id="bday" name="bday" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" id="pass" name="pass" required>
                            </div>
                            <div class="form-group">
                                <label for="con">Confirm Password</label>
                                <input type="password" class="form-control" id="con" name="con" required>
                            </div>
                            <button type="submit" name="btnsignup" class="btn btn-primary">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

		
    </div>
    <script>
        // Initialize Speech Recognition API
        const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.lang = 'en-US'; // You may need to set the language based on user selection

        // Handle Speech Recognition
        function startSpeechRecognition() {
            recognition.start();
        }

        recognition.onresult = function(event) {
            const transcript = event.results[0][0].transcript;
            document.getElementById('inputText').value = transcript;
        };

        // Handle Text-to-Speech
        function speakTranslatedText() {
            const text = document.getElementById('outputText').value;
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = document.getElementById('outputLanguage').value; // Set language for speech synthesis
            window.speechSynthesis.speak(utterance);
        }

        // Translate text using Google Translate API
        function translateText() {
            var inputText = document.getElementById("inputText").value;
            var inputLanguage = document.getElementById("inputLanguage").value;
            var outputLanguage = document.getElementById("outputLanguage").value;

            var url = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=${inputLanguage}&tl=${outputLanguage}&dt=t&q=${encodeURI(inputText)}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    var translatedText = data[0][0][0];
                    document.getElementById("outputText").value = translatedText;
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }

        // Enable language selection in output based on input selection
        document.getElementById('inputLanguage').addEventListener('change', function() {
            const selectedInputLanguage = this.value;
            const outputLanguageSelect = document.getElementById('outputLanguage');

            // Enable all options
            Array.from(outputLanguageSelect.options).forEach(option => {
                option.disabled = false;
            });

            // Disable options that should not be available
            Array.from(outputLanguageSelect.options).forEach(option => {
                if (option.value !== '' && option.value !== selectedInputLanguage) {
                    option.disabled = true;
                }
            });
        });
    </script>
</body>
</html>
