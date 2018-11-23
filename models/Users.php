<?php
class Users extends Model
{
 	/* Registrar usuario*/
	public function register_user($name, $email, $password) {
		$sql = "INSERT INTO users SET name = :name, email = :email, password = :password";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":name", $name);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":password", $password);
		$sql->execute();

		return $this->db->lastInsertId();

	}

	public function existEmail($email) {
		$sql = "SELECT * FROM users WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0) {
			return false;
		}else {

			return true;
		}

	}

	/* Login usuario*/
	public function logar($email, $password) {
		$cnpj = 0;
		$id = array();
		/* CNPJ DEPOIS EU VOU ARRUMAR PARA FUNCIONAR */
		$sql = "SELECT * FROM users WHERE email = :email AND password = :password";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		//$sql->bindValue(":cnpj", $cnpj);
		$sql->bindValue(":password", md5($password));
		$sql->execute();

		if($sql->rowCount() > 0) {
			
			$sql = $sql->fetch();

			$id = $sql['id'];
		}

		return $id;
	}




	public function getUserbyId($id) {
		$array = array();

		$sql = "SELECT * FROM users WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
			
		}

		return $array;

	}

	
}