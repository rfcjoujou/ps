<?php
class cartController extends Controller
{
	public function index() {
		$dados = array();
		$products = new Products();

		if(empty($_SESSION['cLogin'])) {
			header('Location: '.BASE_URL.'login');
			exit;
		}





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