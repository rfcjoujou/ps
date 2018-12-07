<?php 
class vestidoController extends Controller 
{

	public function index() {
		$store = new Store();
		$categoriesTemplate = new CategoriesTemplate();

		$dados = $store->getTemplateData();
		$filters['caract'] = 7;
		$dados = $categoriesTemplate->getTemplateCategories($filters);
		
		


		$this->loadTemplate('categories_products', $dados);
	}

}