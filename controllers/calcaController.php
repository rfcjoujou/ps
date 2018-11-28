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
		

		$product = $products->getProducts(0, $id_category);

		if(!empty($product)) {
			$dados['products'] = $product;
			$dados['filters'] = $f->getFilters($filters_caract, $id_category['category'], $especif = array());

		}


		$this->loadTemplate('calca', $dados);
	}
}