<?php
    session_start();
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
                            window.open("admindashboard.php","_self");
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PremTranslate: Language Translator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css
" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js
" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css
">
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
.logofreetrial, .logoplan {
    font-size: 18px;
    font-weight: bold;
    margin-right: 20px;
    padding: 10px 20px;
    border-radius: 50px;
    color: #fff;
    text-decoration: none;
    transition: background 0.3s;
}

.logofreetrial {
    background-color: #00c6ff;
}

.logoplan {
    background-color: #0072ff;
}

.logofreetrial:hover {
    background-color: #0072ff;
}

.logoplan:hover {
    background-color: #00c6ff;
}

/* Navigation styles */
.navbar {
    display: flex;
    position: fixed;
    top: 0;
    width: 100%;
    background-color: white;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    font-family: 'Roboto', sans-serif;
    z-index: 1000;
    animation: fadeIn 2s ease;
    flex-wrap: wrap;
}
.menu {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 10px;
}

.menu ul {
    flex-wrap: wrap;
    justify-content: center;
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu ul li {
    margin: 0 15px;
}

.menu ul li a {
    text-decoration: none;
    color: linear-gradient(135deg, #00c6ff, #0072ff);
    font-weight: bold;
    font-size: 24px;
    padding: 10px 20px; /* Add padding here */
    border-radius: 50px;
    transition: background 0.3s, color 0.3s; /* Transition background and color */
}

.menu ul li a:hover {
    color: #00c6ff;
    background: linear-gradient(135deg, #c2e9fb, #ffffff);
}

.navbar-toggle {
    display: none;
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
}

/* Main sections */
   .main {
		width: 100%;
		max-width: 1200px;
		margin: 0 auto;
		padding: 20px;
	}

    .section {
		padding: 10px 0;
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

/* Container for home content and login form */
.home-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    padding: 0 20px;
    animation: fadeIn 2s ease;
	margin-top:80px;
}

/* Content styling */
.home-content {
    flex: 2;
    padding-right: 20px;
    max-width: 60%;
	margin-bottom: 0;
}

/* Form styling */
.form {
    flex: 1;
    max-width: 35%;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    animation: fadeIn 2s ease;
}

.form h2 {
    font-size: 24px;
    color: blue;
    margin-bottom: 20px;
    font-weight: bold;
    text-align: center;
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
    font-size: 18px;
}

.form button:hover {
    background: linear-gradient(to right, #0072ff, #00c6ff);
}

/* Typography and animations */
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

/* Animation styles */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideIn {
    from { transform: translateX(-50px); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

/* About Section Styles */
.about-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    padding: 0 20px;
    animation: fadeIn 2s ease;
	margin-bottom: 100px;
}

.about-title {
    text-align: center;
    margin-top: 80px;
    margin-bottom: 30px;
    font-size: 80px;
    font-weight: bold;
    background: linear-gradient(135deg, #ffffff, #aeeeee);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
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

.feature-title {
    text-align: center;
    margin-top: 40px;
    margin-bottom: 0;
    font-size: 80px;
    font-weight: bold;
    background: linear-gradient(135deg, #ffffff, #aeeeee);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
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
    background: linear-gradient(135deg, #ffffff, #aeeeee);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 10px;
}

.feature-content p, .feature-content-voice p {
    font-size: 20px;
    padding: 20px;
    color: #000;
}

/*Contact Styles*/
.contact-title {
    text-align: center;
    margin-top: 100px;
    margin-bottom: 30px;
    font-size: 80px;
    font-weight: bold;
    background: linear-gradient(135deg, #ffffff, #aeeeee);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

contact-text{
	font-size: 24px;
    margin-bottom: 20px;
    font-weight: bold;
    text-align: center;
    background: -webkit-linear-gradient(135deg, #00c6ff, #7f00ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: slideIn 1.5s ease;
}

/* Mobile styles */
@media (max-width: 767px) {
    /* Make the navbar stack vertically */
     .navbar {
        flex-direction: column;
        align-items: flex-start;
    }
    .menu {
        display: none; /* Hide menu by default */
        flex-direction: column;
        width: 100%;
    }
    .menu.active {
        display: flex; /* Show menu when active */
    }
    .navbar-toggle {
        display: block; /* Show toggle button on smaller screens */
    }
    .menu ul {
        flex-direction: column;
    }
    .menu ul li {
        margin: 10px 0;
    }
    .buttons {
        margin-top: 10px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    /* Adjust home container */
    .home-container {
        flex-direction: column;
        align-items: center;
    }
    .home-content {
        max-width: 100%;
        padding-right: 0;
    }
    .form {
        max-width: 100%;
    }
    /* About section */
    .about-container {
        flex-direction: column;
    }
    .about-item {
        width: 100%;
        margin-bottom: 20px;
    }
    /* Features section */
    .feature {
        flex-direction: column;
        align-items: center;
    }
    .feature-content,
    .feature-content-voice {
        max-width: 100%;
        text-align: center;
    }
    .feature-image img {
        max-width: 80%;
        margin-bottom: 20px;
    }
    /* Contact form */
    .form {
        width: 100%;
        padding: 10px;
    }
    /* Reduce font sizes for smaller screens */
    .section-title h1,
    .about-title,
    .feature-title,
    .contact-title {
        font-size: 50px;
    }
    .section-title p,
    .about-item h2,
    .about-item p,
    .feature-content h2,
    .feature-content p {
        font-size: 16px;
    }
}

/* Tablet styles */
@media (min-width: 768px) and (max-width: 991px) {
    /* Adjust home container */
    .home-container {
        flex-direction: column;
        align-items: center;
    }
    .home-content {
        max-width: 100%;
        padding-right: 0;
    }
    .form {
        max-width: 100%;
    }
    /* About section */
    .about-container {
        flex-direction: column;
    }
    .about-item {
        width: 100%;
        margin-bottom: 20px;
    }
    /* Features section */
    .feature {
        flex-direction: column;
        align-items: center;
    }
    .feature-content,
    .feature-content-voice {
        max-width: 100%;
        text-align: center;
    }
    .feature-image img {
        max-width: 80%;
        margin-bottom: 20px;
    }
    /* Contact form */
    .form {
        width: 100%;
        padding: 10px;
    }
    /* Adjust font sizes for medium screens */
    .section-title h1,
    .about-title,
    .feature-title,
    .contact-title {
        font-size: 70px;
    }
    .section-title p,
    .about-item h2,
    .about-item p,
    .feature-content h2,
    .feature-content p {
        font-size: 18px;
    }
}

    </style>
</head>
<body>
    <header>  
		<nav class="navbar">
			<button class="navbar-toggle" aria-label="Toggle navigation">
				☰
			</button>
			<div class="menu">
				<ul>
					<li><a href="#home">Homesss</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#features">Features</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</div>
			<div class="buttons">
				<a href="freetrial.php" class="logofreetrial">Free Trial</a>
				<a href="#plans" class="logoplan">Plans</a>
			</div>
		</nav>
    </header>

    <main class="main">
        <section id="home" class="section">
			<div id="home-container" class="home-container">
				<div id="home-content" class="home-content">
					<h1>PremTranslate: Bridging Language <br> Gaps with Precision and Innovation</h1>
					<p id="typing-text">Experience seamless and accurate translations in real-time.</p>
				</div>
				<div id="home-login" class="form">
					<h2>Login</h2>
					<form action="" method="post">
						<p>
							<input type="text" id="un" name="un" placeholder="Username or email" required>
						</p>
						<p>
							<input type="password" id="pw" name="pw" placeholder="Password" required>
						</p>
						<p>
                        <button type="submit" name="btnlogin">Login</button>
						</p>
					</form>
				</div>
			</div>
		</section>

        <section class="section section-title" id = "plans">
			<h2> Choose Your Perfect Plan <h2>
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

        <section class="section" id = "about">
		    <h1 class="about-title"> About</h1>
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
				<h1 class="feature-title"> Features</h1>
				<div class="feature">
					<div class="feature-image">
						<img src="images/text.png" alt="Translation Services">
					</div>
					<div class="feature-content">
						<h2>Text Translation</h2>
						<div class="card ms-5 mt-4"  style="border-radius:20px">
							<p>Our text translation services cover a wide range of languages, ensuring your message is accurately conveyed in the target language.</p>
						</div>
					</div>
				</div>
				<div class="feature">
					<div class="feature-content-voice">
						<h2>Voice Translation</h2>
						<div class="card mx-5 mt-4" style="border-radius:20px;">
							<p>With our advanced voice translation services, you can communicate seamlessly across languages, no matter where you are.</p>
						</div>
					</div>
					<div class="feature-image">
						<img src="images/voice.png" alt="Voice Translation Services">
					</div>
				</div>
        </section>

        <section class="section" id = "contact">
            <h1 class="contact-title">Contact Us!</h1>
            <div class="form" style="margin:auto; color:black; padding:20px; width:100%;">
				<h2 class="contact-text"> Contact Us Here</h2>
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
		
	<script>
		document.querySelector('.navbar-toggle').addEventListener('click', function() {
			const menu = document.querySelector('.menu');
			menu.classList.toggle('active');
		});
	</script>

