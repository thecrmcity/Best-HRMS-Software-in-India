<?php



class Database

{
	public $host = "localhost";


	public $user = "root";

	public $pass = "";

	// public $user = "devems";
	// public $pass = "=SHWL6f?3B-P";

	public $dbname = "devems";
	
	public $conn;



	public function __construct()

	{

		$con = mysqli_connect($this->host, $this->user,$this->pass,$this->dbname) or die("Connection Lost");

		return $this->conn = $con;

	}

}
