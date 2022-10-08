<?php

function fechaInicioYFinDeMes()
{

    $inicio = date("Y-m-01");
    $fin = date("Y-m-t");
    return [$inicio, $fin];
}
function fechaHoy()
{
    return date("Y-m-d");
}
/*
Nota: está limitado a solo traer los 10 primeros registros, ordenados por las veces que se visitaron
*/
function obtenerPaginasVisitadasEnFecha($fecha)
{
    require '../php/config/database.php';
    $consulta = "SELECT COUNT(*) AS conteo_visitas, count(distinct ip) as conteo_visitantes, url, page
    FROM visits WHERE calendar = ?
    group by url, page
    ORDER BY conteo_visitas DESC
    LIMIT 10;";
    $sentencia = $conn->prepare($consulta);
    $sentencia->execute([$fecha]);
    return $sentencia->fetchAll();
}

function obtenerConteoVisitasYVisitantesDePaginaEnRango($fechaInicio, $fechaFin, $url)
{
    require '../php/config/database.php';
    return (object)[
        "visitantes" => obtenerConteoVisitantesDePaginaEnRango($fechaInicio, $fechaFin, $url),
        "visitas" => obtenerConteoVisitasDePaginaEnRango($fechaInicio, $fechaFin, $url),
    ];
}
function obtenerConteoVisitantesDePaginaEnRango($fechaInicio, $fechaFin, $url)
{
    require '../php/config/database.php';
    $sentencia = $conn->prepare("SELECT COUNT(DISTINCT ip) AS conteo FROM visits WHERE calendar >= ? AND calendar <= ? AND url = ?");
    $sentencia->execute([$fechaInicio, $fechaFin, $url]);
    return $sentencia->fetchObject()->conteo;
}

function obtenerConteoVisitasDePaginaEnRango($fechaInicio, $fechaFin, $url)
{
    require '../php/config/database.php';
    $sentencia = $conn->prepare("SELECT COUNT(*) AS conteo FROM visits WHERE calendar >= ? AND calendar <= ? AND url = ?");
    $sentencia->execute([$fechaInicio, $fechaFin, $url]);
    return $sentencia->fetchObject()->conteo;
}
function obtenerVisitantesDePaginaEnRango($fechaInicio, $fechaFin, $url)
{
    require '../php/config/database.php';
    $sentencia = $conn->prepare("SELECT calendar, COUNT(DISTINCT ip) AS conteo FROM visits WHERE calendar >= ? AND calendar <= ? AND url = ? GROUP BY calendar");
    $sentencia->execute([$fechaInicio, $fechaFin, $url]);
    return $sentencia->fetchAll();
}
function obtenerVisitasDePaginaEnRango($fechaInicio, $fechaFin, $url)
{
    require '../php/config/database.php';
    $sentencia = $conn->prepare("SELECT calendar, COUNT(*) AS conteo FROM visits WHERE calendar >= ? AND calendar <= ? AND url = ? GROUP BY calendar");
    $sentencia->execute([$fechaInicio, $fechaFin, $url]);
    return $sentencia->fetchAll();
}

function obtenerConteoVisitasYVisitantesEnRango($fechaInicio, $fechaFin)
{
    return (object)[
        "visitantes" => obtenerConteoVisitantesEnRango($fechaInicio, $fechaFin),
        "visitas" => obtenerConteoVisitasEnRango($fechaInicio, $fechaFin),
    ];
}

function obtenerConteoVisitantesEnRango($fechaInicio, $fechaFin)
{
    require '../php/config/database.php';
    $sentencia = $conn->prepare("SELECT COUNT(DISTINCT ip) AS conteo FROM visits WHERE calendar >= ? AND calendar <= ?");
    $sentencia->execute([$fechaInicio, $fechaFin]);
    return $sentencia->fetchObject()->conteo;
}

function obtenerConteoVisitasEnRango($fechaInicio, $fechaFin)
{
    require '../php/config/database.php';
    $sentencia = $conn->prepare("SELECT COUNT(*) AS conteo FROM visits WHERE calendar >= ? AND calendar <= ?");
    $sentencia->execute([$fechaInicio, $fechaFin]);
    return $sentencia->fetchObject()->conteo;
}

function obtenerVisitantesEnRango($fechaInicio, $fechaFin)
{
    require '../php/config/database.php';
    $sentencia = $conn->prepare("SELECT calendar, COUNT(DISTINCT ip) AS conteo FROM visits WHERE calendar >= ? AND calendar <= ? GROUP BY calendar");
    $sentencia->execute([$fechaInicio, $fechaFin]);
    return $sentencia->fetchAll();
}
function obtenerVisitasEnRango($fechaInicio, $fechaFin)
{
    require '../php/config/database.php';
    $sentencia = $conn->prepare("SELECT calendar, COUNT(*) AS conteo FROM visits WHERE calendar >= ? AND calendar <= ? GROUP BY calendar");
    $sentencia->execute([$fechaInicio, $fechaFin]);
    return $sentencia->fetchAll();
}
function registrarVisita($pagina, $url)
{
    $fecha = date("Y-m-d");
    $ip = $_SERVER["REMOTE_ADDR"] ?? "";
    require '../php/config/database.php';
    $sentencia = $conn->prepare("INSERT INTO visits(calendar, ip, page, url) VALUES(?, ?, ?, ?)");
    return $sentencia->execute([$fecha, $ip, $pagina, $url]);
}

function obtenerVariableDelEntorno($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.php";
        if (!file_exists($file)) {
            throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("La clave especificada (" . $key . ") no existe en el archivo de las variables de entorno");
    }
}


function usuarioExiste($email)
{
    require '../php/config/database.php';
    $sentencia = $conn->prepare("SELECT email FROM admins WHERE email = ? LIMIT 1;");
    $sentencia->execute([$email]);
    return $sentencia->rowCount() > 0;
}

function registrarUsuario($email, $name, $password, $prv)
{
    require '../php/config/database.php';
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sentencia = $conn->prepare("INSERT INTO admins(email, autor, id_privileges, password) values(?, ?, ?, ?)");
    return $sentencia->execute([$email, $name, $prv, $password]);
}
function modificarUsuario($email, $name, $password, $id)
{
    require '../php/config/database.php';
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sentencia = $conn->prepare("UPDATE admins SET email='".$email."', autor='".$name."', password='".$password."' WHERE id='".$id."'");
    $sentencia -> BindParam(':id', $id);
    return $sentencia->execute();
}
function comentar($name, $email, $comment, $id)
{
    require '../php/config/database.php';
    $sql = $conn->prepare("INSERT INTO comment (name, comment, email, post_id) VALUES (?, ?, ?, ?)");
    return $sql->execute(array($name, $email, $comment, $id));
}
function eliminarComentario($id)
{
    require '../php/config/database.php';
    $sql = $conn->prepare("DELETE from comment WHERE id = $id");
    $sql -> BindParam(':id', $id);
    return $sql->execute();
}

