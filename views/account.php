

<div class="row">
	<div class="col-sm">
		<div class="painel_btns">
			<div class="painel_container">
				<a href="" class="btn ">Painel</a>

				<a href="" class="btn ">Meus Pedidos</a>
				<a href="" class="btn ">Endereço</a>
				<a href="" class="btn">Lista de Desejos</a>

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
					<form>

						<label>Seu Nome:</label>
						<input type="text" value="<?php echo utf8_encode($user['name']); ?>" class="form-control"  name="email"/>
						<label for="email">Seu Email:</label>
						<input type="text"  value="<?php echo $user['email']; ?>" class="form-control"  name="email"/>
						<label>Seu CPF:</label>
						<input type="text" name="cpf" class="form-control" />
					
						<label for="password">Sua Senha:</label>
						<input type="password" class="form-control" placeholder="digite sua senha" name="password"/><br/>
							
						<input type="submit" class="form-control" value="Salvar alteração" />

					</form>



				</div>

			</div>
		</div>
	</div>
</div>





