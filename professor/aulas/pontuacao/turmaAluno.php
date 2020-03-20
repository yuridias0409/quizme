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
 ?>
<div>
    <h3>Escolha uma turma:</h3>
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
                        <th><input type="text" class="form-control" placeholder="Opção" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM tbl_turma WHERE tbl_turma.id_professor = '$id'";
                    $query = mysqli_query($con, $sql);
                    $i = mysqli_num_rows($query);	
                    while ($row = mysqli_fetch_object($query)) {
                        $max[] = $row->np;
                        echo "<tr>";
                            echo "<td>".$row->id."</td>";
                            echo "<td>".$row->nome."</td>";
                            echo "<td><a href='./?opt=7&turma=".$row->id."'><div class='btn btn-primary'>Selecionar</div></a></td>";
                        echo "</tr>";
                    };
                ?>
                </tbody>
            </table>
        </div>
    </div>
	<table id="txtHint" class="table table-striped" style="background-color: #fff;">
	</table>
</div>
<script type="text/javascript">
	function seleciona(turma) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "sequenciaEscolher.php?id_turma=" + turma, true);
		xmlhttp.send();
	}
</script>