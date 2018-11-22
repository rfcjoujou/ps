<?php
class loginController extends Controller 
{
	public function index() {
		$dados = array(

			'error' => '',
			);


		if(isset($_POST['email'])) {
			if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cnpj'])) {
				$users = new Users();
				$email = addslashes($_POST['email']);
				$cnpj = addslashes($_POST['cnpj']);
				$password = addslashes($_POST['password']);
				/*Depois vamos mandar cnpj*/

				$cLogin = $users->logar($email, $password);
				if(!empty($cLogin)) {

					$_SESSION['cLogin'] = $cLogin;
					header("Location: ".BASE_URL);
					exit;
				} else {
					$dados['error'] = "Email e/ou senha incorreto(s)";
				}
				
			} else {
				$dados['error'] = 'Preencha todos os campos.';

			}

		}



		$this->loadTemplate('login', $dados);
	}

}