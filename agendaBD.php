<?php session_start(); ?>
<html>
    <head>
        <title>Agenda a BD</title>
    </head>
    <body>

        <?php
        $enlace = mysql_connect("localhost", "root", "")
                or die("No pudo conectarse : " . mysql_error());
        mysql_select_db("bdagenda") or die("No pudo seleccionarse la BD.");

        $consulta = mysql_query("INSERT INTO tcontactos 
                         VALUES (NULL,{$_SESSION['id_usuario']},'{$_POST['nombres']}','{$_POST['apellidos']}','{$_POST['direccion']}','{$_POST['empresa']}','{$_POST['telefono']}','{$_POST['movil']}','sdds')");
        ?>
        <br>
        <script language="JavaScript" type="text/javascript">

            var pagina = "http://localhost:8080/agenda.php";
            location.href = pagina;

        </script>


    </body>
</html>