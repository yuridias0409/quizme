<?php
session_start();
include 'configs.php';
if(isset($_POST["email"]) && isset($_POST["senha"])){
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $query="UPDATE tbl_usuarios SET senha = '$senha' WHERE email = '$email'";
    $sqlCodigo = mysqli_query($con,$query);

    $queryLimpa="DELETE FROM tbl_rec_senha WHERE email = '$email'";
    $sqlCodigo2 = mysqli_query($con,$queryLimpa);

    $_SESSION['alert']="<script type='text/javascript'>alert('Senha alterada com sucesso!')</script>";
    header("Location: index.php");

}   else{
    header("Location: index.php");
   
}
?>