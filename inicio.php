<?php

include ('conexion.php');
//usuario y clave pasados por el formulario
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
//usa la funcion conexiones() que se ubica dentro de funciones.php
if (conexiones($usuario, $pass)) {
    header('Location: http://google.com/');
} else {
    header('Location: /index.html');
}