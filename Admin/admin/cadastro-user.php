<?php include("cabecalho-adm.php"); ?>


	<form class="form-login" action="cadastrar.php" method="post" enctype="multipart/form-data">
		<?php if(isset($_SESSION['erroCadastro'])){$mensagem = $_SESSION['erroCadastro']?> <p class="erro-login-msg"><?=$mensagem?></p> <?php unset($_SESSION['erroCadastro']); } ?>
		<table>
			<tr>
				<td>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" name="nome">
						<label class="mdl-textfield__label" for="nome">Nome</label>
						<span class="mdl-textfield__error">Digite seu nome.</span>
					</div>
					<br>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="email" name="email">
						<label class="mdl-textfield__label" for="email">Email</label>
						<span class="mdl-textfield__error">Digite seu e-mail.</span>
					</div>
					<br>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" name="username">
						<label class="mdl-textfield__label" for="username">Nome de usuário</label>
						<span class="mdl-textfield__error">Digite seu usuário.</span>
					</div>
					<br>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="password" name="senha">
						<label class="mdl-textfield__label" for="senha">Senha</label>
						<span class="mdl-textfield__error">Digite uma senha.</span>
					</div>
					
				</td>
				<td>
					<labe for="image">Foto do perfil:</label>
					<br>
					<input type="file" name="image">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btnLogin" type="submit">Cadastrar</button></td>
			</tr>
		</table>
	</form>

<?php include("rodape-adm.php"); ?>