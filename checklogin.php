<?php
session_start();
?>

<?php

$servername = getenv("MYSQL_SERVICE_HOST");
$db_port = getenv("MYSQL_SERVICE_PORT");
$username = "michelch";
$password = "michel123";
$database = "michelangelotrucking";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_REQUEST['usuario'];
$password = $_REQUEST['password'];
 
$sql = "SELECT * FROM `admin` WHERE `nombre_admin` = '$username'";
$sql2 = "SELECT * FROM `trabajador` WHERE `nombre_trabajador` = '$username'";

$result = $conexion->query($sql);
$result2 = $conexion->query($sql2);



if ($result->num_rows > 0) {     
    $row = $result->fetch_array(MYSQLI_ASSOC);

 if ($password == $row['contrasena_admin']){
    $_SESSION['loggedin'] = true;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60); 
    $_SESSION['nombre_admin'] = $username;
    $_SESSION['id_admin'] = $row['id_admin'];
    echo "Bienvenido! " . $_SESSION['nombre_admin'];
    echo "<br><br><a href=menu.php>Panel de Control</a>"; 
 
 }
 else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='index.php'>Volver a Intentarlo</a>";
 }
}

 // condicion if para la contraseña trabajador
  if ($result2->num_rows > 0) {     
    $row2 = $result2->fetch_array(MYSQLI_ASSOC);
  if($password == $row2['contrasena_trabajador']){
  $_SESSION['loggedin'] = true;
  $_SESSION['start'] = time();
  $_SESSION['expire'] = $_SESSION['start'] + (5 * 60); 
  $_SESSION['nombre_trabajador'] = $username;
  $_SESSION['id_trabajador'] = $row2['id_trabajador'];
  $_SESSION['id_admin_forey_trabajador'] = $row2['id_admin_forey_trabajador'];
  echo "Welcome! " . $_SESSION['nombre_trabajador'];
  echo "<br><br><a href=menutrabajador.php>Panel de Control</a>"; 
}
else { 
  echo "Username o Password failed.";

  echo "<br><a href='index.php'>Volver a Intentarlo</a>";
}
  }
 mysqli_close($conexion); 
 ?>
