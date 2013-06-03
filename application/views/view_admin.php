<!DOCTYPE html>
<html>
    <head>
        <title>CobroGestión</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" media="screen">
        <script src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
        <!--JSON QUE CARGA LOS DATOS DEL CLIENTE--> 
        <script type="text/javascript">

            $(document).ready(function(){
                $('.btn_editar').click(function() {
                    //alert("asdasd->"+ $(this).attr("href"));
                    $.ajax({
                        type : 'POST',
                        url : $(this).attr("href"),
                        dataType : 'json',
                        success : function(data){
                            $('#rut').val(data.rut);
                            $('#apat').val(data.apat);
                            $('#amat').val(data.amat);
                            $('#nombre').val(data.nom);
                            $('#dir').val(data.dire);
                            $('#telefono').val(data.telef);
                            $('#mail').val(data.mail);
                            $('#cod').val(data.cod);                            
                             
                            $('#myModal3').modal();
                        },
               
                        error : function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("error "+errorThrown);
                        }
                    });
                    return false;
               });
            });
        </script>
        
    </head>
    
    <!--CUERPO DE LA PAGINA-->
    <body>
        <!--BARRA SUPERIOR-->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav" >
                        <li>
                        <a href="index.html"><i class="icon-home"></i>Inicio</a>
                        </li>
                        <li><a href="#">Cuenta</a></li>
                        <li><a href="Mensajes.html"><i class="icon-envelope"></i>Mensajes</a></li>
                        <li><a href="#">Ayuda</a></li>
                        <li><a href="#">Acerca de...</a></li>
                        <li><a href="<?php echo base_url()."index.php/con_login/logout"; ?>"><i class="icon-off"></i>Salir</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>    
    
        <!--BARRA LATERAL-->
        <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                 <li class="active"><a href="#1" data-toggle="tab">Clientes</a></li>
                 <li><a href="#2" data-toggle="tab">Sistema</a></li>
                 <li><a href="#3" data-toggle="tab">Historial</a></li>
            </ul>
            <!--CONTENIDO DE LOS PANELES-->
            <div class="tab-content">
                 <!--PANEL AGREGAR CLIENTES-->
                 <div class="tab-pane active" id="1">
                    <?php if (isset($datos_clientes)){ ?>
                        <table class="table table-hover">
                            <tr>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Direcci&oacute;n</th>
                                <th>Tel&eacute;fono</th>
                                <th>Mail</th>
                                <th></th>
                            </tr>
                            <?php foreach ($datos_clientes->result() as $row){?>
                            <tr>
                                <td><?php echo $row->Rut;?></td>
                                <td><?php echo $row->Nombres;?></td>
                                <td><?php echo $row->Direccion;?></td>
                                <td><?php echo $row->Telefono;?></td>
                                <td><?php echo $row->Mail;?></td>
                                <td><a class="btn btn_editar"  href="<?php echo base_url('index.php/con_administrador/carga_cliente/'.$row->codigo); ?>"><i class="icon-pencil"></i>Editar</a></td>
                                <td><a class="btn btn_eliminar"  href="<?php echo base_url('index.php/con_administrador/elimina_cliente/'.$row->codigo); ?>"><i class="icon-trash"></i>Eliminar</a></td>
                            </tr>
                            </tr>
                            <?php }?>
                        </table>
                    <?php }?> 
                    
                    <!--VENTANA EMERGENTE PARA EDITAR CLIENTE-->
                    <div class="modal hide" id="myModal3">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3>Datos cliente</h3>
                        </div>
                        
                        <div class="modal-body">
                            <fieldset>
                                <!--DATOS CLEINTE-->
                                <div class="control-group">   
                                    <?php echo form_open('con_administrador/modifica_cliente'); ?>   
                                                                  
                                    <?php echo form_dropdown('TipoPersona', $TipoPersona);?>
                                    
                                    <div class="clearfix">
                                        <input type="text" placeholder="Codigo" name="cod" id="cod">
                                    </div>
                                    
                                    <div class="clearfix">
                                        <input type="text" placeholder="Rut" name="rut" id="rut">
                                    </div>
                                        
                                    <div class="row">
                                        <div class="span6">
                                            <div class="row">
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="A. paterno" name="apat" id="apat">
                                                    </div>
                                                </div>
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="A. materno" name="amat" id="amat">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                        
                                    <div class="clearfix">
                                        <input type="text" placeholder="Nombres" name="nombre" id="nombre">
                                    </div>
                                
                                    <div class="clearfix">
                                        <input type="text" placeholder="Dirección" name="dir" id="dir">
                                    </div>
                                       
                                    <div class="clearfix">
                                        <input type="text" placeholder="Telefono" name="telefono" id="telefono">
                                    </div>
                                                                          
                                    <div class="clearfix">
                                        <input type="text" placeholder="e-mail" name="mail" id="mail">
                                    </div>

                                    <input type="submit" value="Modificar" />
                                    <?php echo form_close(); ?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
                        </div>
                    </div>
                    
                 
                    <a class="btn" data-toggle="modal" href="#myModal1" >Agregar cliente</a>
                    <!--VENTANA EMERGENTE NUEVO DEUDOR-->
                    <div class="modal hide" id="myModal1">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3>Datos cliente</h3>
                        </div>
                        
                        <div class="modal-body">
                            <fieldset>
                                <!--DATOS CLEINTE-->
                                <div class="control-group">
                                    <?php echo form_open('con_administrador/agregar_cliente'); ?>
                                    
                                    <?php echo form_dropdown('IdTipoPersona', $TipoPersona);?>
                                    
                                    <div class="clearfix">
                                        <input type="text" placeholder="Rut" name="rut" id="rut">
                                    </div>
                                        
                                    <div class="row">
                                        <div class="span6">
                                            <div class="row">
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="A. paterno" name="apat" id="apat">
                                                    </div>
                                                </div>
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="A. materno" name="amat" id="amat">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                        
                                    <div class="clearfix">
                                        <input type="text" placeholder="Nombres" name="nombre" id="nombre">
                                    </div>
                                
                                    <div class="clearfix">
                                        <input type="text" placeholder="Dirección" name="dir" id="dir">
                                    </div>
                                       
                                    <div class="clearfix">
                                        <input type="text" placeholder="Telefono" name="telefono" id="telefono">
                                    </div>
                                                                          
                                    <div class="clearfix">
                                        <input type="text" placeholder="e-mail" name="mail" id="mail">
                                    </div>

                                    <div class="row">
                                        <div class="span6">
                                            <div class="row">
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="Nombre usuario" name="nomusu" id="nomusu">
                                                    </div>
                                                </div>
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="Clave usuario" name="pass" id="pass">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
     
                                    <button type="submit" class="btn">Agregar</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
                        </div>
                    </div>   <!--FIN VENTANA EMERGENTE-->
                </div>  <!--FIN PANEL CLIENTES-->

                 <!--PANEL CONTACTO COBRANZA-->
                 <div class="tab-pane" id="2">
                    <p>Atributos del sistema</p>
                    
                    <a class="btn" data-toggle="modal" href="#myModal2" >Tipo clientes</a>
                    <!--VENTANA EMERGENTE NUEVO DEUDOR-->
                    <div class="modal hide" id="myModal2">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        
                        <div class="modal-body">
                            <fieldset>
                                <div class="control-group">
                                     <?php echo form_open('con_administrador/agregar_tipo_cliente'); ?>
                                    <div class="clearfix">
                                        <input type="text" placeholder="Tipo" name="tipo" id="tipo">
                                    </div>
                                        
                                    <textarea class="span7" rows="3" placeholder="Descripción " name="desc" id="desc" ></textarea>
     
                                    <button type="submit" class="btn">Agregar</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
                        </div>
                    </div>   <!--FIN VENTANA EMERGENTE-->
                    
                    <a class="btn" data-toggle="modal" href="#myModal6" >Etapa cobranza</a>
                    <!--VENTANA EMERGENTE NUEVO DEUDOR-->
                    <div class="modal hide" id="myModal6">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        
                        <div class="modal-body">
                            <fieldset>
                                <div class="control-group">
                                     <?php echo form_open('con_administrador/agregar_etapa_cobranza'); ?>
                                    <div class="clearfix">
                                        <input type="text" placeholder="Tipo" name="tipo" id="tipo">
                                    </div>
                                        
                                    <textarea class="span7" rows="3" placeholder="Descripción " name="desc" id="desc" ></textarea>
     
                                    <button type="submit" class="btn">Agregar</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
                        </div>
                    </div>   <!--FIN VENTANA EMERGENTE-->
                </div><!--FIN PANEL CONTACTO COBRANZA--> 
                
                
                <!--PANEL HISTORIAL-->
                <div class="tab-pane" id="3">
                    <p>Historial de acciones</p>
                    
                    
                    <!--FILTRO-->
                    <div class="well">
                         <p>Filtro</p>
                         <div class="btn-group">
                            <button class="btn">Cliente</button>
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Acción<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Llamar</a></li>
                                <li><a href="#">Visitar</a></li>
                                <li><a href="#">E-mail</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr />
                    <hr />
                    <hr />
                    
                </div><!--FIN PANEL HISTORIAL-->
                
            </div><!--FIN CONTENIDO PANELES-->
        </div><!--FIN BARRA LATERAL-->
        
    </body>
</html>