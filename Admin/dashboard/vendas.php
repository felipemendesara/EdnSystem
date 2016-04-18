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
$arquivo = 'planilha.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td colspan="3">Planilha teste</tr>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><b>Coluna 1</b></td>';
$html .= '<td><b>Coluna 2</b></td>';
$html .= '<td><b>Coluna 3</b></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>L1C1</td>';
$html .= '<td>L1C2</td>';
$html .= '<td>L1C3</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>L2C1</td>';
$html .= '<td>L2C2</td>';
$html .= '<td>L2C3</td>';
$html .= '</tr>';
$html .= '</table>';

header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
// Envia o conteúdo do arquivo
echo $html;

 foreach ($produtos as $produto) : ?>
  $tabela .= '<tr>';
  $tabela .= '<td>'.$dados['nome'].'</td>';
  $tabela .= '<td>'.$dados['quantidade'].'</td>';
 $tabela .= '<td>'.$dados['valor'].'</td>';
  $tabela .= '</tr>';s

 header ('Cache-Control: no-cache, must-revalidate');
 header ('Pragma: no-cache');
 header('Content-Type: application/x-msexcel');
 header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
 echo $tabela;

			<?php endforeach ?>

?>
	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp tabela-produtos">
		<thead>
		    <tr>
		    	<th class="mdl-data-table__cell--non-numeric">Produto</th>
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
				    <td><?= $produto->get('quantidade')?></td>
				    <td><?= $produto->get('valor')?></td>
				    <td><a href="detalhe-produto.php?id=<?=$id?>">Detalhar</a>
				  <a href="deleta-produto.php?id=<?=$id?>">Excluir</a></td>
				</tr>

			<?php endforeach ?>

		</tbody>
	</table>
	<hr/>


<?php include('rodape.php'); ?>