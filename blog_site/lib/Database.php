<?php

	Class Database{
		public $host   = DB_HOST;
		public $user   = DB_USER;
		public $pass   = DB_PASS;	
		public $dbname = DB_NAME;
		public $link;
		public $error;
		public function __construct(){
			$this->connectDb();

		}
		public function connectDb(){
			$this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
			if(!$this->link){
				$this->error = "connection failed".$this->link->connect_error;
				return false;
			}
			
		}
		// select or read data
		public function select($query){
			$result = $this->link->query($query) or die($this->link->error.__line__);
			if($result->num_rows > 0){
				return $result;
			} 
			else{
				return false;
			}

		}

		//insert data................
		public function insert($query){
			$insert_rows = $this->link->query($query) or die($this->link->error.__line__);
			if($insert_rows){
				return $insert_rows;
			}
			else{
				return false;
			}

		}

		/* .................update data...........................*/

		public function update($query){
			$update_data = $this->link->query($query) or die($this->link->error.__line__);
			if($update_data){
				return $update_data;
			}
			else{
				return false;
			}

		}

		//delete data

		public function delete($query){
			$delete_data = $this->link->query($query) or die($this->link->error.__line__);
			if($delete_data){
				return $delete_data;
			}
			else{
				return false;
			}

		}

	}

?>