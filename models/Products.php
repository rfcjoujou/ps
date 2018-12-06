<?php
class Products extends model
{
	public function getProducts($limite = 0, $filters = array(), $filters_caract = array()) {
		$array = array();


		/*if(!empty($especif['sale'])) {
			$filters['sale'] = $especif['sale'];
		} */

		if(!empty($filters_caract['options'])) {

			$filters['options'] = $filters_caract['options'];
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
		$this->bindWhere($filters,$sql);
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

	public function getInfoProducts($id, $img = 0) {
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


	public function getQuantityOptionById($id) {
		$array = array();
		$sql = "SELECT * FROM products_options WHERE id_product = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();

			if(!empty($array)) {
				$options = New Options();
				foreach($array as $op_id) {

				$array['option_name'] = $options->getName($op_id['id_option']);
				}



			}
	
		}



		return $array;
	}



	public function getAvailableOptions($filters = array(),  $especif = array()) {
		$groups = array();
		$ids = array();



			/* Valores do filtro */


		if(!empty($especif['new_product'])) {
			$filters = array(
				'new_product' => $especif['new_product']

				);
		}

		if(!empty($especif['sale'])) {
			$filters['sale'] =  $especif['sale'];
		}



		$where = $this->buildWhere($filters);


		$sql = "SELECT 
		id,options
		FROM products
		WHERE ".implode(' AND ', $where);

		$sql = $this->db->query($sql);

		
		


		if($sql->rowCount() > 0) {

			
			foreach($sql->fetchAll() as $product) {
				$ops = explode(',', $product['options']);
				$ids[] = $product['id'];

				foreach($ops as $op) {
					if(!in_array($op, $groups)) {
						$groups[] = $op;
					}
				}

			}

		}

		$options = $this->getAvailableValuesFromOptions($groups, $ids);

		return $options;

	}

	public function getAvailableValuesFromOptions($groups, $ids) {
		$array = array();
		$options = new Options();
		foreach($groups as $op) {
			$array[$op] = array(
				'name' => $options->getName($op),
				'options' => array()
			);
		}





		$sql = "SELECT
		p_value,
		id_option,
		COUNT(id_option) as c
		FROM products_options
		WHERE 
		id_option IN ('".implode("','", $groups)."') AND
		id_product IN ('".implode("','", $ids)."')
		GROUP BY p_value ORDER BY p_value";

		
		
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {



			foreach($sql->fetchAll() as $ops) {


				$array[$ops['id_option']]['options'][] = array(
					
					'value'=>$ops['p_value'],
					'id' => $ops['id_option'],
					'count'=>$ops['c']
				);



			}




		}


		return $array;
	}

	public function getId_p_valueByp_value($p_value) {
		$array = array();

		$sql = "SELECT id_p_value FROM products_options WHERE p_value = :p_value";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":p_value", $p_value);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();

		}

		return $array;
	}


	private function buildWhere($filters) {
		$where = array(
			'1=1'
			);





		if(!empty($filters['caract'])) {
			$where[] = "id_category = ".$filters['caract'];

			
		}




		if(!empty($filters['category'])) {

			$where[] = 'id_category = :id_category';
			
		}

		if(!empty($filters['sale'])) {
			$where[] = 'sale = '.$filters['sale'];

		}

		if(!empty($filters['new_product'])) {
			$where[] = "new_product = ".$filters['new_product'];
		}


		if(!empty($filters['options'])) {
		
			$where[] = "id IN (select id_product from products_options where products_options.p_value IN ('".implode("','", $filters['options'])."'))";
		
		}


		return $where;

	}

	private function bindWhere($filters, &$sql) {
		
		if(!empty($filters['p_value'])) {
			$sql->bindValue(':p_value', $filters['p_value']);
		}





		if(!empty($filters['caract'])) {
			$sql->bindValue(":id_category", $filters['caract']);
		}



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