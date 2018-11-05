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

        <h1>New Admin</h1>

        <div class="contenido">
            <main>

                <section>
                    <div class="datos">
                            <form method="POST" action="guardarcrearadmin.php">
                            
                                <label for="nombre">name user: </label>
                                <input type="text" name="nombre_admin">
            
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
    </form>
</body>
</html>