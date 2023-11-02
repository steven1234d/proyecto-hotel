<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto Hotel</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body>
    <div class="container-fluid">
        <!--Fila Navegación-->
        <div class="row">
            <!--Columna Navegación-->
            <div class="col-md-12">

                <!--Barra de Navegación-->
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <!--logo-->
                    <a class="navbar-brand" href="index.php">Proyecto Hotel</a>

                    <!--Botón para dispositivos móviles apunta al menu con id = mnu_hotel -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mnu_hotel"
                        aria-controls="mnu_hotel" aria-expanded="false" aria-label="Botón de Navegación">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Menu de Navegación -->
                    <div class="collapse navbar-collapse" id="mnu_hotel">

                        <!-- Items del menu; ml-auto (margin left-auto) sirve para alinear los items del menu a la derecha -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a id="mnu_habitacion" class="nav-link" href="#">Habitaciones</a>
                            </li>
                            <li class="nav-item">
                                <a id="mnu_tipo_habitacion" class="nav-link" href="#">Tipos de Habitaciones</a>
                            </li>
                            <li class="nav-item">
                                <a id="mnu_cliente" class="nav-link" href="#">Clientes</a>
                            </li>
                            <li class="nav-item">
                                <a id="mnu_reservacion" class="nav-link" href="#">Reservaciones</a>
                            </li>
                        </ul>
                        <!--Fin Items del Menu -->
                    </div>
                    <!--Fin Menu de Navegación -->
                </nav>
                <!--Fin Barra de Navegación-->
            </div>
            <!--Fin Columna Navegación-->
        </div>
        <!--Fin Fila Navegación-->


        <!--contenedor de las pantallas-->
        <div id="contenedor" class="row p-2">
            <div class="col-md-12">
                <center>
                    Proyecto de Hotel con HTML, Bootstrap, Jquery, PHP y Mysql
                    <br>
                    <img class="rounded img-fluid" src="img/hotel.jpg" alt="hotel">
                </center>
            </div>
        </div>
        <!--fin de contenedor de las pantallas-->
    </div>

    <!-- Llama de los JS al final ayudan a mejorar el tiempo de carga de la aplicación-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script src="js/aplication.js"></script>
</body>

</html>