<?php
class Store extends model
{
	public function getTemplateData() {
		$dados = array();

		if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
			
			$cart = new Cart();
			$item = 0;

			$infoCart = $cart->getListOfProductsInCart();
			if(!empty($infoCart)) {
				$q = 0;
				foreach($infoCart as $cartProdInfo) {
					$id = $cartProdInfo['id'];
					$id_sub_cor = $cartProdInfo['id_sub_cor'];
					$q += 1;

				}

				
				foreach($_SESSION['cart'][$id] as $value_qt) {

					$item += count($value_qt);	
					
				}
				$dados['quantity_itemInCart'] = $item;
				


			}
		} 
		
		return $dados;
	}
}