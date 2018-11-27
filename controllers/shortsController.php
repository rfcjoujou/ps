<?php 
class shortsController extends Controller
{
	public function index() {
		$dados = array();
		$products = new Products();
		$category = array('category' => '1');

		$product = $products->getProducts(0, $category);

		if(!empty($product)) {
			$dados['products'] = $product;


		}

		$this->loadTemplate('shorts', $dados);
	}
}