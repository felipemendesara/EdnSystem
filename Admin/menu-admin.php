<?php
	include('cabecalho-login.php');
?>

<?php
	use Parse\ParseUser;
	$currentUser = ParseUser::getCurrentUser();

	if($currentUser && $currentUser->isAdm == true){
		unset($_SESSION['erroLogin']); ?>
		<div class="button-admin-menu">
			<i class="material-icons icon-admin-menu">person_add</i><a href="admin/cadastro-user.php">Adicionar novo usuário</a>
		</div>
		<br>
		<div class="button-admin-menu">
			<i class="material-icons icon-admin-menu">dashboard</i><a href="dashboard/eventos.php">Ir para Dashboard</a>
		</div>
	<?php }else{ 
		header("Location: index.php");
		die();
	} ?>

<?php include('rodape-login.php') ?>