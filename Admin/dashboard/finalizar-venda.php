<?php

include('cabecalho.php');

$id = $_GET['id'];

use Parse\ParseQuery;

$query = new ParseQuery("Produtos");
$query->equalto("objectId",$id);
$results = $query->find();

foreach ($results as $result) {
	$result->set('quantidade',-1);
	$result->save();
}

$_SESSION['sucessoEvento'] = 'O Produto foi vendido!';
header("Location: vender.php");
die();	


?>