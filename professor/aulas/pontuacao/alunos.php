<?php
if(isset($_GET['turma']) && isset($_GET['sequencia'])){
    $id_turma = $_GET['turma'];
    $id_sequencia = $_GET['sequencia'];
}   else{?>
	<script type="text/javascript">
		alert('Nenhuma turma selecionada!!!');
		window.location.assign('./?opt=0');
	</script>
	<?php
}
?>
<div>
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
                            <th><input type="text" class="form-control" placeholder="Nº aluno" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Nome do aluno" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Data" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Sequência usada" disabled></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include '../../../configs.php';
                        $sql = "SELECT tbl_aulas.id,tbl_usuarios.id, tbl_usuarios.nome, tbl_sequencia_perguntas.nome, tbl_usuarios.id, tbl_aulas.data FROM `tbl_usuarios`, `tbl_aulas`, `tbl_sequencia_perguntas`, `tbl_usuario_aula` WHERE tbl_usuario_aula.id_aula = tbl_aulas.id AND tbl_aulas.id_sequencia = tbl_sequencia_perguntas.id AND tbl_usuario_aula.id_usuario = tbl_usuarios.id AND tbl_aulas.id_professor = '$id' AND tbl_sequencia_perguntas.id = '$id_sequencia' AND tbl_aulas.id_turma = '$id_turma' order by tbl_usuarios.id ASC";
                        $query = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($query)){
                            $ano= substr($row['data'], 0, 4);
                            $mes= substr($row['data'], 5,2);
                            $dia= substr($row['data'], 8,2);
                            $data = $dia ."/".$mes."/".$ano;

                            echo "<tr role='button' onclick='seleciona(".$row['0'].",".$row['1'].")'>";
                                echo "<td>".$row['0']."</td>";
                                echo "<td>".$row['1']."</td>";
                                echo "<td>".$row['2']."</td>";
                                echo "<td>".$data."</td>";
                                echo "<td>".$row['3']."</td>";
                            echo "</tr>";
                        };
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	function seleciona(id_aula,id_aluno) {
		window.location.assign('./?opt=2&idaula='+id_aula+'&userid='+id_aluno);
    }
</script>