

<?php if(!empty($_SESSION['cLogin'])) {
	header("Location: ".BASE_URL."users/account");
	exit;
}
?>
<div class="row form_user" style="margin-top:50px;">
	<div class="col-sm-5 form_login">
		<h3>Acesse sua conta ou Cadastre-se</h3>


		<?php if(!empty($error)): ?>
		<div class="alert alert-warning"><?php echo $error; ?></div>

		<?php endif; ?>
		
		<form method="POST" >
			<label for="email">E-mail</label>
			<input type="email" placeholder="Escreva seu email aqui" name="email" class="form-control" /><br/>



			<label for="password">Senha</label>
			<input class="form-control" type="password" name="password" /><br/>

			<input class="form-control btn btn_logar" type="submit" value="Entrar"/>
			
			
		</form><br/>
		<p>
			Não tem conta?<a href="<?php echo BASE_URL; ?>users/register" style="margin:auto;" class="botao_user register">Cadastre-se</a>.
		</p> 
	</div>

</div>