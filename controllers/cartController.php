<?php
class cartController extends Controller
{
	public function index() {
		$store = new Store();
		$products = new Products();
		$cart = new Cart();

		$dados = $store->getTemplateData();
		if(empty($_SESSION['cLogin'])) {
			header('Location: '.BASE_URL.'login');
			exit;
		}
		
		/* Veirifcação para ve se tem algum produto no carrinho, se não tiver redireciona*/
		if(!isset($_SESSION['cart']) || isset($_SESSION['cart']) && count($_SESSION['cart']) == 0) {
			
			header("Location: ".BASE_URL);
			exit;
		}	
	

		if(!isset($_SESSION['option_car'])  || isset($_SESSION['option_car']) && empty($_SESSION['option_car'])) {

			header("Location: ".BASE_URL);
			exit;
		}
			

		foreach($_SESSION['option_car'] as $chave => $valor) {
			foreach($valor as $vl_verify) {
				if(empty($vl_verify)) {
					header("Location: ".BASE_URL);
					exit;
				}
			}
		}


		$productsInCart = $cart->getListOfProductsInCart();


		foreach($productsInCart as $prod_Carts_value) {



			$id = $prod_Carts_value['id'];
			$id_sub_cor = $prod_Carts_value['id_sub_cor'];
			$id_option_size = $prod_Carts_value['size'];
				
			$_SESSION['option_car'][$id][$id_sub_cor][$id_option_size]['product_info'] = $prod_Carts_value;
			

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


				
				if(isset($_SESSION['cart'][$id][$id_option_cor][$id_option_size]) &&
					!empty($_SESSION['cart'][$id][$id_option_cor][$id_option_size]) &&
					$_SESSION['cart'][$id][$id_option_cor][$id_option_size]['color'] == $color
				) {

					
					
					foreach($_SESSION['cart'][$id][$id_option_cor] as $value) {
						
						if($value['size'] == $id_option_size) {
							

							$val_SumQtd = $value['qt'] + $qt;
						}

						
						
					}


					$_SESSION['cart'][$id][$id_option_cor][$id_option_size] = array('color' =>$color, 'id_sub_cor' => $id_option_cor ,'size' => $id_option_size ,$id_option_size => array('tamanho' => $tamanho), 'qt' => $val_SumQtd);
					$_SESSION['option_car'][$id][$id_option_cor][$id_option_size]  = array('color' =>$color, 'id_sub_cor' => $id_option_cor, 'size' => $id_option_size , 'tamanho' => $tamanho, 'qt' => $val_SumQtd);
				} else {

					$_SESSION['cart'][$id][$id_option_cor][$id_option_size] = array('color' =>$color, 'id_sub_cor' => $id_option_cor ,'size' => $id_option_size ,$id_option_size => array('tamanho' => $tamanho), 'qt' => $qt);
					$_SESSION['option_car'][$id][$id_option_cor][$id_option_size]  = array('color' =>$color, 'id_sub_cor' => $id_option_cor, 'size' => $id_option_size , 'tamanho' => $tamanho, 'qt' => $qt);



					
				}
				/* Tenho que fazer caso o usuário não preencha todos os dados, eu dou uma aviso para ele*/

				 header("Location: ".BASE_URL);
			
			}
		} else {

			header("Location: ".BASE_URL.'login');
		}

		
		

	}

	public function del($id, $id_sub_cor = 0, $id_option_size = 0) {


		if(!empty($id) && !empty($id_sub_cor) && !empty($id_option_size)) {
			$quantidade = $_SESSION['cart'][$id][$id_sub_cor][$id_option_size]['qt'];
			if($quantidade > 1) {
				$_SESSION['cart'][$id][$id_sub_cor][$id_option_size]['qt'] -= 1;
				$_SESSION['option_car'][$id][$id_sub_cor][$id_option_size]['qt'] -= 1;
				header("Location: ".BASE_URL."cart");
				exit; 			
			}else {
				unset($_SESSION['cart'][$id][$id_sub_cor][$id_option_size]); 
				unset($_SESSION['option_car'][$id][$id_sub_cor][$id_option_size]); 
				header("Location: ".BASE_URL."cart");
				exit; 												
			}

		} elseif(!empty($id) && empty($id_sub_cor) && empty($id_option_size)) {

			$quantidade = $_SESSION['cart'][$id][$id_sub_cor][$id_option_size]['qt'];

			if($quantidade > 1) {
				$_SESSION['cart'][$id][$id_sub_cor][$id_option_size]['qt'] -= 1;
				$_SESSION['option_car'][$id][$id_sub_cor]['qt'] -= 1;
				header("Location: ".BASE_URL."cart");
				exit; 
			}else {
				unset($_SESSION['cart'][$id][$id_sub_cor][$id_option_size]); 
				unset($_SESSION['option_car'][$id][$id_sub_cor][$id_option_size]);
				header("Location: ".BASE_URL."cart");
				exit; 
			}


		}


		header("Location: ".BASE_URL."cart");
		exit;
	}
}