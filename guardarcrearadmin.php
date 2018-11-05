<?php
session_start();
$nombre=$_REQUEST['nombre_admin'];
$contrasena=$_REQUEST['pass'];

try
{
    require_once('conexion.php');
    $sql="INSERT INTO `admin`(`id_admin`,`nombre_admin`,`contrasena_admin`)VALUES(NULL,'$nombre','$contrasena')";
    $resultado =$conn->query($sql);
}catch(Exception $e){  
    $error=$e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    if($resultado){
        echo "Administrador creado satisfactoriamente";
        echo "<br>";
        
        echo "<a href=menu.php>Volver al inicio</a>";
    }else{
        echo "Hubo un error al tratar de crear al administrador";
        echo "<br>";
        echo "<a href=menu.php>Volver al menu</a>";
    }
    ?>
    </h1>
</body>
</html>