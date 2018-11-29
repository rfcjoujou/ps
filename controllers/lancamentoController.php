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


		if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
			
			
			$filters_caract = $_GET['filter'];


		}

		$dados['filters_selected'] = $filters_caract;
		
		
		$product = $products->getProducts(0, $new_product, $filters_caract);
		if(!empty($product)) {
			$especif = $new_product;

			$dados['products'] = $product;
			$dados['filters'] = $f->getFilters($filters_caract, 0, $especif);
		}


		$this->loadTemplate('lancamento', $dados);
	}
}