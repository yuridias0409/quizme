<?php 
if (isset($_GET['userid'])) {
    $user_id = $_GET['userid'];
    include '../../../configs.php';
    $data = array();

	$query_n = "SELECT s.nome as nome, AVG(r.resposta) as media FROM tbl_respostas r, tbl_perguntas p , tbl_sequencia_perguntas s  WHERE r.id_pergunta = p.id AND id_usuario = '$user_id' AND p.id_sequencia = s.id GROUP BY s.nome;";
    $result__n = mysqli_query($con,$query_n);

    while ($row = mysqli_fetch_object($result__n)){
        $dado_novo = array($row->nome,round($row->media,2));
        array_push($data,$dado_novo);
    }


	require 'phplot/phplot.php';
	$graph = new PHPlot(500,550);
	
	$graph->SetImageBorderType('plain');
	$graph->SetDataValues($data);
    #$graph->SetTitle('Janeiro'); // seta o nome do grafico
    #$graph->SetXGridLabelType("time"); // seta o label no eixo x usa "time", "title", "none", "default" or "data".
    //$graph->SetXTitle('Alunos'); // seta o eixo X e seu nome
    $graph->SetYTitle('Comparação das medias das porcentagens de acertos individuais(%)'); // seta o einxo Y e seu nome
    $graph->SetPlotType('linepoints'); // essa função serve para escolher o tipo do grafico que pode ser: bars, lines, linepoints, area, points e pie.
    $graph->SetLegend(utf8_decode($nome[0])); // gera as legendas do grafico
    $graph->SetLegend(utf8_decode($nome[1]));
    $graph->SetLegendStyle('left','left');
    //$graph->SetDataType("text-data"); // nescessario usar esse parametro no grafico com barras
    #$graph->SetVertTickIncrement(1); // espaçamento entre os pontos na regua vertical
    $graph->SetHorizTickIncrement(1); // espaçamento entre os pontos na regua horizontal
    $graph->SetLegendPixels(470,10); // muda a legenda de lugar
    $graph->SetFileFormat('PNG'); // cria o arquivo no formato especificado GIF, JPG e PNG
    $graph->SetBackgroundColor('#ededed'); // muda a cor de fundo do grafico
    #$graph->SetDataColors('green'); // seta as cores utilizads pelo grafico
    #$graph->SetPlotAreaWorld(0, null, null, null);

    $graph->SetYDataLabelPos('plotin');
    #$teste = array('blue', 'red', 'black');
    #$graph->SetRGBArray($teste);
    $graph->SetFontTTF('x_label', 'arial.ttf', 12);
    $graph->SetFontTTF('y_label', 'arial.ttf', 12);
    $graph->SetFontTTF('y_title', 'arial.ttf', 12);
    $graph->SetFontTTF('x_title', 'arial.ttf', 12);
    $graph->SetDrawXGrid(True);
    $graph->SetDrawYGrid(True);
    $graph->SetDrawXGrid(True);
    $graph->SetDrawYGrid(True);

    $graph->DrawGraph(); // gera o gráfico.
}