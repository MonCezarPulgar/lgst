<?php
include_once 'database.php';
Class User extends Database {
    public function signup($fname, $mname, $lname, $addr, $zip, $bday, $email, $pass, $con){
        $sql = "insert into tbluser values (NULL, '$fname','$mname','$lname','$addr','$zip','$bday','$email','$pass','$con','Tourist','Active')";
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
        $sql = "select FirstName, MiddleName, LastName, Address, ZipCode, Birthdate, EmailAddress, Password, Role, Status from tbluser";
        $data = $this->conn->query($sql);
        return $data;
    }
}
?>
