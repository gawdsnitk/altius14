<?php
	require_once("config.php");
	class MySqlDatabase {
		
		private $connection;
		
		public function __construct() {
				$this->connect();
		}
		public function connect() {
			$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PWD);
			
			if(mysql_errno()) {
				die("Failed TO Connect ".mysqli_connect_error());
			}else {
				$db_select =  mysqli_select_db($this->connection,DB_NAME);
				if(!$db_select) {
					die("database selection failed".mysql_error());
				}
			}
			
		}
		
		
		public function query($sql) {
			$result = mysqli_query($this->connection,$sql);
			return $result;
		}
		
		public function disconnect() {
			if(isset($this->connection)) {
				mysqli_close($this->connection);
				unset($this->connection);
			}
		}
		
	}
	
	$database = new MySqlDatabase();
	