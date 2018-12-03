<?php 
class lancamentoController extends Controller 
{
	public function index() {
		$dados = array();
		$filters_caract = array();	/* Filtro de caracteristica dos produtos */
		$dados = array();


		$products = new Products();
		$f = new Filters();



		$filters = array('new_product' => '1');
		$especif = array();
		
		


		if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
			
			
			$filters_caract = $_GET['filter'];

		}

		$dados['filters_selected'] = $filters_caract;

		$filters['options'] = $filters_caract;

		if(!empty($filters['options']['options'])) {
			$filters['options'] = $filters['options']['options'];
		}




		/*$filters_caract = array('options' => $filters_caract);*/

		
		$product = $products->getProducts(0, $filters, $filters_caract);
	
		if(!empty($product)) {


			$dados['products'] = $product;


			$dados['filters'] = $f->getFilters($filters, $especif);

			

		} else {
			$dados['products'] = array();
			$dados['filters'] = array();

		}


		$this->loadTemplate('categories_products', $dados);
	}
}
