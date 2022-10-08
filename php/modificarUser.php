<?php
# Nota: no estamos haciendo validaciones
$id = $_POST["id"];
$email = $_POST["mail"];
$name = $_POST["name"];
$password = $_POST["pass"];
$password_confirmar = $_POST["pass_confirm"];
$prv = 2;

# Si no coinciden ambas contraseñas, lo indicamos y salimos
if ($password !== $password_confirmar) {
    echo "Las contraseñas no coinciden, intente de nuevo";
    header('refresh:2;adminRegistro.php');
    exit;
}

# Incluimos las funciones, mira funciones.php para una mejor idea
include_once "funciones.php";

# Primero debemos saber si existe o no
$existe = usuarioExiste($email);
if ($existe) {
    echo "Lo siento, ya existe alguien registrado con ese correo";
    header('refresh:2;addUser.php');
    exit; # Salir para no ejecutar el siguiente código
}
# Si no existe, se ejecuta esta parte
#Modificar datos del usuario
$modificadoCorrectamente = modificarUsuario($email, $name, $password, $id);
if ($modificadoCorrectamente) {
    echo "Modificado correctamente.";
    header('refresh:2;adminRegistro.php');
} else {
    echo "Error al modificar datos. Intenta más tarde";
    header('refresh:2;adminRegistro.php');
}