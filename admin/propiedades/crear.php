<?php

//importar las funciones
require '../../includes/app.php';

//exxportar la case
use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image; //exportar la libreria de imagenes

//comprobar la session
estaAutenticado();

//conexion a la base de datos
$db = conectarDB();

//sirve para los place holder
$propiedad = new Propiedad;

//select para traer los vendeddores dessde la BD
$consulta = "SELECT * FROM vendedores";
$vendedores_nombres = mysqli_query($db, $consulta);

$errores = Propiedad::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //si se ha enviado el formulario..

    // debuguear($_FILES);
    //creamos una nueva instancia
    $propiedad = new Propiedad($_POST['propiedad']); // llenamos nuestro objeto con el array de post

    //generar nombre unico para cada imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    if ($_FILES['propiedad']['tmp_name']['imagen']) { //comprobar si existe la imagen
        //realizar un resize a la imagen con intervention Image
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600); //obtener la imagen y definir su tamanio

        //setear la imagen
        $propiedad->setImagen($nombreImagen); //asignar el nombre de la imagen que creamos
    }

    //validamos que no haya errores
    $errores = $propiedad->validar();

    // debuguear($propiedad);

    if (empty($errores)) { //*si no hay errores ...

        //comporobar si ya existe la carpeta de imganes
        if (!is_dir(CARPETAIMAGENES)) {
            mkdir(CARPETAIMAGENES);
        }

        //guardar la imagen en el servidor
        $image->save(CARPETAIMAGENES . '/' . $nombreImagen); //pasmos como parametros la direccion dond lo queremos guardar
        //guardar en la base de datos
         $propiedad->guardar(); //guardamos
    }
}
 
?>

<?php

IncluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_propiedases.php' ?>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php IncluirTemplate('footer'); ?>