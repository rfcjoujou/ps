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

		


		$product = $products->getProducts(0, $sale);

		if(!empty($product)) {
			$especif = $sale;

			$dados['products'] = $product;
			$dados['filters'] = $f->getFilters($filters_caract, 0, $especif);
		}

		$this->loadTemplate("promocoes", $dados);
	}
}