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
                    <ul class="nav" >
                        <li><a href="index.html"><i class="icon-home"></i>Inicio</a></li>
                        <li><a href="#">Cuenta</a></li>
                        <li><a href="Mensajes.html"><i class="icon-envelope"></i>Mensajes</a></li>
                        <li><a href="#">Ayuda</a></li>
                        <li><a href="#">Acerca de...</a></li>
                        <li class="pull-right"><a href="index.html"><i class="icon-off"></i>Salir</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!--BUSQUEDA DE MENSAJES-->
        <div class="span8 offset4">
            <form class="well form-search">
                <input type="text" class="input-medium search-query">
                <a class="btn"><i class="icon-search"></i></a>
            </form>
        </div>
        <br /><br /><br /><br /><br />
        
        <!--BARRA LATERAL-->
        <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                <li><a href="#1" data-toggle="tab">Redactar nuevo</a></li>
                <li class="active"><a href="#2" data-toggle="tab">Mensajes</a></li>
                <li><a href="#3" data-toggle="tab">Otra opcion</a></li>
            </ul>
            <!--CONTENIDO PANELES-->
            <div class="tab-content">
                <!--PANEL NUEVO MENSAJE-->
                <div class="tab-pane" id="1">
                    <a class="btn" href="#"><i class="icon-trash"></i>Borrar</a>
                    
                    <form class="form-horizontal">
                    <fieldset>
                        <div class="control-group">
                                <div class="well span5">
                                        <label>Para:<?php echo form_dropdown('TipoAccion', $TipoAccion);?></label>
                                    </div>
                                    <div class="clearfix">
                                        <label>Asunto:</label>
                                        <input type="text" name="Asunto" id="Asunto">
                                    </div>
                                    <div class="clearfix">
                                        <label>Mensaje</label>
                                        <textarea id="msj" name="msj"></textarea>
                                    </div>
                                    <button type="submit btn-success" class="btn">Enviar</button>
                                </div>  
                            
                             
                             <?php echo form_close(); ?>
                        </div>
                    
                    </fieldset>
                    </form>
                </div>
                
                <!--PANEL MENSAJES NUEVOS-->
                <div class="tab-pane active" id="2"> 
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Usuario</th>
                                <th>Empresa</th>
                                <th>Asunto</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>Usuario 1</td>
                                <td>Empresa 1</td>
                                <td>Asunto 1</td>
                                <td>Fecha 1</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>Usuario 2</td>
                                <td>Empresa 2</td>
                                <td>Asunto 2</td>
                                <td>Fecha 2</td>
                            </tr>
                        </tbody>
                    </table>
                </div><!--FIN PANEL MENSAJES NUEVOS-->  
                
                <!--PANEL MENSAJES OTRA OPCION-->
                <div class="tab-pane" id="3"> 
                    <p>OTRAS OPCIONES</p>
                </div><!--FIN PANEL OTRAS OPCIONES-->              
            </div><!--FIN CONTENIDOS PANEL-->
        </div><!--FIN BARRA LATERAL-->
        
    </body>
</html>