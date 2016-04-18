<?php
	include('cabecalho-login.php');
?>

	<form action="senha-sucesso.php" method="post" class="form-login">
		<?php if(isset($_SESSION['erroEmail'])){ $mensagem = $_SESSION['erroEmail']?><p class="erro-login-msg"><?=$mensagem?></p> <?php unset($_SESSION['erroEmail']); } ?>
		Digite o seu e-mail de usuário
	    <br>
	    <br>
	    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
	        <input class="mdl-textfield__input" type="email" id="user" name="email"  />
	        <label class="mdl-textfield__label" for="user">E-mail de usuário</label>
	    	<span class="mdl-textfield__error">Digite um email de usuário válido.</span>
	    </div>
	    <br>        
	    <div class="form-buttons" id="form-btn">  
	    	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btnLogin" id="enviar-user">Enviar</button>
	    </div>
	</form>

<?php include('rodape-login.php') ?>