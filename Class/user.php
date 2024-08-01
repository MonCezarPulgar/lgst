<?php
include_once 'database.php';
Class User extends Database {
    public function signup($subsid, $planname, $duration, $price, $description, $fname, $mname, $lname, $addr, $zip, $bday, $email, $pass, $con){
        $sql = "insert into tbluser2 values (NULL, '$subsid','$planname','$duration','$price','$description','$fname','$mname','$lname','$addr','$zip','$bday','$email','$pass','$con','Tourist','Active')";
        if($this->conn->query($sql)){
			return 'Signup Successful!';
		}else{
			$this->conn->error;
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
    public function displayusers(){
        $sql = "select Subscription_ID, FirstName, MiddleName, LastName, Address, ZipCode, Birthdate, EmailAddress, Password, Role, Status from tbluser2";
        $data = $this->conn->query($sql);
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
        $sql = "UPDATE tbluser SET FirstName = '$fname', LastName = '$lname', MiddleName = '$mname', Address = '$addr', ZipCode = '$zip', Birthdate = '$bday', EmailAddress = '$email' WHERE UserId = '$userid'";
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
        $sql = "SELECT FirstName, LastName, EmailAddress FROM tbluser2 WHERE Role = 'Tourist'";
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
}
?>
