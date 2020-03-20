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
include '../../configs.php';
$pg = array('cadastro.php','ver.php','editar.php','apagar.php','home.php','destinos.php','seqp.php','aula.php','alunos.php','cad.midias.php','pontuacao.php','pontuacao2.php','adm.php','del_seq.php','edit_seq.php','mfinais.php','finais.php','perguntas.php','edit_finais.php','cad_turma.php','del_turma.php','edit_turma.php','select_alunos.php');
if (isset($_REQUEST['opt'])) {
	$opt = $_REQUEST['opt']; 
}
else{
	$opt = 4;
}
$pag = $pg[$opt];


include 'configs.php';
$query = "SELECT nome FROM tbl_professor WHERE id = '$id'";
$queryRUN = mysqli_query($con,$query);
// foreach ($queryRUN as $key => $value) {
//     echo $value->nome;
// }
$reg = mysqli_fetch_row($queryRUN);
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>



<script src="./include/index.js"></script>
<link rel="stylesheet" type="text/css" href="./include/index.css">
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Quiz-me Edu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
 

</head>

<body>
<div class="page-wrapper chiller-theme toggled">
    <?php include "./include/menu.php";?>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <?php include $pag;?>
  </main>
  <!-- page-content" -->
</div>
<!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    
</body>

</html>