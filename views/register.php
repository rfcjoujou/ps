<?php if(!empty($_SESSION['cLogin'])) {
	header("Location: ".BASE_URL."users/account");
	exit;
}
?>
<div class="row">
	<div class="col-sm-5 form_login" id="form_register"><br/>
		<h3>Registre-se</h3>
		<br/>
		<?php if(!empty($error)): ?>
			<div class="alert alert-warning"><?php echo $error; ?></div><br/>

		<?php endif; ?>
		<form method="POST" style="margin-bottom:50px;margin-top:-25px;">
			<label for="name">Nome:</label>
			<input type="text" name="name" class="form-control" placeholder="seu nome."/><br/>

			<label for="email">E-mail:</label>
			<input type="email" placeholder=" seu email." name="email" class="form-control" /><br/>

			<label for="cnpj">CNPJ/CPF:</label>
			<input type="text" name="cnpj" class="form-control" placeholder="seu cnpj." /><br/>

			<label for="password">Senha:</label>
			<input class="form-control" type="password" placeholder="sua senha." name="password" /><br/>

			<input class="form-control btn btn_register" type="submit" value="Registre-se"/>

		</form>
	</div>
</div>