<?php
include_once 'database.php';
Class User extends Database {
    public function signup($subsid, $planname, $duration, $price, $description, $fname, $mname, $lname, $addr, $zip, $bday, $email, $pass, $con){
        // Get the current date in 'YYYY-MM-DD' format
        $planStartDate = date('Y-m-d');
        
        // Calculate the expiration date based on the plan name
        switch ($planname) {
            case 'Baby Plan':
                $interval = 'P30D'; // 30 days
                break;
            case 'Teen Plan':
                $interval = 'P6M'; // 6 months
                break;
            case 'Grand Plan':
                $interval = 'P1Y'; // 1 year
                break;
            default:
                $interval = 'P0D'; // Default to 0 days if the plan name is not recognized
                break;
        }
    
        // Create DateTime objects for start and expiration dates
        $startDate = new DateTime($planStartDate);
        $expirationDate = $startDate->add(new DateInterval($interval));
        
        // Format expiration date in 'YYYY-MM-DD' format
        $expirationDateFormatted = $expirationDate->format('Y-m-d');
        
        // Update SQL query to include PlanStartDate and ExpirationDate
        $sql = "INSERT INTO tbluser2 VALUES (NULL, '$subsid', '$planname', '$duration', '$price', '$description', '$fname', '$mname', '$lname', '$addr', '$zip', '$bday', '$email', '$pass', '$con', 'Tourist', 'Active', '$planStartDate', '$expirationDateFormatted')";
        
        if($this->conn->query($sql)){
            return 'Signup Successful!';
        } else {
            return 'Error: ' . $this->conn->error;
        }
    }
    
    public function renewplan($modal_subid, $modal_planname, $modal_duration) {
        // Get current date
        $currentDate = new DateTime();
        
        // Fetch the current plan details
        $sql = "SELECT PlanName, PlanStartDate, ExpirationDate FROM tbluser2 WHERE Subscription_ID = '$modal_subid'";
        $result = $this->conn->query($sql);
        
        if ($result && $row = $result->fetch_assoc()) {
            $currentPlanName = $row['PlanName'];
            $planStartDate = new DateTime($row['PlanStartDate']);
            $currentExpirationDate = new DateTime($row['ExpirationDate']);
            
            // Calculate remaining days from the current plan
            $interval = $currentDate->diff($currentExpirationDate);
            $remainingDays = $interval->days;
            
            // Calculate new expiration date based on the new plan
            switch ($modal_planname) {
                case 'Baby Plan':
                    $newPlanInterval = new DateInterval('P30D');
                    break;
                case 'Teen Plan':
                    $newPlanInterval = new DateInterval('P6M');
                    break;
                case 'Grand Plan':
                    $newPlanInterval = new DateInterval('P1Y');
                    break;
                default:
                    $newPlanInterval = new DateInterval('P0D');
                    break;
            }
    
            // Add remaining days to the new plan duration
            $newPlanExpirationDate = $currentDate->add($newPlanInterval);
            $newPlanExpirationDate->add(new DateInterval('P' . $remainingDays . 'D'));
            
            // Update the plan details in the database
            $sql = "UPDATE tbluser2 SET PlanName = '$modal_planname', Duration = '$modal_duration', PlanStartDate = '{$currentDate->format('Y-m-d')}', ExpirationDate = '{$newPlanExpirationDate->format('Y-m-d')}' WHERE Subscription_ID = '$modal_subid'";
            
            if ($this->conn->query($sql)) {
                return 'Renewing Plan Successful';
            } else {
                return $this->conn->error;
            }
        } else {
            return 'Failed to retrieve current plan details';
        }
    }
        
    
    public function addplan($planid, $planname, $price, $duration, $desc, $incl){
        $sql = "insert into plans values (NULL, '$planid','$planname','$price','$duration','$desc','$incl')";
        if($this->conn->query($sql)){
            return 'Plan Successfully Added!';
        }else{
            $this->conn->error;
        }
    }
    public function displayplan(){
        $sql = "select PlanId, PlanName, Price, Duration, Description, IncludedLanguages from plans ORDER BY PlanName";
        $data = $this->conn->query($sql);
        return $data;
    }
    public function displayusers($planFilter = 'All') {
        // Base SQL query
        $sql = "SELECT Subscription_ID, FirstName, MiddleName, LastName, PlanName, Address, ZipCode, Birthdate, EmailAddress, Password, Role, Status FROM tbluser2";
        
        // Add filtering based on the plan selected
        if ($planFilter !== 'All') {
            $sql .= " WHERE PlanName = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('s', $planFilter);
            $stmt->execute();
            $data = $stmt->get_result();
            $stmt->close();
        } else {
            $data = $this->conn->query($sql);
        }
    
        return $data;
    }
    
    public function deleteuser($subsid){
        $sql = "delete from tbluser2 where Subscription_ID = '$subsid'";
        $this->conn->query($sql);
        return 'User has been deleted!';
    }
    public function planupdate($planid, $planname, $price, $duration, $desc, $incl){
        $sql = "update plans set Planid = '$planid', PlanName = '$planname', Price = '$price', Duration = '$duration', Description = '$desc', IncludedLanguages = '$incl' where PlanId = '$planid'";
        if($this->conn->query($sql)){
            return 'Plan has been Updated!';
        }else{
            $this->conn->error;
        }
    }
    public function deleteplan($planid){
        $sql = "delete from plans where PlanId = '$planid'";
        $this->conn->query($sql);
        return 'Plan has been deleted!';
    }
    public function AddContacts($conid, $name, $email1, $message){
		$sql = "INSERT INTO contacts VALUES (NULL, '$conid', '$name', '$email1', '$message')";
		if($this->conn->query($sql)){
			 return 'Message Successfully Added';
		 }else{
			 return $this->conn->error;
		 }
	}
    public function Login($un, $pw){
        $sql="select * from tbluser2 where EmailAddress='$un' and Password='$pw'";
        $data=$this->conn->query($sql);
        return $data;
    }
    public function addlanguage($language, $country, $language_code) {
		$lid = uniqid();
		$sql = "INSERT INTO languages (Language_ID, Language, Country, LanguageCode) VALUES ('$lid', '$language', '$country', '$language_code')";
		if ($this->conn->query($sql)) {
			return 'Successfully Added';
		} else {
			return $this->conn->error;
		}
	}
    public function getLanguages() {
        $sql = "SELECT * FROM languages";
        $data = $this->conn->query($sql);
        return $data;
    }
	
	public function updatelanguage($lid, $language, $country, $language_code){
		$sql="Update languages set Language='$language', Country='$country', LanguageCode = '$language_code' where Language_ID='$lid'";
		if ($this->conn->query($sql)) {
            return 'Successfully Updated';
        } else {
            return $this->conn->error;
        }
	}
	
	public function deletelanguage($lid) {
		$sql = "DELETE FROM languages WHERE Language_ID = '$lid'";
		if ($this->conn->query($sql)) {
			return 'Successfully Deleted';
		} else {
			return $this->conn->error;
		}
	}
    public function takelanguagefree(){
        $sql = "select LanguageCode, Language from freelang";
        $data = $this->conn->query($sql);
        return $data;
    }
    public function takelanguage(){
        $sql = "select LanguageCode, Language from languages";
        $data = $this->conn->query($sql);
        return $data;
    }
    public function displayprof($id) {
        $sql = "SELECT * FROM tbluser2 WHERE Subscription_ID = '$id'";
        $data = $this->conn->query($sql);
        return $data;
    }
    
    public function editprofile($userid, $fname, $lname, $mname, $addr, $zip, $bday, $email){
        $sql = "UPDATE tbluser2 SET FirstName = '$fname', LastName = '$lname', MiddleName = '$mname', Address = '$addr', ZipCode = '$zip', Birthdate = '$bday', EmailAddress = '$email' WHERE Subscription_ID = '$userid'";
        if ($this->conn->query($sql)) {
            return 'Profile Edited!';
        } else {
            return $this->conn->error;
        }
    }
    public function getTotalUsers() {
        $sql = "SELECT COUNT(*) AS total FROM tbluser2";
        $result = $this->conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }
        return 0;
    }

    public function getUserList() {
        $sql = "SELECT FirstName, MiddleName, LastName, Address, ZipCode, Birthdate, EmailAddress FROM tbluser2 WHERE Role = 'Tourist'";
        $data = $this->conn->query($sql);
        $users = [];
        if ($data->num_rows > 0) {
            while ($row = $data->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }
    public function getTotalLanguage() {
        $sql = "SELECT COUNT(*) AS total FROM languages";
        $result = $this->conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }
        return 0;
    }

    public function getLanguageList() {
        $sql = "SELECT Language_ID, Language, Country, LanguageCode FROM languages";
        $data = $this->conn->query($sql);
        $users = [];
        if ($data->num_rows > 0) {
            while ($row = $data->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }
    public function planlanguage(){
        $sql = "SELECT Language FROM languages";
        $data = $this->conn->query($sql);
        return $data;
    }
    public function message(){
        $sql = "SELECT Name, Message FROM contacts";
        $data = $this->conn->query($sql);
        return $data;
    }
    public function babyplan(){
        $sql = "SELECT Language, LanguageCode FROM languages 
        WHERE Language IN ('Filipino', 'English', 'Chinese', 'Korean', 'German', 'Spanish', 'Japanese', 'Russian', 'Italian', 'Thai')ORDER BY Language";
        $data = $this->conn->query($sql);
        return $data;
    }
    public function teenplan(){
        $sql = "SELECT Language, LanguageCode FROM languages 
        WHERE Language IN ('Filipino', 'English', 'Chinese', 'Korean', 'German', 'Spanish', 'Japanese', 'Russian', 'Italian', 'Thai','Korean','French','Portuguese','Arabic','Hindi','Bengali','Punjabi','Javanese','Turkish','Vietnamese','Persian','Swahili','Tamil','Gujarati','Greek','Hebrew','Polish','Ukranian','Romanian','Hungarian','Czech')ORDER BY Language";
        $data = $this->conn->query($sql);
        return $data;
    }
    public function grandplan() {
        $sql = "SELECT DISTINCT Language, LanguageCode 
                FROM languages 
                ORDER BY Language";
        $data = $this->conn->query($sql);
        return $data;
    }
    
    public function subscribed($fname, $mname, $lname, $addr, $zip, $bday, $email, $pass, $con, $planName, $planDescription, $planDuration, $planPrice, $planIncludedLanguages) {
		$userid = uniqid();
		$planid = uniqid();
		$sql = "INSERT INTO subscribed VALUES (NULL, '$userid', '$fname', '$mname', '$lname', '$addr', '$zip', '$bday', '$email', '$pass', '$con', '$planid', '$planName', '$planDescription', '$planDuration', '$planPrice', '$planIncludedLanguages', 'Tourist', 'Active')";
		if ($this->conn->query($sql)) {
			return 'Subscription Successful!';
		} else {
			return $this->conn->error;
		}
	}
    public function plansubscription($subsid, $fullname, $emailadd, $planname, $duration, $price, $description){
        $sql = "INSERT INTO subscriptions VALUES(NULL, '$subsid','$fullname','$emailadd','$planname','$duration','$price','$description')";
        if($this->conn->query($sql)){
            return 'Subscription Success!';
        }else{
            return $this->conn->error;
        }
    }
    public function displaysubs(){
        $sql = "SELECT Subscription_ID, FullName, EmailAddress, PlanName, Duration, Price, Description FROM subscriptions";
        $data = $this->conn->query($sql);
        return $data;
    }
    public function displayReport() {
        $totalLanguages = $this->getTotalLanguage();
        $languages = $this->getLanguageList();

        echo "<div class='report-container'>";
        echo "<h2>Language Report</h2>";
        echo "<p>Total Languages: " . $totalLanguages . "</p>";

        if (!empty($languages)) {
            echo "<ul>";
            foreach ($languages as $language) {
				echo "<li>";
				echo "Language ID: " . $language["Language_ID"] . "<br>";
				echo "Language Code: " . $language["LanguageCode"] . "<br>";
				echo "Name: " . $language["Language"] . "<br>";
				echo "Country: " . $language["Country"];
				echo "</li>";
			}
            echo "</ul>";
        } else {
            echo "<p>No languages found.</p>";
        }
        echo "</div>";
    }
    public function getPlans() {
        $sql = "SELECT PlanName, COUNT(*) as userCount FROM tbluser2 GROUP BY PlanName";
        $data = $this->conn->query($sql);
    
        // Convert the result to an associative array
        $plans = [];
        while ($row = $data->fetch_assoc()) {
            $plans[] = $row;
        }
    
        return $plans;
    }

    public function getUsersByPlan($planName) {
        $sql = "SELECT * FROM tbluser2 WHERE PlanName = '$planName'";
        $data = $this->conn->query($sql);
        return $data;
    }
    public function displayUsersReport() {
        $totalusers = $this->getTotalUsers();
        $users = $this->getUserList();
    
        echo "<div class='report-container'>";
    
        // Container for the total languages count and print all button
        echo "<div class='d-flex justify-content-between align-items-center'>";
        echo "<h3>Total Users: " . $totalusers . "</h3>";
        echo "<button class='btn btn-success' onclick='printAllUser()'> <i class='fa-solid fa-print'></i> Print All</button>"; // Button to print all languages
        echo "</div>";
    
        if (!empty($users)) {
            echo "<ul>";
            foreach ($users as $user) {
                $subscriptionId = isset($user["Subscription_ID"]) ? $user["Subscription_ID"] : 'unknown';
                $elementId = 'users-' . $subscriptionId; // Unique ID for each user
            
                echo "<li id='$elementId'>"; // Ensure each list item has a unique ID
                echo "Full Name: " . (isset($user["FirstName"]) ? $user["FirstName"] : 'N/A') . " " . 
                    (isset($user["MiddleName"]) ? $user["MiddleName"] : 'N/A') . " " . 
                    (isset($user["LastName"]) ? $user["LastName"] : 'N/A') . "<br>";
                echo "Address: " . (isset($user["Address"]) ? $user["Address"] : 'N/A') . "<br>";
                echo "Zip Code: " . (isset($user["ZipCode"]) ? $user["ZipCode"] : 'N/A') . "<br>";
                echo "Email Address: " . (isset($user["EmailAddress"]) ? $user["EmailAddress"] : 'N/A') . "<br>";
                echo "<button class='btn btn-primary btn-sm ms-5' onclick=\"printUser('$subscriptionId')\"> <i class='fa-solid fa-print'></i> Print </button>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No Users found.</p>";
        }
        echo "</div>";
    }
    public function getTotalNetWorth(){
        $sql = "SELECT SUM(Price) as Total_net_worth FROM tbluser2";
        $data = $this->conn->query($sql); // Use $this->conn instead of $this->db
        $row = $data->fetch_assoc(); // Fetch the result as an associative array
        return isset($row['Total_net_worth']) ? (float) $row['Total_net_worth'] : 0.0; // Corrected the key to match the SQL alias
    } 
    public function getUsers() {
        $sql = "SELECT Subscription_ID, FirstName, MiddleName, LastName FROM tbluser2";
        $data = $this->conn->query($sql);
        return $data;
    }

    public function getPlansReport($reportType) {
        // Determine the date condition based on the report type
        switch ($reportType) {
            case 'daily':
                $dateCondition = 'DATE(PlanStartDate) = CURDATE()';
                break;
            case 'weekly':
                $dateCondition = 'YEARWEEK(PlanStartDate, 1) = YEARWEEK(CURDATE(), 1)';
                break;
            case 'monthly':
                $dateCondition = 'YEAR(PlanStartDate) = YEAR(CURDATE()) AND MONTH(PlanStartDate) = MONTH(CURDATE())';
                break;
            default:
                $dateCondition = '1=1'; // Default condition (should not be reached)
                break;
        }
    
        // SQL query to fetch plans based on the date condition
        $sql = "SELECT FirstName, MiddleName, LastName, PlanName, PlanStartDate, ExpirationDate, Price, Description FROM tbluser2 WHERE $dateCondition";
    
        // Execute the query
        $result = $this->conn->query($sql);
    
        // Check if query execution was successful
        if ($result === false) {
            // Handle error
            throw new Exception("Error executing query: " . $this->conn->error);
        }
    
        // Return result or do further processing
        return $result;
    }
    public function storeResetToken($email, $token) {
        $stmt = $this->conn->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();
        $stmt->close();
    }

    // Add this method to get user by email
    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM tbluser2 WHERE EmailAddress = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    // Add this method to verify the token
    public function verifyResetToken($token) {
        $stmt = $this->conn->prepare("SELECT * FROM password_resets WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    // Add this method to update the password
    public function updatePassword($email, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("UPDATE tbluser2 SET Password = '$newPassword' WHERE EmailAddress = '$email'");
        $stmt->bind_param("ss", $hashedPassword, $email);
        $stmt->execute();
        $stmt->close();
    }

    // Add this method to delete the token after successful reset
    public function deleteResetToken($token) {
        $stmt = $this->conn->prepare("DELETE FROM password_resets WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->close();
    }
}
?>
