<?php
class Cart extends model 
{

	public function getListOfProductsInCart() {
		$products = new Products();
		$products_images = new Products_images();
		$array = array();
		$cart = array();
		$option_cart = array();
		

		if(isset($_SESSION['cart'])) {
			$cart = $_SESSION['cart'];
		}



		foreach($cart as $id => $qt) {
			foreach($qt as $id_sub_color) {
				foreach($id_sub_color as $id_sub_colorAndSize) {
					
					

					$info = $products->getInfoProducts($id);

					$prod_image = $products_images->getImagesById($id);
					




				


					$array[] = array(
						'id' => $id,
						'id_sub_cor' => $id_sub_colorAndSize['id_sub_cor'],	
						'size' => $id_sub_colorAndSize['size'],			
						'price' => $info['price'],
						'name' => $info['name'],
						'image' => $prod_image['url']

					);
				
				}
			}
		}


		return $array;
	}
}