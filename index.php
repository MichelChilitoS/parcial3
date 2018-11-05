<?php
require_once('conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
    <title>login</title>
</head>
<body>
    <div class="contenedor">

        <header>
            <img src="img/logo.png" alt="logo empresa">
        </header>

        <div class="contenido">
            <main>

                <section>
                    <div class="datos">
                            <form method="POST" action="checklogin.php">
            
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="usuario" name="usuario" type="text" class="validate">
                                        <label for="usuario">Usuario</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="password" name="password" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
                                </div>
                            
                            </form>
                        </div>
                </section>

            </main>
        </div>
        

    </div>

     
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 


</body>
</html>