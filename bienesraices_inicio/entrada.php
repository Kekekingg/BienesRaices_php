<?php 
    require 'includes/funciones.php';
    //El inicio ayuda agregar el fondo
    incluirTemplate('header');
?>

    <main class="contenedor seccio contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad"/>
        </picture>

        <p class="informacion-meta">Escrito el: <span>21/10/2026</span> por: <span>Admin</span></p>
        
        <div class="resumen-propiedad">

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt minus quam quia. Maxime quibusdam saepe nulla nobis soluta expedita numquam rerum voluptates. Officiis corrupti eligendi similique soluta? Fugiat, minima quis.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tempora nam vitae perferendis modi illo quaerat aliquam blanditiis qui quibusdam, exercitationem cupiditate! Ullam accusamus nihil dolor, corrupti deserunt nisi voluptates.</p>
        </div>
    </main>

<?php 
    incluirTemplate('footer');
?>