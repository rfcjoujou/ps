<?php
class Products_images extends model 
{
	public function getImagesById($id_product) {
		$array = array();

		$sql = "SELECT url FROM products_images WHERE id_product = :id_product";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_product", $id_product);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();

			
		}
		return $array;

	}

	public function getImagesProducts($id) {
		$array = array();

		$sql = "SELECT url FROM products_images WHERE id_product = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();


		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
}