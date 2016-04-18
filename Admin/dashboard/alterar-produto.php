<?php include ('cabecalho.php'); ?>

<?php
use Parse\ParseQuery;
$query = new ParseQuery("Categorias");
$categorias = $query->find();
?>

<?php
$id = $_GET['id'];

$query = new ParseQuery("Produtos");
$query->equalto("objectId", $id);
$results = $query->find();

foreach ($results as $result) {
	# code...
}

?>

<div class="mdl-card mdl-shadow--2dp" style="padding:20px;">
	<form method="post" action="altera-produto.php?id=<?=$id?>" enctype="multipart/form-data">
    <?php if(isset($_SESSION['erroProduto'])){ $mensagem = $_SESSION['erroProduto']?> <p class="erro-login-msg"><?=$mensagem?></p> <?php unset($_SESSION['erroProduto']); } ?>
		<?php include('form-produto-base.php'); ?>
		<br>
        <div class="form-buttons" id="form-btn-cadastro-produto">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btnLogin">Alterar</button>
        </div>
    </form>	
</div>


<?php include ('rodape.php'); ?>