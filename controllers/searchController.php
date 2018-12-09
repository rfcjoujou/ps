<?php
class searchController extends Controller 
{
	public function index() {
		$store = new Store();
				
		
		print_r($_GET);
		
		
		$dados = $store->getTemplateData();
		$busca = "";
		$busca = trim($_GET['busca']);


		if(isset($busca) && !empty($busca)) {
			

			$products = new Products();
			$categoriesTemplate = new CategoriesTemplate();

            $busca = utf8_decode($_GET['busca']);


            $filters = array();

            $product_search = $products->getProductsBySearch($busca);

            $dados['FilterSearch'] = $categoriesTemplate->getTemplateSearchCategories($filters, $product_search);

            $dados['busca'] = array('busca' => $busca);
            $this->loadTemplate('Search_products', $dados);
        } else {
        	//header('Location: '.BASE_URL);
        	exit;
        }



	}
}