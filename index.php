<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PremTranslate: Language Translator </title>
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
		
		* Fix Free Trial button alignment */
		.freetrial {
			margin-left: auto; /* Pushes the Free Trial button to the right */
		}

        .freetrial a {
			margin-top:5px;
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
			align-items: center; /* Align items vertically */
		}

		.menu ul {
			display: flex;
			list-style: none;
			padding: 0;
			margin: 0;
			align-items: center; /* Align items vertically */
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
            width: 80%;
            display: flex;
            justify-content: space-between;
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
        }
        .feature-content {
            flex: 1;
            margin-left: 20px;
        }
        .feature-content h2 {
            font-size: 40px;
            font-weight: bold;
            background: -webkit-linear-gradient(#c2e9fb, #000000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }
        .feature-content p {
            font-size: 24px;
            padding: 10px;
            color: #fff;
        }
		.feature-content-voice {
            flex: 1;
            margin-right: 20px;
        }
        .feature-content-voice h2 {
            font-size: 40px;
            font-weight: bold;
            background: -webkit-linear-gradient(#c2e9fb, #000000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }
        .feature-content-voice p {
            font-size: 24px;
            padding: 10px;
            color: #fff;
			matgin-right:10px;
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
        }
        .form button:hover {
            background: linear-gradient(to right, #0072ff, #00c6ff);
        }
        /* Footer styles */
        footer {
            background: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: 50px;
            animation: fadeIn 2s ease;
        }
        .footer-links a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s;
        }
        .footer-links a:hover {
            color: #00c6ff;
        }
        .footer-line {
            height: 1px;
            background: #fff;
            margin: 20px 0;
        }
        /* Responsive styles */
        @media (max-width: 768px) {
            .menu {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px;
                left: 0;
                width: 100%;
                background-color: rgba(0, 0, 0, 0.8);
            }
            .menu.active {
                display: flex;
            }
            .menu ul li {
                margin: 10px 0;
                text-align: center;
            }
            .menu-btn {
                display: block;
            }
            .form {
                max-width: 100%;
            }
            .feature {
                flex-direction: column;
                text-align: center;
            }
            .feature-content {
                margin-left: 0;
                margin-top: 20px;
            }
			.feature-content-voice {
                margin-right: 0;
                margin-top: 20px;
            }
            .feature-image img {
                max-width: 100%;
            }
            .about-container {
                flex-direction: column;
                align-items: center;
            }
            .about-item {
                width: 100%;
            }
        }
        /* Keyframes for animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }
    </style>
</head>
<body>
    <div class="main">
        <!-- Navigation -->
        <div class="navbar">
            <div class="logo">PremTranslates</div>
            <div class="menu-btn"></div>
            <div class="menu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="freetrial"><a href="freetrial.php">Free Trial</a></li>
                </ul>
            </div>
        </div>

        <!-- Home Section -->
        <section id="home" class="section">
            <div class="section-title">
                <h1>PremTranslate: Language <br> Translator</h1>
                <p id="animatedText"></p>
            </div>
           <div class="form">
				<h2>Login</h2>
				<form method="POST" action="">
					<input type="text" name="un" placeholder="Email" required>
					<input type="password" name="pw" placeholder="Password" required>
					<button type="submit" name="btnlogin">Login</button>
				</form>
			</div>
        </section>

        <!-- About Section -->
        <section id="about" class="section">
            <div class="section-title">
                <h1>About Us</h1>
            </div>
            <div class="about-container">
                <div class="about-item">
                    <h2>Our Mission</h2>
                    <p>Our mission is to break down language barriers by providing instant and accurate translations.</p>
                </div>
                <div class="about-item">
                    <h2>PremTranslate: Language Translator</h2>
                    <p>The language translator system aims to address the growing need for seamless communication across languages in the globalized world. With the increasing diversity in language usage, businesses and individuals encounter barriers that hinder effective communication. This project seeks to develop language translator system that can accurately and efficiently translate text between multiple languages, facilitating smooth and effective communication across linguistic borders.</p>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="section">
            <div class="section-title">
                <h1>Features</h1>
            </div>
            <div class="feature">
                <div class="feature-content">
                    <h2>Accurate Translation</h2>
                    <p>Accurate translation of fifty (50) languages available. PremTranslate offers accurate translation of fifty languages you can use. Using Premtranslate can avoid you to such mistakes like mistranslation that gives you stress. Accuracy is our top priority!</p>
                </div>
                <div class="feature-image">
                    <img src="texttrans.png" alt="Accurate Translation Image">
                </div>
            </div>
            <div class="feature">
                <div class="feature-image">
                    <img src="voicetrans.png" alt="Voice and Text Translation Image">
                </div>
                <div class="feature-content-voice">
                    <h2>Voice and Text Translation</h2>
                    <p>Tired of typing what to translate, try voice translate. PremTranslate not just offers text translation, but also voice translation. Saves time, less stress!</p>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="section">
            <div class="section-title">
                <h1>Contact Us</h1>
            </div>
            <div class="form">
                <h2>Get in Touch</h2>
                <form method="POST">
                <?php
                        include 'generateconid.php';
                        $conID = generateCONTACTID();
                    ?>
                    <input type="text" name="conid" placeholder="Your Name" value="<?php echo $conID; ?>" readonly>
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email1" placeholder="Your Email" required>
                    <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                    <button type="submit" name="btncontact">Send Message</button>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="footer-links">
                <a href="#about">About Us</a> |
                <a href="#features">Features</a> |
                <a href="#contact">Contact</a>
            </div>
            <div class="footer-line"></div>
            <div class="footer-info">
                <p>© 2024 Language Translator. All rights reserved.</p>
                <p>Email: <a href="mailto:info@ltranslator.com">info@ltranslator.com</a></p>
            </div>
        </footer>
    </div>

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

    <!-- JavaScript for mobile menu toggle -->
	<script>
	// JavaScript for mobile menu toggle and form reset
		document.querySelector('.menu-btn').addEventListener('click', function() {
			document.querySelector('.menu').classList.toggle('active');
		});

		const text = "Say goodbye to language barriers and hello to a world of endless possibilities. <br> Join our community of language enthusiasts and embark <br> on a journey of discovery, connection, and growth. With our <br> Language Translator System, the world is at your fingertips. Start exploring today!";
		const speed = 50; // Typing speed in milliseconds

		let index = 0;
		let animatedText = document.getElementById("animatedText");

		function typeWriter() {
			if (index < text.length) {
				if (text[index] === '<') {
					let endIndex = text.indexOf('>', index) + 1;
					animatedText.innerHTML += text.substring(index, endIndex);
					index = endIndex;
				} else {
					animatedText.innerHTML += text.charAt(index);
					index++;
				}
				setTimeout(typeWriter, speed);
			}
		}

		// Start the typing animation
		typeWriter();
    </script>
	
</body>
</html>
