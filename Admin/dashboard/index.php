<?php

	$url = $_SERVER['REQUEST_URI'];
	$teste = '/edn/dashboard/';

	if ($url == $teste || $url == $teste.'index.php'){
	    header('Location: /edn/dashboard/eventos.php');
	}

?>