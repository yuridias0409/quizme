<!-- Cabeçalho PHP -->

<?php
if ((isset($_COOKIE['profid']))||(isset($_COOKIE['admid']))||(isset($_COOKIE['rootid']))) {
	header('location:./aulas');
}
?>

<!-- HTML da página inicia aqui -->
<!DOCTYPE html>
    <html>
        <!-- Head -->
        <head>
	        <title></title>
	        <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon" />
	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	        <meta charset="utf-8">
	        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	        <meta name="viewport" content="width=device-width">
	        <link rel="stylesheet" type="text/css" href="../style.css">
	        <meta charset="utf-8">
        </head>

        <!-- CSS implementado -->
        <style type="text/css">
            .form-control{
                box-shadow: 2px 2px 4px #636363;
            }
            .btn:hover{
                box-shadow: 2px 2px 4px #636363;
            }

            .logo{
                width:50%;
            }
        </style>

        <!-- Body - Inicio  -->
        <body id="background-professor">
	        <center>
                <div class="card w-50 cardLoginProf">
                    
                    <form action="./loginadm.php">
                        <div class="container">

                            <!-- <img scr="../contorno.png" class="img-thumbnail"> -->
                            <!-- <img src="https://img.itdg.com.br/tdg/images/recipes/000/031/593/318825/318825_original.jpg?mode=crop&width=710&height=400"> -->
                            <img src="../contorno.png" class="logo">
                            <h4>Professor</h4>

                                
                                <div class="form-group col-md-6">
                                    <label for="login">Login</label>
                                    <input type="text" name="login" id="login" class="form-control" placeholder="Login">
                                </div>
                            
                                <div class="form-group col-md-6">
                                    <label for="pass">Senha</label>
                                    <input type="password" name="pass" class="form-control" id="pass" placeholder="Senha">
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary">Entrar</button>

                            
                        </form>
                        <br>

                        <a href="cadp.php">
                            Cadastre-se!
                        </a>
                        
                        <br>
                        </div>
                        
                </div>
		        
            </center>

            <!-- Áudio do site - REMOVER -->
	        <!-- <audio src="../audios/inicial_professor.mpeg" autoplay loop id="audio"></audio> -->
            <script src="../js_imagens.js"></script>
            <script type="text/javascript">
                var button = document.getElementById('button');
                var audio = document.getElementById('audio');
                function pause() {
                    audio.pause();
                    button.className = "fa fa-volume-up";
                    button.setAttribute('onclick','play()');
                }
                function play(argument) {
                    audio.play();
                    button.className = "fa fa-volume-off";
                    button.setAttribute('onclick', 'pause()');
                }
            </script>
        </body>
    </html>