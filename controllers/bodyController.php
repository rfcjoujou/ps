<?php 
class bodyController extends Controller 
{

	public function index() {
		$store = new Store();
		$categoriesTemplate = new CategoriesTemplate();



		$filters['caract'] = 3;
		$dados = $categoriesTemplate->getTemplateCategories($filters);
		
		

		$this->loadTemplate('categories_products', $dados);
	}

}