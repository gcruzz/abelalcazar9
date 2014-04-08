<?php

session_start();

//funcion para conectar a la base de datos y verificar la existencia del usuario
function conexiones($usuario, $pass) {
    //conexion con el servidor de base de datos MySQL
    $conectar = mysql_connect('localhost', 'root', '');
    //seleccionar la base de datos para trabajar
    mysql_select_db('bdagenda', $conectar);
    if (conectar) {
        //sentencia sql para consultar el nombre del usuario
        $sql = "SELECT * FROM `bdagenda`.`tusuario` WHERE `usuario`='$usuario' AND `clave`='$pass'";
        //ejecucion de la sentencia anterior
        $ejecutar_sql = mysql_query($sql, $conectar);
        //si existe inicia una sesion y guarda el nombre del usuario
        if (mysql_num_rows($ejecutar_sql) != 0) {
            //inicio de sesion
            while ($datos = mysql_fetch_array($ejecutar_sql)) {
                $_SESSION['id_usuario'] = $datos['id'];
                $_SESSION['nombre'] = $datos['nombre'];
                $_SESSION['tipo_usuario'] = $datos['tipo_usuario'];
            }
            //configurar un elemento usuario dentro del arreglo global $_SESSION            
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