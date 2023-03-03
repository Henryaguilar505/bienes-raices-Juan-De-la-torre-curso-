<?php
//*crer vendedores

require '../../includes/app.php'; //importar la funciones
use App\Vendedor;
estaAutenticado(); //comprobar si  esta autenticado

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('Location:/admin');
}

$vendedor = Vendedor::find($id);

//arreglo de errores
$errores = Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $args = $_POST['vendedor'];
    
    //sincronizamos con los datos nuevos
    $vendedor->sincronizar($args);

    $errores = $vendedor->validar();

    if(empty($errores)){
       $resultado = $vendedor->guardar();
    }

}

IncluirTemplate('header');

?>


<main class="contenedor seccion">
    <h1>Actualizar Informacion</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" >

        <?php include '../../includes/templates/formulario_vendedores.php' ?>

        <input type="submit" value="Guardar Cambios" class="boton boton-verde">
    </form>
</main>

<?php IncluirTemplate('footer'); ?>