<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
if (isset($_COOKIE['profid'])) {
	$id = $_COOKIE['profid'];
	
}
if (isset($_COOKIE['rootid'])) {
	$id = $_COOKIE['rootid'];
}
if (isset($_COOKIE['admid'])){
	$id = $_COOKIE['admid'];
}
if (!isset($_REQUEST['turma'])||($_REQUEST['turma']=="")) {
	?>
	<script type="text/javascript">
		alert('Nenhuma turma selecionada!!!');
		window.location.assign('./?opt=1');
	</script>
	<?php
}
$turma = $_REQUEST['turma'];
?>
    <div id="DivA">
        <h3>Avaliações individuais:</h3>
        <hr>
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading colorTable">
                    <h3 class="panel-title">Turmas</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Nº Aula" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Data" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Avaliação" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Selecionar Avaliação" disabled></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include '../../../configs.php';
                        $sql = "SELECT tbl_aulas.id,tbl_sequencia_perguntas.nome,tbl_aulas.data FROM tbl_aulas,tbl_sequencia_perguntas WHERE tbl_aulas.id_professor = '$id' AND tbl_aulas.id_turma = '$turma' AND tbl_aulas.id_sequencia = tbl_sequencia_perguntas.id";
                        $query = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_object($query)){
                            $data = date('d/m/Y', strtotime($row->data));
                            echo "<tr>";
                                echo "<td>".$row->id."</td>";
                                echo "<td>".$data."</td>";
                                echo "<td>".$row->nome."</td>";
                                echo "<center><td><label class='container'><INPUT TYPE='checkbox' NAME='grafico' id='grafico' VALUE='".$row->id."'><span class='checkmark'></span></label></td></center>";
                            echo "</tr>";
                        };
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                Gerar gráfico:
                            </td>
                            <td>
                                <div class="text-primary">
                                    <button onclick="seleciona_avalCheck()" class="btn btn-primary">Gerar Gráfico</button>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div id="DivLatera2">
        <h3>Gráfico de evolução da turma:</h3>
        <hr>
        <fieldset>
            <img src="construtorGraficoColetivo.php?turma=<?=$turma?>" alt="Gráfico em relação as sequências" />
        </fieldset> 
    </div>               
</div>



<script type="text/javascript">
	var turma = "<?=$turma?>"
	var link = "";
	var i=0;
    var ids = [];
    
    function seleciona_avalCheck(){
        var aval = document.getElementsByName('grafico');
        var selecionados = [];
        console.log(aval);
        for (let index = 0; index < aval.length; index++) {
            if(aval[index].checked){
                selecionados.push(aval[index].value); 
            }
        }
        
        if(selecionados.length == 0){
            alert("Nenhuma turma selecionada!")
        }   else if(selecionados.length > 2){
            alert("Selecione apenas 2 avaliações!")
        }   else if(selecionados.length == 1){
            link = link+'&aula='+selecionados[0];
			link = './?opt=4&turma='+turma+link;
			window.location.assign(link);
        }   else if(selecionados.length == 2){
            link = './?opt=5&turma='+turma+"&aula[]="+selecionados[0]+"&aula[]="+selecionados[1];
            window.location.assign(link);
        }
    }

	function seleciona_turma(id){
		var decision = confirm('Deseja comparar duas turmas?');
		if (decision) {
			document.getElementById(id).disabled = true;
			link = link+'&aula[]='+id;
			ids[i] = id;
			i = i +1;

			if (i == 2) {
				link = './?opt=5&turma='+turma+link;
				var d = confirm('Tem certeza que deseja comparar essas turmas?');
				if (d) {
					window.location.assign(link);
				}
				else{
					i =0;
					link = '';
					document.getElementById(ids[1]).disabled =false;
					document.getElementById(ids[0]).disabled = false;
				}
			}
		}
		else{
			link = link+'&aula='+id;
			link = './?opt=4&turma='+turma+link;
			window.location.assign(link);
		}
	}
</script>