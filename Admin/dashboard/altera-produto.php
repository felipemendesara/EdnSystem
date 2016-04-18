<?php 

include ('cabecalho.php');

use Parse\ParseQuery;
use Parse\ParseFile;

$id = $_GET['id'];
$query = new ParseQuery("Produtos");
$produto = $query->get($id);

$nome_novo = $_POST['nome-produto'];
$categoria_novo= $_POST['categoria-produto'];
$quantidade_novo = $_POST['quantidade-produto'];
$valor_novo = $_POST['valor-produto'];

$produto->set('nome', $nome_novo);
$produto->set('valor', (float)$valor_novo);
$produto->set('categoria', $categoria_novo);
$produto->set('quantidade', (int)$quantidade_novo);


if( $nome_novo == '' || $categoria_novo == null || $quantidade_novo == '' || $valor_novo == ''){
	$_SESSION['erroProduto'] = 'Preencha todos os campos.';
	header("Location: alterar-produto.php?id=<?=$id?>");
	die();
}

if( isset($_FILES['foto-produto']) && $_FILES['foto-produto']['name'] != null && $_FILES['foto-produto']['name'] != "" ){

	if($_FILES['foto-produto']['size'] > 0){

		$file_type = $_FILES['foto-produto']['type'];
		if(($file_type != 'image/png') && ($file_type != 'image/jpeg') && ($file_type != 'image/jpg')){
			$_SESSION['erroProduto'] = 'O arquivo não é uma imagem válida.';
			header("Location: alterar-produto.php?id=<?=$id?>");
			die();
		}else{
			$temp = $_FILES['foto-produto']['tmp_name'];
			$nome = $_FILES['foto-produto']['name'];
			$file = ParseFile::createFromData(file_get_contents($temp), $nome);
			$file->save();
			$produto->set('foto', $file);
		}

	}else{
		$_SESSION['erroProduto'] = 'A imagem é muito grande, tente um arquivo menor.';
		header("Location: alterar-produto.php?id=<?=$id?>");
		die();
	}
}

try{
	$produto->save();
	$_SESSION['sucessoProduto'] = 'O produto <?=$nome_novo?> foi alterado';
	header("Location: produtos.php");
	die();
}catch (ParseException $e){
	echo $e;
}


?>