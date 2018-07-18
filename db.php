<?php
	require "config.php";

	class Db{
		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASSWORD;
		public $dbname = DB_NAME;
		public $connection;
		public $error;

		public function __construct(){
			$this->connect();
		}

		public function connect(){
			$this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			if(!$this->connection){
				$this->error = "Can't connect to database " . mysqli_connect_error() . ".";
			}
		}
	}
 ?>