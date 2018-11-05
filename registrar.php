<?php
session_start();
try{
    require_once('conexion.php');
    $sql = "SELECT * FROM `admin`";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {     
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['loggedin'] = true;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60); 
        $_SESSION['nombre_admin'] = $row['nombre_admin'];
        $_SESSION['id_admin'] = $row['id_admin'];
     }
     mysqli_close($conn); 
}catch(Exception $e){
    $error=$e->getMessage();
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo $_SESSION['nombre_admin'];
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
    <div class="contenedor-trabajador">
        <main>
            <div class="formulario-trabajador">
                    <form action="guardar.php" class="formulario" method="POST">
                            <fieldset>
                                <div class="contenido-datos-trabajador">
                                        <div class="col-12">
                                                <label for="date" class="label-trabajador">date:</label>
                                                <input type="date" name="fecha" class="input-trabajador">


                                                <label for="container" class="label-trabajador">container: </label>
                                                <input type="text" name="container" class="input-trabajador">

                                                <label for="type" class="label-trabajador">type: </label>
                                                <input type="text"  name="typee"class="input-trabajador">
                                                
                                                <label for="to" class="label-trabajador">to: </label>
                                                <input type="text" name="too" class="input-trabajador">

                                                <label for="company" class="label-trabajador">company: </label>
                                                <input type="text" name="company" class="input-trabajador">

                                                <label for="from" class="label-trabajador">from: </label>
                                                <input type="text" name="froom" class="input-trabajador">

                                                <label for="chassis" class="label-trabajador">chassis: </label>
                                                <input type="text"  name="chassis" class="input-trabajador"> 
         
                                        </div>
                                </div>
                                <legend>registrar</legend>
                            </fieldset>

                            <div class="boton">
                            <center><input type="submit" value="GUARDAR"></center>
                            </div>
                        </form>

                        <center>
                <div class="boton">
                                <a href="menu.php">Menu</a>
                                </div>
                </center>
            </div>
        </main>
    </div> <!--contenedor-->

</body>
</html>