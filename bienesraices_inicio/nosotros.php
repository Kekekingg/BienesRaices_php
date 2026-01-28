<?php 
    require 'includes/funciones.php';
    //El inicio ayuda agregar el fondo
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros"/>
                </picture>
            </div>

            <div class="texto-nosotros">
                <!--Se usa en contenido que estemos citando-->
                <blockquote>
                    25 Años de Experiencia
                </blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure iste at exercitationem eveniet mollitia pariatur dolore nobis nihil nostrum ad, officia quae dolor et corporis. Minima harum beatae quam voluptatem.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, veritatis recusandae dolore excepturi, maxime aliquam incidunt autem, obcaecati quia reiciendis culpa veniam eligendi voluptas consequuntur adipisci? Dolores explicabo animi similique.</p>
            </div>
        </div>
    </main>


    <section class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptate, facere odit in quod iusto commodi facilis beatae fuga velit repudiandae reiciendis, quibusdam eligendi et? Quam voluptatem porro incidunt earum!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>El mejor Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptate, facere odit in quod iusto commodi facilis beatae fuga velit repudiandae reiciendis, quibusdam eligendi et? Quam voluptatem porro incidunt earum!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptate, facere odit in quod iusto commodi facilis beatae fuga velit repudiandae reiciendis, quibusdam eligendi et? Quam voluptatem porro incidunt earum!</p>
            </div>
        </div>
    </section>

<?php 
   incluirTemplate('footer');
?>