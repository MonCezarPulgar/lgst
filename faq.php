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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="images/text.png">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
        }

        .main-container {
            flex: 1;
            display: flex;
        }

        .btn-close {
            color: #ffffff;
            background-color: transparent;
            border: none;
        }

        .btn-close:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
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
            margin-top: 50px;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .white-shadow {
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
        }

        .btn-toggle-sidebar {
            background-color: #282c34;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            padding: 10px;
            color: #fff;
            font-size: 24px;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1050;
        }

        .btn-toggle-sidebar:hover {
            background-color: #0056b3;
        }

        .btn-toggle-sidebar:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5);
        }

        .btn-toggle-sidebar.hidden {
            display: none;
        }

        .dashboard h2 {
            text-align: center;
            margin-top: 50px;
            font-size: 60px;
            font-weight: bold;
            background: linear-gradient(135deg, #ffffff, #aeeeee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0.5, 0.5, 0.5, 0.5);
        }

        .hidden {
            display: none;
        }

        @media (max-width: 576px) {
            .btn-toggle-sidebar {
                width: 40px;
                height: 40px;
                font-size: 20px;
            }

            .dashboard h2 {
                font-size: 2rem;
            }
        }

        .faq-question {
            cursor: pointer;
            color: #0056b3;
        }

        .faq-answer {
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <!-- Button to toggle the sidebar -->
    <button class="btn-toggle-sidebar" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
        aria-controls="sidebar" aria-label="Toggle sidebar">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 id="sidebarLabel"></h5>
            <h3> PremTranslate</h3>
            <button type="button" class="btn-close mb-2 mt-1" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a href="" class="d-block mx-1 mb-1"><img src="images/voice.png" class="img-fluid" alt="Logo"></a>
            <div class="links">
                <a href="admindashboard.php"> <i class="fa-solid fa-clipboard mx-2"></i> Dashboard</a>
                <div class="dropdown mt-2">
                    <a class="dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-circle-info mx-2"></i> Profile
                    </a>
                    <ul class="dropdown-menu mx-2">
                        <li><a class="dropdown-item" href="profile.php">View Profile</a></li>
                        <li><a class="dropdown-item" href="updateplan.php">Edit Profile</a></li>
                    </ul>
                </div>
                <a href="usermanagement.php"><i class="fas fa-house mx-2"></i> Home</a>
                <a href="languages.php"><i class="fas fa-language mx-2"></i> Learn A Language</a>
                <a href="faq.php"><i class="fas fa-question-circle mx-2"></i> FAQ's</a>
            </div>
            <div class="mt-3">
                <a href=""><i class="fas fa-lock mx-2"></i> Change Password</a>
                <a href="index.php"><i class="fas fa-sign-out-alt mx-2"></i> Log-Out</a>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="container p-4 bg-light" style="margin-top: 80px; border-radius:10px; box-shadow: 0 4px 8px rgba(0.5, 0.5, 0.5, 0.5);">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Frequently Asked Questions</h1>
            </div>
            <div class="col-md-12">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed faq-question" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                1. What is a language translator?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body faq-answer">
                                A language translator is software or a tool that translates one language into another.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed faq-question" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                2. Who created PremTranslate: Language Translator?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body faq-answer">
                                PremTranslate is developed by PremTech Industries, which focuses on developing software
                                and websites.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed faq-question" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                3. How do you handle language pairs in a translation system?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body faq-answer">
                                A translation memory stores previously translated segments of text and their equivalents
                                in other languages. It helps improve consistency and speed by reusing translations for
                                similar or identical phrases.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed faq-question" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                4. How does the system manage context and ambiguity in translations?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body faq-answer">
                                Advanced systems use context-aware algorithms and natural language processing (NLP)
                                techniques to better understand and translate text. They may consider surrounding text
                                and historical data to resolve ambiguities.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed faq-question" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                5. How does the system handle updates and new languages?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body faq-answer">
                                Updating the system with new languages or improving existing ones involves training new
                                models or incorporating additional data into the translation engine. This process can be
                                resource-intensive and requires regular maintenance.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed faq-question" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                6. How is data privacy managed in a translation system?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body faq-answer">
                                Data privacy is managed by implementing strong encryption protocols, anonymizing
                                sensitive information, and ensuring that any data used for training models is handled
                                according to privacy regulations.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed faq-question" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                7. Can the system be customized for specific domains or industries?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body faq-answer">
                                Yes, many systems can be customized or trained with domain-specific data to improve
                                accuracy for particular industries or fields, such as legal, medical, or technical
                                translations.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var sidebarToggleButton = document.querySelector('.btn-toggle-sidebar');
            var sidebar = document.querySelector('#sidebar');

            sidebar.addEventListener('shown.bs.offcanvas', function () {
                sidebarToggleButton.classList.add('hidden');
            });

            sidebar.addEventListener('hidden.bs.offcanvas', function () {
                sidebarToggleButton.classList.remove('hidden');
            });
        });
    </script>
</body>

</html>
