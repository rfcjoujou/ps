

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
			E-mail:<br/>
			<input type="email" placeholder="Escreva seu email aqui" name="email" class="form-control" /><br/><br/>

			CNPJ:<br/>
			<input type="text" name="cnpj" class="form-control" /><br/><br/>

			Senha:<br/>
			<input class="form-control" type="password" name="password" /><br/>

			<input class="form-control btn btn-outline-dark" type="submit" value="Logar"/>
			
			
		</form><br/>
		<p>
			Não tem conta?<a href="<?php echo BASE_URL; ?>users/register" style="margin:auto;" class="botao_user register">Cadastre-se</a>.
		</p> 
	</div>

</div>