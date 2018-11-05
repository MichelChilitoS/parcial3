<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //echo $_SESSION['nombre_trabajador'];

} else {
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='index.php'>Login</a>";

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='index.php'>Necesita Hacer Login</a>";
exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
</head>
<body>
    <div class="contenedor">
        <header>
            <img src="img/logo.png" alt="logo empresa">
        </header>

        <h1>Nuevo Trabajador</h1>

        <div class="contenido">
            <main>

                <section>
                    <div class="datos">
                            <form method="POST" action="guardarcreartrabajador.php">
                            
                                <label for="nombre">name user: </label>
                                <input type="text" name="nombre_trabajador">
            
                                <label for="pass">password: </label>
                                <input type="password" name="pass">

                                <div class="boton">
                                    <input type="submit" value="Crear" id="boton">
                                </div>
                            
                            </form>
                        </div>
                </section>

            </main>
        </div>

</body>
</html>