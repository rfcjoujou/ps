<?php 
class calcaController extends Controller
{
	public function index() {
		$dados = array();
		/* Filtro de caracteristica dos produtos */
		$filters_caract = array();
		$id_category = array('category' => 2);

		$products = new Products();
		$f = new Filters();
		
		if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
			
			
			$filters_caract = $_GET['filter'];


		}

		$dados['filters_selected'] = $filters_caract;
		

		$product = $products->getProducts(0, $id_category, $filters_caract);

		if(!empty($product)) {
			$dados['products'] = $product;
			$dados['filters'] = $f->getFilters($filters_caract, $id_category['category'], $especif = array());

		}


		$this->loadTemplate('calca', $dados);
	}
}