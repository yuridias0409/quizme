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
                            <th>Apagar</th>
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
                                echo "<td><button type='button' id='del$row->id' value='$row->id' class='btn btn-danger' onclick='apagar($row->id)'>Apagar</button></td>";
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
	function showHint(str) {
		if (str.length == 0) { 
			document.getElementById("txtHint").innerHTML = "";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtHint").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "perguntas.php?id_seq=" + str, true);
			xmlhttp.send();
		}
	}
	function apagar(id){
		var c = confirm('Tem certeza que deseja apagar a avaliação N°'+id+' ?');
		if (c) {
			window.location.assign('./del_seq2.php?id='+id);
		}
	}
</script>