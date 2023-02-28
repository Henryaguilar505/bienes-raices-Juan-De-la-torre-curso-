<?php 

 $id = $_GET['id'];
 $id = filter_var($id, FILTER_VALIDATE_INT);
 
 if(!$id){
    header('Location:index.php');
 }

  
 require 'includes/app.php';
 $db = conectarDB();
 
 //escribir el query
 $query = "SELECT * FROM propiedades WHERE id = ${id}";
 
 //consultar la db
 $resultado = mysqli_query($db, $query);

//validar que haya coincidencias
if(!$resultado->num_rows){
    header('Location:index.php'); // si no hay coincidencias vamos a redireccionar
}

 $propiedad = mysqli_fetch_assoc($resultado);

 IncluirTemplate('header');

?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

                <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="destacada" loading = "lazy">

            <div class="resumen-propiedad">
                <p class="precio"> $<?php echo $propiedad['precio']; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img loading="lazy" class="icono" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad['wc']; ?></p>
                    </li>

                    <li>
                        <img loading="lazy" class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad['estacionamiento']; ?></p>
                    </li>

                    <li>
                        <img loading="lazy" class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $propiedad['habitaciones']; ?></p>
                    </li>
                </ul>

                <p><?php echo $propiedad['descripcion']; ?></p>
            </div>
    </main>

    
<?php IncluirTemplate('footer') ?>