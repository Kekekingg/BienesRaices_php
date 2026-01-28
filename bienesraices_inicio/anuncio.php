<?php 
    require 'includes/funciones.php';
    //El inicio ayuda agregar el fondo
    incluirTemplate('header');
?>

    <main class="contenedor seccio contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad"/>
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc"/>
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento"/>
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio"/>
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt minus quam quia. Maxime quibusdam saepe nulla nobis soluta expedita numquam rerum voluptates. Officiis corrupti eligendi similique soluta? Fugiat, minima quis.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tempora nam vitae perferendis modi illo quaerat aliquam blanditiis qui quibusdam, exercitationem cupiditate! Ullam accusamus nihil dolor, corrupti deserunt nisi voluptates.</p>
        </div>
    </main>

<?php 
    incluirTemplate('footer');
?>