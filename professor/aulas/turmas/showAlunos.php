<?php
if(isset($_GET['turma'])){
    $id_turma = $_GET['turma'];   
}
?>
<h3>Alunos da turma :</h3>
<hr>
<div class="row">
    <div class="panel panel-primary filterable">
        <div class="panel-heading colorTable">
            <h3 class="panel-title">Ver alunos</h3>
            <div class="pull-right">
                <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr class="filters">
                    <th><input type="text" class="form-control" placeholder="Nº" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
                    <th><input type="text" class="form-control" placeholder="email" disabled></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sqlTurma = "SELECT u.id as id ,u.nome as nome, u.email as email FROM tbl_usuario_turma ut ,tbl_usuarios u WHERE ut.id_aluno = u.id and ut.id_turma = '$id_turma';";
                $queryTurma = mysqli_query($con, $sqlTurma);
                $i = mysqli_num_rows($queryTurma);	
                while ($rowTurma = mysqli_fetch_object($queryTurma)) {
                    $max[] = $rowTurma->np;
                    echo "<tr>";
                        echo "<td>".$rowTurma->id."</td>";
                        echo "<td>".$rowTurma->nome."</td>"; 
                        echo "<td>".$rowTurma->email."</td>";
                    echo "</tr>";
                };
            ?>
            </tbody>
        </table>
    </div>
</div>