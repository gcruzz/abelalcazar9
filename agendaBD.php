<html>
<head>
   <title>Agenda a BD</title>
</head>
<body>

<?php

$enlace = mysql_connect("localhost","root","")
or die("No pudo conectarse : " . mysql_error());
mysql_select_db("app") or die("No pudo seleccionarse la BD.");

$consulta = mysql_query ("INSERT INTO contactos 
                         VALUES ('$_REQUEST[nombre]','$_REQUEST[apellidos]','$_REQUEST[direccion]','$_REQUEST[empresa]','$_REQUEST[telefono]','$_REQUEST[movil]')");
						 				
?>
<br>
<?php
header('Location: agenda.php');
?>


</body>
</html>