<?php
session_start();
$enlace = mysql_connect("localhost", "root", "")
        or die("No pudo conectarse : " . mysql_error());
mysql_select_db("bdagenda") or die("No pudo seleccionarse la BD.");



switch ($_POST['tipo']) {
    case "1":
        $query = "SELECT * FROM tcontactos WHERE id_usuario={$_SESSION['id_usuario']} ORDER BY id_usuario ASC";
        $resultado = mysql_query($query);
        mysql_close($enlace);
        ?>

        <table class="table-condensed">
            <thead>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>DIRECCION</th>
            <th>EMPRESA</th>
            <th>TELEFONO</th>
            <th>CELULAR</th>
            <th>EDITAR</th>
            <th>BORRAR</th>
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
                    <td><a href="#" onclick="js:editarContacto();" >Editar</a><input type="hidden" id="codigo_borrar" value="<?php echo $consulta['codigo']; ?>" /></td>
                    <td><a href="#" onclick="js:eliminarContacto();" >Eliminar</a><input type="hidden" id="codigo_borrar" value="<?php echo $consulta['codigo']; ?>" /></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        </table>
        <?php
        break;

    case '2':
        $query = "select * from tcontactos ORDER BY codigo DESC LIMIT 5";
        $resultado = mysql_query($query);
        mysql_close($enlace);
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
        </table>
        <?php
        break;

    case '3':
        $query = "delete from tcontactos where codigo={$_POST['codigo']}";
        $resultado = mysql_query($query);
        mysql_close($enlace);
        break;

    case '4': //actualiza contacto
        $query = "UPDATE tcontactos SET apellidos='" . $_POST['apellidos']  . "', nombres='" . $_POST['nombres'] . "', telefono='" . $_POST['telefono'] . "', direccion='" . $_POST['direccion'] . "', empresa='" . $_POST['empresa'] . "', movil='" . $_POST['celular'] . "' WHERE codigo={$_POST['codigo']}";
        $resultado = mysql_query($query);
        mysql_close($enlace);
        break;

    case '5': //consulta contacto por codigo
        $query = "select * from tcontactos where codigo={$_POST['codigo']}";
        $resultado = mysql_query($query);
        mysql_close($enlace);

        $array = array();
        while ($consulta = mysql_fetch_array($resultado)) {
            $array = array(
                'codigo' => $consulta['codigo'],
                'nombres' => $consulta['nombres'],
                'apellidos' => $consulta['apellidos'],
                'direccion' => $consulta['direccion'],
                'telefono' => $consulta['telefono'],
                'empresa' => $consulta['empresa'],
                'celular' => $consulta['movil'],
            );
        }

        echo json_encode($array);
        break;
}