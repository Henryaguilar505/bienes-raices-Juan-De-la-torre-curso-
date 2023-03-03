<?php
//*crer vendedores

require '../../includes/app.php'; //importar la funciones

use App\Vendedor;

estaAutenticado(); //comprobar si  esta autenticado

$vendedor = new Vendedor;

//arreglo de errores
$errores = Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $vendedor = new Vendedor($_POST['vendedor']);

    $errores = $vendedor->validar();

    if(empty($errores)){
        var_dump('guardando');
        $vendedor->guardar();
    }

}

IncluirTemplate('header');

?>


<main class="contenedor seccion">
    <h1>Registrar Vendedores</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/vendedores/crear.php" >

        <?php include '../../includes/templates/formulario_vendedores.php' ?>

        <input type="submit" value="Registrar vendedor(a)" class="boton boton-verde">
    </form>
</main>

<?php IncluirTemplate('footer'); ?>