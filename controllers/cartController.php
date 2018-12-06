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
			
				

		


		$productsInCart = $cart->getListOfProductsInCart();


		foreach($productsInCart as $prod_Carts_value) {



			$id = $prod_Carts_value['id'];
			$id_sub_cor = $prod_Carts_value['id_sub_cor'];
				
			$_SESSION['option_car'][$id][$id_sub_cor]['product_info'] = $prod_Carts_value;
			

		}

		
		
		$dados['options_prod_cart'] = $_SESSION['option_car']; 


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

				$products = new Products();

				$id_option_size = $products->getId_p_valueByp_value($tamanho);
				 
				$id_option_cor = $products->getId_p_valueByp_value($color);
					
				foreach($id_option_size as $value_size) {

					$id_option_size  = $value_size['id_p_value'];
				}

				//print_r($id_option_size);
				foreach($id_option_cor as $value_color) {
					$id_option_cor  = $value_color['id_p_value'];
				}
				
				if(isset($_SESSION['cart'][$id][$id_option_cor])) {
/*					foreach($_SESSION['cart'][$id][$id_option_cor] as $key => $value) {
						$value += $qt;
					}*/
					$_SESSION['cart'][$id][$id_option_cor] = array('color' =>$color, $id_option_size => array('tamanho' => $tamanho), 'qt' => $value);
					print_r($value);

				} else {

					$_SESSION['cart'][$id][$id_option_cor] = array('color' =>$color, 'id_sub_cor' => $id_option_cor ,'size' => $id_option_size ,$id_option_size => array('tamanho' => $tamanho), 'qt' => $qt);
					
					$_SESSION['option_car'][$id][$id_option_cor]  = array('color' =>$color, 'id_sub_cor' => $id_option_cor, 'size' => $id_option_size , 'tamanho' => $tamanho, 'qt' => $qt);



					
				}


				/* Problema euy adiciono dois itens dentro de compra(com id iguias e opções diferentes),
				 e no caso os dois itens tão entrando dentro do foreach e somando sendo assim ta dando 
				 um erro(deveria só adicionar o id que o usuário "clico para comprar");
				 */

			
			}
			header("Location: ".BASE_URL);
		} else {
			header("Location: ".BASE_URL.'login');
		}

		
		

	}
}