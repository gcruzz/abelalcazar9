<?php
session_start();
$enlace = mysql_connect("localhost", "root", "")
        or die("No pudo conectarse : " . mysql_error());
mysql_select_db("bdagenda") or die("No pudo seleccionarse la BD.");

$query = "SELECT * FROM tcontactos WHERE id_usuario={$_SESSION['id_usuario']} ORDER BY id_usuario ASC";
$resultado = mysql_query($query);
mysql_close($enlace);

switch ($_POST['tipo']) {
    case "1":
        ?>

<table class="table-condensed">
            <thead>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>DIRECCION</th>
            <th>EMPRESA</th>
            <th>TELEFONO</th>
            <th>CELULAR</th>
        </thead>
        <tbody>

            <?php
            while ($consulta = mysql_fetch_array($resultado)) {
                ?>
                <tr>
                    <td><?php echo $consulta['nombres']; ?></td>
                    <td><?php echo $consulta['apellidos']; ?></td>
                    <td><?php echo $consulta['direccion']; ?></td>
                    <td><?php echo $consulta['empresa']; ?></td>
                    <td><?php echo $consulta['telefono']; ?></td>
                    <td><?php echo $consulta['movil']; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        <?php
        break;
}
?>
</table>