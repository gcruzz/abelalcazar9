<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Bootbusiness | Short description about company">
        <meta name="author" content="Your name">
        <title>Agenda</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <!-- Bootstrap responsive -->
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
        <!-- Font awesome - iconic font with IE7 support --> 
        <link href="css/font-awesome.css" rel="stylesheet" />
        <link href="css/font-awesome-ie7.css" rel="stylesheet" />
        <!-- Bootbusiness theme -->
        <link href="css/boot-business.css" rel="stylesheet" />
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/boot-business.js"></script>
        <link href="css/smoothness/jquery-ui-1.10.4.custom.css" rel="stylesheet" />
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/jquery-ui-1.10.4.custom.js"></script>
        <script type="text/javascript">

            $(function() {
                //alert("dkdkj");
                actualizarGrilla();
            });

            function crearContacto() {

                $.ajax({
                    url: 'agendaBD.php',
                    type: 'post',
                    data: "nombres=" + $("#nombres").val() + "&apellidos=" + $("#apellidos").val() + "&direccion=" + $("#direccion").val() + "&empresa=" + $("#empresa").val() + "&telefono=" + $("#telefono").val() + "&movil=" + $("#movil").val(),
                    dataType: 'json',
                    success: function(data) {
                        if (data.confirm)
                        {
                            alert("Contacto Creado Correctamente");
                            actualizarGrilla();
                            clear();
                        }
                        else
                        {
                            alert("no entro");
                        }
                    },
                    error: function(e) {
                        console.log('Ocurrió un error al crear el contacto: ' + e.statusText);
                    }
                });
            }

            function actualizarGrilla()
            {

                $.ajax({
                    url: 'cgrilla.php',
                    type: 'post',
                    data: "tipo=1",
                    success: function(data) {
                        $("#grilla_contactos").html(data);
                    },
                    error: function(e) {
                        console.log('Ocurrió un error al actualizar la grilla: ' + e.statusText);
                    }
                });
            }
            function clear()
            {
                $("#nombres").val("");
                $("#apellidos").val("");
                $("#direccion").val("");
                $("#empresa").val("");
                $("#telefono").val("");
                $("#movil").val("");
            }

            function eliminarContacto()
            {
                $.ajax({
                    url: 'cgrilla.php',
                    type: 'post',
                    data: "tipo=3&codigo=" + $("#codigo_borrar").val(),
                    dataType: 'json',
                    success: function(data) {
                        alert("Eliminacion Correcta");
                        actualizarGrilla();
                    },
                    error: function(e) {
                        alert("Error al Eliminar");
                        console.log('Ocurrió un error al actualizar la grilla: ' + e.statusText);
                    }
                });
                return false;
            }

            function editarContacto()
            {
                $.ajax({
                    url: 'cgrilla.php',
                    type: 'post',
                    data: "tipo=5&codigo=" + $("#codigo_borrar").val(),
                    dataType: 'json',
                    success: function(data) {
                        $("#tnombres").val(data.nombres);
                        $("#tapellidos").val(data.apellidos);
                        $("#tdireccion").val(data.direccion);
                        $("#ttelefono").val(data.telefono);
                        $("#tempresa").val(data.empresa);
                        $("#tcodigo").val(data.codigo);
                        $("#tcelular").val(data.celular);

                        /*alert($("#tnombres").val() +
                                $("#tapellidos").val() +
                                $("#tdireccion").val() +
                                $("#ttelefono").val() +
                                $("#tempresa").val() +
                                $("#tcodigo").val() +
                                $("#tcelular").val());*/

                        dialogm();

                    },
                    error: function(e) {
                        alert("Error al Eliminar");
                        console.log('Ocurrió un error al actualizar la grilla: ' + e.statusText);
                    }
                });


                return false;
            }


            function dialogm()
            {
                $("#dialog-editar-contacto").dialog({
                    autoOpen: false,
                    height: 450,
                    width: 350,
                    modal: true,
                    buttons: {
                        "Editar": function() {
                            $.ajax({
                                url: 'cgrilla.php',
                                type: 'post',
                                data: "tipo=4&codigo=" + $("#codigo_borrar").val() +
                                        "&nombres=" + $("#tnombres").val()+
                                        "&apellidos=" + $("#tapellidos").val() +
                                        "&telefono=" + $("#ttelefono").val() +
                                        "&direccion=" + $("#tdireccion").val() +
                                        "&empresa=" + $("#tempresa").val() +
                                        "&celular="+$("#tcelular").val(),
                                success: function(data) {
                                    $("#dialog-editar-contacto").dialog("close");
                                    alert("Edicion Correcta");
                                    actualizarGrilla();
                                },
                                error: function(e) {
                                    alert("Error al Editar");
                                    console.log('Ocurrió un error al actualizar la grilla: ' + e.statusText);
                                }
                            });
                        },
                        Cancel: function() {
                            $(this).dialog("close");
                        }
                    }
                });
                $("#dialog-editar-contacto").dialog("open");

                return false;
            }

        </script>
    </head>
    <body>
        <!-- Start: HEADER -->
        <header>
            <!-- Start: Navigation wrapper -->
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a href="index.html" class="brand brand-bootbus">Contactos</a><div style="float: right;"><p class="brand brand-bootbus"><?php echo $_SESSION['nombre']; ?></p></div>
                    </div>
                </div>
        </header>
        <!-- End: HEADER -->
        <!-- Start: Main content -->
        <div class="content">    
            <div class="container">
                <!-- Start: Product description -->
                <airticle class="article">
                    <div class="row bottom-space">
                        <div class="span12">
                            <div class="page-header">
                                <h1>Adicionar Contacto</h1>
                            </div>
                        </div>
                        <div class="span12 center-align">
                            <!--<form class="well" action="agendaBD.php" method="post">-->
                            <table class="table-hover">
                                <tr>
                                    <td>
                                        <table class="table-condensed">
                                            <tr>
                                                <td><label for="nombre_contacto" align="left"><strong>Nombres:</strong></label></td>
                                                <td><input type="text" id="nombres" name="nombres" class="span3" align="left" /></td>
                                            </tr>

                                            <tr>
                                                <td><label for="apellidos_contacto" align="left" ><strong>Apellidos:</strong></label></td>
                                                <td><input type="text" class="span3" id="apellidos" name="apellidos" align="left" /></td>
                                            </tr>

                                            <tr>
                                                <td><label for="direccion" align="left" ><strong>Dirección:</strong></label></td>
                                                <td><input type="text" class="span3" id="direccion" name="direccion" align="left" /></td>
                                            </tr>

                                            <tr>
                                                <td><label for="empresa" align="left" ><strong>Empresa:</strong></label></td>
                                                <td><input type="text" class="span3" id="empresa" name="empresa" align="left" /></td>
                                            </tr>

                                            <tr>
                                                <td><label for="telefono" align="left" ><strong>Telefono:</strong></label></td>
                                                <td><input type="text" class="span3" id="telefono" name="telefono"  align="left" /></td>
                                            </tr>

                                            <tr>
                                                <td><label for="movil" align="left" ><strong>Celular:</strong></label></td>
                                                <td><input type="text" style="background: white;" class="span3" id="movil" name="movil"  align="left" /></td>
                                            </tr>

                                            <tr>
                                                <td><label for="foto" align="left"><strong>Archivo:</strong></label></td>
                                                <td><input type="file" name="foto" size="30" tabindex="3" /> <br></td>
                                            </tr>
                                            <tr>
                                                <td><br /></td>
                                                <td><br /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="button" onclick="js:crearContacto();" class="btn btn-primary btn-large" id="enviar" align="center" value="Crear Contacto"></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td colspan="20" style="vertical-align: top;">
                                        <div>
                                            <div id="grilla_contactos"></div>
                                        </div>
                                    </td>
                                </tr>

                            </table>

                            <!--</form>-->        
                        </div>
                    </div>
                </airticle>
            </div>

            <div id="dialog-editar-contacto" title="Editar Contacto" style="display: none;">
                <form>
                    <fieldset>
                        <label for="tcodigo">Codigo</label>
                        <input type="text" name="tcodigo" enabled="true" id="tcodigo" class="text ui-widget-content ui-corner-all" />
                        <label for="tcodigo">Nombres</label>
                        <input type="text" name="tnombres" enabled="true" id="tnombres" class="text ui-widget-content ui-corner-all" />
                        <label for="tcodigo">Apellidos</label>
                        <input type="text" name="tapellidos" enabled="true" id="tapellidos" class="text ui-widget-content ui-corner-all" />
                        <label for="tcodigo">Direccion</label>
                        <input type="text" name="tdireccion" enabled="true" id="tdireccion" class="text ui-widget-content ui-corner-all" />
                        <label for="tcodigo">Empresa</label>
                        <input type="text" name="tempresa" enabled="true" id="tempresa" class="text ui-widget-content ui-corner-all" />
                        <label for="ttelefono">Telefono</label>
                        <input type="text" name="ttelefono" enabled="true" id="ttelefono" class="text ui-widget-content ui-corner-all" />
                        <label for="tcelular">Celular</label>
                        <input type="text" name="tcelular" enabled="true" id="tcelular" class="text ui-widget-content ui-corner-all" />
                    </fieldset>
                </form>
            </div>
            <footer>
                <div class="container">
                    <p>
                        &copy; 2013- Uniajc, Inc. All Rights Reserved.
                    </p>
                </div>
            </footer>
    </body>
</html>