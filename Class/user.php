<?php
include_once 'database.php';
Class User extends Database {
    public function signup($userid,$fname, $mname, $lname, $addr, $zip, $bday, $email, $pass, $con){
        $sql = "insert into tbluser values (NULL, '$userid','$fname','$mname','$lname','$addr','$zip','$bday','$email','$pass','$con','Tourist','Active')";
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
        $sql = "select PlanId, PlanName, Price, Duration, Description, IncludedLanguages from plans ORDER BY Price";
        $data = $this->conn->query($sql);
        return $data;
    }
    public function displayusers(){
        $sql = "select UserId, FirstName, MiddleName, LastName, Address, ZipCode, Birthdate, EmailAddress, Password, Role, Status from tbluser";
        $data = $this->conn->query($sql);
        return $data;
    }
    public function deleteuser($userid){
        $sql = "delete from tbluser where UserId = '$userid'";
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
        $sql="select * from tbluser where EmailAddress='$un' and Password='$pw'";
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
    public function displayprof($id){
		$sql="select * from tbluser where UserId='$id'";
		$data=$this->conn->query($sql);
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
        $sql = "SELECT COUNT(*) AS total FROM tbluser";
        $result = $this->conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }
        return 0;
    }

    public function getUserList() {
        $sql = "SELECT FirstName, LastName, EmailAddress FROM tbluser WHERE Role = 'Tourist'";
        $data = $this->conn->query($sql);
        $users = [];
        if ($data->num_rows > 0) {
            while ($row = $data->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }
    public function getTotalLanguage(){
		$sql = "SELECT COUNT(*) AS total FROM languages";
        $result = $this->conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }
        return 0;
	}
	public function getLanguageList() {
        $sql = "SELECT Language_ID, Language, Country FROM languages";
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
}
?>
