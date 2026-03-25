<?php

    require '../../includes/app.php';
    
    use App\Vendedor;

    isAuth();

    $vendedor = new Vendedor;

    //Arreglo con mensajes de errores
    $errores = Vendedor::getErrores();

    //Ejecutar el codigo despues de que el usuario envia el formulario
    //Valida que el request method sea de tipo post
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Crear una nueva instancia
        $vendedor =  new Vendedor($_POST['vendedor']);

        //Validar que no haya campos vacios
        $errores = $vendedor->validar();

        //No hay errores
        if(empty($errores)) {
            $vendedor->guardar();
        }
    }

    //El inicio ayuda agregar el fondo
    incluirTemplate('header');

?>

<main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1>

        <a href="/admin" class="boton boton-amarillo">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>;   
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/vendedores/crear.php" >

            <?php include '../../includes/templates/formulario_vendedores.php'; ?>
            <input type="submit" value="Registrar Vendedor" class="boton boton-verde"/>

        </form>
    </main>

<?php
    incluirTemplate('footer');
?>