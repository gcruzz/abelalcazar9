<?php

session_start();
$enlace = mysql_connect("localhost", "root", "")
        or die("No pudo conectarse : " . mysql_error());
mysql_select_db("bdagenda") or die("No pudo seleccionarse la BD.");

$consulta = mysql_query("INSERT INTO tcontactos 
                         VALUES (NULL,{$_SESSION['id_usuario']},'{$_POST['nombres']}','{$_POST['apellidos']}','{$_POST['direccion']}','{$_POST['empresa']}','{$_POST['telefono']}','{$_POST['movil']}','SINFOTO')");
echo json_encode(array('confirm' => $consulta));