<?php
	require_once('main.php');
	class teacher extends main{
		protected $table = 'tbl_teacher';
		private $name;
		private $dept;
		private $age;
		public function setName($name){
			$this->name = $name;
		}
		public function setDept($dept){
			$this->dept = $dept;
		}
		public function setAge($age){
			$this->age = $age;
		}

		public function insert(){
			$sql = "insert into $this->table(name,department,age)values(:name,:dept,:age)";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':name',$this->name);
			$stmt->bindParam(':dept',$this->dept);
			$stmt->bindParam(':age',$this->age);
			return $stmt->execute();

		}
		public function update($id){
			$sql = "UPDATE $this->table SET name=:name, department=:dept, age=:age WHERE id=:id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':name',$this->name);
			$stmt->bindParam(':dept',$this->dept);
			$stmt->bindParam(':age',$this->age);
			$stmt->bindParam(':id',$id);
			return $stmt->execute();
		}
		
	}

?>