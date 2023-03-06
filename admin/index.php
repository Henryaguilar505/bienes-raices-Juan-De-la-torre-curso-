<?php
//importar las funciones
require '../includes/app.php';
//comprobar la session
estaAutenticado();

use App\Propiedad;
use App\Vendedor;

$propiedades = Propiedad::all();  //traer todas las propidades
$vendedores = Vendedor::all(); //traer todos los vendedores

$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //comprobar si se ha enviado un id por POST

   $id = $_POST['id'];
   $id = filter_var($id, FILTER_VALIDATE_INT); //Filtrar el Id

   if ($id) {
      $tipo = $_POST['tipo']; //si hay un $id vaalido porocedemos a buscar el tipo

      if (validarTipo($tipo)) { //comprobamos que sea un tipo valido
         if ($tipo === "vendedor") {
            //procedemos a eliminar
            $vendedor = Vendedor::find($id);
            $vendedor->eliminar();
         } elseif ($tipo === "propiedad") {
            //procedemos a eliminar
            $propiedad = Propiedad::find($id);
            $propiedad->eliminar();
         }
      }
   }
}

IncluirTemplate('header');

?>

<main class="contenedor seccion">
   <h1>Administrador de bienes raices</h1>

   <?php $mensaje = mostrarNotificaiones(intval($resultado)); ?>
   <?php if ($mensaje) : ?>
      <p class="alerta exito"><?php echo sanitizar($mensaje); ?></p>
   <?php endif; ?>

   <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
   <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo(a) Vendedor</a>

   <!--tabla de propiedades -->
   <h2>Propiedades</h2>
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
         <?php foreach ($propiedades as $propiedad) :  ?>
            <tr>
               <td><?php echo $propiedad->id; ?></td>
               <td><?php echo $propiedad->titulo; ?></td>
               <td><img src="/includes/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" alt="imagen"></td>
               <td>$<?php echo $propiedad->precio; ?></td>
               <td>
                  <form class="w-100" method="POST">
                     <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                     <input type="hidden" name="tipo" value="propiedad">
                     <input type="submit" value="Eliminar" class="boton-rojo-block">
                  </form>

                  <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
               </td>
            </tr>
         <?php endforeach; ?>
      </tbody>

   </table>

   <!--tabla de vendedores -->

   <h2>Vendedores</h2>
   <table class="propiedades">
      <thead>
         <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>acciones</th>
         </tr>
      </thead>

      <tbody>
         <?php foreach ($vendedores as $vendedor) :  ?>
            <tr>
               <td><?php echo $vendedor->id; ?></td>
               <td><?php echo $vendedor->nombre . ' ' . $vendedor->apellido; ?></td>
               <td><?php echo $vendedor->telefono; ?></td>
               <td>
                  <form class="w-100" method="POST">
                     <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                     <input type="hidden" name="tipo" value="vendedor">
                     <input type="submit" value="Eliminar" class="boton-rojo-block">
                  </form>

                  <a href="/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
               </td>
            </tr>
         <?php endforeach; ?>
      </tbody>

   </table>
</main>

<?php
IncluirTemplate('footer');
?>