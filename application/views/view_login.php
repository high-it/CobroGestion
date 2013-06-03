<!DOCTYPE html>
<html>
    <head>
        <title>CobroGestión</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" media="screen">
        <script src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
    </head>
    
    <!--CUERPO DE LA PAGINA-->
    <body>
        <!--BARRA SUPERIOR-->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav pull-right" >
                        <li><a href="index.html"><i class="icon-home"></i>Inicio</a></li>
                        <li><a href="#">Nosotros</a></li>
                        <li class="active"><a href="Personas.html">Personas</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </div>
                
        <!--LOGIN DEL USUARIO-->
        
        <?php echo validation_errors();?>
        <div class="container pull-right">
            <div class="content">
                <div class="row">
                    <div class="login-form span4">
                        <h2>Registro</h2>
                        <fieldset>
                        <?php
	                       if (isset($mensaje)){
                                echo '<div class="alert alert-error">'.$mensaje.'</div>';
                            }
                        ?>
                        <?php echo form_open('con_login/process_login'); ?>
                        <div class="clearfix">
                            <input type="text" placeholder="Usuario" name="nombre" id="nombre">
                        </div>
                        
                        <div class="clearfix">
                            <input type="password" placeholder="Contraseña" name="clave" id="clave">
                        </div>
                        
                         <button type="submit" class="btn">Ingresar</button>
                        </form>
                        </fieldset>
                        <a href="">¿No puede acceder a su cuenta?</a>
                        <br />
                        <a href="">Ir a versión de prueba</a>
                    </div>
                </div>
            </div>
        </div> <!--FIN LOGIN USUARIO-->

    </body>
</html>