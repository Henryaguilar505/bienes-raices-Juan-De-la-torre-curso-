<?php 
require 'includes/app.php';
use App\Propiedad;

 $id = $_GET['id'];
 $id = filter_var($id, FILTER_VALIDATE_INT);
 
 if(!$id){
    header('Location:index.php');
 }

 $propiedad = Propiedad::find($id);

//validar que haya coincidencias
if(!$propiedad){
    header('Location:index.php'); // si no hay coincidencias vamos a redireccionar
}

 IncluirTemplate('header');

?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad->titulo; ?></h1>

                <img src="includes/imagenes/<?php echo $propiedad->imagen; ?>" alt="destacada" loading = "lazy">

            <div class="resumen-propiedad">
                <p class="precio"> $<?php echo $propiedad->precio; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img loading="lazy" class="icono" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>

                    <li>
                        <img loading="lazy" class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>

                    <li>
                        <img loading="lazy" class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                </ul>

                <p><?php echo $propiedad->descripcion; ?></p>
            </div>
    </main>

    
<?php IncluirTemplate('footer') ?>