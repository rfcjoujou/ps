<?php
class CategoriesTemplate extends model 
{

	public function getTemplateCategories($filters = array()) {
		$products = new Products();
		$f = new Filters();
		

		$filters_caract = array();

		if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
			
			
			$filters_caract = $_GET['filter'];

		}

		$dados['filters_selected'] = $filters_caract;


		$product = $products->getProducts(0, $filters, $filters_caract);


		$filters['options'] = $filters_caract;



		if(!empty($product)) {
			
			$dados['products'] = $product;


			$dados['filters'] = $f->getFilters($filters, $especif = array());

			
		}


		return $dados;


	}

	public function EspecifCategoriesOfProduct($filters, $especif) {
		/* Filtro de caracteristica dos produtos */
		$products = new Products();
		$f = new Filters();
		$filters_caract = array();


		if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
			
			
			$filters_caract = $_GET['filter'];

		}

		$dados['filters_selected'] = $filters_caract;

		$filters['options'] = $filters_caract;
		if(!empty($filters['options']['options'])) {
			$filters['options'] = $filters['options']['options'];
		}




		$product = $products->getProducts(0, $filters, $filters_caract);


		$filters_caract = array('options' => $filters_caract);



		if(!empty($product)) {


			$dados['products'] = $product;


			$dados['filters'] = $f->getFilters($filters, $especif);

			

		} else {
			$dados['products'] = array();
			$dados['filters'] = array();

		}


		return $dados;
	}


	public function getTemplateSearchCategories($filters, $product_search) {
		$products = new Products();
		$f = new Filters();


		$filters_caract = array();

		if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
			
			
			$filters_caract = $_GET['filter'];

		}

		$dados['filters_selected'] = $filters_caract;


		


		$filters['options'] = $filters_caract;


		$product = $product_search;
		if(!empty($product)) {
			foreach($product as $product_name) {
				$filters['name'][] = $product_name['name'];	
				$filters['description'][] = $product_name['description'];
			}
			


			$dados['products'] = $product_search;


			$dados['filters'] = $f->getFilters($filters, $especif = array());

			
		}


		return $dados;

	}

}