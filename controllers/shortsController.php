<?php 
class shortsController extends Controller
{
	public function index() {
		$dados = array();
		$products = new Products();
		$f = new Filters();

		$id_category = array('category' => '1');
		/* Filtro de caracteristica dos produtos */
		$filters_caract = array();


		if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
			
			
			$filters_caract = $_GET['filter'];
			$p_value = $_GET['filter'];


		}

		$dados['filters_selected'] = $filters_caract;

		$product = $products->getProducts(0, $id_category, $filters_caract);



		if(!empty($product)) {
			$dados['products'] = $product;
			$dados['filters'] = $f->getFilters($filters_caract, $id_category['category'], $especif = array());

			

		}

		$this->loadTemplate('shorts', $dados);
	}
}