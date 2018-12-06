<?php 
class productsController extends Controller 
{
	public function index() {
		header('Location: '.BASE_URL);
		exit;

		
	}

	public function open($id) {
		$store = new Store();
		$products = new Products();
		$image = new Products_images();


		$dados = $store->getTemplateData();
		
		if(!empty($id)) {
			$id = addslashes($id);
			$info = $products->getInfoProducts($id);

			if(!empty($info)) {
				$dados['products'] = $info;
				$dados['prod_images'] = $image->getImagesProducts($id);
				$dados['quantity_stock_option'] = $products->getQuantityOptionById($id);



				$this->loadTemplate('products_open', $dados);
			} else {
				header('Location: '.BASE_URL);
				exit;
			}

		} else {
			header("Location: ".BASE_URL);
			exit;
		}


	}
}