<?php

namespace App;

//aplicamos herencias
class Vendedor extends ActiveRecord{

    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono']; // creamos un arreglo con los indices de las columnas 

    //esta tabla define sobre cual tabla estamos trabajando de la base de datos
    protected static $tabla = "vendedores";

    //propiedades propias de esta clase
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }
}