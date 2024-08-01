<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PremTranslate: Language Translator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            display: flex;
            justify-content: center; /* Horizontal centering */
            align-items: center; /* Vertical centering */
            height: 100vh; /* Full viewport height */
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
            margin-top: 50px;
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
            box-shadow: 0 4px 8px rgba(0.5, 0.5, 0.5, 0.5); /* Adds a subtle shadow */
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
        .inbox-container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .inbox-item {
            display: flex;
            padding: 15px;
            border-bottom: 1px solid #e6e6e6;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .inbox-item:hover {
            background-color: #f5f5f5;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .message-info {
            flex: 1;
        }

        .user-name {
            font-weight: bold;
            color: #333;
        }

        .message-preview {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }

        .timestamp {
            color: #999;
            font-size: 12px;
            margin-top: 8px;
            text-align: right;
        }
        .container {
        width: 100%;
        max-width: 450px; /* Adjust as needed */
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px; /* Add padding for content spacing */
    }
    .scrollable-list {
            width: 400px; /* Adjust width as needed */
            max-width: 400px; /* Adjust max-width as needed */
            height: 400px; /* Adjust height as needed */
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
        }

        .scrollable-list ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .scrollable-list li {
            padding: 5px 0;
        }

        /* Chatbox modal specific styles */
        .chatbox {
            height: 400px; /* Adjust as needed */
            overflow-y: auto;
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .chatbox .message {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #e1e1e1;
            border-radius: 8px;
        }

        .chatbox .message .user-name {
            font-weight: bold;
        }

        .chatbox .message .text {
            margin-top: 5px;
        }

        .chat-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Button to toggle the sidebar -->
    <button class="btn-toggle-sidebar" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-label="Toggle sidebar">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 id="sidebarLabel">PremTranslate</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a href="" class="d-block mb-3"><img src="images/logoo.png" height="50px" class="rounded-pill" alt="Logo"></a>
            <a href="admindashboard.php"><i class="fas fa-house"></i> Admin Dashboard</a><br>
            <a href="usermanagement.php"><i class="fas fa-house"></i> User Management</a><br>
            <a href="languages.php"><i class="fas fa-house"></i> Language Management</a>
            <a href="messages.php"><i class="fas fa-house"></i> Messages</a>
            <div class="dropdown mt-2">
                <a class="dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-circle-info"></i> Plan
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-dark" href="plan.php">Add Plans</a></li>
                    <li><a class="dropdown-item text-dark" href="updateplan.php">Plan Management</a></li>
                </ul>
            </div>
            <div class="dropdown mt-2">
                <a class="dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-circle-info"></i> Payment
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-dark" href="reports.php">Billing</a></li>
                </ul>
            </div>
            <a href="language-reports.php"><i class="fas fa-house"></i> Reports</a>
            <div class="mt-2">
                <a href=""><i class="fas fa-lock"></i> Change Password</a><br>
                <a href="index.php"><i class="fas fa-lock"></i> Log-Out</a>
            </div>
        </div>
    </div>
    
    <form method="POST">
        <h1>Prem Messages</h1>
        <div class="scrollable-list p-4">
            <input type="search" name="searchmess" id="searchmess" class="form-control rounded-pill" placeholder="Search Message">
            <h5>Chats</h5>
            <ul>
                <?php
                    include_once 'Class/user.php';
                    $u = new User();
                    $data = $u->message();
                    
                    if ($data && $data->num_rows > 0) {
                        // If there are messages, display them
                        while ($row = $data->fetch_assoc()) {
                            echo '
                                <li>
                                    <div class="inbox-item">
                                        <div class="message-info" data-bs-toggle="modal" data-bs-target="#ChatModal" onclick="displayChat(&quot;' . htmlspecialchars($row['Name']) . '&quot;, &quot;' . htmlspecialchars($row['Message']) . '&quot;)">
                                            <div class="user-name">'.$row['Name'].'</div>
                                            <div class="message-preview">'.$row['Message'].'</div>
                                        </div>
                                    </div>
                                </li>
                            ';
                        }
                    } else {
                        // If there are no messages, display the "No messages found" message
                        echo '
                            <div class="inbox-item">
                                <div class="message-info">
                                    <div class="message-preview">No messages found.</div>
                                </div>
                            </div>
                        ';
                    }
                ?>
            </ul>
        </div>

        <!-- Modal for Chatbox -->
        <div class="modal fade" id="ChatModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ChatModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ChatModalLabel">Chat with <span id="chatUserName"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="chatbox" id="chatbox"></div>
                        <input type="text" class="chat-input" id="chatInput" placeholder="Type a message..." onkeydown="if(event.key === 'Enter') sendMessage()">
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <script>
        function displayChat(name, message) {
            document.getElementById('chatUserName').textContent = name;
            var chatbox = document.getElementById('chatbox');
            chatbox.innerHTML = ''; // Clear previous messages
            var messageHtml = '<div class="message"><div class="user-name">' + name + '</div><div class="text">' + message + '</div></div>';
            chatbox.innerHTML += messageHtml;
        }

        function sendMessage() {
            var chatInput = document.getElementById('chatInput');
            var message = chatInput.value.trim();
            if (message) {
                var chatbox = document.getElementById('chatbox');
                var messageHtml = '<div class="message"><div class="user-name">You</div><div class="text">' + message + '</div></div>';
                chatbox.innerHTML += messageHtml;
                chatInput.value = ''; // Clear the input field
                chatbox.scrollTop = chatbox.scrollHeight; // Scroll to the bottom
            }
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
