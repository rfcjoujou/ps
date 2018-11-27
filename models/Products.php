<?php
class Products extends model
{
	public function getProducts($limite = 0, $filters = array()) {
		$array = array();



		if(!empty($filters['category'])) {
				
			$filters['category'] = $filters['category'];
		}

		$where = $this->buildWhere($filters);

		if(!empty($limite)) {
			$limite = "LIMIT ".$limite;
		} else {
			$limite = " ";
		}

		$sql = "SELECT *, 
		( select categories.name from categories where categories.id = products.id_category ) as category_name
		FROM products WHERE ".implode(' AND ', $where)."
		".$limite;
		$sql = $this->db->prepare($sql);
		$this->bindWhere($filters, $sql);
		$sql->execute();

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

			//1
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

	private function buildWhere($filters) {
		$where = array(
			'1=1'
			);



		if(!empty($filters['category'])) {

			$where[] = 'id_category = :id_category';
		}

		if(!empty($filters['sale'])) {
			$where[] = 'sale = :sale';
		}

		if(!empty($filters['new_product'])) {
			$where[] = 'new_product = :new_product';
		}

		return $where;

	}

	private function bindWhere($filters, &$sql) {
		
		if(!empty($filters['category'])) {
			$sql->bindValue(":id_category", $filters['category']);
		}

		if(!empty($filters['sale'])) {
			$sql->bindValue(':sale', $filters['sale']);
		}

		if(!empty($filters['new_product'])) {
			$sql->bindValue(':new_product', $filters['new_product']);
		}
	}
}