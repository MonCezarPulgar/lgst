<?php
include_once 'Class/user.php';

$u = new User();

if (isset($_POST['btnAddLanguage'])) {
    $language = $_POST['language'];
    $country = $_POST['country'];
    echo '
        <script>
            alert("'.$u->addlanguage($language, $country).'");
        </script>
    ';
}

// Handle language update form submission
if (isset($_POST['btnUpdateLanguage'])) {
    $lid = $_POST['update_language_id'];
    $language = $_POST['update_language'];
    $country = $_POST['update_country'];
    $result = $u->updatelanguage($lid, $language, $country);
    echo '
        <script>
            alert("'.$result.'");
        </script>
    ';
}

if (isset($_POST['btnDeleteLanguage'])) {
    $lid = $_POST['delete_language_id'];
    $result = $u->deletelanguage($lid);
    echo '
        <script>
            alert("'.$result.'");
        </script>
    ';
}
$languages = $u->getLanguages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Language Management</title>
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
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        .navbar .logo {
            font-size: 26px;
            font-weight: bold;
        }
        .main-content {
            margin-top: 100px;
            padding: 20px;
            max-width: 800px;
            margin: 80px auto 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h1, h2 {
            color: #0072ff;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        form input, form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        form input {
            background: #f9f9f9;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        form button {
            background-color: #0072ff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form button:hover {
            background-color: #005bb5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #0072ff;
            color: white;
        }
		
		.button {
			color: white;
			border: none;
			padding: 5px 10px;
			cursor: pointer;
			border-radius: 4px;
			transition: background-color 0.3s ease;
			margin-top: 5px;
			font-size: 16px; /* Ensure consistent font size */
			display: inline-block; /* Ensure consistent width */
		}

		.update-btn {
			background-color: #0072ff;
		}

		.update-btn:hover {
			background-color: #005bb5;
		}

		.delete-btn {
			background-color: #e74c3c;
		}

		.delete-btn:hover {
			background-color: #c0392b;
		}

		/* Ensure buttons are the same size and alignment */
		form button {
			width: auto; /* Ensure buttons do not stretch */
		}
        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
		.actions{
			padding: 5px 10px;
		}
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">Admin Panel</div>
    </div>
    
    <div class="main-content">
        <h1>Add New Language</h1>
        <form method="POST" action="">
            <label for="language">Language:</label>
            <input type="text" id="language" name="language" required>
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" required>
            <button type="submit" name="btnAddLanguage">Add Language</button>
        </form>
	</div>
	<div class="main-content">
        <h2>Languages List</h2>
        <table>
            <thead>
                <tr>
                    <th>Language ID</th>
                    <th>Language</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($languages as $language): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($language['Language_ID']); ?></td>
                        <td><?php echo htmlspecialchars($language['Language']); ?></td>
                        <td><?php echo htmlspecialchars($language['Country']); ?></td>
                        <td class="actions">
                            <!-- Update Button -->
							<button class="button update-btn" onclick="openUpdateModal('<?php echo htmlspecialchars($language['Language_ID']); ?>', '<?php echo htmlspecialchars($language['Language']); ?>', '<?php echo htmlspecialchars($language['Country']); ?>')">Update</button>

							<!-- Delete Button -->
							<form method="POST" style="display:inline;">
								<input type="hidden" name="delete_language_id" value="<?php echo htmlspecialchars($language['Language_ID']); ?>">
								<button type="submit" name="btnDeleteLanguage" class="button delete-btn">Delete</button>
							</form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div id="updateModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeUpdateModal()">&times;</span>
            <h2>Update Language</h2>
            <form method="POST" action="">
                <input type="hidden" id="update_language_id" name="update_language_id">
                <label for="update_language">Language:</label>
                <input type="text" id="update_language" name="update_language" required>
                <label for="update_country">Country:</label>
                <input type="text" id="update_country" name="update_country" required>
                <button type="submit" name="btnUpdateLanguage">Update Language</button>
            </form>
        </div>
    </div>

    <script>
        function openUpdateModal(id, language, country) {
            document.getElementById('update_language_id').value = id;
            document.getElementById('update_language').value = language;
            document.getElementById('update_country').value = country;
            document.getElementById('updateModal').style.display = 'block';
        }

        function closeUpdateModal() {
            document.getElementById('updateModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('updateModal')) {
                closeUpdateModal();
            }
        }
    </script>
</body>
</html>
