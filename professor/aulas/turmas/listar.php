<h3>Turmas:</h3>
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
                </tr>
            </thead>
            <tbody>
            <?php
                $sqlTurma = "SELECT * FROM tbl_turma WHERE id_professor = '$id'";
                $queryTurma = mysqli_query($con, $sqlTurma);
                $i = mysqli_num_rows($queryTurma);	
                while ($rowTurma = mysqli_fetch_object($queryTurma)) {
                    $max[] = $rowTurma->np;
                    echo "<tr role='button' onclick='showHint($rowTurma->id)'>";
                        echo "<td>".$rowTurma->id."</td>";
                        echo "<td>".$rowTurma->nome."</td>"; 
                    echo "</tr>";
                };
            ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
	function showHint(id) {
		window.location.assign('./?opt=6&turma='+id);
	}
</script>