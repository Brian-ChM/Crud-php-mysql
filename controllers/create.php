<?php

include '../models/conn.php';

/* SI SE ENVIA EL FORMULARIO */
if (isset($_POST['agregar'])) {

    /* COMPRUEBA QUE LOS CAMPOS NO ESTEN VACIOS */
    if (
        empty($_POST["nombre"])
        or empty($_POST["apellido"])
        or empty($_POST["edad"])
        or empty($_POST["correo"])
    ) {
        echo '<div class="alert alert-warning">Debes completar todos los campos!</div>';
    } else {

        /* RECIBO DATOS DEL INPUT EN UNA VARIABLE */
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $email = $_POST['correo'];

        /* CARGO LOS DATOS A LA BASE DE DATOS */
        $sql_add = $conn->query("INSERT INTO info (nombre, apellido, edad, correo) VALUES ('$nombre', '$apellido', '$edad', '$email')");

        /* SI EJECUTA ENTONCES REDIRECCIONA A LA MISMA PAGINA, ESTO EVITA EL REENVIO DE FORMULARIO AL RECARGAR */
        if ($sql_add == 1) {
            echo "<script>location.href='index.php';</script>";
            die();
        } else {
            echo '<div class="alert alert-warning">Error al actualizar los datos</div>';
        }
    }
}
