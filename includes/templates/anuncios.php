<?php
//importar la conexion
$db = conectarDB();

//escribir el query
$query = "SELECT * FROM propiedades LIMIT {$limite}";
//consultar la db
$resultado = mysqli_query($db, $query);


?>


<div class="contenedor-anuncios">
    <?php while ($anuncio = mysqli_fetch_assoc($resultado)) : ?>
        <div class="anuncio">
        
                <img src="imagenes/<?php echo $anuncio['imagen']; ?>" alt="anuncio" lading="lazy">
            
            <div class="contenido-anuncio">
                <h3><?php echo $anuncio['titulo']; ?></h3>
                <p><?php echo $anuncio['descripcion']; ?></p>
                <p class="precio">$<?php echo $anuncio['precio']; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $anuncio['wc']; ?></p>
                    </li>

                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $anuncio['estacionamiento']; ?></p>
                    </li>

                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $anuncio['habitaciones']; ?></p>
                    </li>

                </ul>

                <a class="boton-amarillo-block" href="anuncio.php?id=<?php echo $anuncio['id']; ?>">Ver Propiedad</a>
            </div>
            <!--contenido anuncio-->
        </div>
        <!--Anuncio-->
    <?php endwhile; ?>
</div>
<!--contenedor de anuncios -->


<?php mysqli_close($db);  ?>