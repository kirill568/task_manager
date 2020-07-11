<?php

class Model
{
	public $conn;
	function __construct() {
		$this->conn = new PDO('mysql:host=localhost;dbname=task_manager;charset=utf8', 'root', '');
	}
}