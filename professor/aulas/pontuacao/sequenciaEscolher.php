<?php
if(isset($_GET['turma'])){
    $id_turma = $_GET['turma'];   
}
?>
<div>
    <div id="DivA"> 
        <h3>Escolha uma avaliação:</h3>
        <hr>
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading colorTable">
                    <h3 class="panel-title">Sequências</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Nº" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Opção" disabled></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT s.nome as nome , s.id as id FROM tbl_aulas a, tbl_sequencia_perguntas s WHERE a.id_sequencia = s.id and a.id_turma = '$id_turma'";
                        $query = mysqli_query($con, $sql);
                        $i = mysqli_num_rows($query);	
                        while ($row = mysqli_fetch_object($query)) {
                            $max[] = $row->np;
                            echo "<tr>";
                                echo "<td>".$row->id."</td>";
                                echo "<td>".$row->nome."</td>";
                                echo "<td><a href='./?opt=8&sequencia=".$row->id.'&turma='.$id_turma."'><div class='btn btn-primary'>Selecionar</div></a></td>";
                            echo "</tr>";
                        };
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
    <div id="DivLateral">
        <h3>Gráfico de evolução:</h3>
        <hr>
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading colorTable">
                    <h3 class="panel-title">Escolha um aluno:</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Nº Aluno" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Nome do aluno" disabled></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include '../../../configs.php';
                        $sql = "SELECT u.id,u.nome from tbl_usuarios u , tbl_usuario_turma ut , tbl_turma t where t.id_professor = '$id' and t.id = ut.id_turma and ut.id_aluno = u.id ORDER BY u.id ASC";
                        $query = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($query)){
                            echo "<tr role='button' onclick='selecionaGrafico(".$row['0'].")'>";
                                echo "<td>".$row['0']."</td>";
                                echo "<td>".$row['1']."</td>";
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
    function selecionaGrafico(id_aluno) {
		window.location.assign('./?opt=6&userid='+id_aluno);
	}
</script>