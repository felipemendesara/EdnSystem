<?php include('cabecalho.php'); ?>

<?php 
$id = $_GET['id'];

use Parse\ParseQuery;

$query = new ParseQuery("Produtos");
$query->equalto("objectId",$id);
$results = $query->find();

foreach ($results as $result) {
	$nome = $result->get('nome');
	$quantidade = $result->get('quantidade');
	$valor = $result->get('valor');
	$categoria = $result->get('categoria');

	$foto = $result->get('foto');
	if($foto !== null){
		$produto_foto = $foto->getURL();
	}else{
		$produto_foto = "../img/produtodefault.jpg";
	}
}

?>

<div class="detalhe-produto" >
	<div class="lado-esquerdo">
		<b><?=$nome?></b>
		<figure><img src="<?=$produto_foto?>" class="produto-avatar"></figure>
	</div>
	<div class="lado-direito">	
		<b>Quantidade:</b> <?=$quantidade?><br>
		<b>Valor:</b> $<?=$valor?><br>
		<b>Categoria:</b> <?=$categoria?>
	</div>
	<div><a href="alterar-produto.php?id=<?=$id?>">Editar produto</a>
</div>




<?php include('rodape.php'); ?>