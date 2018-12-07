<?php 
class calcaController extends Controller
{
	public function index() {
		$store = new Store();
		$categoriesTemplate = new CategoriesTemplate();


		$dados = $store->getTemplateData();
		$filters['caract'] = 2;
		$dados = $categoriesTemplate->getTemplateCategories($filters);
		
		


		$this->loadTemplate('categories_products', $dados);
	}
}