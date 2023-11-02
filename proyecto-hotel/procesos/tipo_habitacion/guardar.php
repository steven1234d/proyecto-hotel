<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $retorno = array();
    $error = "";

    if (trim($_POST["th_txt_tipo_habitacion"]) == "") {
        $error = $error . "Tipo de Habitación en Blanco <br>";
    }

    if (trim($_POST["th_txt_precio"]) == "") {
        $error = $error . "Precio en Blanco <br>";
    }

    if (!is_numeric($_POST["th_txt_precio"])) {
        $error = $error . "Precio debe ser númerico <br>";
    }

    if ($error != "") {
        $retorno['mensaje'] = $error;
        $retorno['status'] =  false;
        echo json_encode($retorno);
    } else {
        include "../../funciones.php";
        $con = conectar();

        if ($con["status"] == false) {
            $retorno['mensaje'] = 'Error de conexión a la base de datos de la aplicación';
            $retorno['status'] =  false;
            echo json_encode($retorno);
            exit;
        }

        $conexion = $con["conexion"];

        if ($_POST["th_idtipo"] <= 0) {  //inserto nuevo registro          
            $sql = "INSERT INTO tipo(descripcion,precio,estado) VALUES ('" . $_POST["th_txt_tipo_habitacion"] . "', " . $_POST["th_txt_precio"] . ", '" . $_POST["th_cmb_estado"] . "')";

            
            $result = $conexion->query($sql);
            if ($result) {
                $retorno['mensaje'] = 'Datos insertados con éxito';
                $retorno['status'] =  true;
                echo json_encode($retorno);
            } else {
                $retorno['mensaje'] = 'Error al procesar requerimiento';
                $retorno['status'] =  false;
                echo json_encode($retorno);
            }
            
        } else { //actualizo registro con sentencia segura
            $sentencia = $conexion->prepare("UPDATE tipo SET descripcion = ?, precio = ? , estado = ? WHERE idtipo = ?");
            $sentencia->bind_param(
                'sdsi',
                $_POST["th_txt_tipo_habitacion"],
                $_POST["th_txt_precio"],
                $_POST["th_cmb_estado"],
                $_POST["th_idtipo"]
            );
            if ($sentencia->execute()){
                $retorno['mensaje'] = 'Datos actualizados con éxito';
                $retorno['status'] =  true;
                echo json_encode($retorno);
            }
            else{
                $retorno['mensaje'] = 'Error al procesar requerimiento';
                $retorno['status'] =  false;
                echo json_encode($retorno);
            }
            $sentencia->close();
        }
    }
}
