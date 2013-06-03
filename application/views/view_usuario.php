<!DOCTYPE html>
<html>
    <head>
        <title>CobroGestión</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" media="screen">
        <script src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>

        <!--JSON QUE CARGA LOS DATOS DEL DEUDOR-->                
        <script type="text/javascript">
            $(document).ready(function(){
                $('.edita_operador').click(function() {
                    //alert("asdasd->"+ $(this).attr("href"));
                    $.ajax({
                        type : 'POST',
                        url : $(this).attr("href"),
                        dataType : 'json',
                        success : function(data){
                            $('#nom').val(data.nom);
                            $('#dir').val(data.dir);
                            $('#tel').val(data.tel);
                            $('#mail').val(data.mail);
                             
                            $('#EditaOperador').modal();
                        },
               
                        error : function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("error"+errorThrown);
                        }
                    });
                    return false;
               });
            });
        </script>
        
        <!--JSON QUE CARGA LOS DATOS DEL deudor-->                
        <script type="text/javascript">
            $(document).ready(function(){
                $('.boton_editar').click(function() {
                    //alert("asdasd->"+ $(this).attr("href"));
                    $.ajax({
                        type : 'POST',
                        url : $(this).attr("href"),
                        dataType : 'json',
                        success : function(data){
                            $('#apat').val(data.apat);
                            $('#amat').val(data.amat);
                            $('#nombre').val(data.nomb);
                            $('#dir').val(data.dire);
                            $('#ciudad').val(data.ciudad);
                            $('#comuna').val(data.com);
                            $('#telefono').val(data.telef);
                            $('#mail').val(data.mail);
                            $('#cod').val(data.cod);
                             
                            $('#myModal3').modal();
                        },
               
                        error : function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("error"+errorThrown);
                        }
                    });
                    return false;
               });
            });
        </script>
        
        <!--JSON QUE CARGA LOS DATOS DEL contacto-->        
        <script type="text/javascript">
            $(document).ready(function(){
                $('.boton_editar_contacto').click(function() {
                    //alert("asdasd->"+ $(this).attr("href"));
                    $.ajax({
                        type : 'POST',
                        url : $(this).attr("href"),
                        dataType : 'json',
                        success : function(data){
                            $('#cod').val(data.cod);
                            $('#deudor').val(data.deudor);
                            $('#nom').val(data.nom);
                            $('#dir').val(data.dire);
                            $('#tel').val(data.telef);
                            $('#mail').val(data.mail);
                            $('#obser').val(data.obs);
                             
                            $('#myModal16').modal();
                        },
               
                        error : function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("error"+errorThrown);
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
                        <li><a href="index.html"><i class="icon-home"></i>Inicio</a></li>
                        <li><a href="#">Cuenta</a></li>
                        <li><a href="<?php echo base_url()."index.php/con_mensajes"; ?>"><i class="icon-envelope"></i>Mensajes</a></li>
                        <li><a href="#">Ayuda</a></li>
                        <li><a href="#">Acerca de...</a></li>
                        <li><a href="<?php echo base_url()."index.php/con_login/logout"; ?>"><i class="icon-off"></i>Salir</a></li> 
                                               
                    </ul>
                </div>
            </div>
        </div>

        <a class="btn pull-right" data-toggle="modal" href="#myModal8" >cuenta</a>
        <!--VENTANA EMERGENTE EDITAR DATOS DE USUARIO DEL SISTEMA-->
        <div class="modal hide" id="myModal8">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>DEUDOR</h3>
            </div>
            <div class="modal-body"> 
                <fieldset>                
                <div class="control-group">
                    <?php echo form_open('con_usuariovalido/autogestion'); ?>
                                    
                    <div class="clearfix">
                        <input type="text" placeholder="nombre de usuario" name="nombre" id="nombre">
                    </div>
                                    
                    <div class="clearfix">
                        <input type="text" placeholder="contraseña" name="clave" id="clave">
                    </div>

                    <input type="submit" value="Modificar" />
                    <?php echo form_close(); ?>
                </div>
                </fieldset>                        
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
            </div>
        </div><!--FIN VENTANA EMERGENTE EDITAR DATOS DE USUARIO DEL SISTEMA-->
        
        <!--BARRA LATERAL-->
        <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                 <li class="active"><a href="#1" data-toggle="tab">Acciones</a></li>
                 <li><a href="#2" data-toggle="tab">Deudores</a></li>
                 <li><a href="#3" data-toggle="tab">Documentos</a></li>
                 <li><a href="#4" data-toggle="tab">Contactos</a></li>
                 <li><a href="#5" data-toggle="tab">Operadores</a></li>
            </ul>
            <!--CONTENIDO DE LOS PANELES-->
            <div class="tab-content">
                <!--PANEL ACCIONES-->
                 <div class="tab-pane active" id="1">
                    <p>Ultimas acciones</p>
                    <?php if (isset($datos_doc)){ ?>
                    <table class="table table-hover">
                        <tr>
                            <th>Deudor</th>
                            <th>Monto</th>
                            <th>Accion</th>
                            <th>Fecha</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php foreach ($accion_cobranza->result() as $row){?>
                        <tr>
                            <td><?php echo $row->Deudor;?></td>
                            <td><?php echo $row->Monto;?></td>
                            <td><?php echo $row->Accion;?></td>
                            <td><?php echo $row->ProxGestion;?></td>
                            <td><a class="btn"  href=""><i class="icon-pencil"></i>Editar</a></td>   
                            <td><a class="btn" data-toggle="modal" href="#myModal4"><i class="icon-file"></i>Documento</a></td>     
                        </tr>
                        <?php }?>
                    </table>
                    <?php }?> 
                     <!--TABLA CON DATOS DE ACCIONES-->
    
                    <!--GRUPO DE BOTONES-->
                    <div class="btn-group">
                        <button class="btn">Actualizar estado</button>
                        <button class="btn">Re-Asignar</button>
                        <button class="btn">Escalar</button>
                        <button class="btn">Comentar</button>
                    </div>
                    <hr />
                    
                    <!--FILTRO-->
                    <div class="well">
                         <p>Filtro</p>
                         <div class="btn-group">
                            <button class="btn">Deudor</button>
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Acción<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Llamar</a></li>
                                    <li><a href="#">Visitar</a></li>
                                    <li><a href="#">E-mail</a></li>
                                </ul>
                        </div>
                    </div>
                </div>  <!--FIN PANEL ACCIONES-->
                
                <!--PANEL DE DAUDORES-->
                <div class="tab-pane" id="2">
                    <!--CARGA LOS DATOS DE LOS DEUDORES EN LA GRILLA-->
                    <p>Deudores</p>
                    <?php if (isset($datos_deudores)){ ?>
                    <table class="table table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Direcci&oacute;n</th>
                            <th>Tel&eacute;fono</th>
                            <th>Mail</th>
                            <th>Ciudad</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php foreach ($datos_deudores->result() as $row){?>
                        <tr>
                            <td><?php echo $row->nombres;?></td>
                            <td><?php echo $row->direccion;?></td>
                            <td><?php echo $row->telefono;?></td>
                            <td><?php echo $row->mail;?></td>
                            <td><?php echo $row->ciudad;?></td>
                            <td><a class="btn boton_editar"  href="<?php echo base_url('index.php/con_usuariovalido/carga_deudor/'.$row->codigo); ?>"><i class="icon-pencil"></i>Editar</a></td>   
                            <td><a class="btn" data-toggle="modal" href="#myModal4"><i class="icon-file"></i>Documento</a></td>     
                        </tr>
                        <?php }?>
                    </table>
                    <?php }?> 
                        
                    <!--VENTANA EMERGENTE EDITAR DEUDOR-->
                    <div class="modal hide" id="myModal3">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3>DEUDOR</h3>
                        </div>
                        <div class="modal-body"> 
                            <fieldset>                
                                <div class="control-group">
                                    <?php echo form_open('con_usuariovalido/modificar_deudor'); ?>
                                    
                                    <div class="clearfix">
                                        <input type="text" placeholder="Codigo" name="cod" id="cod">
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
                                           
                                    <div class="row">
                                        <div class="span6">
                                            <div class="row">
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="Ciudad" name="ciudad" id="ciudad">
                                                    </div>
                                                </div>
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="Comuna" name="comuna" id="comuna">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                    </div><!--FIN VENTANA EMERGENTE MODIFICAR DEUDOR-->
  
                    <a class="btn" data-toggle="modal" href="#myModal1" >Agregar deudor</a>
                    <!--VENTANA EMERGENTE NUEVO DEUDOR-->
                    <div class="modal hide" id="myModal1">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3>Datos personales</h3>
                        </div>
                        
                        <div class="modal-body">
                            <!--FORMULARIO NUEVO DEUDOR-->
                                <fieldset>                
                                <div class="control-group">
                                    <?php echo form_open('con_usuariovalido/agrega_deudor'); ?>
                                    
                                    <label><?php echo form_dropdown('TipoPersona', $TipoPersona);?></label>
                                     
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
                                           
                                    <div class="row">
                                        <div class="span6">
                                            <div class="row">
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="Ciudad" name="ciudad" id="ciudad">
                                                    </div>
                                                </div>
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="Comuna" name="comuna" id="comuna">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
        
                                    <div class="clearfix">
                                        <input type="text" placeholder="Telefono" name="telefono" id="telefono">
                                    </div>
                                                                      
                                    <div class="clearfix">
                                        <input type="text" placeholder="e-mail" name="mail" id="mail">
                                    </div>
                                        
                                    <button type="submit" class="btn">Agregar</button>
                                    <?php echo form_close(); ?>
                                </div>
                                </fieldset>
                        </div> <!--FIN FORMULAIRO NUEVO DEUDOR-->
                           
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
                        </div>
                    </div><!--FIN VENTANA EMERGENTE-->
                 </div>
                 <!--################### FIN PANEL DEUDORES ################-->
                 
                 <!--PANEL DOCUMENTOS-->
                 <div class="tab-pane" id="3">
                    <p>DOCUMENTOS</p>
                    <a class="btn" data-toggle="modal" href="#myModal4"><i class="icon-file"></i>Documento</a>
                    <!--VENTANA EMERGENTE PARA AGREGAR DOCUMENTO-->
                    <div class="modal hide" id="myModal4">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                            <p>Documentos</p>
                        </div>
                        
                        <div class="modal-body"> 
                            <fieldset>
                                <div class="control-group">
                                
                                    <?php echo form_open('con_usuariovalido/agrega_doc'); ?>
                                   
                                   <div class= "well" >
                                       <div class="row">
                                            <div class="span6">
                                                <div class="row">
                                                    <div class="span3">
                                                        
                                                        <label>Tipo documento<?php echo form_dropdown('TipoDocumento', $TipoDocumento);?></label>
                                                    </div>
                                                    <div class="span3">
                                                        <label>Deudor<?php echo form_dropdown('deudores', $deudores);?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="span6">
                                                <div class="row">
                                                    <div class="span3">
                                                        <div class="clearfix">
                                                            <label>Direccion</label>
                                                            <input type="text" placeholder="Dirección" name="dir" id="dir">
                                                        </div>
                                                    </div>
                                                    <div class="span3">
                                                        <div class="clearfix">
                                                            <label>Rut deudor</label>
                                                            <input type="text" name="rutdeudor" id="rutdeudor">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class= "well" >
                                        <div class="row">
                                            <div class="span6">
                                                <div class="row">
                                                    <div class="span3">
                                                        
                                                        <div class="clearfix">
                                                            <label>Condicion pago</label>
                                                            <input type="text" placeholder="Dirección" name="ConPago" id="ConPago">
                                                        </div>
                                                    </div>
                                                    <div class="span3">
                                                       <label>Accion<?php echo form_dropdown('TipoAccion', $TipoAccion);?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                        <!--------------
                                        <!-- DATETIME --
                                        <!-------------->
                                        <div class="clearfix">
                                             <label>Proxima gestion</label>
                                             <div id="datetimepicker1" class="input-append date">
                                                <input id="ProxGes" name="ProxGes" data-format="dd/MM/yyyy" type="text"></input>
                                                <span class="add-on">
                                                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                                </i>
                                                </span>
                                             </div>
                                             <script type="text/javascript">
                                                $(function() {
                                                    $('#datetimepicker1').datetimepicker({
                                                        language: 'pt-BR'
                                                    });
                                                });
                                             </script>
                                        </div>
                                    </div>
                                    
                                    <div class= "well" >
                                        <!--<label><//?php echo form_dropdown('EstadoDeuda', $EstadoDeuda);?></label>-->
                                        <div class="row">
                                            <div class="span6">
                                                <div class="row">
                                                    <div class="span3">
                                                        <div class="clearfix">
                                                            <label>Costo</label>
                                                            <input type="text" placeholder="Precio unitario" name="Precio" id="Precio">
                                                        </div>
                                                    </div>
                                                    <div class="span3">
                                                        <label>Observación</label>
                                                        <div class="controls">
                                                            <textarea id="observacion" name="observacion"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    
                                     <button type="submit" class="btn">Guardar</button>
                                     <?php echo form_close(); ?>
                                </div>
                            </fieldset>
                        </div>    
                        
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
                        </div>
                    </div><!--FIN DEVNATAN EMERGENTE AGREGAR DOCUMENTO-->
                 </div>
                  <!--################### FIN PANEL DOCUMENTOS ################-->
                 
                 <!--PANEL INFORMES-->
                 <div class="tab-pane" id="4">
                    <p>CONTACTOS</p>
                      <?php if (isset($datos_contacto)){ ?>
                    <table class="table table-hover">
                        <tr>
                            <th>Deudor</th>
                            <th>Nombre</th>
                            <th>Direcci&oacute;n</th>
                            <th>Tel&eacute;fono</th>
                            <th>Mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php foreach ($datos_contacto->result() as $row){?>
                        <tr>
                            <td><?php echo $row->Deudor;?></td>
                            <td><?php echo $row->Nombre;?></td>
                            <td><?php echo $row->Direccion;?></td>
                            <td><?php echo $row->Telefono;?></td>
                            <td><?php echo $row->Mail;?></td>
                            <td><a class="btn boton_editar_contacto"  href="<?php echo base_url('index.php/con_usuariovalido/carga_contacto/'.$row->codigo); ?>"><i class="icon-pencil"></i>Editar</a></td>   
                            <td><a class="btn" href="<?php echo base_url('index.php/con_usuariovalido/elimina_contacto/'.$row->codigo); ?>"><i class="icon-trash"></i>Eliminar</a></td>     
                        </tr>
                        <?php }?>
                    </table>
                    <?php }?> 
                    <a class="btn" data-toggle="modal" href="#myModal9"><i class="icon-user"></i>Agregar contacto</a>
                    <!--VENTANA EMERGENTE CONTACTO-->
                    <div class="modal hide" id="myModal9">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3>Contactos</h3>
                          
                        </div>
                        
                        <div class="modal-body">
                            <!--FORMULARIO contacto-->
                                <fieldset>                
                                <div class="control-group">
                                    <?php echo form_open('con_usuariovalido/agregar_contacto'); ?>
                                    
                                    
                                    <div class="row">
                                        <div class="span6">
                                            <div class="row">
                                                <div class="span3">
                                                    <label><?php echo form_dropdown('deudores', $deudores);?></label>
                                                </div>
                                                <div class="span3">
                                                    <label><?php echo form_dropdown('TipoContacto', $TipoContacto);?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix">
                                        <input type="text" placeholder="Nombre" name="nom" id="nom">
                                    </div>
                                    
                                    <div class="clearfix">
                                        <input type="text" placeholder="Direccion" name="dir" id="dir">
                                    </div>
                                    
                                    <div class="row">
                                        <div class="span6">
                                            <div class="row">
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="Mail" name="mail" id="mail">
                                                    </div>
                                                </div>
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="Telefono" name="tel" id="tel">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  

                                    <textarea class="span7" rows="3" placeholder="Observación" name="obser" id="obser" ></textarea>
                                        
                                    <button type="submit" class="btn">Agregar</button>
                                    <?php echo form_close(); ?>
                                </div>
                                </fieldset>
                  
                        </div> <!--FIN FORMULAIRO NUEVO DEUDOR-->
                           
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
                        </div>
                        
                        <!--VENTANA EMERGENTE PARA EDITAR CLIENTE-->
                    <div class="modal hide" id="myModal16">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3>Datos cliente</h3>
                        </div>
                        
                        <div class="modal-body">
                            <fieldset>
                                <!--DATOS CLEINTE-->
                                <div class="control-group">   
                                    <?php echo form_open('con_administrador/modifica_deudor'); ?>  
                                     
                                <label><?php echo form_dropdown('deudores', $deudores);?></label>

                                    <div class="clearfix">
                                        <input type="text" placeholder="codigo" name="cod" id="cod">
                                    </div>
                                    
                                    <div class="clearfix">
                                        <input type="text" placeholder="deudor" name="deudor" id="deudor">
                                    </div>
                                    <div class="clearfix">
                                        <input type="text" placeholder="Nombre" name="nom" id="nom">
                                    </div>
                                    
                                    <div class="clearfix">
                                        <input type="text" placeholder="Direccion" name="dir" id="dir">
                                    </div>
                                    
                                    <div class="row">
                                        <div class="span6">
                                            <div class="row">
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="Mail" name="mail" id="mail">
                                                    </div>
                                                </div>
                                                <div class="span3">
                                                    <div class="clearfix">
                                                        <input type="text" placeholder="Telefono" name="tel" id="tel">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  

                                    <textarea class="span7" rows="3" placeholder="Observación" name="obser" id="obser" ></textarea>

                                    <input type="submit" value="Modificar" />
                                    <?php echo form_close(); ?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
                        </div>
                    </div>
                    </div><!--FIN VENTANA EMERGENTE-->
                    
                    
                 </div><!--FIN PANEL INFORMES-->
                 
                 <!--PANEL COBRO-GRESTION-->
                 <div class="tab-pane" id="5">
                    <p>Operadores</p>
                    
                    
                    <?php if (isset($Operadores)){ ?>
                    <table class="table table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Direcci&oacute;n</th>
                            <th>Tel&eacute;fono</th>
                            <th>Mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php foreach ($Operadores->result() as $row){?>
                        <tr>
                            <td><?php echo $row->Nombre;?></td>
                            <td><?php echo $row->Direccion;?></td>
                            <td><?php echo $row->Telefono;?></td>
                            <td><?php echo $row->Mail;?></td>
                            <td><a class="btn edita_operador"  href="<?php echo base_url('index.php/con_usuariovalido/carga_operador/'.$row->Codigo); ?>"><i class="icon-pencil"></i>Editar</a></td>   
                            <td><a class="btn" href="<?php echo base_url('index.php/con_usuariovalido/elimina_operador/'.$row->Codigo); ?>"><i class="icon-trash"></i>Eliminar</a></td>     
                        </tr>
                        <?php }?>
                    </table>
                    <?php }?> 
                    
                    <!--VENTANA EMERGENTE PARA EDITAR operador-->
                    <div class="modal hide" id="EditaOperador">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3>Datos operador</h3>
                        </div>
                        
                        <div class="modal-body">
                            <fieldset>
                                <!--DATOS CLEINTE-->
                                <div class="control-group">   
                                    <?php echo form_open('con_administrador/modifica_operador'); ?>  
                                        <div class="clearfix">
                                            <label>Nombre:</label>
                                            <input type="text" name="nom" id="nom">
                                        </div>
                                        
                                        <div class="clearfix">
                                            <label>Dirección:</label>
                                            <input type="text"  name="dir" id="dir">
                                        </div>
                                            <div class="span6">
                                                <div class="row">
                                                    <div class="span3">
                                                        <div class="clearfix">
                                                            <label>Telefono:</label>
                                                            <input type="text" name="tel" id="tel">
                                                        </div>
                                                    </div>
                                                    <div class="span3">
                                                        <div class="clearfix">
                                                            <label>Correo:</label>
                                                            <input type="text" name="mail" id="mail">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    <input type="submit" value="Modificar" />
                                    <?php echo form_close(); ?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
                        </div>
                    </div><!--FIN VENTANA EMERGENTE-->
                    
                    
                    <a class="btn" data-toggle="modal" href="#ModOperador"><i class="icon-file"></i>Nuevo Operador</a>
                    <!--VENTANA EMERGENTE CONTACTO-->
                    <div class="modal hide" id="ModOperador">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3>Datos operador</h3>
                        </div>
                        
                        <div class="modal-body">
                            <fieldset>  
                                <div class="well">              
                                    <div class="control-group">
                                        <?php echo form_open('con_usuariovalido/agregar_operador'); ?>
                                        
                                        <div class="clearfix">
                                            <label>Nombre:</label>
                                            <input type="text" name="nom" id="nom">
                                        </div>
                                        
                                        <div class="clearfix">
                                            <label>Dirección:</label>
                                            <input type="text"  name="dir" id="dir">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="span6">
                                                <div class="row">
                                                    <div class="span3">
                                                        <div class="clearfix">
                                                            <label>Telefono:</label>
                                                            <input type="text" name="tel" id="tel">
                                                        </div>
                                                    </div>
                                                    <div class="span3">
                                                        <div class="clearfix">
                                                            <label>Correo:</label>
                                                            <input type="text" name="mail" id="mail">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        <div class="well">
                                            <div class="row">
                                            <div class="span6">
                                                <div class="row">
                                                    <div class="span3">
                                                        <div class="clearfix">
                                                            <label>Usuario:</label>
                                                            <input type="text" name="user" id="user">
                                                        </div>
                                                    </div>
                                                    <div class="span3">
                                                        <div class="clearfix">
                                                            <label>Clave:</label>
                                                            <input type="text" name="pass" id="pass">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <button type="submit" class="btn">Agregar</button>
                            <?php echo form_close(); ?>
                            </fieldset>
                        </div>
                           
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
                        </div>
                    </div>
                 </div><!--FIN PANEL COBRO-GESTION-->
            </div><!--FIN CONTENIDO DE LOS PANELES-->
        </div><!--FIN BARRA LATERAL-->
   
        <!--BOTON PARA PASAR AL ADMINISTRADOR DEL SISTEMA-->
        <a class="btn btn-success pull-center" href="Admin.html"><i class="icon-star-empty icon-white"></i>Administrador</a>
                
    </body>
</html>