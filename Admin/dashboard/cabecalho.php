<!doctype html>
<?php include('parse.php');

use Parse\ParseUser;
$currentUser = ParseUser::getCurrentUser();

$username = $currentUser->nome;
$usermail = $currentUser->email;
$userfoto = $currentUser->get('foto');
if($userfoto !== null){
	$userfoto_url = $userfoto->getURL();
}else{
	$userfoto_url = "../img/userdefault.png";
}

$url = $_SERVER['PHP_SELF'];

?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Add to homescreen for Chrome on Android -->
	    <meta name="mobile-web-app-capable" content="yes">
	    <link rel="icon" sizes="192x192" href="../img/android-desktop.png">
	    <!-- Add to homescreen for Safari on iOS -->
	    <meta name="apple-mobile-web-app-capable" content="yes">
	    <meta name="apple-mobile-web-app-status-bar-style" content="black">
	    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
	    <link rel="apple-touch-icon-precomposed" href="../img/ios-desktop.png">

	    <!-- Tile icon for Win8 (144x144 + tile color) -->
	    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
	    <meta name="msapplication-TileColor" content="#3372DF">
	    <link rel="shortcut icon" href="../img/favicon.png">
		
		<title>EDN Eventos - Painel do Administrador</title>

		<script src="//www.parsecdn.com/js/parse-1.6.14.min.js"></script> <!-- PARSE -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="../style/mdl/material.min.css">
		<script id="materialScript" src="../style/mdl/material.min.js"></script>
		<link rel="stylesheet" href="../style/edneventos.css">
    	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    	  <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
        <script type='text/javascript' src='../style/mdl/cep.js'></script>
	</head>

	<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    	<header class="mdl-layout__header">
        	<div class="mdl-layout__header-row">
				<!-- Title -->
          		<span class="mdl-layout-title">EDN Eventos - Painel Administrativo</span>
        	</div>
      	</header>

      	<!-- Menu Lateral -->
      	<div class="mdl-layout__drawer">
        	<header class="drawer-user-area">
	          	<img src="<?=$userfoto_url?>" class="user-avatar">
	          	<h6 class="mdl-typography--title user-name"><?=$username?></h6>
	          	<div class="demo-avatar-dropdown">
	            	<span><?=$usermail?></span>
	            	<div class="mdl-layout-spacer"></div>
	            	<button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
	              		<i class="material-icons" role="presentation">arrow_drop_down</i>
	              		<span class="visuallyhidden">Opções</span>
	            	</button>
	            	<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
	              		<a style="text-decoration:none;" href="logout.php"><li class="mdl-menu__item"><i class="material-icons">exit_to_app</i> Logout</li></a>
	            	</ul>
	          	</div>
        	</header>


        	<nav class="mdl-navigation" id="menu">
        	<?php
        		$marcaEvento = " ";
        		$marcaProduto = " ";
        		$marcaVenda = " ";
        		$marcaGrafico = " ";

        		if (strstr($url, 'eventos.php')){
        			$marcaEvento = 'style="background:rgba(255,255,255,0.3)"';
        		}else if(strstr($url, 'produtos.php')){
        			$marcaProduto = 'style="background:rgba(255,255,255,0.3)"';
        		}else if(strstr($url, 'vendas.php')){
        			$marcaVenda = 'style="background:rgba(255,255,255,0.3)"';
        		}else if(strstr($url, 'graficos.php')){
        			$marcaGrafico = 'style="background:rgba(255,255,255,0.3)"';
        		} ?>


          		<a class="mdl-navigation__link menu-link" <?=$marcaEvento?> href="eventos.php"><i class="material-icons menu-icons">event</i>Eventos</a>
          			<a class="mdl-navigation__link menu-link mdl-button" id="demo-menu-lower-right" <?=$marcaVenda?> href=""><i class="material-icons menu-icons">monetization_on</i>
          		Vendas</a>
          		<a class="mdl-navigation__link menu-link" <?=$marcaProduto?> href="produtos.php"><i class="material-icons menu-icons">shopping_cart</i>Produtos</a>  
          
          		<a class="mdl-navigation__link menu-link" <?=$marcaGrafico?> href="graficos.php"><i class="material-icons menu-icons">assessment</i>Gráficos</a>
				
          		<a class="mdl-navigation__link menu-link" style="width: 100%" <?=$marcaVenda?> href="vender.php"><i class="material-icons menu-icons" >monetization_on</i>
          		Vendas</a>



<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="demo-menu-lower-right">
  <li class="mdl-menu__item">Some Action</li>
  <li class="mdl-menu__item">Another Action</li>
  <li disabled class="mdl-menu__item">Disabled Action</li>
  <li class="mdl-menu__item">Yet Another Action</li>
</ul>

        	</nav>
      	</div>

      	<main class="mdl-layout__content mdl-color--grey-100">
        	<div class="page-content" id="conteudo">