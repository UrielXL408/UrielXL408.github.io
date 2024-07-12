<?php
include('../PHP/conexion.php');
$con = $conexion;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arte Clasico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXhW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Estilo1.css">


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll(".card");

            cards.forEach(card => {
                const cardBody = card.querySelector(".card-body");
                const cardImage = card.querySelector("img, embed");

                cardBody.addEventListener("click", function() {
                    card.classList.toggle("expanded");
                });

                cardImage.addEventListener("click", function(event) {
                    event.stopPropagation();
                    openModal(cardImage.src);
                });
            });

            function openModal(src) {
                const modal = document.getElementById("imageModal");
                const modalImg = document.getElementById("modalImage");
                modal.style.display = "block";
                modalImg.src = src;
            }

            const closeModal = document.getElementsByClassName("close")[0];
            closeModal.onclick = function() { 
                document.getElementById("imageModal").style.display = "none";
            }
        });
    </script>
</head>
<body>
    <!-- The Modal -->
<div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>
    <header class="b1">
        <nav class="navbar">
            <a class="nav-link" aria-current="page" href="\PROYECTO\Index.php">Inicio</a>
            <span class="nav-text">Cuadros de Arte Clasico</span>
        </nav>
        
    </header>
    <section class=v1>
    <div class="vr2">
    <br><br><br><br>
    </div>
    <div class="v3">
            <?php
            // Consulta para obtener todos los archivos de la tabla Acrilicos
            $sqlArchivos = "SELECT * FROM Aclasico";
            $queryArchivos = mysqli_query($con, $sqlArchivos);

            if ($queryArchivos) {
                while ($rowArchivo = mysqli_fetch_assoc($queryArchivos)) {
                    ?>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <?php
                                // Verifica si la ruta del archivo es una imagen o PDF
                                $ext = pathinfo($rowArchivo['Ruta'], PATHINFO_EXTENSION);
                                if (in_array($ext, ['pdf'])) {
                                    // Mostrar archivo PDF usando embed
                                    ?>
                                    <embed src="<?= $rowArchivo['Ruta'] ?>" type="application/pdf" width="100%" height="200px">
                                <?php } else {
                                    // Mostrar imagen
                                    ?>
                                    <img src="<?= $rowArchivo['Ruta'] ?>" class="img-fluid rounded-start" alt="<?= $rowArchivo['Nombre'] ?>">
                                <?php } ?>
                            </div>
                            <div class="col-md-12">
                                <div class="card-body text-center d-flex flex-column justify-content-center">
                                    <h5 class="card-title"><?= htmlspecialchars($rowArchivo['Nombre']) ?></h5>
                                    <div class="details">
                                        <p class="card-text"><?= htmlspecialchars($rowArchivo['Descripcion']) ?></p>
                                        <p class="card-text">Precio: $ <?= htmlspecialchars($rowArchivo['Precio']) ?></p>
                                        <a href="#" class="btn btn-primary mt-auto">Comprar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Error al ejecutar la consulta: " . mysqli_error($con);
            }
            ?>
        </div>
</section>
<!-- The Modal -->
<div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>
</body>
</html>