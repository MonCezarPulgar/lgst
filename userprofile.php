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
            background: linear-gradient(135deg, #00c6ff, #0072ff);
        }
		.container {
			padding: 20px;
			margin-top: 15px;
			background-color: #f8f9fa; /* light background color */
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0.5, 0.5, 0.5, 0.5); /* Adds a subtle shadow */
		}
        .main-container {
            flex: 1;
            display: flex;
        }
		.btn-close {
			color: #ffffff; /* Sets the icon color to white */
			background-color: transparent; /* Ensures the button background is transparent */
			border: none; /* Removes any default border */
		}

		.btn-close:hover {
			color: #ffffff; /* Ensures the icon color remains white on hover */
			background-color: rgba(255, 255, 255, 0.1); /* Adds a subtle background color on hover for visibility */
		}
        .offcanvas {
            background: #282c34;
            color: #ffffff;
            width: 290px;
            display: flex;
            flex-direction: column;
        }
        .offcanvas .offcanvas-header {
            border-bottom: 1px solid #444851;
            padding: 20px;
        }
        .offcanvas .offcanvas-body {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        .offcanvas .offcanvas-body .links {
            flex: 1;
        }
        .offcanvas .offcanvas-body a {
            color: #ffffff;
            text-decoration: none;
            margin-top: 15px;
            font-size: 18px;
            display: block;
        }
        .offcanvas .offcanvas-body a:hover {
            color: #ffffff;
            background-color: #3a3f47;
            border-radius: 5px;
            padding: 10px;
        }
        .offcanvas .dropdown-menu {
            background: #3a3f47;
        }
        .offcanvas .dropdown-item {
            color: #d1d1d1;
        }
        .offcanvas .dropdown-item:hover {
            color: #ffffff;
            background-color: #3a3f47;
        }
        .navbar {
            background-color: #17a2b8;
        }
        .navbar .navbar-brand img {
            height: 50px;
        }
        .navbar .nav-link {
            color: #fff;
        }
        .navbar .nav-link:hover {
            color: #e9ecef;
        }
        .container {
            padding: 20px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .white-shadow {
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
        }
        .btn-toggle-sidebar {
            background-color: #282c34; /* Bright color for visibility */
            border: none;
            width: 50px; /* Adjust width to be circular */
            height: 50px; /* Adjust height to be circular */
            border-radius: 50%;
            padding: 10px;
            color: #fff;
            font-size: 24px;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1050; /* Ensure it's above other content */
        }
        .btn-toggle-sidebar:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        .btn-toggle-sidebar:focus {
            outline: none; /* Remove default focus outline */
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5); /* Custom focus outline */
        }
        .btn-toggle-sidebar.hidden {
            display: none; /* Hide the button when the sidebar is open */
        }
</style>
<body>
    <!-- Button to toggle the sidebar -->
    <button class="btn-toggle-sidebar" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-label="Toggle sidebar">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 id="sidebarLabel"></h5>
			<h2> PremTranslate</h2>
            <button type="button" class="btn-close mb-2 mt-1" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a href="" class="d-block mx-1 mb-1"><img src="images/voice.png" height="50px" alt="Logo"></a>
            <div class="links">
                <div class="dropdown mt-2">
                    <a class="dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-circle-info mx-2"></i> Profile
                    </a>
                    <ul class="dropdown-menu mx-2">
                        <li><a class="dropdown-item" href="profile.php">View Profile</a></li>
                        <li><a class="dropdown-item" href="updateplan.php">Edit Profile</a></li>
                    </ul>
                </div>
                <a href="userprofile.php"><i class="fas fa-house mx-2"></i> Home</a>
                <a href="languages.php"><i class="fas fa-language mx-2"></i> Learn A Language</a>
                <a href="faq.php"><i class="fas fa-question-circle mx-2"></i> FAQ's</a>
            </div>
            <div class="mt-3">
                <a href=""><i class="fas fa-lock mx-2"></i> Change Password</a>
                <a href="index.php"><i class="fas fa-sign-out-alt mx-2"></i> Log-Out</a>
            </div>
        </div>
    </div>
	
    <nav class="navbar navbar-expand-sm mt-2 mb-2 ms-4" style="background:linear-gradient(135deg, #00c6ff, #0072ff); font-size:20px; font-weight:bold;">
        <div class="container-fluid">
            <a class="navbar-brand" href="mlibrary.php">
                
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="selectplan.php"><i class="fas fa-user mx-1 ms-4"></i> Select Plan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container text-center p-4 bg-light">
        <div class="row">
            <h1>Language Translator</h1>
            <div class="col-md-6">
                <select name="inputLanguage" id="inputLanguage" class="form-control">
                    <option value="" selected disabled>Select Language</option>
                    <?php
                    include_once 'Class/user.php';
                    $u = new User();
                    $data = $u->takelanguage();
                    if ($data) {
                        while ($row = $data->fetch_assoc()) {
                            echo '<option value="'.$row['LanguageCode'].'">'.$row['Language'].'</option>';
                        }
                    }
                    ?>
                </select>

                <textarea name="inputText" id="inputText" rows="10" placeholder="Type Here..." class="form-control"></textarea>
                <button onclick="startSpeechRecognition()" class="btn btn-secondary mt-2"><i class = "fas fa-microphone"></i></button>
            </div>
            <div class="col-md-6">
                <select name="outputLanguage" id="outputLanguage" class="form-control">
                    <option value="" selected disabled>Select Language</option>
                    <?php
                    include_once 'Class/user.php';
                    $u = new User();
                    $data = $u->takelanguage();
                    if ($data) {
                        while ($row = $data->fetch_assoc()) {
                            echo '<option value="'.$row['LanguageCode'].'">'.$row['Language'].'</option>';
                        }
                    }
                    ?>
                </select>
                <textarea name="outputText" id="outputText" rows="10" placeholder="Translation will appear here..." class="form-control" readonly></textarea>
                <button onclick="speakTranslatedText()" class="btn btn-secondary mt-2"><i class = "fas fa-microphone"></i></button>
            </div>
        </div>
        <button onclick="translateText()" class="btn btn-primary mt-3">Translate</button>
    </div>

    <script>
        function translateText() {
            var inputText = document.getElementById("inputText").value;
            var inputLanguage = document.getElementById("inputLanguage").value;
            var outputLanguage = document.getElementById("outputLanguage").value;

            // Logging the values to check if they are correct
            console.log("Input Text:", inputText);
            console.log("Input Language:", inputLanguage);
            console.log("Output Language:", outputLanguage);

            // Check if any of the values are empty and alert the user
            if (!inputText) {
                alert("Input text is empty. Please type something to translate.");
                return;
            }
            if (!inputLanguage) {
                alert("Input language is not selected. Please select a language.");
                return;
            }
            if (!outputLanguage) {
                alert("Output language is not selected. Please select a language.");
                return;
            }

            // Constructing the URL for the API request
            var url = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=${inputLanguage}&tl=${outputLanguage}&dt=t&q=${encodeURIComponent(inputText)}`;

            // Fetching the translation
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log("Translation Data:", data);
                    var translatedText = data[0][0][0];
                    document.getElementById("outputText").value = translatedText;
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Error fetching translation. Please try again later.");
                });
        }

        // Initialize Speech Recognition API
        const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.lang = 'en-US'; // You may need to set the language based on user selection

        // Handle Speech Recognition
        function startSpeechRecognition() {
            recognition.start();
        }

        recognition.onresult = function(event) {
            const transcript = event.results[0][0].transcript;
            document.getElementById("inputText").value = transcript;
        };

        // Handle Speech Synthesis
        function speakTranslatedText() {
            var text = document.getElementById("outputText").value;
            var outputLanguage = document.getElementById("outputLanguage").value;
            var msg = new SpeechSynthesisUtterance();
            msg.text = text;
            msg.lang = outputLanguage;
            window.speechSynthesis.speak(msg);
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
