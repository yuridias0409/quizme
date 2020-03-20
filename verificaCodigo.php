<?php 
session_start();
include 'configs.php';
if ((isset($_POST['codigo']))&& (isset($_POST['email']))) {
	$codigo = $_POST['codigo'];
	$email = $_POST['email'];

	$queryCodigo = "SELECT * FROM tbl_rec_senha WHERE Email = '$email' AND Codigo = '$codigo'";
	$sqlCodigo = mysqli_query($con,$queryCodigo);
	$row = mysqli_fetch_object($sqlCodigo);

	if(empty($row)){
		$_SESSION['alert']="<script type='text/javascript'>alert('Código inválido')</script>";
    	header("Location: novaSenha.php");
	}	else{
        $_SESSION['permitido'] = '5589ssaw65';
		$_SESSION['emailRec2'] = $email;
		header("Location: alteraSenha.php");	
	}
}
?>