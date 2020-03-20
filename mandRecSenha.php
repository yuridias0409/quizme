<?php
session_start();
include 'configs.php';
$email= $_POST["email"];
$queryExiste = "SELECT * FROM tbl_usuarios WHERE email = '$email'";
$sqlExiste = mysqli_query($con,$queryExiste);
$row = mysqli_fetch_object($sqlExiste);

if(empty($row)){
    $_SESSION['alert']="<script type='text/javascript'>alert('Email não cadastrado')</script>";
    header("Location: index.php");
}   else{
    $codigo = rand(10000,99999);
    $query = "INSERT INTO tbl_rec_senha(`Email`,`Codigo`) VALUES ('$email','$codigo')";
    $sql = mysqli_query($con,$query);

    $mensagem = "Seu código de recuperação é: $codigo";

    $mensagem = wordwrap($mensagem, 70);

    mail($email, 'Quiz-me Edu -Recuperar senha-', $mensagem);
    $_SESSION['alert']="<script type='text/javascript'>alert('Código de verificação enviado!')</script>";
    $_SESSION['emailRec1']=$email;
    header("Location: novaSenha.php"); 
}
?>