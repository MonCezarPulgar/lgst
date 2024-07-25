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
    <style>
        /* Reset and base styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: 'Roboto', sans-serif;
    line-height: 1.6;
    background: linear-gradient(135deg, #00c6ff, #0072ff);
    color: #fff;
    margin: 0;
    padding: 0;
}

/* Fix Free Trial button alignment */
.freetrial {
    margin-left: auto; /* Pushes the Free Trial button to the right */
}

.freetrial a {
    margin-top: 5px;
    display: inline-block;
    padding: 6px 20px;
    border-radius: 50px;
    background: linear-gradient(135deg, #c2e9fb, #ffffff);
    text-decoration: none;
    text-align: center;
    transition: background-color 0.3s;
    font-weight: bold;
}

.freetrial a:hover {
    background: linear-gradient(135deg, #c2e9fb, #ffffff);
}

.logo {
    font-size: 24px;
    font-weight: bold;
}

/* Navigation styles */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center; /* Ensure vertical alignment */
    padding: 15px 30px;
    font-family: 'Roboto', sans-serif;
    margin: 0;
    top: 0;
    z-index: 1000;
    animation: fadeIn 2s ease;
}

.menu {
    display: flex;
    align-items: left; /* Align items vertically */
}

.menu ul {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    align-items: left; /* Align items vertically */
}

.menu ul li {
    margin-left: 30px;
}

.menu ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    font-size: 24px;
    transition: color 0.3s;
}

.menu ul li a:hover {
    color: #00c6ff;
    background: linear-gradient(135deg, #c2e9fb, #ffffff);
    padding: 10px 20px;
    border-radius: 50px;
}

/* Main sections */
.main {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.section {
    padding: 50px 0;
    animation: fadeIn 2s ease;
}

.section-title {
    text-align: center;
    margin-bottom: 40px;
}

.section-title h1 {
    font-size: 50px;
    background: -webkit-linear-gradient(#ffffff, #c2e9fb);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: slideIn 1.5s ease;
}

.section-title p {
    font-size: 24px;
    color: white;
    text-align: center;
    margin-bottom: 15px;
}

/* Typing effect */
#typing-text {
    display: inline-block;
    border-right: 2px solid white;
    white-space: nowrap;
    overflow: hidden;
    animation: typing 4s steps(40, end), blink-caret 0.75s step-end infinite;
}

@keyframes typing {
    from { width: 0; }
    to { width: 100%; }
}

@keyframes blink-caret {
    from, to { border-color: transparent; }
    50% { border-color: white; }
}

/* About Section Styles */
.about-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    padding: 0 20px;
    animation: fadeIn 2s ease;
}

.about-item {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 48%;
}

.about-item h2 {
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: bold;
    text-align: center;
    background: -webkit-linear-gradient(135deg, #00c6ff, #7f00ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: slideIn 1.5s ease;
}

.about-item p {
    font-size: 18px;
    color: black;
    text-align: center;
    margin-bottom: 15px;
}

/* Features Section */
#features {
    padding: 50px 20px;
    animation: fadeIn 2s ease;
}

.feature {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 20px;
    margin-bottom: 20px;
    animation: slideIn 2s ease;
}

.feature-image img {
    width: 100%;
    max-width: 300px;
    border-radius: 10px;
    margin-bottom: 20px;
}

.feature-content, .feature-content-voice {
    flex: 1;
    max-width: 600px;
    padding: 20px;
}

.feature-content h2, .feature-content-voice h2 {
    font-size: 40px;
    font-weight: bold;
    background: -webkit-linear-gradient(#c2e9fb, #000000);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 10px;
}

.feature-content p, .feature-content-voice p {
    font-size: 24px;
    padding: 10px;
    color: #fff;
}

/* Form styles */
.form {
    max-width: 400px;
    margin: 0 auto;
    margin-bottom: 20px;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    animation: fadeIn 2s ease;
}

.form h2 {
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: bold;
    text-align: center;
    background: -webkit-linear-gradient(135deg, #00c6ff, #7f00ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.form p {
    font-size: 18px;
    color: black;
    text-align: center;
    margin-bottom: 15px;
}

.form input[type="text"],
.form input[type="email"],
.form input[type="password"],
.form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.form button {
    width: 100%;
    background: linear-gradient(to right, #00c6ff, #0072ff);
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
    font-size: 20px;
    font-weight: bold;
}

.form button:hover {
    background: linear-gradient(to right, #0072ff, #00c6ff);
}

/* Footer styles */
.footer {
    text-align: center;
    background-color: #0072ff;
    color: #fff;
    padding: 10px 0;
    font-size: 18px;
    animation: fadeIn 2s ease;
}

/* Add keyframes for animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideIn {
    from { transform: translateX(-100%); }
    to { transform: translateX(0); }
}

@media (max-width: 768px) {
    .about-container {
        flex-direction: column;
    }
    .about-item {
        width: 100%;
        margin-bottom: 20px;
    }
    .feature {
        flex-direction: column;
        align-items: flex-start;
    }
    .feature-image img {
        margin-bottom: 20px;
    }
    .feature-content,
    .feature-content-voice {
        margin: 0;
    }
}

@media (max-width: 480px) {
    .navbar {
        padding: 10px 20px;
        font-size: 18px;
    }
    .menu ul li {
        margin-left: 20px;
    }
    .section-title h1 {
        font-size: 32px;
    }
    .section-title p {
        font-size: 18px;
    }
    .about-item h2,
    .feature-content h2,
    .feature-content-voice h2,
    .form h2 {
        font-size: 20px;
    }
    .about-item p,
    .feature-content p,
    .feature-content-voice p,
    .form p {
        font-size: 16px;
    }
    .form input[type="text"],
    .form input[type="email"],
    .form input[type="password"],
    .form textarea {
        padding: 8px;
    }
    .form button {
        font-size: 18px;
    }
}       
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="freetrial.php"><span style="color: white;">Free Trial</span></a>
                <a href="#plans"><span style="color: white;">Plans</span></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="main">
        <section class="section section-title" id = "home">
            <h1>PremTranslate: Bridging Language Gaps with Precision and Innovation</h1>
            <p id="typing-text">"Where words fail, our translations prevail."</p>
        </section>

        <section class="section section-title" id = "plans">
            <div class = "container">
                <form action = "signup.php">
                    <?php
                        include_once 'Class/user.php';
                        $u = new User();
                        $data = $u->displayplan();
                    ?>
                    <div class = "row mt-3">
                        <?php
                            while($row = $data->fetch_assoc()){
                                echo'
                                <div class="col-md-4">
                                    <div class="card shadow-sm mb-4">
                                        <div class="card-header text-white bg-info">
                                            <h2 class="card-title">'.$row['PlanName'].'</h2>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text text-dark">'.$row['Description'].'</p>
                                            <p class="card-text text-dark">'.$row['Duration'].'</p>
                                            <p class="card-text text-dark">$'.$row['Price'].'</p>
                                        </div>
                                        <div class="card-footer text-center bg-light">
                                            <button type="submit" class="btn btn-info">Continue to Sign-Up</button>
                                        </div>
                                    </div>
                                </div>

                                ';
                            }
                        ?>
                    </div>
                </form>
            </div>
        </section>

        <section class="section">
            <div class="form">
            <h2>Login</h2>
				<form method="POST" action="">
					<input type="text" name="un" placeholder="Email" required>
					<input type="password" name="pw" placeholder="Password" required>
					<button type="submit" name="btnlogin">Login</button>
				</form>
            </div>
        </section>

        <section class="section" id = "about">
            <div class="about-container">
                <div class="about-item">
                    <h2>Who We Are</h2>
                    <p>PremTranslate is a leading provider of language translation services, leveraging cutting-edge technology to deliver accurate and reliable translations.</p>
                </div>
                <div class="about-item">
                    <h2>Our Mission</h2>
                    <p>We aim to break down language barriers and connect people and businesses around the world through high-quality translation services.</p>
                </div>
            </div>
        </section>

        <section id="features" class="section">
            <div class="feature">
                <div class="feature-image">
                    <img src="images/text.png" alt="Translation Services">
                </div>
                <div class="feature-content">
                    <h2>Text Translation</h2>
                    <p>Our text translation services cover a wide range of languages, ensuring your message is accurately conveyed in the target language.</p>
                </div>
            </div>
            <div class="feature">
                <div class="feature-content-voice">
                    <h2>Voice Translation</h2>
                    <p>With our advanced voice translation services, you can communicate seamlessly across languages, no matter where you are.</p>
                </div>
                <div class="feature-image">
                    <img src="images/voice.png" alt="Voice Translation Services">
                </div>
            </div>
        </section>

        <section class="section" id = "contact">
            <div class="form">
                <h2>Contact Us!</h2>
                <form action="" method="POST">
                <?php
                        include 'generateconid.php';
                        $conID = generateCONTACTID();
                    ?>
                    <input type="text" name="conid" value="<?php echo $conID; ?>" hidden>
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email1" placeholder="Your Email" required>
                    <textarea name="message" placeholder="Your Message" rows="4" required></textarea>
                    <button type="submit" name="btncontact">Send Message</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2024 PremTranslate. All rights reserved.</p>
    </footer>
</body>
</html>
<?php

        include_once 'Class/user.php';

        $u = new User();

        // Handle contact form submission
        if (isset($_POST['btncontact'])) {
            $conid = $_POST['conid'];
            $name = $_POST['name'];
            $email1 = $_POST['email1'];
            $message = $_POST['message'];
            $result = $u->AddContacts($conid,$name, $email1, $message);
            echo '<script>alert("'.$result.'");</script>';
        }

        // Handle login form submission
        if (isset($_POST['btnlogin'])) {
            $un = $_POST['un'];
            $pw = $_POST['pw'];
            $data = $u->Login($un, $pw);

            if ($row = $data->fetch_assoc()) {
                $_SESSION['role'] = $row['Role'];
                $_SESSION['id'] = $row['UserId'];
                $_SESSION['status'] = $row['Status'];
                if ($row['Role'] == 'Admin') {
                    echo '
                        <script>
                            window.open("usermanagement.php","_self");
                        </script>';
                } else if ($row['Role'] == 'Tourist') {
                    echo '
                        <script>
                            window.location.href = "userprofile.php";
                        </script>';
                } else if ($row['Role'] == 'Employee') {
                    if ($row['Status'] == 'Active') {
                        echo '<script>
                                window.location.href = "profile.php";
                            </script>';
                    } else {
                        echo '<script>
                                alert("You are unauthorized to access this account!");
                            </script>';
                    }
                }
            } else {
                echo '<script>
                        alert("Incorrect Username or Password!");
                    </script>';
            }
        }
        ?>
