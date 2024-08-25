<?php

include_once 'Class/user.php';

$u = new User();
$reportOutput = '';
$selectedReportType = 'daily'; // Default value

if (isset($_POST['generateUserReport'])) {
    // Generate user report
    $users = $u->getUsers();
    $reportOutput = '<div class="report-card"><div class="button-container">';
    $reportOutput .= '<button class="print-btn" onclick="printReport()">Print Entire Report</button>';
    $reportOutput .= '</div><h3>User Report</h3>';
    $reportOutput .= '<table><thead><tr><th>ID</th><th>Full Name</th><th>Print</th></tr></thead><tbody>';
    foreach ($users as $user) {
        $fullName = htmlspecialchars($user['FirstName']) . ' ' . htmlspecialchars($user['MiddleName']) . ' ' . htmlspecialchars($user['LastName']);
        $reportOutput .= '<tr><td>' . htmlspecialchars($user['Subscription_ID']) . '</td><td>' . $fullName . '</td><td><button class="print-btn" onclick="printRow(this)"> <i class="fa-solid fa-print"></i> </button></td></tr>';
    }
    $reportOutput .= '</tbody></table></div>';
} elseif (isset($_POST['generatePlanReport'])) {
    // Generate plan report based on selected type
    $selectedReportType = $_POST['reportType'] ?? 'daily'; // Update selected report type
    $plans = $u->getPlansReport($selectedReportType);
    $reportOutput = '<div class="report-card"><div class="button-container">';
    $reportOutput .= '<button class="print-btn" onclick="printReport()">Print Entire Report</button>';
    $reportOutput .= '</div><h3>Plan Report (' . ucfirst($selectedReportType) . ')</h3>';
    $reportOutput .= '<table><thead><tr><th>Plan Name</th><th>Plan Start Date</th><th>Expiration Date</th><th>Price</th><th>Description</th><th>Print</th></tr></thead><tbody>';
    foreach ($plans as $plan) {
        $reportOutput .= '<tr><td>' . htmlspecialchars($plan['PlanName']) . '</td><td>' . htmlspecialchars($plan['PlanStartDate']) . '</td><td>' . htmlspecialchars($plan['ExpirationDate']) . '</td><td>' . htmlspecialchars($plan['Price']) . '</td><td>' . htmlspecialchars($plan['Description']) . '</td><td><button class="print-btn" onclick="printRow(this)"> <i class="fa-solid fa-print"></i> </button></td></tr>';
    }
    $reportOutput .= '</tbody></table></div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reports</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <link rel="icon" type="image/x-icon" href="images/text.png">
<style>
    *{
        font-family: 'Poppins', sans-serif;
    }
    body {
        background-color: #f4f7f6;
        color: #333;
        margin: 0;
        padding: 20px;
    }
    h1 {
        font-size: 2rem;
        color: #0072ff;
        text-align: center;
        margin-bottom: 30px;
    }
    h2 {
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: #00c6ff;
    }
    .report-card {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        position: relative; /* Add this */
    }
    .button-container {
        position: absolute; /* Add this */
        top: 20px; /* Adjust as needed */
        right: 20px; /* Adjust as needed */
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #0072ff;
        color: white;
    }
    button, select {
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #0072ff;
        color: white;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }
    button:hover, select:hover {
        background-color: #00c6ff;
    }
    .form-container {
        display: flex;
        justify-content: start;
        gap: 10px;
        margin-bottom: 40px;
    }
    .form-container > div {
        flex: 1;
        margin: 0;
        padding: 0;
    }
    .print-btn {
        background-color: #ff5733;
    }
    .print-btn:hover {
        background-color: #ff7f50;
    }
    @media print {
        body {
            padding: 0;
            background-color: white;
        }
        .form-container, .print-btn {
            display: none;
        }
        .report-card {
            margin: 0;
            box-shadow: none;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #0072ff;
            color: white;
        }
    }
</style>
<script>
    function printRow(button) {
        var row = button.closest('tr');
        var table = button.closest('table');
        var headers = table.querySelectorAll('thead th');
        var headerHTML = '<thead><tr>';
        headers.forEach(header => headerHTML += '<th>' + header.innerText + '</th>');
        headerHTML += '</tr></thead>';

        var printWindow = window.open('', '', 'height=400,width=600');
        printWindow.document.write('<html><head><title>Print Row</title>');
        printWindow.document.write('<style>table {width: 100%; border-collapse: collapse;} th, td {padding: 8px; border: 1px solid #ddd;} th {background-color: #0072ff; color: white;}</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<table>' + headerHTML + '<tbody>' + row.innerHTML + '</tbody></table>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
    }

    function printReport() {
        var report = document.querySelector('.report-card').innerHTML;
        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Print Report</title>');
        printWindow.document.write('<style>table {width: 100%; border-collapse: collapse;} th, td {padding: 8px; border: 1px solid #ddd;} th {background-color: #0072ff; color: white;} .print-btn {display: none;}</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<h3>' + document.querySelector('.report-card h3').innerText + '</h3>');
        printWindow.document.write(report);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
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
</head>
<body>
<?php include_once 'sidebar.php'; ?>
<h1>Reports</h1>

<!-- User Report and Plan Report Forms Close to Each Other -->
<div class="form-container">
    <!-- User Report Form -->
    <div style="margin-left:150px;">
        <h2><i class="fas fa-users"></i> User Report</h2>
        <form method="post" action="">
            <button type="submit" name="generateUserReport"><i class="fas fa-file-alt"></i> User Report</button>
        </form>
    </div>

    <!-- Plan Report Form -->
    <div>
        <h2><i class="fas fa-calendar-alt"></i> Plan Report</h2>
        <form method="post" action="">
            <label for="reportType">Select Report Type:</label>
            <select id="reportType" name="reportType">
                <option value="daily" <?php echo ($selectedReportType == 'daily') ? 'selected' : ''; ?>>Daily</option>
                <option value="weekly" <?php echo ($selectedReportType == 'weekly') ? 'selected' : ''; ?>>Weekly</option>
                <option value="monthly" <?php echo ($selectedReportType == 'monthly') ? 'selected' : ''; ?>>Monthly</option>
            </select>
            <button type="submit" name="generatePlanReport"><i class="fas fa-file-alt"></i> Plan Report</button>
        </form>
    </div>
</div>

<div id="reportOutput">
    <?php echo $reportOutput; ?>
</div>
</body>
</html>