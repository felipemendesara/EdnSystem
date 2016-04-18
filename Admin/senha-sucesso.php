<?php
	include('cabecalho-login.php');
?>

<?php

	$email = $_POST['email'];
	use Parse\ParseUser;
	try{
		$recupera = ParseUser::requestPasswordReset($email); ?>

		<form action="index.php" method="post" class="form-login">
			As instruções para redefinir a sua senha foram enviadas para o e-mail cadastrado!
          	<br>
          	<br>
          	<br>
          	<div class="form-buttons" id="form-btn">  
            	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btnLogin">
              		Voltar
            	</button>
          	</div>
		</form>
<?php }catch (Exception $erro){
		switch($erro->getCode()){
			case 204:
				$_SESSION['erroEmail'] = 'Preencha o campo com o seu e-mail cadastrado';
				break;
			case 205:
				$_SESSION['erroEmail'] = 'Nenhum usuário com o email '.$email.' foi encontrado.';
				break;
			default:
				$_SESSION['erroEmail'] = 'Algo deu errado! Tente novamente';
		}
		header("Location: esquecisenha.php");
		die();
	}
?>

<?php include('rodape-login.php') ?>