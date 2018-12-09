<?php 
class lancamentoController extends Controller 
{
	public function index() {
		$store = new Store();
		$categoriesTemplate = new CategoriesTemplate();



		$dados = $store->getTemplateData();

		$filters = array('new_product' => '1');
		$especif = array();
		$dados = $categoriesTemplate->EspecifCategoriesOfProduct($filters, $especif);
		


		

		$this->loadTemplate('categories_products', $dados);
	}
}
