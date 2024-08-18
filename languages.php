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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <link rel="icon" type="image/x-icon" href="images/text.png">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background: #f0f2f5;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background: #fff;
        }
        h1, h2 {
            color: #0072ff;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .form-control, .btn {
            border-radius: 30px;
        }
        .table {
            margin-top: 20px;
        }
        .table thead {
            background-color: #0072ff;
            color: #fff;
        }
        .table tbody tr {
            transition: background-color 0.3s ease;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-delete {
            background-color: transparent;
            border: none;
            color: #dc3545;
        }
        .modal-content {
            border-radius: 15px;
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-title {
            font-size: 1.5rem;
            color: #dc3545;
        }
        .btn-close {
            background: transparent;
            border: none;
        }
        .modal-footer {
            border-top: none;
        }
        .hidden {
            display: none;
        }
        .btn-update, .btn-delete {
            border-radius: 30px;
        }
        .btn-update {
            background-color: #0072ff;
            color: #fff;
        }
        .btn-update:hover {
            background-color: #0056b3;
        }
        .btn-delete {
            background-color: transparent;
            color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #f8d7da;
        }
    </style>
</head>
<body>
    
    <?php include_once 'sidebar.php'; ?>

    <div class="container">
        <div class="card">
            <h1>Add New Language</h1>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="language" class="form-label">Language</label>
                    <input type="text" id="language" name="language" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" id="country" name="country" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="language_code" class="form-label">Language Code</label>
                    <input type="text" id="language_code" name="language_code" class="form-control" required>
                </div>
                <button type="submit" name="btnAddLanguage" class="btn btn-primary">Add Language</button>
            </form>
        </div>

        <div class="card mt-4">
            <h2>Languages List</h2>
            <table class="table table-striped">
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
                                <button type="button" class="btn btn-update" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="openUpdateModal('<?php echo htmlspecialchars($language['Language_ID']); ?>', '<?php echo htmlspecialchars($language['Language']); ?>', '<?php echo htmlspecialchars($language['Country']); ?>', '<?php echo htmlspecialchars($language['LanguageCode']); ?>')">Update</button>

                                <!-- Delete Button -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="delete_language_id" value="<?php echo htmlspecialchars($language['Language_ID']); ?>">
                                    <button type="submit" name="btnDeleteLanguage" class="btn btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Modal for Update Language -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Language</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <input type="hidden" id="update_language_id" name="update_language_id">
                        <div class="mb-3">
                            <label for="update_language" class="form-label">Language</label>
                            <input type="text" class="form-control" id="update_language" name="update_language" required>
                        </div>
                        <div class="mb-3">
                            <label for="update_country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="update_country" name="update_country" required>
                        </div>
                        <div class="mb-3">
                            <label for="update_language_code" class="form-label">Language Code</label>
                            <input type="text" class="form-control" id="update_language_code" name="language_code" required>
                        </div>
                        <button type="submit" name="btnUpdateLanguage" class="btn btn-primary">Update Language</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openUpdateModal(id, language, country, languageCode) {
            document.getElementById('update_language_id').value = id;
            document.getElementById('update_language').value = language;
            document.getElementById('update_country').value = country;
            document.getElementById('update_language_code').value = languageCode;
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
