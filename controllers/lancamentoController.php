<?php 
class lancamentoController extends Controller 
{
	public function index() {
		$dados = array();
		/* Filtro de caracteristica dos produtos */
		$filters_caract = array();
		$new_product = array('new_product' => '1');

		$products = new Products();
		$f = new Filters();



		$product = $products->getProducts(0, $new_product);
		if(!empty($product)) {
			$especif = $new_product;

			$dados['products'] = $product;
			$dados['filters'] = $f->getFilters($filters_caract, 0, $especif);
		}

		$this->loadTemplate('lancamento', $dados);
	}
}