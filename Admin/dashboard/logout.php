<?php

include('cabecalho.php');

use Parse\ParseUser;
ParseUser::logOut();

header("Location: ../index.php");
die();
