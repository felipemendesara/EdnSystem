<?php include ('cabecalho.php'); ?>

<?php 
use Parse\ParseObject;
$result = new ParseObject("Eventos");
$result->set("nome","");
$result->set("cliente","");
$result->set("cep","");
$result->set("rua","");
$result->set("numero","");
$result->set("bairro","");
$result->set("cidade","");
$result->set("estado","");
$result->set("data","");
?>


<?php if(isset($_SESSION['erroEvento'])){ $mensagem = $_SESSION['erroEvento']?> <p class="erro-login-msg"><?=$mensagem?></p> <?php unset($_SESSION['erroEvento']); } ?>
<div class="mdl-card mdl-shadow--2dp" style="padding:20px;">
	<form method="post" action="cadastrar-evento.php" enctype="multipart/form-data">
		<?php if(isset($_SESSION['erroEvento'])){
			$mensagem = $_SESSION['erroEvento']?><p class="erro-login-msg"><?=$mensagem?></p> <?php unset($_SESSION['erroEvento']);
		} ?>
		<?php include('form-evento-base.php'); ?>
		<br>
		<div class="form-buttons" id="form-btn-cadastro-produto">
			<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btnLogin">Criar evento</button>
		</div>
	</form>
</div>




<?php include ('rodape.php'); ?>


