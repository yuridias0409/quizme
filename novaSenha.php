<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz-me Edu</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    </div>
    <!-- Área da Recuperação -->
    <div class="main">
        <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <div class="miniLogo">
                <p ><img class="miniLogo" src="quiz_me_logo_normal.png"> </p>
            </div>
            <form action="verificaCodigo.php" method="POST">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email:" value="<?php echo $_SESSION['emailRec1']?>">
                </div>
                <div class="form-group">
                    <label>Codigo:</label>
                    <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código:">
                </div>
                <button type="submit" class="btn btn-secondary btnRegistro">Recuperar Senha</button>
            </form>
        </div>
        </div>
    </div>
</body>
</html>

