<?php
	include('cabecalho-adm.php');

	use Parse\ParseClient;
	use Parse\ParseUser;
	use Parse\ParseSession;
	use Parse\ParseFile;

	$novo_nome = $_POST['nome'];
	$novo_username = $_POST['username'];
	$novo_email = $_POST['email'];
	$novo_senha = $_POST['senha'];

	ParseClient::enableRevocableSessions();
	$user = new ParseUser();
	$user->set('nome', $novo_nome);
	$user->set('username', $novo_username);
	$user->set('email', $novo_email);
	$user->set('password', md5($novo_senha));


	if( isset($_FILES['image']) && $_FILES['image']['name'] != null && $_FILES['image']['name'] != ""){
		if($_FILES['image']['size'] > 0){
			$file_type = $_FILES['image']['type'];
			if(($file_type != 'image/png') && ($file_type != 'image/jpeg') && ($file_type != 'image/jpg')){
				$_SESSION['erroCadastro'] = 'Esta não é uma imagem válida.';
				header("Location: cadastro-user.php");
				die();
			}else{
				$temp = $_FILES['image']['tmp_name'];
				$nome = $_FILES['image']['name'];
				$file = ParseFile::createFromData(file_get_contents($temp), $nome);
				$file->save();
				$user->set('foto', $file);
			}
		}else{
			$_SESSION['erroCadastro'] = "Esta imagem é muito grande, tente enviar um arquivo menor.";
			header("Location: cadastro-user.php");
			die();
		}
	}



	try{
		$user->signUp();
		$session = ParseSession::getCurrentSession();
		ParseUser::logOut();
		header('Location: ../index.php');
	}catch (Exception $erro){
		//echo $erro->getCode()." ".$erro->getMessage();
		switch($erro->getCode()){
			case 202:
				$_SESSION['erroCadastro'] = 'Esse nome de usuário já existe, escolha outro.';
				break;
			case 203:
				$_SESSION['erroCadastro'] = 'O email '.$novo_email.' já está sendo utilizado.';
				break;
			default:
				$_SESSION['erroCadastro'] = 'Algo deu errado! Tente novamente.';
		}
		header("Location: cadastro-user.php");
		die();
	}

?>