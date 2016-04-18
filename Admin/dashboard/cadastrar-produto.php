<?php 

include ('cabecalho.php');

use Parse\ParseObject;
use Parse\ParseFile;

$nome_produto = $_POST['nome-produto'];
$categoria_produto = $_POST['categoria-produto'];
$quantidade_produto = $_POST['quantidade-produto'];
$valor_produto = $_POST['valor-produto'];

$produto = new ParseObject("Produtos");
$produto->set('nome', $nome_produto);
$produto->set('valor', (float)$valor_produto);
$produto->set('categoria', $categoria_produto);
$produto->set('quantidade', (int)$quantidade_produto);


if( $nome_produto == '' || $categoria_produto == null || $quantidade_produto == '' || $valor_produto == ''){
	$_SESSION['erroProduto'] = 'Preencha todos os campos.';
	header("Location: cadastro-produto.php");
	die();
}

if( isset($_FILES['foto-produto']) && $_FILES['foto-produto']['name'] != null && $_FILES['foto-produto']['name'] != "" ){

	if($_FILES['foto-produto']['size'] > 0){

		$file_type = $_FILES['foto-produto']['type'];
		if(($file_type != 'image/png') && ($file_type != 'image/jpeg') && ($file_type != 'image/jpg')){
			$_SESSION['erroProduto'] = 'O arquivo não é uma imagem válida.';
			header("Location: cadastro-produto.php");
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
		header("Location: cadastro-produto.php");
		die();
	}
}

try{
	$produto->save();
	$_SESSION['sucessoProduto'] = 'O produto <?=$nome_produto?> foi cadastrado';
	header("Location: produtos.php");
	die();
}catch (ParseException $e){
	echo $e;
}


?>