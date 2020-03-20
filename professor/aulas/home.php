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
if (isset($_COOKIE['idseq'])) {
	setcookie('idseq','');
}
include '../../configs.php';
?>
<div class="container">
    <div id="DivA">
        <h3>Suas avaliações</h3>
        <hr>
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading colorTable">
                    <h3 class="panel-title">Avaliações</h3>
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
                        $sql = "SELECT * FROM tbl_sequencia_perguntas WHERE id_professor = '$id'";
                        $query = mysqli_query($con, $sql);
                        $i = mysqli_num_rows($query);	
                        while ($row = mysqli_fetch_object($query)) {
                            $max[] = $row->np;
                            echo "<tr role='button' onclick='showHint($row->id)'>";
                                echo "<td>".$row->id."</td>";
                                echo "<td>".$row->nome."</td>"; 
                            echo "</tr>";
                        };
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="DivLateral">
        <h3>Suas Turmas</h3>
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
    </div>
</div>
<script type="text/javascript">
	function showHint(id) {
		window.location.assign('./avaliacoes/?opt=8&id_seq='+id);
	}
</script>