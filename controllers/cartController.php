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

		if(!isset($_SESSION['option_car']) || (isset($_SESSION['option_car']) && count($_SESSION['option_car']) == 0)) {
			header("Location: ".BASE_URL);
			exit;
		}
			

							

		$dados['options_prod_cart'] =  $_SESSION['option_car'];

		$dados['productsInCart'] = $cart->getListOfProductsInCart();




		$this->loadTemplate('cart', $dados);
	}

	public function add() {


		if(!empty($_SESSION['cLogin'])) {

			if(!empty($_POST['id_product']) && !empty($_POST['qt_product']) && !empty($_POST['option_cor']) && !empty($_POST['option_tamanho'])) {
				$id = intval(addslashes($_POST['id_product']));
				$qt = intval(addslashes($_POST['qt_product']));
				$color = addslashes($_POST['option_cor']);
				$tamanho = addslashes($_POST['option_tamanho']);

				if(!isset($_SESSION['cart'])) {
					$_SESSION['cart'] = array();
					$_SESSION['option_cart'] = array();
				} 

				



				/* Tenho que indetificar pela opção já que ela vai mudar, ao invés do id.*/
	
				if(isset($_SESSION['cart'][$id][$color]) && 
					$_SESSION['cart'][$id][$color]['color'] == $color && 
					$_SESSION['cart'][$id][$color]['tamanho'] == $tamanho
					) {
					echo 'entrou if';
					foreach($_SESSION['cart'][$id] as $qt_val) {

						$qt_val = intval($qt_val['qt']);

						$qt_value = $qt_val + $qt;
					}

					$_SESSION['cart'][$id][$color] = array('qt' => $qt_value, 'id' => $id);

					

				} else {
					echo 'entrou else ';
					$_SESSION['cart'][$id][$color] = array('color' =>$color, 'tamanho' => $tamanho, 'qt' => $qt, 'id' => $id);
					$_SESSION['option_car'][$id][$color] = array('color' =>$color, 'tamanho' => $tamanho, 'id' => $id);
				
				}

			}
			//header("Location: ".BASE_URL);
		} else {
			header("Location: ".BASE_URL.'login');
		}

		
		

	}
}