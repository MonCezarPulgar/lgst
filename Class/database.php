<?php
Class Database{
	public $conn;
	public function __construct(){
		$this->conn=new mysqli('localhost','u320585682_lgst','languageTranslate_123','u320585682_lgst');
	}
}
?>