<?php
function generateCONTACTID() {
    // Get the current date and time
    $dateTime = new DateTime();
    
    // Format the date and time as YYYYMMDD-HHMMSS
    $formattedDateTime = $dateTime->format('Ymd-His');
    
    // Create the Plan ID
    return 'CON-' . $formattedDateTime;
}
?>
