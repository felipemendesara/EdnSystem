<?php

	include('cabecalho-login.php');

	$log_user = $_POST['user'];
	$log_senha = $_POST['pass'];

	use Parse\ParseUser;

	try{
		//try{
			$user = ParseUser::logIn($log_user, md5($log_senha));
			$verificaUsuario = $user->isAdm;

			if($verificaUsuario == true){
				header("Location: menu-admin.php");
			}else{
				header("Location: dashboard/eventos.php");
			}
			die();
		/*}catch (ParseException $e){
			//echo "ERROR: ".$e->getCode()." ".$e->getMessage();
			$_SESSION['erroLogin'] = $e->getMessage();
			header("Location: index.php");
			die();
		}*/

	}catch(Exception $erro){
		switch($erro->getCode()){
			case 0:
				$_SESSION['erroLogin'] = 'Preencha todos os campos';
				break;
			case 101:
				$_SESSION['erroLogin'] = 'Verifique se a senha ou usuário estão corretos';
				break;
			default:
				$_SESSION['erroLogin'] = 'Algo deu errado! Tente novamente';
		}
		header("Location: index.php");
		die();
	}