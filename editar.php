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
}catch(Exception $e){
    $error=$e->getMessage();
}    

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //echo $_SESSION['nombre_admin'];
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

<?php
   if(isset($_REQUEST['id_registro']))
   {
        $id_registro=$_REQUEST['id_registro'];
   }
    try{
        require_once('conexion.php');
        $sql = "select * from registro where `id_registro` = '$id_registro'";
        $resultado=$conn->query($sql);
    }catch(Exception $e){
        $error = $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Editar</title>
</head>
<body>
    <div class="contenedor-trabajador">
        <main>
            <div class="formulario-trabajador">
            <?php while($registros = $resultado->fetch_assoc()) {?>
                    <form action="guardareditar.php?id_registro=<?php echo $registros['id_registro']; ?>" class="formulario" method="POST">
                   
                            <fieldset>
                                <div class="contenido-datos-trabajador">
                                        <div class="col-12">
                                                <label for="date" class="label-trabajador">date:</label>
                                                <input type="date" value="<?php echo $registros['fecha']; ?>" name="fecha" class="input-trabajador">


                                                <label for="container" class="label-trabajador">container: </label>
                                                <input type="text" value="<?php echo $registros['container']; ?>" name="container" class="input-trabajador">

                                                <label for="type" class="label-trabajador">type: </label>
                                                <input type="text" value="<?php echo $registros['typee']; ?>"  name="typee"class="input-trabajador">
                                                
                                                <label for="to" class="label-trabajador">to: </label>
                                                <input type="text" value="<?php echo $registros['too']; ?>" name="too" class="input-trabajador">

                                                <label for="company" class="label-trabajador">company: </label>
                                                <input type="text" value="<?php echo $registros['company']; ?>" name="company" class="input-trabajador">

                                                <label for="from" class="label-trabajador">from: </label>
                                                <input type="text" value="<?php echo $registros['froom']; ?>" name="froom" class="input-trabajador">

                                                <label for="chassis" class="label-trabajador">chassis: </label>
                                                <input type="text" value="<?php echo $registros['chassis']; ?>"  name="chassis" class="input-trabajador">     
                                                  
                                        </div>
                                </div>
                                <legend>Editar</legend>
                            </fieldset>

                            <div class="boton">
                                    <input type="submit" value="Edit" id="boton">
                                </div>

                            <div class="boton">
                            <center><a href="menu.php">Menu</a></center>
                            </div>
                        <?php } ?>
                        </form>
   
            </div>
        </main>
    </div> <!--contenedor-->

</body>
</html>