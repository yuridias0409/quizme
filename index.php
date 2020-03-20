<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz-me Edu</title>
    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        
        ga('create', 'UA-154868463-1', 'auto');
        ga('create', 'UA-154868463-1', 'auto', 'tracker1');

        ga(function() {
        // Logs an array of all tracker objects.
        console.log(ga.getAll());
        });
        ga('send', 'tracker1');
    </script>
    <!-- End Google Analytics -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="index.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

    <?php
        if(isset($_SESSION['alert'])){
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    ?>
</head>

<body>
    <!-- Barra lateral -->
    <div class="sidenav">
        <div class="login-main-text">
            <h2><img class="logoMaior" src="contorno.png"></h2>
        </div>
        <div class="btn-menu">
            <a class="btn btn-secondary btn-menu1" href="#modalCurso" data-toggle="modal">Como Usar?</a>
            <a class="btn btn-secondary btn-menu2" href="#modalSobre" data-toggle="modal">Sobre</a>
        </div>   
    </div>

    

    <!-- Área do login -->
    <div class="main">
        <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <div class="miniLogo">
                <p ><img class="miniLogo" src="quiz_me_logo_normal.png"> </p>
            </div>
            <form action="login.php">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email:">
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
                </div>
                <p class="esqueceuSenha"><a class="esqueceuSenha2" href="#modalRecSenha" data-toggle="modal">Esqueceu a senha?</a></p>
                
                <a class="btn btn-secondary btnRegistro" href="#modalRegistro" data-toggle="modal">Registrar-se</a>
                <button type="submit" class="btn btnLogin">Logar</button>
            </form>
            <br>
            <a type="submit" class="btn btnProf" href="/professor/">Professor</a>
        </div>
        </div>
    </div> 
    <!-- Modal dos cursos -->
    <div id="modalCurso" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">			
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <iframe width="380" height="315" src="https://www.youtube.com/embed/SH4GDWC02Do" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe width="380" height="315" src="https://www.youtube.com/embed/ik7fqSs9wvE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sobre -->
    <div id="modalSobre" class="modal fade mSobre">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">	
                    <h4 class="modal-title">Nossa história:</h4>		
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px;">A Quiz-me EDU é uma plataforma gratuita, pensada por Wallacy Oliveira Pasqualini Nerio e desenvolvida por Misael Guilhardes de Freitas, Yuri Dias, Eduardo Castro Junqueira Paranaiba e Gabriel Treviso Genovez, como produto educacional do Mestrado Profissional em Educação Profissional e Tecnológica (ProfEPT). O objetivo da plataforma é contribuir com a avaliação da aprendizagem cooperativa, proporcionando aos professores uma maneira alternativa e interativa de avaliar a aprendizagem dos estudantes, e visando estimular essa aprendizagem na interação aluno-aluno, aluno-professor e professor-aluno. A plataforma é parte integrante da dissertação de mestrado, cuja terá o link divulgado aqui tão logo tenha sido defendida e publicada. O código da plataforma é aberto, e pode ser acessado no GitHub, através do link https://github.com/misaruto/quizmeedu.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Recuperação Senha -->
    <div id="modalRecSenha" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Recuperação de Senha</h4> 			
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="mandRecSenha.php" method="post">
                        <div class="form-group">
                            <label for="rec_email" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166); ">
                                Digite seu e-mail
                            </label>
                            <input type="Email" name="email" class="form-control" id="rec_email" aria-describedby="emailHelp" placeholder="E-mail" autofocus style="background-color: #fff; font-weight: bold; width: 80%;" required oninput="document.getElementById('sub').disabled = false">
                            <br>
                            <br>
                            <button class="btn btn-primary btnEnviarRec" type="submit" id="sub" disabled>
                                Enviar
                            </button>
                            <div class="alert alert-danger" hidden id="alert"> 
                                Nenhum usuário encontrado.
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    <!-- Modal do registro -->
    <div id="modalRegistro" class="modal fade">
        <div class="modal-dialog modal-registro">
            <div class="modal-content">
                <div class="modal-header">			
                    <h4 class="modal-title">Registrar</h4>	
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="cadastro.php">
                        <label>Nome:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required="required">		
                        </div>
                        <label>Email:</label>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" required="required">		
                        </div>
                        <label>Senha:</label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="senha" id="s1" placeholder="Senha" oninput="vSenha()" required="required">	
                        </div>
                        <label>Confirme a senha:</label>  
                        <div class="form-group">
							<input type="password" name="senha2" required class="form-control" id="s2" oninput="vSenha()" placeholder="Senha">	
                        </div>  
                        <output style="margin-left: 15%" id="msg"></output>   
                        <div class="form-group">
                            <button type="submit" id="btnCadastro" disabled class="btn btn-black btn-primary btn-lg btn-block login-btn">Registre-se</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>     
</body>
</html>

