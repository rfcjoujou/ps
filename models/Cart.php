<?php
class Cart extends model 
{

	public function getListOfProductsInCart() {
		$products = new Products();
		$products_images = new Products_images();
		$array = array();
		$cart = $_SESSION['cart'];
		print_r($cart);
		exit;


		foreach($cart as $id => $qt) {
			foreach($qt as $value) {
				$info = $products->getInfoProducts($id);

				$prod_image = $products_images->getImagesById($id);

				
			}
			$array[] = array(
				'id' => $id,
				'qt' => $value['qt'],
				'price' => $info['price'],
				'name' => $info['name'],
				'image' => $prod_image['url']

			);


		}

		return $array;
	}
}