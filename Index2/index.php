<!DOCTYPE html>
<html>
<head>
	<title>Quiz-me Edu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="index2.css">

</head>

<body>
    <!-- Barra lateral -->
    
    <div class="sidenav">
        <div class="login-main-text">
            <h2>LOGO </h2>
        </div>
        <div class="btn-menu">
            <button class="btn btn-secondary btn-menu1">Como usar?</button>
            <button class="btn btn-secondary btn-menu2">Sobre</button>
        </div>   
    </div>

    <!-- Área do login -->
    <div class="main">
        <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <div class="miniLogo">
                <p>Mini Logo!</p>
            </div>
            <form>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control" placeholder="Email:">
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" class="form-control" placeholder="Senha">
                </div>
                <p class="esqueceuSenha"><a class="esqueceuSenha2" href="#">Esqueceu a senha?</a></p>
                <a class="btn btn-secondary" href="#modalRegistro" data-toggle="modal">Registrar-se</a>
                <button type="submit" class="btn btn-black btn-position">Logar</button>
            </form>
        </div>
        </div>
    </div>

    <!-- Modal do registro -->
    <div id="modalRegistro" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">			
                    <h4 class="modal-title">Registrar</h4>	
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="/examples/actions/confirmation.php" method="post">
                        <label>Nome:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nome" placeholder="Nome" required="required">		
                        </div>
                        <label>Email:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email" required="required">		
                        </div>
                        <label>Senha:</label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="senha" placeholder="Senha" required="required">	
                        </div>
                        <label>Confirme a senha:</label>  
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirma_senha" placeholder="Confirme a senha" required="required">	
                        </div>     
                        <div class="form-group">
                            <button type="submit" class="btn btn-black btn-primary btn-lg btn-block login-btn">Registre-se</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>     
</body>
</html>

