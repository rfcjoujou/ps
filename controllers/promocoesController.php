<?php 
class promocoesController extends Controller
{
	public function index() {
		$dados = array();
		/* Filtro de caracteristica dos produtos */
		$filters_caract = array();
		$sale = array('sale' => '1');

		$products = new Products();
		$f = new Filters();


		if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
			
			
			$filters_caract = $_GET['filter'];


		}

		$dados['filters_selected'] = $filters_caract;
		


		$product = $products->getProducts(0, $sale, $filters_caract);

		if(!empty($product)) {
			$especif = $sale;

			$dados['products'] = $product;
			$dados['filters'] = $f->getFilters($filters_caract, 0, $especif);
		}

		$this->loadTemplate("promocoes", $dados);
	}
}