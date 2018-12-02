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
				$password_cont = strlen($password);

				print_r($password_cont);

				if($password_cont > 7) {

				
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
					$dados['error'] = 'O campo de Senha deve contér no mínimo 8 caracteres';
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
		$users_address = new Users_address();
		
		if(!empty($_SESSION['cLogin'])) {
			

			$id = $_SESSION['cLogin'];

			$dados['user'] = $users->getUserbyId($id);
		


			/* P seria a variavél que indetifica que campo da tabela está sendo
			selecionado(para abri ele)*/

			if(!empty($_GET['p'])) {
				$p = $_GET['p'];

				
				
				

				if($p == 1) {
					/* pegaria a  tabela purchase(venda), e depois purccthase(produ)*/

					
					

					$this->loadTemplate('myListOfBought', $dados);
					exit;
				} else if($p == 2) {
					/* Pagina de edição de endereço */
					$address = new Users_address();
					$dados['user_address'] = $address->getInformation_address($id);
					
					if(!empty($_POST['cep']) && !empty($_POST['rua']) && 
						!empty($_POST['numero']) && !empty($_POST['bairro']) && 
						!empty($_POST['cidade']) && !empty($_POST['estado'])) {



						$cep = addslashes($_POST['cep']);
						$rua = utf8_decode(addslashes($_POST['rua']));
						$numero = utf8_decode(addslashes($_POST['numero']));
						$bairro = utf8_decode(addslashes($_POST['bairro']));
						$cidade = utf8_decode(addslashes($_POST['cidade']));
						$estado = utf8_decode(addslashes($_POST['estado']));

						/* Se não tiver complemento, vai ser vazio:*/
						$complemento = '';

						if(!empty($_POST['complemento'])) {
							$complemento = utf8_decode(addslashes($_POST['complemento']));

							$users_address->Update_AdressUser($cep,$rua,$numero, $bairro,$cidade, $estado, $complemento, $id);
							header('Location: '.BASE_URL.'users/account/?p=2');
							exit;						

						} else {

							$users_address->Update_AdressUser($cep,$rua,$numero, $bairro,$cidade, $estado, $complemento, $id);
							header('Location: '.BASE_URL.'users/account/?p=2');
							exit;
						}



					}

					
					$this->loadTemplate('endereco', $dados);
					exit;
				}


			} else {




				if(!empty($_POST['name'])) {

					if(!empty($_POST['cpf']) && !empty($_POST['old_password'])) {

						$name = utf8_decode((addslashes($_POST['name'])));
						//$email = utf8_decode(addslashes($_POST['email']));
						$cpf = addslashes($_POST['cpf']);
						$old_password = addslashes($_POST['old_password']);
						



						if($users->existPassword($id, $old_password)) {
							if(!empty($_POST['new_password'])) {

								$new_password = addslashes($_POST['new_password']);
								$new_password_cont = strlen($new_password);

								if($new_password_cont > 7) {

									$users->updateInformationUser($id, $name, $cpf, $new_password);
									header('Location: '.BASE_URL.'users/account');
									exit;
								} else {
									$dados['error'] = 'Sua nova senha deve contér 8 caracteres';
								}
							} else {

								$users->updateInformationUser($id, $name, $cpf, $old_password);
								header('Location: '.BASE_URL.'users/account');
								exit;
							}
						} else {
							$dados['error'] = "Senha invalida, Tente novamente.";
						}


					} else {
						$dados['error'] = "Para alterar suas informações preencha todos os campos";
					}

				}

			}

			$this->loadTemplate('account', $dados);

		} else {

			header("Location: ".BASE_URL."login");
			exit;
		}


		
	}
/*
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



		

		
		 
	} */



	public function logout() {
		unset($_SESSION['cLogin']);
		header("Location: ".BASE_URL);
		exit;
	}
}