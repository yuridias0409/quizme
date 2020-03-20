<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
	include '../../../configs.php';
error_reporting(0);
ini_set(“display_errors”, 0 );
if ((isset($_REQUEST['userid']))&&(isset($_REQUEST['idaula']))) {
	$id = $_REQUEST['userid'];
	$a = $_REQUEST['idaula'];
	?>
		<table class="table table-hover table-bordered" style="background-color: #fff;" >
			<thead>
				<tr>
					<td>
						Pergunta
					</td>
					<td>
						Resposta
					</td>
				</tr>
			</thead>
			<?php 
			$sql = "SELECT * FROM `tbl_respostas`, tbl_perguntas  WHERE tbl_respostas.id_pergunta = tbl_perguntas.id AND id_usuario = '$id' AND tbl_respostas.id_aula = '$a'";
            $query = mysqli_query($con, $sql);
            $pontuacao_maxima = mysqli_num_rows($query)*100;
			$total = 0;
            $np = 0;
			while ($row = mysqli_fetch_object($query)) {
				$resposta = $row->resposta;
				$pontos = $row_pontos[1];
				$total += $row->resposta;
				?>
				<tr>
					<td>
						<?=$row->pergunta?>
					</td>
					<td>
						<center>
							<?=$resposta?>
						</center>
					</td>
				</tr>
				<?php	
			}
			?>
			<tfoot>
				<tr>
					<td>
						Porcentagem total de acertos
					</td>
					<td colspan="1">
						<div class="text-primary">
							<center>
								<?=number_format(($total/$pontuacao_maxima)*100,2)?>%
							</center>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<center>
							<a href="./">Voltar</a>
						</center>
					</td>
				</tr>
			</tfoot>
		</table>
	<?php 
}
?>








