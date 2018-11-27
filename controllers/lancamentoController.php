<?php 
class lancamentoController extends Controller 
{
	public function index() {
		$dados = array();
		$products = new Products();
		$new_product = array('new_product' => '1');


		$product = $products->getProducts(0, $new_product);
		if(!empty($product)) {


			$dados['products'] = $product;
		}

		$this->loadTemplate('lancamento', $dados);
	}
}