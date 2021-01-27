<?php
	Class Database{
		public $host   = DB_HOST;
		public $user   = DB_USER;
		public $pass   = DB_PASS;
		public $dbname = DB_NAME;

		public $link;
		public $error;

		// constructor
		public function __construct(){
			$this->connectDB();
		}

		// database connection
		private function connectDB(){
			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			if(!$this->link){
			$this->error ="Connection fail".$this->link->connect_error;
			return false;
			}
		}

		// read/select data from database
		public function select($query){
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($result->num_rows > 0) {
				return $result;
			}else{
				return false;
			}
		}

		// data insert into database
		public function insert($query){
			$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($insert_row) {
				header("Location: index.php?msg=".urlencode('Data inserted successfully!'));
				exit();
			} else{
				die("Error: (".$this->link->errno.")".$this->link->error);
			}
		}

		// data update into database
		public function update($query){
			$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($update_row) {
				header("Location: index.php?msg=".urlencode('Data updated successfully!'));
				exit();
			} else{
				die("Error: (".$this->link->errno.")".$this->link->error);
			}
		}

		// data delete from database
		public function delete($query){
			$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($delete_row) {
				header("Location: index.php?msg=".urlencode('Data deleted successfully!'));
				exit();
			} else{
				die("Error: (".$this->link->errno.")".$this->link->error);
			}
		}




	}
?>