<?php 
if (!isset($_COOKIE['userid'])) {
	header('location:../');
}
include '../configs.php';
$uid = $_COOKIE['userid'];
$sql = "SELECT * FROM `tbl_usuario_aula`, `tbl_aulas`, `tbl_professor`, `tbl_sequencia_perguntas` WHERE tbl_usuario_aula.id_aula = tbl_aulas.id AND tbl_aulas.id_professor = tbl_professor.id AND tbl_usuario_aula.id_aula = tbl_aulas.id AND tbl_usuario_aula.id_usuario = '$uid' AND tbl_aulas.id_sequencia = tbl_sequencia_perguntas.id";
// echo "$sql";die;
$query = mysqli_query($con, $sql);
?>


<!-- Inicio html -->
<!DOCTYPE html>
    <html>
        <head>
            <title></title>
            <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <meta charset="utf-8">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="../style.css">
            <meta name="viewport" content="width=device-width">
    </head>

<!-- Inicio Estilos CSS -->
    <style type="text/css">

        .table-bordered td{
            border-color: #000;
        }
        .table-bordered thead{
            background-color: #ededed;
        }
        table{
            font-size: 22px;
        }

    </style>

    <!-- Inicio corpo da página -->
    <body>

        <!-- Imagem que era responsável pelo antigo logo -->
        <!-- <div>
            <img src="" id="title">
        </div> -->


        <!-- Criação de Navbar básica (eduardo) -->
        <!-- Primeira parte do navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Quiz-me Edu</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <!-- Conteúdo que ficaria no meio da navbar(Neste caso permanecerá vázio) -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>


                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><a href="../sair.php">Sair</a></button>
                
            </div>
        </nav>
<!-- Fim do navbar criado -->

      
        <div class="container">
            <!-- <table class="table table-bordered table-hover"> -->
            <br>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active text-center" aria-current="page">Selecione abaixo a avaliação que deseja participar</li>
                </ol>
            </nav>

            <table class= "table">
                <thead class="thead-dark">
                    
                    <tr>
                        <td><center>Nome</center></td>
                        <td><center>Data</center></td>
                        <td><center>Começar</center></td>
                    </tr>

                </thead>
			<?php

            
            $i = 1;
            


			while($row = mysqli_fetch_object($query)){
            

                $ano= substr($row->data, 0, 4);
				$mes= substr($row->data, 5,2);
				$dia= substr($row->data, 8,2);
                $data = $dia ."/".$mes."/".$ano;
            
				?>
				<tr id="tr<?=$i?>">
					<td>
						<center>
							<?php 
							$sql_seq = "SELECT * FROM tbl_sequencia_perguntas  WHERE id = '$row->id_sequencia'";
							$query_seq = mysqli_query($con, $sql_seq);
							$row_seq = mysqli_fetch_object($query_seq);
							echo $row_seq->nome;
							?>
						</center>
					</td>
					<td>
						<center>
							<?=$data?>
						</center>
					</td>
					<td>
						<center>
							<?php 
							if ($row->completa == 1) {
								?>
								<style type="text/css">
								#tr<?=$i?>{
									background-color: #b5e2bf;
                                    /* background-color: #F8F9FA; */
								}
							</style>	
							Aula completa
							<?php
						}
						else{
							?>
							<style type="text/css">
							#tr<?=$i?>{
								background-color: #F8F9FA;
							}
						</style>
						<a class="btn btn-success" href="jogo.php?seq=<?=$row->id_sequencia?>&aula=<?=$row->id_aula?>">
							<center>
								Entrar
							</center>
						</a>

						<?php
					}
					?>
				</center>
			</td>
		</tr>
		<?php
	}
	?>	
</table>
</div>
<script src="../js_imagens.js"></script>
</body>
</html>