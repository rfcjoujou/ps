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

		$product = $products->getProducts(0, $id_category);



		if(!empty($product)) {
			$dados['products'] = $product;
			$dados['filters'] = $f->getFilters($filters_caract, $id_category['category'], $especif = array());

			

		}

		$this->loadTemplate('shorts', $dados);
	}
}