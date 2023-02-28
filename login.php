<?php

//exportar la base de datos
require 'includes/app.php';
$db = conectarDB();

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //sanitizar los datos
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El email es obligatorio o no es valido";
    }

    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    //si no hay erores
    if (empty($errores)) {
        //comporbar si el usuario existe 
        $query = "SELECT * FROM usuario WHERE email = '${email}' ";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) { //si hay coincidencias
            //verificar que el password sea correcto]
            $usuario = mysqli_fetch_assoc($resultado);
            $auth = password_verify($password, $usuario['password']);

            //si el password es correcto
            if ($auth) {
                session_start();

                //llenar arreglo de la session
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                echo "todo bien";
        

                header('Location:admin');
            } else {
                $errores[] = "El password y el usuario no coinciden";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}

//incluir el header
IncluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Iniciar Sesión</h1>

    <form class="formulario contenido-centrado" method="POST">

        <?php foreach ($errores as $error) : ?>

            <div class="alerta error">
                <?php echo $error; ?>
            </div>

        <?php endforeach; ?>

        <fieldset>
            <legend>E-mail y password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder=" tu E-mail">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Tu password">

        </fieldset>

        <button type="submit" class=" boton-verde">Iniciar sesión</button>


    </form>
</main>

<?php IncluirTemplate('footer'); ?>