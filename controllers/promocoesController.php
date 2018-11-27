<?php 
class promocoesController extends Controller
{
	public function index() {
		$dados = array();
		$products = new Products();

		$sale = array('sale' => '1');


		$product = $products->getProducts(0, $sale);

		if(!empty($product)) {
			$dados['products'] = $product;

		}

		$this->loadTemplate("promocoes", $dados);
	}
}