<?php 
	require "Db.php";

	class Operations extends Db{
		public function read($table){
			$limit = 6;
			if (isset($_GET["page"])) {
				$firstToShow = ($_GET["page"] - 1) * $limit;
			} else {
				$firstToShow = 0;
			}
			$sql = "SELECT * FROM `" . $table . "` LIMIT " . $limit . " OFFSET " . $firstToShow;
			$query = mysqli_query($this->connection, $sql);
			return $query;
		}
		public function save($table, $name, $description, $image_path){
			$sql = "INSERT INTO `" . $table . "` (name, description, image_path) VALUES (?,?,?)";
			$stmt = $this->connection->prepare($sql);
			$stmt->bind_param("sss", $name, $description, $image_path);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		}
		public function getImagePath($table, $id){
			$sql = "SELECT image_path FROM `" . $table . "` WHERE id=" . $id;
			$query = mysqli_query($this->connection, $sql);
			return $query;
		}
		public function delete($table, $id){
			$sql = "DELETE FROM `" . $table . "` WHERE id=" . $id;
			$query = mysqli_query($this->connection, $sql);
			return $query;
		}
		public function readOne($table, $id){
			$sql = "SELECT * FROM `" . $table . "` WHERE id=" . $id;
			$query = mysqli_query($this->connection, $sql);
			return $query;
		}
		public function update($table, $id, $name, $description, $image_path){
			$sql = "UPDATE `" . $table . "` SET name=?, description=?, image_path=? WHERE id=" . $id;
			$stmt = $this->connection->prepare($sql);
			$stmt->bind_param("sss", $name, $description, $image_path);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		}
		
	}

	$obj = new Operations;
 ?>