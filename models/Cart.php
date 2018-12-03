<?php
class Cart extends model 
{

	public function getListOfProductsInCart() {
		$products = new Products();
		$products_images = new Products_images();
		$array = array();
		$cart = $_SESSION['cart'];
		$img = 1;

		foreach($cart as $id => $qt) {

			$info = $products->getInfoProducts($id, $img);
			$prod_image = $products_images->getImagesById($id, $primary_image);



			

/*			$imgs = array(array('url_img' => $prod_image['url']));

			foreach($imgs as $key) {

			}*/


			
			$array[] = array(
				'id' => $id,
				'qt' => $qt,
				'price' => $info['price'],
				'name' => $info['name'],
				//'image' => $primary_img

				);
		}

		return $array;
	}
}