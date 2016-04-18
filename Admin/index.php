<?php
	include('cabecalho-login.php');
?>

<?php
	use Parse\ParseUser;
	$currentUser = ParseUser::getCurrentUser();

	if($currentUser){
		unset($_SESSION['erroLogin']);
		header("Location: dashboard/index.php");
		die();
	}else{ ?>

		<form action="login.php" method="post" class="form-login">
			<?php if(isset($_SESSION['erroLogin'])){ $mensagem = $_SESSION['erroLogin']?> <p class="erro-login-msg"><?=$mensagem?></p> <?php unset($_SESSION['erroLogin']); } ?>
		    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		        <input class="mdl-textfield__input" type="text" id="user" name="user" maxlength="20" autofocus="" />
		        <label class="mdl-textfield__label" for="user" maxlength="20">Usuário</label>
		        <span class="mdl-textfield__error">Digite seu usuário.</span>
		    </div>
		    <br>
		    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    	<input class="mdl-textfield__input" type="password" id="pass" name="pass" maxlength="40" />
		        <label class="mdl-textfield__label" for="pass">Senha</label>
		        <span class="mdl-textfield__error">Digite a sua senha.</span>
			</div>
			<br>
		    <br>
		    <div class="form-buttons" id="form-btn">  
		        <a id="esqueci" class="mdl-button mdl-js-button mdl-button--primary" href="esquecisenha.php">Esqueci a senha</a>
		        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btnLogin">Entrar</button>
		    </div>
		</form>
		        
<?php } ?>

<?php include('rodape-login.php') ?>