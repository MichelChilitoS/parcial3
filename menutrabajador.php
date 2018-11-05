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

<?php    
    try{
        require_once('conexion.php');
        $sql = "SELECT * FROM `registro` WHERE id_trabajador_forey = '$_SESSION[id_trabajador]'";
        $resultado = $conn->query($sql);
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
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Menu</title>
</head>
<body>
    <div class="container">
    <header>

        <nav class="#64b5f6 blue lighten-2">
    <div class="nav-wrapper">
    Bienvenido <?php echo $_SESSION['nombre_trabajador']; ?>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        
        <li><a href="index.php">Cerrar session<?php echo "<a href=cerrarsession.php></a>"; ?></a></li>
      </ul>
    </div>
  </nav>     
  <center><img src="img/logo.png" alt="Logo empresa"></center>

        

            <input type="text" name=buscador id="buscador" placeholder="aaaa-mm-dd">
       
    </header>

    <div class="row">
        <section>
            <center><h2>Datos Almacenados</h2></center>
            <div>
                <table class="striped centered responsive-table">
                   <div>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Container</th>
                            <th>Chassis</th>
                            <th>Type</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Company</th>
                        </tr>
                    </thead>
                   </div>
        
                    <div>
                        <tbody>
                            <?php while($registros = $resultado->fetch_assoc() ){ ?>
                                  <tr>
                                      <td><?php echo $registros['fecha']?></td>
                                      <td><?php echo $registros['container']?></td>
                                      <td><?php echo $registros['chassis']?></td>
                                      <td><?php echo $registros['typee']?></td>
                                      <td><?php echo $registros['froom']?></td>
                                      <td><?php echo $registros['too']?></td>
                                      <td><?php echo $registros['company']?></td>
                                  </tr>
                               <?php }?>
                        </tbody>
                    </div>
                </table>

                <center>
                <div class="boton">
                    <a class="waves-effect waves-light btn" href="registrartrabajador.php" >Crear Nuevo Registro</a>
                </div>
                </center>
            </div>
        </section>
    </div>
    </div>
        
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 
    <script src="js/script.js"></script>
</body>
</html>