<?php
class MySql{
 
	private $host;
	private $user;
	private $password;
	private $database;
	private $conn;
	
	public function __construct(){ 

		$this->host='localhost';
		$this->user='root';
		$this->password='';
		$this->database='db_ferreteria';			 		
	 	
	}

	public function CreateConnection(){
		$this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($this->conn->connect_errno) {
			die("Error al conectarse a MySQL: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error);
		}else{
			return true;
		}

	}
	
	public function CloseConnection(){
 		$this->conn->close();
	}
	
	public function ExecuteQuery($sql){
 	 	$result = $this->conn->query($sql);
	return $result;
	}
	
	public function GetCountAffectedRows(){ 
		return $this->conn->affected_rows;
	}

	public function GetRows($result){ 
		return $result->fetch_row();
	}
 

	public function SetFreeResult($result){ 
		$result->free_result();
	}
			
}
?>
 