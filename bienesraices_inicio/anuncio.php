<?php 

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /');
    }
    //Importar la conexion BD
    require 'includes/config/database.php';
    $db = conectarDB();

    //Consultar 
    $query = "SELECT * FROM propiedades WHERE id = $id";

    //Obtener los resultados
    $resultado = mysqli_query($db, $query);

    if(!$resultado -> num_rows) {
        header('Location: /');
    };

    $propiedad = mysqli_fetch_assoc($resultado);

    
    require 'includes/funciones.php';
    //El inicio ayuda agregar el fondo
    incluirTemplate('header');
?>

    <main class="contenedor seccio contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la propiedad"/>
        

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc"/>
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento"/>
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio"/>
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>

            <p><?php echo $propiedad['descripcion']; ?></p>
        </div>
    </main>

<?php 
    //Cerrar la conexion
    mysqli_close($db);

    incluirTemplate('footer');

?>