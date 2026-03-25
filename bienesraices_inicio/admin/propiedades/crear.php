<?php 

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

    isAuth();

    $propiedad = new Propiedad;

    //Consulta para obtener todos los vendedores
    $vendedores = Vendedor::all();

    //Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    //Ejecutar el codigo despues de que el usuario envia el formulario
    //Valida que el request method sea de tipo post
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $propiedad = new Propiedad($_POST['propiedad']);

        // conservar valores para re-renderizar el formulario si hay error
        $titulo = $propiedad->titulo;
        $precio = $propiedad->precio;
        $descripcion = $propiedad->descripcion;
        $habitaciones = $propiedad->habitaciones;
        $wc = $propiedad->wc;
        $estacionamiento = $propiedad->estacionamiento;
        $vendedores_id = $propiedad->vendedores_id;

        //Generar nombre unico
        $nombreImagen = md5( uniqid(rand(), true) ) . ".jpg";

        //Configuracion del manager
        if(!empty($_FILES['propiedad']['tmp_name']['imagen'])) {
            $manager = new Image(Driver::class);
            $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);
            $propiedad->setImagen($nombreImagen);
        }

        $errores = $propiedad->validar();

        //Revisar que el arreglo de errores esta vacio
        if(empty($errores)) {

            /** SUBIDA DE ARCHIVOS **/

            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            //Guarda la img en el servidor
            $imagen->save(CARPETA_IMAGENES . $nombreImagen);

            //Guarda en la BD
            $propiedad->guardar();
        }
    }
        //El inicio ayuda agregar el fondo
        incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-amarillo">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>;   
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_propiedades.php'; ?>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde"/>

        </form>
    </main>

<?php
    incluirTemplate('footer');
?>