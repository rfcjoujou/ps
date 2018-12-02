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
<div style="background-image: linear-gradient(to right, #8e8e8e, #ccc);">
	<div class="row">
		<div class="col-sm">
			<div class="perfil">
					
				<div class="information"> 
					<br/>		
					<h4 style="text-align:center;">Informações de endereço</h4><br/>
					<form action="<?php echo  BASE_URL; ?>users/account?p=2" method="POST">
						<?php header('Content-Type: text/html; charset=utf-8'); ?>
						<label for="cep">CEP:</label>
						<input type="text" name="cep" value="<?php echo utf8_encode($user_address['cep']); ?>" class="form-control" />
							

						<label for="rua">Rua:</label>
						<input type="text" name="rua" value="<?php echo utf8_encode($user_address['rua']); ?>" class="form-control" />

						<label for="numero">Numero:</label>
						<input type="text" name="numero" value="<?php echo utf8_encode($user_address['numero']); ?>" class="form-control" />

						<label for="complemento">Complemento:</label>
						<input type="text"  name="complemento" value="<?php echo utf8_encode($user_address['complemento']); ?>" class="form-control" />


						<label for="bairro">Bairro:</label>
						<input type="text" name="bairro" value="<?php echo utf8_encode($user_address['bairro']); ?>" class="form-control" />

						<label for="cidade">Cidade:</label>
						<input type="text" name="cidade" value="<?php echo utf8_encode($user_address['cidade']); ?>" class="form-control" />


							

						<label for="estado">Estado:</label>
						<input type="text" name="estado" value="<?php echo utf8_encode($user_address['estado']); ?>" class="form-control" />


							
						
						<br/>
								
						<input type="submit" class="form-control submit_edit" value="Salvar alteração" />

					</form><br/>



				</div>

			</div>
		</div>
	</div>
</div>





