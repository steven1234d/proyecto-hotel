<?php
function conectar()
{
    //Datos para la conexión con el servidor
    $servidor = "127.0.0.1";
    $base = "hotel";
    $usuario = "root";
    $clave = "";
    $retorno = array();

    //Creando la conexión, nuevo objeto mysqli
    $conexion = new mysqli($servidor, $usuario, $clave,$base);

    //Si sucede algún error retorno
    // status =  false 
    if ( $conexion->connect_error ) 
    {
        $retorno["status"] = false;        
        return $retorno;
    }

    //Si nada sucede retornamos status = true y la conexion
    $retorno["status"] = true;
    $retorno["conexion"] = $conexion;
    return $retorno;

}

//retorna un array con los datos de la tabla
function getTable($conexion, $tabla){
    $data = array();
    $sql = "select * from $tabla";
    $result = $conexion->query($sql);    
    return $result;
}


