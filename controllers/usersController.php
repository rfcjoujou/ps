<?php
class usersController extends Controller
{
	public function index() {
		header("Location: ".BASE_URL);
	}


	public function register() {
		$dados = array();

		if(!empty($_POST['name']) && isset($_POST['name'])) {
			if(!empty($_POST['email']) && !empty($_POST['cnpj']) && !empty($_POST['password'])) {
				$users = new Users();


				$name = addslashes($_POST['name']);
				$email = addslashes($_POST['email']);
				$cnpj = addslashes($_POST['cnpj']);
				$password = addslashes($_POST['password']);
				
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
		$users = new Users();


		if(!empty($_SESSION['cLogin'])) {
			

			$id = $_SESSION['cLogin'];

			$dados['user'] = $users->getUserbyId($id);
		


			/* P seria a variavél que indetifica que campo da tabela está sendo
			selecionado(para abri ele)*/

			if(!empty($_GET['p'])) {
				$p = $_GET['p'];

				if($p == 1) {
					/* pegaria a  tabela purchase(venda), e depois purchase(product)*/
					$dados['pagina'] = $users->myRequests($p, $id);
					print_r($dados['pagina']);

					exit;
				} else if($p == 2) {
					$address = new Users_address();
					$dados['user_address'] = $address->getInformation_address($id);

					
					$this->loadTemplate('endereco', $dados);
					exit;
				}


			}
			$this->loadTemplate('account', $dados);

		} else {
			header("Location: ".BASE_URL."login");
			exit;
		}


		
	}

	public function address() {
		if(!empty($_SESSION['cLogin'])) {
			if(!empty($_POST['cep'])) {
				if (!empty($_POST['rua']) && !empty($_POST['numero']) && !empty($_POST['bairro']) && !empty($_POST['cidade']) && !empty($_POST['estado'])) {

					$cidade_utf = utf8_encode($_POST['cidade']);
					echo $cidade_utf;
					exit;
					$us_address = new Users_address();

					$cep = addslashes($_POST['cep']);
					$rua = addslashes($_POST['rua']);
					$numero = addslashes($_POST['numero']);
					$bairro = addslashes($_POST['bairro']);
					$cidade = addslashes($_POST['cidade']);
					$estado = addslashes($_POST['estado']);

					
					
					$id = $_SESSION['cLogin'];
					$us_address->changeAddress($cep, $rua, $numero, $bairro, $cidade, $estado, $id);
				} 

					
					
					
			}


			header("Location: ".BASE_URL."users/account?p=2");

		} else {
			header("Location: ".BASE_URL."login");
			exit;
		}



		

		
		
	}



	public function logout() {
		unset($_SESSION['cLogin']);
		header("Location: ".BASE_URL);
		exit;
	}
}