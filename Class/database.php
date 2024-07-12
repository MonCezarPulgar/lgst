<?php
Class Database{
	public $conn;
	public function __construct(){
		$this->conn=new mysqli('localhost','root','','translator');
	}
}
?>