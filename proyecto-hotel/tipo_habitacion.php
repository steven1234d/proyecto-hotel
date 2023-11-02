<?php
include_once "funciones.php";
$con = conectar();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto Hotel</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div class="container-fluid">
        <?php if ($con["status"] == false) { ?>
            <div class="alert alert-danger" role="alert">
                Error de conexión a la base de datos de la aplicación
            </div>
            <?php
            exit;
        } ?>
        <div class="row">
            <div class="col-md-4 mb-3">
                <form id="th_form" class="recuadro" autocomplete="off">
                <input  id="th_idtipo" name="th_idtipo" type="hidden" value="0">
                    <div class="form-group row">
                        <label for="th_txt_tipo_habitacion" class="col-4 col-form-label">Tipo de Habitación</label>
                        <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-hotel"></i>
                                    </div>
                                </div>
                                
                                <input id="th_txt_tipo_habitacion" name="th_txt_tipo_habitacion" type="text" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="th_txt_precio" class="col-4 col-form-label">Precio</label>
                        <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-dollar"></i>
                                    </div>
                                </div>
                                <input id="th_txt_precio" name="th_txt_precio" type="number" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="th_cmb_estado" class="col-4 col-form-label">Estado</label>
                        <div class="col-8">
                            <select id="th_cmb_estado" name="th_cmb_estado" class="custom-select">
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-xl-4 col-xl-8 col-lg-12 col-md-12 col-sm-12 ">
                            <button type="button" class="btn btn-md btn-secondary" onclick="th_nuevo();">
                                <i class="fa fa-file"></i>
                                Nuevo
                            </button>
                            <button type="button" class="btn btn-md btn-secondary" onclick="th_guardar();">
                                <i class="fa fa-save"></i>
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-8">
                <!--Table-->
                <table id="tablePreview" class="table table-hover table-bordered recuadro">
                    <!--Table head-->
                    <thead>
                        <tr>
                            <th style="text-align: center">Tipo de Habitación</th>
                            <th style="text-align: center">Precio</th>
                            <th style="text-align: center">Estado</th>
                            <th style="text-align: center">Acciones</th>
                        </tr>
                    </thead>
                    <!--Table head-->
                    <!--Table body-->
                    <tbody>
                        <?php
                        $result = getTable($con["conexion"], "tipo");
                        foreach ($result as $fila) {
                            ?>
                            <tr>
                                <?php
                                if ($fila["estado"] == "A") {
                                    $estado = "<span class='badge badge-success'>Activo</span>";
                                } else {
                                    $estado =  "<span class='badge badge-warning'>Inactivo</span>";
                                }  ?>

                                <td><?php echo $fila["descripcion"]; ?></td>
                                <td align="right">$. <?php echo $fila["precio"]; ?></td>
                                <td align="center">
                                    <?php echo $estado; ?>
                                </td>
                                <td align="center">

                                    <button title='Editar datos' class='btn btn-primary btn-sm' onclick='th_editar( <?php echo json_encode($fila) ?> )'>
                                        <i class='fa fa-edit'></i>
                                    </button>
                                    <button title="Desactivar" class="btn btn-danger btn-sm" onclick='th_desactivar( <?php echo json_encode($fila) ?> )'>
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        $result->free();
                        ?>
                    </tbody>
                    <!--Table body-->
                </table>
                <!--Table-->

            </div>
        </div>

    </div>

    <!-- Llama de los JS al final ayudan a mejorar el tiempo de carga de la aplicación
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script src="js/aplication.js"></script>-->
</body>

</html>