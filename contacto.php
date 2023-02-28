<?php 
    require 'includes/app.php';
    IncluirTemplate('header'); 
?>
    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="imagen contacto" loading = "lazy">
        </picture>


        <form class="formulario">
            <fieldset>
                <legend>Informacion personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Tu nombre">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="E-mail">

                <label for="telefono">telefono</label>
                <input type="number" name="telefono" id="telefono" placeholder="Tu telefono">

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <label for="opciones">Vende o Compra</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" name="presupuesto" id="presupuesto" placeholder="tu precio o presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>¿Cómo desea ser contactado?</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" id="contactar-telefono">
                
                    <label for="contactar-email">E-mail</label>
                    <input type="radio" name="contacto" id="contactar-eamil">
                </div>

                    <p>Si seleccionó télefono elija la fecha y hora</p>

                    <label for="fecha">fecha:</label>
                    <input type="date" name="fecha" id="fecha">

                    <label for="hora">Hora:</label>
                    <input type="time" name="hora" id="hora">
               
            </fieldset>

            <input type="submit" class="boton-verde" value="Enviar">
        </form>
    </main>

<?php IncluirTemplate('footer') ?>