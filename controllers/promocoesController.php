<?php 
class promocoesController extends Controller
{
	public function index() {
		$dados = array();
		$products = new Products();
		$f = new Filters();


		$sale = array('sale' => '1');
		$especif = array();
		
		$filters = $sale;

		/* Filtro de caracteristica dos produtos */
		$filters_caract = array();


		if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
			
			
			$filters_caract = $_GET['filter'];

		}

		$dados['filters_selected'] = $filters_caract;

		$filters['options'] = $filters_caract;
		if(!empty($filters['options']['options'])) {
			$filters['options'] = $filters['options']['options'];
		}




		$product = $products->getProducts(0, $filters, $filters_caract);


		$filters_caract = array('options' => $filters_caract);



		if(!empty($product)) {


			$dados['products'] = $product;


			$dados['filters'] = $f->getFilters($filters, $especif);

			

		} else {
			$dados['products'] = array();
			$dados['filters'] = array();

		}

		$this->loadTemplate("promocoes", $dados);
	}
}