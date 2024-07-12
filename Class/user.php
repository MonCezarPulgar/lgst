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
}
?>
