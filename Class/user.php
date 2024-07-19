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
    public function addplan($planid, $planname, $price, $duration, $desc){
        $sql = "insert into plans values (NULL, '$planid','$planname','$price','$duration','$desc')";
        if($this->conn->query($sql)){
            return 'Plan Successfully Added!';
        }else{
            $this->conn->error;
        }
    }
    public function displayplan(){
        $sql = "select PlanId, PlanName, Price, Duration, Description from plans";
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
    public function planupdate($planid, $planname, $price, $duration, $desc){
        $sql = "update plans set Planid = '$planid', PlanName = '$planname', Price = '$price', Duration = '$duration', Description = '$desc' where PlanId = '$planid'";
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
    public function Login($email, $password){
        $sql="select * from tbluser where EmailAddress='$email' and Password='$password'";
        $data=$this->conn->query($sql);
        return $data;
    }
}
?>
