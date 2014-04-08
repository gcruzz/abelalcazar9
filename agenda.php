<?php
/* if (session_start()) {
  header("Location: https://github.com/");
  /*if (isset($_SESSION['id_usuario'])) {
  var_dump($_SESSION['id_usuario']);
  } */
/* }
  else
  {
  header("Location: https://www.google.com.co/");
  } */
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
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap responsive -->
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
        <!-- Font awesome - iconic font with IE7 support --> 
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/font-awesome-ie7.css" rel="stylesheet">
        <!-- Bootbusiness theme -->
        <link href="css/boot-business.css" rel="stylesheet">
    </head>
    <body>
        <!-- Start: HEADER -->
        <header>
            <!-- Start: Navigation wrapper -->
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a href="index.html" class="brand brand-bootbus">Contactos</a>
                    </div>
                </div>
                <!-- Below button used for responsive navigation --> 
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
                                <h1>Ingresar Contacto</h1>
                            </div>
                        </div>
                        <div class="span12 center-align">
                            <form class="well" action="agendaBD.php" method="post">
                                <label align="left"><h1><small><strong>Contactos</strong></small></h1></label>
                                <!--Contacto-->
                                <table>
                                    <tr>
                                        <td><label for="nombre_contacto" align="left"><strong>Nombres:</strong></label></td>
                                        <td><input type="text" name="nombres" class="span3" align="left" /></td>
                                    </tr>

                                    <tr>
                                        <td><label for="apellidos_contacto" align="left" ><strong>Apellidos:</strong></label></td>
                                        <td><input type="text" class="span3" name="apellidos" align="left" /></td>
                                    </tr>

                                    <tr>
                                        <td><label for="direccion" align="left" ><strong>Dirección:</strong></label></td>
                                        <td><input type="text" class="span3" name="direccion" align="left" /></td>
                                    </tr>

                                    <tr>
                                        <td><label for="empresa" align="left" ><strong>Empresa:</strong></label></td>
                                        <td><input type="text" class="span3" name="empresa" align="left" /></td>
                                    </tr>

                                    <tr>
                                        <td><label for="telefono" align="left" ><strong>Telefono:</strong></label></td>
                                        <td><input type="text" class="span3" name="telefono"  align="left" /></td>
                                    </tr>

                                    <tr>
                                        <td><label for="movil" align="left" ><strong>Celular:</strong></label></td>
                                        <td><input type="text" class="span3" name="movil"  align="left" /></td>
                                    </tr>

                                    <tr>
                                        <td><label for="foto" align="left"><strong>Archivo:</strong></label></td>
                                        <td><input type="file" name="foto" size="30" tabindex="3" /> <br></td>
                                    </tr>
                                </table>
                                <!--Fin Contacto-->
                                <center> <input  type="submit" class="btn btn-primary btn-large" id="enviar" align="center" value="Enviar"></center>
                            </form>        
                        </div>

                    </div>
                </airticle>
                <!-- End: Product description -->
            </div>
            <!-- End: Main content -->
            <!-- Start: FOOTER -->
            <footer>
                <div class="container">
                    <p>
                        &copy; 2013- Uniajc, Inc. All Rights Reserved.
                    </p>
                </div>
            </footer>
            <!-- End: FOOTER -->
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/boot-business.js"></script>
    </body>
</html>
