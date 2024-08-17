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

    <?php
    include_once 'sidebar.php';
    ?>
    
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
