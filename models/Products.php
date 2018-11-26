<?php
class Products extends model
{
	public function getProducts($limite = 0) {
		$array = array();
		

		$sql = "SELECT *, 
		( select categories.name from categories where categories.id = products.id_category ) as category_name
		FROM products LIMIT ".$limite;
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
}