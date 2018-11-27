<?php 
class calcaController extends Controller
{
	public function index() {
		$dados = array();
		$products = new Products();

		$id_category = array('category' => 2);

		$product = $products->getProducts(0, $id_category);

		if(!empty($product)) {
			$dados['products'] = $product;

		}


		$this->loadTemplate('calca', $dados);
	}
}