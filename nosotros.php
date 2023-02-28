<?php 
    require 'includes/app.php';
    IncluirTemplate('header');
 ?>

    <main class="contenedor seccion">
        <h3>conoce sobre Nosotros</h3>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="sobre nosotros" loading = "lazy">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>

                <p>
                    Egestas sed sed risus pretium quam vulputate. Donec adipiscing tristique risus nec feugiat in fermentum. Velit laoreet id donec ultrices tincidunt arcu. Purus non enim praesent elementum facilisis leo vel fringilla. Vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt ornare. Magnis dis parturient montes nascetur ridiculus mus. Amet purus gravida quis blandit turpis cursus in hac habitasse. Nunc consequat interdum varius sit amet mattis vulputate enim. Et tortor consequat id porta nibh venenatis. Nulla facilisi nullam vehicula ipsum a arcu cursus. Amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Turpis egestas sed tempus urna et pharetra pharetra. Fames ac turpis egestas sed tempus urna. Condimentum id venenatis a condimentum vitae sapien. Est placerat in egestas erat imperdiet sed. Faucibus pulvinar elementum integer enim neque volutpat ac. Cursus vitae congue mauris rhoncus. Dignissim sodales ut eu sem integer vitae.
                </p>

                <p> 
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum saepe explicabo doloremque quos, ex quidem corrupti odit nulla vel optio quae. Modi explicabo qui numquam corrupti consectetur adipisci sit odio.
                </p>   
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h3>Más Sobre Nosotros</h3>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Facere illo molestiae dolor? Aperiam, illo? Doloribus aliquam dolores magni
                    exercitationem recusandae alias   dolore nemo sapiente voluptate laboriosam.
                     Similique neque illum pariatur.
                </p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Facere illo molestiae dolor? Aperiam, illo? Doloribus aliquam dolores magni
                    exercitationem recusandae alias   dolore nemo sapiente voluptate laboriosam.
                     Similique neque illum pariatur.
                </p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Facere illo molestiae dolor? Aperiam, illo? Doloribus aliquam dolores magni
                    exercitationem recusandae alias   dolore nemo sapiente voluptate laboriosam.
                     Similique neque illum pariatur.
                </p>
            </div>
        </div>
    </section>

<?php IncluirTemplate('footer') ?>