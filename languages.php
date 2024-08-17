<?php
include_once 'Class/user.php';

$u = new User();

if (isset($_POST['btnAddLanguage'])) {
    $language = $_POST['language'];
    $country = $_POST['country'];
    $language_code = $_POST['language_code'];
    echo '
        <script>
            alert("'.$u->addlanguage($language, $country, $language_code).'");
        </script>
    ';
}

// Handle language update form submission
if (isset($_POST['btnUpdateLanguage'])) {
    $lid = $_POST['update_language_id'];
    $language = $_POST['update_language'];
    $country = $_POST['update_country'];
    $language_code = $_POST['language_code'];
    $result = $u->updatelanguage($lid, $language, $country, $language_code);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
        .main-container {
            flex: 1;
            display: flex;
            flex-wrap: wrap;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        @media screen and (max-width: 768px) {
            .offcanvas {
                width: 100%;
            }
        }
        
    </style>
</head>
<body>
    
    <?php
    include_once 'sidebar.php';
    ?>

    <div class="main-content container p-4">
        <h1>Add New Language</h1>
        <form method="POST" action="">
            <label for="language">Language:</label>
            <input type="text" id="language" name="language" required>
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" required>
            <label for="language_code">Language Code:</label>
            <input type="text" id="country" name="language_code" required>
            <button type="submit" name="btnAddLanguage">Add Language</button>
        </form>
	</div>
	<div class="main-content container p-4">
        <h2>Languages List</h2>
        <table>
            <thead>
                <tr>
                    <th>Language ID</th>
                    <th>Language</th>
                    <th>Country</th>
                    <th>Language Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($languages as $language): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($language['Language_ID']); ?></td>
                        <td><?php echo htmlspecialchars($language['Language']); ?></td>
                        <td><?php echo htmlspecialchars($language['Country']); ?></td>
                        <td><?php echo htmlspecialchars($language['LanguageCode']); ?></td>
                        <td class="actions">
                            <!-- Update Button -->
							<button type = "button" class="button update-btn" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="openUpdateModal('<?php echo htmlspecialchars($language['Language_ID']); ?>', '<?php echo htmlspecialchars($language['Language']); ?>', '<?php echo htmlspecialchars($language['Country']); ?>', '<?php echo htmlspecialchars($language['LanguageCode']); ?>')">Update</button>

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
    
    <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <span class="close">&times;</span>
            <h2>Update Language</h2>
            <form method="POST" action="">
                <input type="hidden" id="update_language_id" name="update_language_id">
                <label for="update_language">Language:</label>
                <input type="text" id="update_language" name="update_language" required>
                <label for="update_country">Country:</label>
                <input type="text" id="update_country" name="update_country" required>
                <label for="language_code">Language Code:</label>
                <input type="text" id="language_code" name="language_code" required>
                <button type="submit" name="btnUpdateLanguage">Update Language</button>
            </form>
                </div>
            </div>
        </div>

    <script>
        function openUpdateModal(id, language, country, language_code) {
            document.getElementById('update_language_id').value = id;
            document.getElementById('update_language').value = language;
            document.getElementById('update_country').value = country;
            document.getElementById('language_code').value = language_code;
            document.getElementById('updateModal').style.display = 'block';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('updateModal')) {
                closeUpdateModal();
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
