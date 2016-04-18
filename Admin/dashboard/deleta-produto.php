<?php

include('cabecalho.php');

$id = $_GET['id'];

use Parse\ParseQuery;

$query = new ParseQuery("Produtos");
$query->equalto("objectId",$id);
$results = $query->find();

foreach ($results as $result) {
	$result->destroy();
}

$_SESSION['erroProduto'] = 'O item foi excluído.';
header("Location: produtos.php");
die();	


?>