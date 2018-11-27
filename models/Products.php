<?php
class Products extends model
{
	public function getProducts($limite = 0) {
		$array = array();
		

		if(!empty($limite)) {
			$limite = "LIMIT ".$limite;
		} else {
			$limite = " ";
		}

		$sql = "SELECT *, 
		( select categories.name from categories where categories.id = products.id_category ) as category_name
		FROM products ".$limite;
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();

			$product_img = new Products_images();

			foreach($array as $key => $item) {
				$array[$key]['images'] = $product_img->getImagesById($item['id']);

			}



		}


		return $array;
	}

	public function getInfoProducts($id) {
		$array = array();

		$sql = "SELECT * FROM products WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			
			$array = $sql->fetch();
		}

		return $array;

	}

	public function getOptionsById($id) {
		$options = array();

		$sql = "SELECT options FROM products WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$options = $sql->fetch();
			$options = $options['options'];


			if(!empty($options)) {
				$sql = "SELECT * FROM options WHERE id IN (".$options.")";
				$sql = $this->db->query($sql);

				$options = $sql->fetchAll();
			}

			$sql  = "SELECT * FROM products_options WHERE id_product = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();
			$options_values = array();

			if($sql->rowCount() > 0) {
				foreach($sql->fetchAll() as $op) {
					$options_values[$op['id_option']] = $op['p_value'];
				}
			}

			foreach($options as $ok => $op) {
				if(isset($options_values[$op['id']])) {
					$options[$ok]['value'] = $options_values[$op['id']];
				} else {
					$options[$ok]['value'] = '';
				}
			}

		}

		return $options;
	}
}