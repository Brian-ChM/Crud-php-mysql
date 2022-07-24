function modificar(arreglo) {
    datos = arreglo.split(',');
    document.getElementById('id').value = (datos[0]);
    document.getElementById('nombre').value = (datos[1]);
    document.getElementById('apellido').value = (datos[2]);
    document.getElementById('edad').value = (datos[3]);
    document.getElementById('correo').value = (datos[4]);
}