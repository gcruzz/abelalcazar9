<?php

//funcion para conectar a la base de datos y verificar la existencia del usuario
function conexiones($usuario, $pass) {
    //conexion con el servidor de base de datos MySQL
    $conectar = mysql_connect('localhost', 'root', '');
    //seleccionar la base de datos para trabajar
    mysql_select_db('App', $conectar);

    if (conectar) {
        //sentencia sql para consultar el nombre del usuario
        $sql = "SELECT * FROM `app`.`usuario` WHERE `usuario`='$usuario' AND `pass`='$pass'";
        //ejecucion de la sentencia anterior
        $ejecutar_sql = mysql_query($sql, $conectar);
        //si existe inicia una sesion y guarda el nombre del usuario
        if (mysql_num_rows($ejecutar_sql) != 0) {
            //inicio de sesion
            session_start();
            //configurar un elemento usuario dentro del arreglo global $_SESSION
            $_SESSION['usuario'] = $usuario;
            //retornar verdadero
            return true;
        } else {
            //retornar falso
            return false;
        }
    } else {
        return false;
    }
    return true;
}

//funcion para verificar que dentro del arreglo global $_SESSION existe el nombre del usuario
function verificar_usuario() {
    //continuar una sesion iniciada
    //session_start();
    //comprobar la existencia del usuario
    if ($_SESSION['usuario']) {
        return true;
    }
}