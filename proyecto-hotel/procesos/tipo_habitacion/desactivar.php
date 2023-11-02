<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $retorno = array();
    $error = "";


    include "../../funciones.php";
    $con = conectar();

    if ($con["status"] == false) {
        $retorno['mensaje'] = 'Error de conexión a la base de datos de la aplicación';
        $retorno['status'] =  false;
        echo json_encode($retorno);
        exit;
    }

    $conexion = $con["conexion"];


    $sentencia = $conexion->prepare("UPDATE tipo SET  estado = 'I' WHERE idtipo = ?");
    $sentencia->bind_param(
        'i',
        $_POST["idtipo"]
    );
    if ($sentencia->execute()) {
        $retorno['mensaje'] = 'Datos actualizados con éxito';
        $retorno['status'] =  true;
        echo json_encode($retorno);
    } else {
        $retorno['mensaje'] = 'Error al procesar requerimiento';
        $retorno['status'] =  false;
        echo json_encode($retorno);
    }
    $sentencia->close();
}
