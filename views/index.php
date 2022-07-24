<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Crud con php y mysql</title>
</head>

<body>
    <!-- CONTENEDOR -->
    <div class="container-fluid row p-3">

        <!-- CARGAR DATOS -->
        <form method="POST" class="col-4">
            <h3 class="text-center p-3">Agregar Datos</h3>

            <!-- AGREGA A LA BASE DE DATOS -->
            <?php
            include '../controllers/create.php';
            ?>

            <!-- FROMULARIO -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Edad</label>
                <input type="number" class="form-control" name="edad" id="" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" id="" autocomplete="off">
            </div>
            <button type="submit" name="agregar" class="btn btn-primary"><i class="bi bi-plus-circle"> Agregar</i></button>
        </form>

        <!-- MOSTRAR DATOS -->
        <div class="col-8">
            <h3 class="text-center p-3">Datos Cargados</h3>

            <!-- BORRA DATOS -->
            <?php
            include '../controllers/delete.php';
            include '../controllers/update.php';
            ?>

            <!-- TABLA CON LOS DATOS -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Correo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <!-- PHP -->
                    <?php
                    include "../models/conn.php";

                    /* RECIBE DATOS */
                    $sql = $conn->query('SELECT * FROM info');

                    /* MIENTRAS QUE HAYA DATOS SE EJECUTA Y CARGA A LA TABLA */
                    while ($datos = $sql->fetch_object()) {

                        $arreglo = $datos->id . ',' . $datos->nombre . ',' . $datos->apellido . ',' . $datos->edad . ',' . $datos->correo;

                    ?>
                        <tr>
                            <td><?= $datos->id ?></td>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellido ?></td>
                            <td><?= $datos->edad ?></td>
                            <td><?= $datos->correo ?></td>
                            <td>
                                <a class="btn btn-warning" href="" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="modificar('<?= $arreglo ?>')"><i class="bi bi-pencil-fill"></i></a>
                                <a class="btn btn-danger" href="index.php?id=<?= $datos->id ?>"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>

                        <!-- CIERRA EL WHILE -->
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Datos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <!-- FROMULARIO -->
                        <input type="hidden" class="form-control" name="id_user" id="id">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Edad</label>
                            <input type="number" class="form-control" name="edad" id="edad">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="update" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../javascript/obtenerdatos.js"></script>
</body>

</html>