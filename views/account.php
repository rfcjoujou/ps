

<div class="row">
	<div class="col-sm">
		<div class="painel_btns">
			<div class="painel_container">
				<a href="<?php echo BASE_URL; ?>users/account?p=0" class="btn ">Painel</a>

				<a href="<?php echo BASE_URL; ?>users/account?p=1" class="btn ">Meus Pedidos</a>
				<a href="<?php echo BASE_URL; ?>users/account?p=2" class="btn ">Endereço</a>
				<a href="<?php echo BASE_URL; ?>users/account?p=3" class="btn">Lista de Desejos</a>

				<a  href="<?php echo BASE_URL; ?>users/logout" class="btn btn_logout">Sair</a>
			</div>


		</div>
	</div>
</div> 
<div style="background-color:#d4d4d4;width:98.6%;margin-left:7px">
	<div class="row">
		<div class="col-sm">
			<div class="perfil">
				
				<div class="information"> 
					<h5 style="text-align:center;">Olá, <?php echo utf8_encode($user['name']); ?>.</h5><p>Aqui você pode alterar 
						suas informações, e ter acesso a sua lista de desejos, e gerenciar suas notificações.</p>
					
						<?php if(!empty($error)): ?>
						<div class="alert alert-warning"><?php echo $error; ?></div>
						<?php endif; ?>

					<form method="POST">
						<?php header('Content-Type: text/html; charset=utf-8'); ?>
						<label for="name">Nome:</label>
						<input type="text" value="<?php echo utf8_encode($user['name']); ?>" class="form-control"  name="name"/>
						
						<label for="email"> Email:</label>
						<input type="text" disabled value="<?php echo $user['email']; ?>" class="form-control"  name="email"/>
						<label>CPF:</label>
						<input type="text" name="cpf" value="<?php echo $user['cpf']; ?>" class="form-control" />
					
						<label for="password">Senha Atual:</label>
						<input type="password"  class="form-control" placeholder="digite sua senha" name="old_password"/>
				
						<label for="new_password" style="display:none;">Nova Senha:</label>
						<input type="password" class="form-control" placeholder="digite sua senha" style="display:none;" name="new_password"/>
						<br/>

						<input type="submit" class="form-control" value="Salvar alteração" />

					</form>
					<a href="" style="margin-left:70px;color:#fff;" id="Update_password">Clique aqui para alterar sua senha</a>



				</div>

			</div>
		</div>
	</div>
</div>





