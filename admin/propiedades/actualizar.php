<?php
//importar las funciones y conexion a base de datos
use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';
//comprobar la session
estaAutenticado();

//obtener el id
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT); //validar que el id sea un numero entero

if (!$id) {
    header('Location:/admin');
}

$propiedad = Propiedad::find($id); //buscamos la propiedad por el id y a la vez devolvemos el resultado como un objeto
$errores = Propiedad::getErrores(); //esta funcion devuelve los errores (ya que tenemos un objeto)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //asignar los cambios que el usuario vaya haciendo en cada campo
    $args = $_POST['propiedad'];
    //sincronizar los datos en memoria a medida que el usario los vaya editando
    $propiedad->sincronizar($args);
    //validacion
    $errores = $propiedad->validar();

    //* subida de archivos
    //generar nombre unico para cada imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    if ($_FILES['propiedad']['tmp_name']['imagen']) { //comprobar si existe la imagen
        //realizar un resize a la imagen con intervention Image
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600); //obtener la imagen y definir su tamanio
        //setear la imagen
        $propiedad->setImagen($nombreImagen); //asignar el nombre de la imagen que creamos

        //guardar la imagen en el servidor
        $image->save(CARPETAIMAGENES .'/' . $nombreImagen); 
    }
    
    if (empty($errores)) {
        $resultado = $propiedad->guardar();
    }
}

?>

<?php

IncluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="" class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_propiedases.php' ?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php IncluirTemplate('footer'); ?>