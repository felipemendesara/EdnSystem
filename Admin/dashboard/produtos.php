<?php include('cabecalho.php'); ?>

<?php

use Parse\ParseQuery;

try{
	$query = new ParseQuery("Produtos");
	$produtos = $query->find();
}catch(Exception $erro){
	echo "ERRO: ".$erro->getCode()."<br>".$erro->getMessage();
	die();
}

?>

<?php if(isset($_SESSION['sucessoProduto'])){ $mensagem = $_SESSION['sucessoProduto']?> <p class="ok-login-msg"><?=$mensagem?></p> <?php unset($_SESSION['sucessoProduto']); } ?>
<?php if(isset($_SESSION['erroProduto'])){ $mensagem = $_SESSION['erroProduto']?> <p class="erro-login-msg"><?=$mensagem?></p> <?php unset($_SESSION['erroProduto']); } ?>
	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp tabela-produtos">
		<thead>
		    <tr>
		    	<th class="mdl-data-table__cell--non-numeric">Produto</th>
			    <th>Categria</th>
			    <th>Quantidade</th>
			    <th>Valor Unitário</th>
			    <th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($produtos as $produto) : ?>
		    	<tr>
		    		<?php $id = $produto->getObjectId(); ?>
				    <td class="mdl-data-table__cell--non-numeric"><?= $produto->get('nome')?></td>
				    	<td><?= $produto->get('categoria')?></td>
				    <td><?= $produto->get('quantidade')?></td>
				    <td><?= $produto->get('valor')?></td>
				    <td><a href="detalhe-produto.php?id=<?=$id?>">Detalhar</a> | <a href="deleta-produto.php?id=<?=$id?>">Excluir</a></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<br><br>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script><!--JS GRAFICO-->
    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChartA);

      function drawChartA() {
      	var concas = "'"
        var data = google.visualization.arrayToDataTable([
          ['Itens', 'Quantidade'],
          <?php foreach ($produtos as $produto) : ?>
          ['<?= $produto->get('nome')?>',<?= $produto->get('quantidade')?>],  
          <?php endforeach ?>
        ]);
        
        var options = {
          chart: {
            title: 'Quantidade de produtos',
            subtitle: '',
          }
        };

        var chartA = new google.charts.Bar(document.getElementById('eventoA'));
        chartA.draw(data, options);
      }
    </script>


    <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="padding:30px;">
              <h3>PRODUTOS</h3>
              <div id="eventoA" style="width: 900px; height: 500px;"></div>
            </div>


<?php include('rodape.php'); ?>