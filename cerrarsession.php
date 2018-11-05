<?php

session_start();
unset ($SESSION['nombre_admin']);
unset ($SESSION['nombre_trabajador']);
session_destroy();

header('Location: http://localhost/michelangelotrucking/index.php');

?>