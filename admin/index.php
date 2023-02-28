<?php
//importar las funciones
require '../includes/app.php'; 
 //comprobar la session
    estaAutenticado();

 use App\Propiedad;   

    //implementar un metodo para leer las propiedades y asignar los resultados a una variable
   $propiedades = Propiedad::all();  

   $resultado = $_GET['resultado'] ?? null;

   if($_SERVER['REQUEST_METHOD']=== 'POST'){ //comprobar si se ha enviado un id por POST
      $id = $_POST['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT); //Filtrar el Id

      if($id){ //si hay un Id procedemos a buscarlo en la base de datos con la funcion find()

         $propiedad = Propiedad::find($id); //$porpiedad ahora es un objeto porque es lo que find retorna

         $propiedad->eliminar(); //Eliminar no necesita pasar como paramtro el id ya que $propiedad es el obejto en si
         //eliminar el archivo
         $query = "SELECT imagen FROM propiedades WHERE id = {$id}";
         $resultado = mysqli_query($db, $query);
         $propiedad = mysqli_fetch_assoc($resultado);

         unlink('../includes/imagenes/' . $propiedad['imagen']); //borrar

      }
    
   }

   IncluirTemplate('header');
  
 ?>

    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        <?php if(intval($resultado) === 1):?>
            <p class="alerta exito">Anuncio Registado Correctamente</p>
        <?php elseif(intval($resultado)===2):?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif(intval($resultado)===3):?>
            <p class="alerta exito">Anuncio Borrado Correctamente</p>
         <?php endif; ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

         <table class="propiedades">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Titulo</th>
                  <th>Imagen</th>
                  <th>Precio</th>
                  <th>acciones</th>
               </tr>
            </thead>

            <tbody>
               <?php foreach ($propiedades as $propiedad):  ?>
               <tr>
                  <td><?php echo $propiedad->id; ?></td>
                  <td><?php echo $propiedad->titulo; ?></td>
                  <td><img src="/includes/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" alt="imagen"></td>
                  <td>$<?php echo $propiedad->precio; ?></td>
                  <td>
                     <form class="w-100" method="POST">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                        <input type="submit" value="Eliminar" class="boton-rojo-block">
                     </form>

                      <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>"  class="boton-amarillo-block">Actualizar</a>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>

         </table>
    </main>

 <?php 

         mysqli_close($db);
         IncluirTemplate('footer');
  ?>