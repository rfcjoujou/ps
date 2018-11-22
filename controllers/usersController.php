<?php
class usersController extends Controller
{
	public function index() {

	}


	public function register() {
		$dados = array();

		if(!empty($_POST['name']) && isset($_POST['name'])) {
			if(!empty($_POST['email']) && !empty($_POST['cnpj']) && !empty($_POST['password'])) {
				$users = new Users();


				$name = $_POST['name'];
				$email = $_POST['email'];
				$cnpj = $_POST['cnpj'];
				$password = $_POST['password'];
				
				/* CNPJ VAI DEPOIS QUE EU DESCOBRIR COMO FAÇA A CONSULTA*/
				if($users->existEmail($email) == false) {

					$_SESSION['cLogin'] = $users->register_user($name, $email, $password);
					
					if(!empty($_SESSION['cLogin'])) {
						header("Location: ".BASE_URL."users/account");
						exit;
					}

				} else {
					$dados['error'] = "Esse e-mail já existe, tente novamente";

					/* Caso o usuário existir*/
				}
			} else {
				/* Algum campo vazio*/
				$dados['error'] = "Preencha todos os campos";
			}


		}
		

		$this->loadTemplate('register', $dados);
	}

	public function account() {
		$dados = array();

		if(!empty($_SESSION['cLogin'])) {
			$users = new Users();

			$id = $_SESSION['cLogin'];

			$dados['user'] = $users->getUserbyId($id);
		}

		$this->loadTemplate('account', $dados);
	}

	public function logout() {
		unset($_SESSION['cLogin']);
		header("Location: ".BASE_URL);
		exit;
	}
}