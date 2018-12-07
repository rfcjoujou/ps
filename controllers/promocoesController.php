<?php 
class promocoesController extends Controller
{
	public function index() {
		$store = new Store();
		$categoriesTemplate = new CategoriesTemplate();


		
		$sale = array('sale' => '1');
		$especif = array();
		$dados = $store->getTemplateData();
		$filters = $sale;


		$dados = $categoriesTemplate->EspecifCategoriesOfProduct($filters, $especif);

		

		$this->loadTemplate("categories_products", $dados);
	}
}