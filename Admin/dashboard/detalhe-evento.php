<?php include('cabecalho.php'); ?>
   
<?php 
$id = $_GET['id'];

use Parse\ParseQuery;

$query = new ParseQuery("Eventos");
$query->equalto("objectId",$id);
$results = $query->find();


foreach ($results as $result) {

    $datetime = $result->get('data');
    $data = $datetime->format('d/m/Y');
    $hora = $datetime->format('H:i');

	$nome = $result->get('nome');
	$valor = $result->get('valorEvento');
	$cidade = $result->get('cidade');
	$rua = $result->get('rua');
	$bairro = $result->get('bairro');
	$estado = $result->get('estado');
	$numero = $result->get('numero');
		$numero = $result->get('numero');


	$foto = $result->get('capa');
	if($foto !== null){
		$evento_foto = $foto->getURL();
	}else{
		$evento_foto = "../img/produtodefault.jpg";
	}
}

?>

<div class="detalhe-produto" >
	<div class="lado-esquerdo">
		<b><?=$nome?></b>
		<figure><img src="<?=$evento_foto?>" class="produto-avatar"></figure>
	</div>
	<div class="lado-direito">	
		<b>Valor do evento:</b> R$ <?=$valor?><br>
		<b>Cidade:</b> <?=$cidade?><br>
		<b>Rua:</b> <?=$rua?> , <?=$numero?> <br>
		<b>Bairro:</b> <?=$bairro?><br>
		<b>Estado:</b> <?=$estado?><br>
		<b>Data:</b> <?=$data?><br> 
		<b>Hora:</b> <?=$hora?><br> 

	</div>
	<div><a href="alterar-produto.php?id=<?=$id?>">Editar Evento</a>
</div>




<?php include('rodape.php'); ?>