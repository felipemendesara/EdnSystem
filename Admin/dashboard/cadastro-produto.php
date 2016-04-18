<?php include ('cabecalho.php'); ?>

<?php

use Parse\ParseQuery;

$query = new ParseQuery("Categorias");
$categorias = $query->find();

?>

<?php

use Parse\ParseObject;
$result = new ParseObject("Produtos");
$result->set("nome","");
$result->set("valor","");
$result->set("categoria", "");
$result->set("quantidade","");

?>

<div class="mdl-card mdl-shadow--2dp" style="padding:20px;">
	<form method="post" action="cadastrar-produto.php" enctype="multipart/form-data">
    <?php if(isset($_SESSION['erroProduto'])){ $mensagem = $_SESSION['erroProduto']?> <p class="erro-login-msg"><?=$mensagem?></p> <?php unset($_SESSION['erroProduto']); } ?>
		<?php include('form-produto-base.php'); ?>
		<br>
        <div class="form-buttons" id="form-btn-cadastro-produto">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btnLogin">Cadastrar</button>
        </div>
    </form>	
</div>


<?php include ('rodape.php'); ?>