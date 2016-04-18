<?php include('cabecalho.php'); ?>

<?php

use Parse\ParseQuery;


try{
  $query = new ParseQuery("Eventos");
  $query->ascending("data");
  $eventos = $query->find();
}catch(Exception $erro){
  echo "ERRO: ".$erro->getCode()."<br>".$erro->getMessage();
  die();
}

?>

<?php if(isset($_SESSION['sucessoEvento'])){ $mensagem = $_SESSION['sucessoEvento']?> <p class="ok-login-msg"><?=$mensagem?></p> <?php unset($_SESSION['sucessoEvento']); } ?>
<?php if(isset($_SESSION['erroEvento'])){ $mensagem = $_SESSION['erroEvento']?> <p class="erro-login-msg"><?=$mensagem?></p> <?php unset($_SESSION['erroEvento']); } ?>
      
  <?php foreach ($eventos as $evento) : ?>
  <?php $id = $evento->getObjectId(); ?>
    <div class="demo-card-wide mdl-card mdl-shadow--2dp cardfesta" style="background: url(<?=$evento->get('capa')->getURL();?>)">
    
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">
          <?= $evento->get('nome')?>
        </h2>
      </div>
      <div class="mdl-card__supporting-text">
        <b>Cliente:</b> <?= $evento->get('cliente')?>
        <br>
        <?php
          $datetime = $evento->get('data');
          $data = $datetime->format('d/m/Y');
          $hora = $datetime->format('H:i');
        ?>
         
        <b>Data:</b> <?=$data?> <b>Horário:</b> <?=$hora?>
      </div>
    

 <div class="mdl-card__actions mdl-card--border">
              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" id="eventobtn1" href="detalhe-evento.php?id=<?=$id?>">
                DETALHAR E EDITAR
              </a>
                 <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" id="eventobtn1" href="http://edneventos.com.br/eventos-detalhe.php?id=<?=$id?>"target="_blank">
                 VER EVENTO
              </a>
            </div>
    </div>
  <?php endforeach ?>
     
<?php include('rodape.php'); ?>



