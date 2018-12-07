<?php 
class shortsController extends Controller
{
	public function index() {
		$store = new Store();
		$categoriesTemplate = new CategoriesTemplate();


		
		$dados = $store->getTemplateData();



		$filters['caract'] = '1';
		$dados = $categoriesTemplate->getTemplateCategories($filters);

		

		$this->loadTemplate('categories_products', $dados);
	}
}