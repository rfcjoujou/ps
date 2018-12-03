<?php
class Cart extends model 
{

	public function getListOfProductsInCart() {
		$products = new Products();
		$products_images = new Products_images();
		$array = array();
		$cart = $_SESSION['cart'];
		



		foreach($cart as $id => $qt) {

			$info = $products->getInfoProducts($id);
			$prod_image = $products_images->getImagesById($id);


			

			
			$array[] = array(
				'id' => $id,
				'qt' => $qt,
				'price' => $info['price'],
				'name' => $info['name'],
				'image' => $prod_image['url']

				);
		}
		
		return $array;
	}
}