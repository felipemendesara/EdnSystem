<?php include('cabecalho.php'); ?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script> <!-- JS para os graficos-->
    <script type="text/javascript"
          src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
          }"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

<script type="text/javascript">
    google.setOnLoadCallback(drawChart);

    function drawChart() {
    	var data = google.visualization.arrayToDataTable([
        	['Mês', 'Vendas'],
          	['Jan',  1000],
          	['Fev',  1170],
          	['Mar',  660],
          	['Abr',  1030],
          	['Mai',  300],
          	['Jun',  1500],
          	['Jul',  343],
          	['Ago',  1010],
          	['Set',  100],
          	['Out',  967],
          	['Nov',  700],
          	['Dez',  500]
        ]);

        var options = {
          	title: 'Total de Vendas em 2015',
          	curveType: 'function',
          	legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
</script>

<script type="text/javascript">
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
	        ['Itens', 'Quantidade Anual'],
            ['Bebidas', 3260],
            ['Comidas', 1505],
            ['Combos',  4515],
            
        ]);

        var options = {
    	    title: 'Total de itens vendidos por categoria',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

<div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="padding:30px;">
    <h2>Total de Vendas</h2>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>

    <h2>Total de itens vendidos</h2>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</div>



<?php include('rodape.php'); ?>