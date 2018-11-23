<?php 
class Users_address extends model
{

	public function getInformation_address($id) {
			$array = array();


			$sql = "SELECT * FROM users_address WHERE id_user = :id_user";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id_user", $id);
			$sql->execute();

			if($sql->rowCount() > 0) {
				$array = $sql->fetch();
			}

			return $array;
	}

	public function changeAddress($cep, $rua, $numero, $bairro, $cidade, $estado, $id) {
		$sql = "SELECT * FROM users_address WHERE id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_user", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$id_address = $sql->fetch();
			$id_address = $id_address['id'];

			$sql = "UPDATE users_address SET cep = :cep, rua = :rua, bairro = :bairro, cidade = :cidade, 
			estado = :estado WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":cep", $cep);
			$sql->bindValue(":rua", $rua);
			$sql->bindValue(":bairro", $bairro);
			$sql->bindValue(":cidade", $cidade);
			$sql->bindValue(":estado", $estado);
			$sql->bindValue(":id", $id);
			
			$sql->execute();
		}


	}
}