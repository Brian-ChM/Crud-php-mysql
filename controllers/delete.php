<?php

include '../models/conn.php';

/* SI EXISTE UN ID EN EL URL */
if (!empty($_GET['id'])) {

    /* RECIBO EL ID CON GET EN UNA VARIABLE */
    $id = $_GET['id'];

    /* BORRA DATOS DONDE EL ID SEA EL MISMO QUE EL OBTENIDO EN EL URL */
    $sql = $conn->query("DELETE FROM info WHERE id=$id");

    /* SI EJECUTA REDIRECCIONA AL INDEX */
    if ($sql == 1) {
        session_start();
        $_SESSION['delete'] = 'delete';
    } else {
        echo '<div class="alert alert-warning">Error al eliminar</div>';
    }
}
