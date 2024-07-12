<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PremTranslate:Language Translator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', sans-serif;
    background-color: #f5f5f5; /* Changed background color for better readability */
}

/* Navigation Styles */
.navbar {
    position: fixed; /* Make the navbar fixed */
    top: 0; /* Position it at the top of the page */
    width: 100%; /* Make it full width */
    z-index: 1000; /* Set a high z-index to ensure it stays above other content */
    background-color: #333;
    overflow: hidden;
    padding: 10px 20px;
}

.logo {
    color: #ff7200;
    font-size: 35px;
    font-family: Arial;
    float: left;
    margin-top: 10px;
}

.menu-btn {
    background: none;
    border: none;
    font-size: 24px;
    color: white;
    cursor: pointer;
    float: right;
    margin-top: 10px;
}

.menu {
    float: right;
    margin-top: 10px;
}

.menu.active {
    display: block;
}

ul {
    list-style-type: none;
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
    background-color: #555;
}

.content {
    width: 90%;
    max-width: 1200px;
    margin: auto;
    color: #fff;
    position: relative;
    padding: 0 20px;
}

.content h1 {
    font-family: 'Times New Roman';
    font-size: 6vw;
    padding-left: 20px;
    margin-top: 9%;
    letter-spacing: 2px;
    color: black;
}

.content .par {
    padding-left: 20px;
    padding-bottom: 25px;
    font-family: Arial;
    letter-spacing: 1.2px;
    line-height: 30px;
    color: black;
    font-size:18px;
}

.content span {
    color: #ff7200;
    font-size: 6vw;
}

/* Form Styles */
.form {
    width: 60%;
    max-width: 400px; /* Increase maximum width for larger screens */
    height: auto;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 50%, rgba(0, 0, 0, 0.8) 50%);
    position: relative; /* Change to relative */
    top: 30px; /* Adjusted top position */
    margin: auto; /* Center horizontally */
    border-radius: 10px;
    padding: 25px;
    text-align: center;
    z-index: 1; /* Ensure form is on top of other elements */
}

.form h2 {
    width: 220px;
    font-family: sans-serif;
    text-align: center;
    color: #ff7200;
    font-size: 22px;
    background-color: #fff;
    border-radius: 10px;
    margin: auto;
    padding: 8px;
}

.form input {
    width: 100%;
    height: 35px;
    background: transparent;
    border-bottom: 1px solid #ff7200;
    border-top: none;
    border-right: none;
    border-left: none;
    color: #fff;
    font-size: 15px;
    letter-spacing: 1px;
    margin-top: 20px;
    font-family: sans-serif;
}

.form input:focus {
    outline: none;
}

::placeholder {
    color: #fff;
    font-family: Arial;
}

.submit {
    width: 100%;
    height: 40px;
    background: #ff7200;
    border: none;
    margin-top: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color: #fff;
    transition: 0.4s ease;
}

.submit:hover {
    background: #fff;
    color: #ff7200;
}

.submit a {
    text-decoration: none;
    color: #000;
    font-weight: bold;
}

.form .link {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 17px;
    padding-top: 20px;
    text-align: center;
}

.form .link a {
    text-decoration: none;
    color: #ff7200;
}

/* Alert Styles */
.alert {
    width: 100%;
    border-radius: 5px;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    display: none;
    margin-top: 20px;
}

.alert.success,
.alert.error {
    display: block;
}

/* Responsive Styles */
@media screen and (max-width: 830px) {
    .content {
        padding-bottom: 150px; /* Added */
    }

     .form {
        width: 90%;
        max-width: 300px;
        top: 30%; /* Adjusted position for smaller screens */
    }

    .form input {
        width: 100%;
        height: 35px;
        font-size: 15px;
        margin-top: 20px;
    }

    .form h2 {
        margin: 10px 0; /* Adjusted */
    }

    .menu-btn {
        display: block; /* Show the button when screen is minimized */
    }

    .menu {
        display: none; /* Hide the menu when screen is minimized */
    }

    .navbar {
        padding: 10px; /* Adjust padding for better spacing */
    }
}

@media screen and (min-width: 831px) {
    .menu-btn {
        display: none; /* Hide the button when screen is maximized */
    }

    .menu {
        display: block; /* Show the menu when screen is maximized */
    }
}

@media screen and (max-width: 600px) {
    .menu {
        display: none;
        float: none;
        margin-top: 50px;
        margin-right: 10px;
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

    .form {
        width: 90%;
        max-width: 250px; /* Adjust maximum width for smaller screens */
        top: 50%; /* Adjusted position for smaller screens */
    }

    .form h2 {
        width: 100%; /* Adjusted */
        max-width: none; /* Adjusted */
        height: 40px; /* Adjusted */
        padding: 0; /* Adjusted */
        text-align: center; /* Center the h2 */
        margin: 10px 0; /* Adjusted */
        line-height: 40px; /* Center the text vertically */
              }

    .form input {
        width: calc(100% - 40px); /* Adjust input width to fit smaller screens */
    }
}

/* About Section */
.about {
    margin-top: 50px;
    padding:80px;
}

.card-title button {
  margin-top:20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 8px 16px;
  cursor: pointer;
  border-radius: 4px;
}

.container-about {
    display: flex;
    flex-wrap: wrap; /* Allow cards to wrap on smaller screens */
    justify-content: center;
    gap: 20px; /* Add gap between cards */
}

.card-about {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: calc(33% - 20px); /* Adjust width for three cards */
    padding: 20px;
    margin-bottom: 20px; /* Add margin bottom */
    transition: transform 0.3s ease; /* Add transition for animation */
    position: relative;
    overflow: hidden;
    border-radius: 10px;
}

.card-about:hover {
    transform: translateY(-10px); /* Add animation on hover */
}

.card-about h1,
.card-about p {
    color: black; /* Change text color to black */
    margin-top:20px;
}

.card-about ul {
    margin-top: 10px;
    padding-left: 20px;
}

.card-about ul li {
    list-style-type: disc;
    margin-bottom: 10px;
}

.card-image {
    width: 30%;
    height: auto;
    margin-left:35%;
    border-radius: 10px 10px 0 0; /* Rounded corners only at the top */
    transition: transform 0.3s ease; /* Add transition for animation */
}

.card-about:hover .card-image {
    transform: scale(1.1); /* Zoom in the image on hover */
}

.card-title-about {
    text-align: center; /* Center the text */
    margin-bottom: 50px; /* Add some bottom margin for spacing */
}

.card-title-about h1 {
    font-size: 50px; /* Increase font size */
    color: #ff7200; /* Set color to match the theme */
}

@media screen and (max-width: 830px) {
    .card-about {
        width: calc(50% - 20px); /* Adjust width for two cards on smaller screens */
    }

    .card-title-about h1 {
        font-size: 50px; /* Adjust font size for smaller screens */
    }
}

@media screen and (max-width: 600px) {
    .card-about {
        width: calc(100% - 20px); /* Adjust width for one card on even smaller screens */
        margin-top: 10px;
    }

    .card-title-about h1 {
        font-size: 50px; /* Adjust font size for smaller screens */
    }
}

/*FEATURES STYLE*/
.card-titlefeatures button {
  margin-top:20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 8px 16px;
  cursor: pointer;
  border-radius: 4px;
}

.features {
    margin-top: 30px;
    padding: 80px;
}

.container-features {
    display: flex;
    flex-wrap: wrap; /* Allow cards to wrap on smaller screens */
    justify-content: center;
    gap: 20px; /* Add gap between cards */
}

.card-features {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: calc(33% - 20px); /* Adjust width for three cards */
    padding: 20px;
    margin-bottom: 20px; /* Add margin bottom */
    transition: transform 0.3s ease; /* Add transition for animation */
    position: relative;
    overflow: hidden;
    border-radius: 10px;
}

.card-features:hover {
    transform: translateY(-10px); /* Add animation on hover */
}

.card-features h1,
.card-features p {
    color: black; /* Change text color to black */
    margin-top:20px;
}

.card-image {
    width: 30%;
    margin-bottom: 20px;
    height: auto;
    margin-left:35%;
    border-radius: 10px 10px 0 0; /* Rounded corners only at the top */
    transition: transform 0.3s ease; /* Add transition for animation */
}

.card-features:hover .card-image {
    transform: scale(1.1); /* Zoom in the image on hover */
}

.card-title-features {
    text-align: center; /* Center the text */
    margin-bottom: 50px; /* Add some bottom margin for spacing */
}

.card-title-features h1 {
    font-size: 50px; /* Increase font size */
    color: #ff7200; /* Set color to match the theme */
}

@media screen and (max-width: 830px) {
    .card-features {
        width: calc(50% - 20px); /* Adjust width for two cards on smaller screens */
    }

    .card-title-features h1 {
        font-size: 50px; /* Adjust font size for smaller screens */
    }
}

@media screen and (max-width: 600px) {
    .card-features {
        width: calc(100% - 20px); /* Adjust width for one card on even smaller screens */
        margin-top: 10px;
    }

    .card-title-features h1 {
        font-size: 50px; /* Adjust font size for smaller screens */
    }
}

/*CONTACT STYLES*/
.contact {
    background-color: #f5f5f5;
    padding: 80px;
}

.contact .content-contact {
    width: 90%;
    max-width: 1200px;
    margin: auto;
}

.card-contact {
    width: 60%; /* Adjust width for better visibility */
    max-width: 500px; /* Set maximum width */
    margin: auto; /* Center horizontally */
    margin-top: 30px; /* Add margin top for spacing */
}

.card-title-contact {
    text-align: center; /* Center the text */
    margin-bottom: 50px; /* Add some bottom margin for spacing */
}

.card-title-contact h1 {
    font-size: 50px; /* Increase font size */
    color: #ff7200; /* Set color to match the theme */
}

.contact .form-group {
    width: 60%;
    max-width: 500px;
    margin: auto;
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.contact .form-group label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

.contact .form-group input,
.contact .form-group textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.contact .form-group textarea {
    height: 100px;
}

.contact .form-group .submitcontact {
    width: 100%;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
}

.contact .form-group .submitcontact:hover {
    background-color: #0056b3;
}

.contact .alert {
    width: 100%;
    padding: 10px 20px;
    border-radius: 5px;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    display: none;
}

@media screen and (max-width: 830px) {
    .card-contact {
        width: 100%; /* Adjust width for two cards on smaller screens */
        margin-top: 10px;
    }

    .card-title-contact h1 {
        font-size: 50px; /* Adjust font size for smaller screens */
    }
}

@media screen and (max-width: 600px) {
    .card-contact {
        width: 100%; /* Adjust width for one card on even smaller screens */
        margin-top: 10px;
    }

    .card-title-contact h1 {
        font-size: 50px; /* Adjust font size for smaller screens */
    }
}

/* Footer Styles */
footer {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
    font-size: 16px;
    min-height: 100px;
}

.footer-content {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.footer-line {
    border-top: 2px solid #fff;
    margin-top: 10px;
    margin-bottom: 10px;
    width: 100%;
}

.footer-info {
    margin-top: 10px;
}

.footer-info p {
    margin-bottom: 5px;
}

.footer-info a {
    color: #ff7200;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-info a:hover {
    color: #ff9000;
}

    </style>
</head>

<body class = "bg-light">
    <div class="main">
        <div class="navbar">
            <div class="logo">CBI</div>
            <button class="menu-btn">&#9776;</button>
            <div class="menu">
                <ul>
                    <li><a href="#home">HOME</a></li>
                    <li><a href="#about">ABOUT</a></li>
                    <li><a href="#features">FEATURES</a></li>
                    <li><a href="#contact">CONTACT US</a></li>
                    <li><a href="login.php">LOG-IN</a></li>
                </ul>
            </div>
        </div>

        <section class="home" id="home">
            <!-- First Content Section -->
            <div class="content">
              <div class="text-title">
                <h1>PremTranslate: <span>Language</span> <br>Translator</h1>
              </div>
                <p class="par">Say goodbye to language barriers and hello to a world of endless possibilities. Join our community of language enthusiasts and embark on a journey of discovery, connection, and growth. With our Language Translator System, the world is at your fingertips. Start exploring today!</p>
            </div>
            <form action="" method = "POST">
                <div class = "container p-4 bg-light">
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class = "col-md-6">
                                <select class = "form-control">
                                    <option>Filipino</option>
                                </select>
                            </div>
                            <textarea id="translate1" name="translate1" rows="4" cols="50" class = "form-control"></textarea>
                        </div>
                        <div class = "col-md-6">
                            <div class = "col-md-6">
                                <select class = "form-control">
                                    <option>Filipino</option>
                                </select>
                            </div>
                            <textarea id="translate2" name="translate2" rows="4" cols="50" class = "form-control"></textarea>
                        </div>
                    </div>
                    <p class = "par">Wants to explore more langauges to try? Click <a href="signup.php">here</a> to sign-up</p>
                </div>
            </form>
        </section>

        <section class="about" id="about">
            <!-- About Section -->
            <div class="card-title-about">
                <h1 class="title-about">About Us</h1>
            </div>
            <div class="container-about">
              <!-- First Card -->
              <div class="card-about">
                  <div class="content-about">
                      <div class="card-title">
                          <img src="images/logoo.png" alt="CBI Logo" class="card-image">
                          <h1>PremTranslate: <span>Language</span> Traslator</h1>
                          <p>The language translator system aims to address the growing need for seamless communication across languages in the globalised world. With the increasing diversity in language usage, businesses and individuals encounter barriers that hinder effective communication. This project seeks to develop language translator system that can accurately and efficiently translate text between multiple language, facilitating smooth and effective communication across linguistic borders</p>
                      </div>
                  </div>
              </div>
              <!-- Second Card -->
              <div class="card-about">
                  <div class="content-about">
                      <div class="card-title">
                          <h1>How It Works:</h1>
                          <ul>
                              <li> <span style="font-weight: bold;">Data Collection: </span> Gather data from various sources within the barangay, including residents, local government units, and stakeholders.</li><span id="about2-more" style="display:none;">
                              <li>Data Analysis: Analyze collected data to gain insights into barangay demographics, infrastructure, public services, and community feedback.</li>
                              <li>Data Sharing: Share analyzed data to provide a comprehensive picture of each barangay, fostering transparency and accountability.</li> </span>
                              <button onclick="toggleText('about2')">See more</button>
                          </ul>
                      </div>
                  </div>
              </div>

              <!-- Third Card -->
              <div class="card-about">
                  <div class="content-about">
                      <div class="card-title">
                          <h1>Company</h1>
                          <img src="images/logoo.png" alt="About 3" class="card-image">
                          <h1>Welcome to PremTech Industries</h1>
                          <p>Prem Tech Industries is a trailblazing creative technology company, sculpting imaginative and immersive experiences in the digital realm. <span id="about3-more" style="display:none;">Established in 2009, our dynamic team of visionaries and technologists have consistently pushed the boundaries of creativity and innovation, shaping a landscape where technology becomes a canvas for artistic expression and limitless possibilities.</span></p>
                          <button onclick="toggleText('about3')">See more</button>
                      </div>
                  </div>
              </div>
            </div>
        </section>

        <section class="features" id="features">
          <!-- Features Section -->
            <div class="card-title-features">
                <h1 class="title-features">Features</h1>
            </div>
            <div class="container-features">
              <!-- First Card -->
              <div class="card-features">
                  <div class="content-features">
                      <div class="card-titlefeatures">
                          <img src="tracking.png" alt="Feature 1" class="card-image">
                          <h3>Accurate Translation</h3>
                          <p>Accurate translation of fifty (50) languages available <span id="feature1-more" style="display:none;">PremTranslate offers accurate translation of fifty languages you can use. Using Premtranslate can avoid you to such mistakes like mistranslation that gives you stress. Accuracy is our top priority!</span></p>
                          <button onclick="toggleText('feature1')">See more</button>
                      </div>
                  </div>
              </div>
              <!-- Second Card -->
              <div class="card-features">
                  <div class="content-features">
                      <div class="card-titlefeatures">
                          <img src="calendar.png" alt="Feature 2" class="card-image">
                          <h3>Voice and Text Translation</h3>
                          <p>Tired of typing what to translate, try voice translate.<span id="feature2-more" style="display:none;"> PremTranslate not just offers text translation, but also voice translation. Saves time less stress!</span></p>
                          <button onclick="toggleText('feature2')">See more</button>
                      </div>
                  </div>
              </div>
              <!-- Third Card -->
              <div class="card-features">
                  <div class="content-features">
                      <div class="card-titlefeatures">
                          <img src="complaint.png" alt="Feature 3" class="card-image">
                          <h3>Special Feature</h3>
                          <p>Wants to learn a new skill? How about learn a new language?<span id="feature3-more" style="display:none;">PremTranslate offers you to learn language of your choice from our languages from scratch. Learn through modules that is accessible and easy to understand.</span></p>
                          <button onclick="toggleText('feature3')">See more</button>
                      </div>
                  </div>
              </div>
            </div>
        </section>

        <section class="contact" id="contact">
          <!-- First Content Section -->
            <div class="content-contact">
              <div class="card-title-contact">
                <h1 class="title-contact">Contact Us</h1>
              </div>
              <div class="card-contact">
                <form action="" id="ContactForm">
                  <div class="alert" style="display: none;"> Your Message Sent </div>
                    <div class="form-group">
                        <label class="name">Name:</label>
                        <input class="input" type="text" id="name" name="name" required>
                        <label class="email">Email:</label>
                        <input class="input" type="email" id="email1" name="email1" required>
                        <label class="message">Message:</label>
                        <textarea class="input" id="message" name="message" rows="4" required></textarea>
                        <button class="submitcontact" type="submit">Submit</button>
                    </div>
                </form>
              </div>
            </div>
        </section>

    </div>

    
</body>
<footer>
      <div class="footer-content">
          <h1>Contact Us</h1>
          <div class="footer-info">
              <p>Address: Kinalaglagan Mataasnakahoy, Batangas</p>
              <p>Email: <a href="mailto:reciokathrine@gmail.com">reciokathrine@gmail.com || pulgarmoncezar@gmail.com</a></p>
              <p>Mobile Number: <a href="tel:+639666930868">09666930868 || 09066234427</a></p>
          </div>
          <div class="footer-line"></div>
          <p>&copy; 2024 PremTranslate. All rights reserved.</p>
      </div>
  </footer>
</html>
