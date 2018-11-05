<?php
session_start();
try{
    require_once('conexion.php');
    $sql = "SELECT * FROM `trabajador` where id_trabajador = '$_SESSION[id_trabajador]'";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {     
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['loggedin'] = true;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60); 
        $_SESSION['nombre_trabajador'] = $row['nombre_trabajador'];
        $_SESSION['id_trabajador'] = $row['id_trabajador']; 
        $_SESSION['id_admin_forey_trabajador'] = $row['id_admin_forey_trabajador']; 
     }
}catch(Exception $e){
    $error=$e->getMessage();
}    

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo $_SESSION['nombre_trabajador'];
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
    
    if(isset($_REQUEST['fecha'])){
        $date = $_REQUEST['fecha'];
    }
    if(isset($_REQUEST['container'])){
        $container = $_REQUEST['container'];
    }

    if(isset($_REQUEST['typee'])){
        $type = $_REQUEST['typee'];
    }
    if(isset($_REQUEST['too'])){
        $too = $_REQUEST['too'];
    }

    if(isset($_REQUEST['company'])){
        $company = $_REQUEST['company'];
    }
    if(isset($_REQUEST['froom'])){
        $froom = $_REQUEST['froom'];
    }

    if(isset($_REQUEST['chassis'])){
        $chassis = $_REQUEST['chassis'];
    }
    
    try{
        require_once('conexion.php');
    $sql2 = "INSERT INTO `registro`(`fecha`,`container`,`chassis`,`typee`,`froom`,
                        `too`,`company`,`id_admin_forey`,`id_trabajador_forey`)
    values('$date', '$container', '$chassis', '$type', '$froom', '$too', '$company',
    '$_SESSION[id_admin_forey_trabajador]','$_SESSION[id_trabajador]');";
    $resultado = $conn->query($sql2);
    }
    catch(Exception $e){
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
    <title>Document</title>
</head>
<body>
    <div class="contenedor">
        <header>
            <img src="img/logo.png" alt="imagen logo">
        </header>

        <section>
            <?php
        if($resultado){
            echo "<h2>Datos guardados satisfactoriamente</h2>";
        echo "<center><div class=boton><a href=menutrabajador.php> Volver</a></div></center>";
        }
        else{
            echo "Error al tratar de guardar los datos";
            echo "<center><div class=boton><a href=menutrabajador.php> Volver</a></div></center>";
        }
    ?>

    <?php  $conn->close(); ?>
        </section>
    </div>
</body>
</html>