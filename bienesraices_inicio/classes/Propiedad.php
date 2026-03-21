<?php

namespace App;

use function strlen;

class Propiedad {

    // Base de Datos de forma protegida (no de reescribe NUNCA)
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    // Errores/Validacion
    protected static $errores = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    // Definir la conexion a la BD
    public static function setDB($database) {
        self::$db = $database;
    }

    public function __construct($args = []) {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? 1;
    }

    public function guardar() {
        if (isset($this->id)) {
            //Actualizar
            $this->actualizar();
        } else {
            // Crear un nuevo registro
            $this->crear();
        }
    }
    public function crear() {

        // Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        // Insertar en la base de datos
        $query = "INSERT INTO propiedades (";
        $query .= join(', ', array_keys($atributos));
        $query .= ") VALUES ('";
        $query .=  join("', '", array_values($atributos));
        $query .= "')";

        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        $valores = []; //Va al objeto en memoria y une atributos con valores
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = " UPDATE propiedades SET ";
        $query .= join(',',$valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if($resultado) {
            // Redireccionar al usuario.
            header('Location: /admin?resultado=2');
        }
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];

        foreach(self::$columnasDB as $columna) {
            if($columna === 'id') continue; //Ignora el Id
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    public function sanitizarDatos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value) {
            //Solo se sanitizan los valores
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Validacion
    public static function getErrores() {
        return self::$errores;
    }

    public function validar() {

        if(!$this->titulo) {
            self::$errores[] = 'Debes añadir un titulo';
        }

        if(!$this->precio) {
            self::$errores[] = "El precio es obligatorio";
        }

         if( strlen($this->descripcion) < 50 ) {
            self::$errores[] = "La descripcion es obligatoria y debe tener almenos 50 caracteres";
        }

         if(!$this->habitaciones) {
            self::$errores[] = "El numero de habitaciones es obligatorio";
        }

         if(!$this->wc) {
            self::$errores[] = "El numero de baños es obligatorio";
        }

        if(!$this->estacionamiento) {
            self::$errores[] = "El numero de lugares de estacionamiento es obligatorio";
        }

        if(!$this->vendedores_id) {
            self::$errores[] = "Elige un vendedor";
        }

        if(!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        }

        return self::$errores;
    }

    public function setImagen($imagen) {
        //Elimina la imagen previa

        if(isset($this->id)) {
            //Comprobar si existe el archivo
            $exist = file_exists(CARPETA_IMAGENES . $this->imagen);
            if($exist) {
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
        }

        //Asigna el atributo de imagen el nombre de la imagen
        if($imagen) {
            $this->imagen = $imagen;
        }
    }

    //Lista todas los registros
    public static function all() {
        $query = "SELECT * FROM propiedades";//Retorna un arreglo

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Busca un resgistro por su ID
    public static function find($id) {
        $query = "SELECT * FROM propiedades WHERE id = $id";

        $resultado = self::consultarSQL($query);
        return array_shift($resultado);//Retorna el primer elemento de un arreglo
    }

    public static function consultarSQL($query){

        //1. Consultar la base de datos
            $resultado = self::$db->query($query);

        //2. Iterar los resultados
            $array = [];
            while($registro = $resultado->fetch_assoc()) {
                $array[] = self::crearObj($registro);
            }

        //3. Liberar la memoria
            $resultado->free();

        //4. Retornar los resultados
            return $array;
    }
    //Funcion: convierte de arreglo a objeto
    protected static function crearObj($registro) {
        $objeto = new self;

        //Crea un objeto en memoria con los arrays
        foreach($registro as $key => $value) {
            if(property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }
    /* FIN DE LISTA DE LAS PROPIEDADES */

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []) {
        //Rescribe cada atributo del objeto en memoria
        foreach($args as $key => $value) { //Key/value por que es un arr asociativo
            if(property_exists($this, $key ) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}