<?php
include('../PHP/conexion.php');
$con = $conexion;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXhW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Estilo2.css">
</head>
<body>
    <header class="b1">
        <nav class="navbar b1">
            <a class="nav-link" aria-current="page" href="\PROYECTO\Index.php">
                <button class="btn btn-custom">Inicio</button>
            </a>
            <span class="nav-text ms-auto">Nosotros</span>
        </nav>
    </header>
    <br><br><br><br><br><br>
    <section class="v2">
        <div class="v21">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-content">
                    <p>Me motivo a tener este negocio mi necesidad de tener un trabajo digno y que me apasionara. Por lo cual comencé a poner en práctica mis habilidades de dibujar y pintar
                         y así poder crear estas piezas de arte que pongo a la venta y poder compartir con el mundo un mi trabajo y mostrarles que tan hermoso puede ser el arte. 
                        Soy una persona que actualmente se esta preparando con una carrera profesional y por ende también necesito de este trabajo para poder salir adelante.
                        Cuando comencé con esto, al comencé con cuadros pequeños y que no estuvieran tan complicados. Pero poco a poco fui tomando más experiencia y he aprendido muchas técnicas que hoy en día hacen que mi trabajo sea aún más profesional. y así poder brindarles a mis clientes trabajos de calidad y que tengan una experiencia satisfactoria con mis trabajos.</p>
                </div>
                <div class="col-12 col-md-6 col-content img-container">
                    <?php
                    // Seleccionamos el registro con ID 4 desde la base de datos
                    $sqlArchivos = "SELECT Ruta FROM imagen WHERE IdImagen = 4";
                    $queryArchivos = mysqli_query($conexion, $sqlArchivos);

                    // Verificar si la consulta se realizó con éxito
                    if (!$queryArchivos) {
                        die('Error al ejecutar la consulta: ' . mysqli_error($conexion));
                    }

                    // Obtener el resultado de la consulta
                    $rowArchivo = mysqli_fetch_assoc($queryArchivos);

                    // Mostrar la imagen
                    echo '<img class="img-fluid" src="' . str_replace('C:/xampp/htdocs/', '/', $rowArchivo['Ruta']) . '" alt="Imagen">';
                    ?>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
