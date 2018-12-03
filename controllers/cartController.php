<?php
class cartController extends Controller
{
	public function index() {
		$dados = array();
		$products = new Products();
		$cart = new Cart();

		if(empty($_SESSION['cLogin'])) {
			header('Location: '.BASE_URL.'login');
			exit;
		}

		/* Veirifcação para ve se tem algum produto no carrinho, se não tiver redireciona*/
		if(!isset($_SESSION['cart']) || (isset($_SESSION['cart']) && count($_SESSION['cart']) == 0)) {
			header("Location: ".BASE_URL);
			exit;
		}

		$dados['productsInCart'] = $cart->getListOfProductsInCart();



		$this->loadTemplate('cart', $dados);
	}

	public function add() {



		if(!empty($_POST['id_product']) && !empty($_POST['qt_product'])) {
			$id = intval(addslashes($_POST['id_product']));
			$qt = intval(addslashes($_POST['qt_product']));


			if(!isset($_SESSION['cart'])) {
				$_SESSION['cart'] = array();
			} 
			


			if(isset($_SESSION['cart'][$id])) {

				$_SESSION['cart'][$id] =  $_SESSION['cart'][$id] + $qt;



			} else {
				
				$_SESSION['cart'][$id] = $qt;
			}

		}


		header("Location: ".BASE_URL);
		

	}
}