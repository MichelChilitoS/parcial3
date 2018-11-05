<?php
session_start();

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
    try{
        require_once('conexion.php');
        $sql = "SELECT * FROM `registro` INNER JOIN `admin` on registro.id_admin_forey = admin.id_admin";
        $sql2 = "SELECT  nombre_trabajador FROM trabajador INNER JOIN registro ON
        registro.id_trabajador_forey=trabajador.id_trabajador 
        where registro.id_trabajador_forey= trabajador.id_trabajador";

        $resultado = $conn->query($sql);
        $resultado2 = $conn->query($sql2);
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

    
        <nav class="#42a5f5 blue lighten-1">
            <div class="nav-wrapper">
            Bienvenido <?php echo $_SESSION['nombre_admin']; ?>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="crearadmin.php">Crear nuevo administrador</a></li>
                <li><a href="creartrabajador.php">Crear nuevo trabajador</a></li>
                <li><a href="index.php">Cerrar session<?php echo "<a href=cerrarsession.php></a>"; ?></a></li>
            </ul>
            </div>
        </nav>
        

        <div class="row">
            <center><img src="img/logo.png" alt="Logo empresa"></center>
        <div>
            
    </header>
    
            <section>
                <div class="row">
                    
                    <div class="col-s6">
                        <input type="text" name=buscador id="buscador" placeholder="aaaa-mm-dd">
                    </div>
                </div>

                <div class="row">
                    <center><h2>Datos Almacenados</h2></center>
                    <div class="contenido-tabla">
                        <table class="striped responsive-table">
                    <div class="contenido-thead">
                        <thead>
                            <tr>
                                <th>FECHA</th>
                                <th>CONTAINER</th>
                                <th>CHASSIS</th>
                                <th>TYPE</th>
                                <th>FROM</th>
                                <th>TO</th>
                                <th>COMPANY</th>
                                <th>SAVE FOR</th>
                                <th>EDITAR</th>
                                <th>BORRAR</th>
                                
                            </tr>
                        </thead>
                    </div>

                        <div class="contenido-tbody">
                            <tbody>
                            
                                <?php while( ($registros = $resultado->fetch_assoc()) && ($registros2 = $resultado2->fetch_assoc()) ){ ?>
                                
                                    <tr>
                                        <td><?php echo $registros['fecha']?></td>
                                        <td><?php echo $registros['container']?></td>
                                        <td><?php echo $registros['chassis']?></td>
                                        <td><?php echo $registros['typee']?></td>
                                        <td><?php echo $registros['froom']?></td>
                                        <td><?php echo $registros['too']?></td>
                                        <td><?php echo $registros['company']?></td>

                                        <td>
                                            <?php echo $registros2['nombre_trabajador'];?>
                                        </td>
                                        
                                        <td>
                                            <a href="editar.php?id_registro=<?php echo $registros['id_registro']; ?>"> Editar</a>
                                        </td>
                                        
                                        <td>
                                            <a href="borrar.php?id_registro=<?php echo $registros['id_registro']; ?>"> Borrar</a>
                                        </td>

                                        
                                    </tr>
                                <?php }?>
                
                                
                
                                
                            </tbody>
                        </div>
                    </table>
                    
                    <div class="row">
                        <h5>Registros Existentes :  <?php echo $resultado->num_rows ?>
                        <?php $conn-> close(); ?></h5>
                    </div>

                    
                </div>

            </section>

         
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 
    <script src="js/script.js"></script>
</body>
</html>