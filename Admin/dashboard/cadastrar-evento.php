<?php 

include ('cabecalho.php');

use Parse\ParseObject;
use Parse\ParseFile;

$nome_evento = $_POST['nome'];
$nome_cliente = $_POST['cliente'];
$cep_evento = $_POST['cep'];
$rua_evento = $_POST['rua'];
$numero_rua = $_POST['numero'];
$bairro_evento = $_POST['bairro'];
$cidade_evento = $_POST['cidade'];
$estado_evento = $_POST['estado'];
$data_evento = $_POST['data'];
$date = date_create_from_format('d/m/Y H:i', $data_evento);
$novadata = date_format($date, 'm/d/Y H:i'); 
$data = new DateTime($novadata);

$evento = new ParseObject("Eventos");
$evento->set('nome', $nome_evento);
$evento->set('cliente', $nome_cliente);
$evento->set('cep', (int)$cep_evento);
$evento->set('rua', $rua_evento);
$evento->set('numero', (int)$numero_rua);
$evento->set('bairro', $bairro_evento);
$evento->set('cidade', $cidade_evento);
$evento->set('estado', $estado_evento);
$evento->set('data', $data);



if( $nome_evento == '' || $nome_cliente == ''){
	$_SESSION['erroEvento'] = 'Preencha todos os campos.';
	header("Location: cadastro-evento.php");
	die();
}

if( isset($_FILES['capa-evento']) && $_FILES['capa-evento']['name'] != null && $_FILES['capa-evento']['name'] != "" ){

	if($_FILES['capa-evento']['size'] > 0){

		$file_type = $_FILES['capa-evento']['type'];
		if(($file_type != 'image/png') && ($file_type != 'image/jpeg') && ($file_type != 'image/jpg')){
			$_SESSION['erroEvento'] = 'O arquivo não é uma imagem válida.';
			header("Location: cadastro-evento.php");
			die();
		}else{
			$temp = $_FILES['capa-evento']['tmp_name'];
			$nome = $_FILES['capa-evento']['name'];
			$file = ParseFile::createFromData(file_get_contents($temp), $nome);
			$file->save();
			$evento->set('capa', $file);
		}

	}else{
		$_SESSION['erroEvento'] = 'A imagem é muito grande, tente um arquivo menor.';
		header("Location: cadastro-evento.php");
		die();
	}
}

try{
	$evento->save();
	$_SESSION['sucessoEvento'] = 'O Evento <?=$nome_evento?> foi cadastrado';
	header("Location: eventos.php");
	die();
}catch (ParseException $e){
	echo $e;
}


?>