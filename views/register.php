<?php if(!empty($_SESSION['cLogin'])) {
	header("Location: ".BASE_URL."users/account");
	exit;
}
?>
<div class="row">
	<div class="col-sm-5 form_login" id="form_register"><br/>
		<h3>Registrar</h3><br/>

		<?php if(!empty($error)): ?>
			<div class="alert alert-warning"><?php echo $error; ?></div>

		<?php endif; ?>
		<form method="POST">
			<label for="name">Nome:</label>
			<input type="text" name="name" class="form-control" placeholder="seu nome."/><br/>

			<label for="email">E-mail:</label>
			<input type="email" placeholder=" seu email." name="email" class="form-control" /><br/>

			<label for="cnpj">CNPJ:</label>
			<input type="text" name="cnpj" class="form-control" placeholder="seu cnpj." /><br/>

			<label for="password">Senha:</label>
			<input class="form-control" type="password" placeholder="sua senha." name="password" /><br/>

			<input class="form-control btn btn-outline-dark" type="submit" value="Registrar"/>

		</form>
	</div>
</div>