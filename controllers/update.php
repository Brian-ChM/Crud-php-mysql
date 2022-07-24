<?php

include '../models/conn.php';

/* SI SE PRESIONA GUARDAR DATOS */
if (isset($_POST['update'])) {

    /* OBTENGO ID input hidden del modal */
    $id_user = $_POST['id_user'];

    /* OBTENGO DATOS QUE PERTENECEN AL ID Y MUESTRO EN LA PAGINA DE EDITAR DATOS */
    $sql = $conn->query("SELECT * FROM info WHERE id='$id_user'");
    $datos = $sql->fetch_object();

    /* COMPRUEBA QUE NO EXISTA UN CAMPO VACIO */
    if (
        empty($_POST["nombre"])
        or empty($_POST["apellido"])
        or empty($_POST["edad"])
        or empty($_POST["correo"])
    ) {
        echo '<div class="alert alert-warning">Debes completar todos los campos!</div>';
    } else {

        /* OBTENGO EL VALOR DE LOS INPUTS EN UNA VARIABLE */
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $email = $_POST['correo'];

        /* ACTUALIZO DATOS DE LA BASE DE DATOS EN DONDE EL ID SEA EL MISMO OBTENIDO EN EL URL */
        $sql_add = $conn->query("UPDATE info SET nombre = '$nombre', apellido = '$apellido', edad = '$edad', correo = '$email' WHERE id = '$id_user'");

        /* SI ACTUALIZA REDIRECCIONA AL INDEX */
        if ($sql_add == 1) {
            session_start();
            $_SESSION['update'] = 'update';
        } else {
            echo '<div class="alert alert-warning">Error al actualizar los datos</div>';
        }
    }
}
