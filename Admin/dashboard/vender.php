<?php include('cabecalho.php'); ?>

<?php

use Parse\ParseQuery;


try{
  $query = new ParseQuery("Produtos");
  $eventos = $query->find();
}catch(Exception $erro){
  echo "ERRO: ".$erro->getCode()."<br>".$erro->getMessage();
  die();
}

?>

 <table>     
<tr>
  <?php foreach ($eventos as $evento) : ?>
  <?php $id = $evento->getObjectId(); ?>


 

    <div class="demo-card-wide mdl-card mdl-shadow--2dp cardfesta" style="width: 80%%; background: url(<?=$evento->get('foto')->getURL();?>)">
    <div class="mdl-card__actions mdl-card--border">




 <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
        Vender
    </a>
    <a href="detalhe-produto.php?id=<?=$id?>"class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                DETALHES
            </a>
          </div>
              <div class="mdl-card__title">
           
              </div>""
      <div class="mdl-card__supporting-text2"style="font-size:20px">
         Nome: <?= $evento->get('nome')?>
        <br>
        Valor: R$ <?= $evento->get('valor')?>
        <br>
    
        Categoria: <?= $evento->get('categoria')?>   <br> Quantidade: (<?= $evento->get('quantidade')?>)
      </div>

    </div>
 
  <?php endforeach ?>
</tr>
<table>     
<?php include('rodape.php'); ?>



