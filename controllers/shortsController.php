<?php 
class shortsController extends Controller
{
	public function index() {
		$store = new Store();
		$products = new Products();
		$f = new Filters();

		
		$dados = $store->getTemplateData();
		$filters['caract'] = '1';
		/* Filtro de caracteristica dos produtos */
		$filters_caract = array();


		if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
			
			
			$filters_caract = $_GET['filter'];

		}

		$dados['filters_selected'] = $filters_caract;


		$product = $products->getProducts(0, $filters, $filters_caract);


		$filters['options'] = $filters_caract;



		if(!empty($product)) {
			
			$dados['products'] = $product;


			$dados['filters'] = $f->getFilters($filters, $especif = array());

			

		}

		$this->loadTemplate('categories_products', $dados);
	}
}