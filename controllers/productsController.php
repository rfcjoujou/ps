<?php 
class productsController extends Controller 
{
	public function index() {
		header('Location: '.BASE_URL);
		exit;

		
	}

	public function open($id) {
		$dados = array();
		$products = new Products();
		$image = new Products_images();

		if(!empty($id)) {
			$id = addslashes($id);
			$info = $products->getInfoProducts($id);

			if(!empty($info)) {
				$dados['prod_info'] = $info;
				$dados['prod_images'] = $image->getImagesProducts($id);
				$dados['prod_options'] = $products->getOptionsById($id);

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