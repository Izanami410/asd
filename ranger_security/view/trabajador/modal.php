<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $d->id_tra; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Editar trabajador</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                 
    <form class="form-horizontal" autocomplete="off" action="mostrar.php?id=<?php echo $d->id_tra; ?>"  role="form" method="post">
                <div class="panel-body">
            
            <div class="row" style="margin-top:-30px">               
                    <div class="col-sm-6">
                       <div class="form-group">
                            <label class="control-label">Nombre del trabajador</label>
                                <input name="nombre" value="<?php echo $d->nombre; ?>" type="text" class="form-control">
                         </div> 
                     </div> 

                    <div class="col-sm-6">
                       <div class="form-group">
                            <label class="control-label">Apellidos</label>
                                <input name="apellido" value="<?php echo $d->apellido; ?>" type="text" class="form-control">
                         </div>
                     </div> 
                <div class="col-sm-6">
                      <div class="form-group">
                            <label class="control-label">DNI</label>
                                <input name="dni" maxlength="8" value="<?php echo $d->dni; ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control">
                         </div>
                </div>  

                 <div class="col-sm-6">
                      <div class="form-group">
                            <label class="control-label">Correo</label>
                                <input name="correo" value="<?php echo $d->correo; ?>" type="text" class="form-control">
                         </div>
                </div>  

             <div class="col-sm-6">
                       <div class="form-group">
                            <label class="control-label">Telefono</label>
                                <input name="telefono" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $d->telefono; ?>" type="text" class="form-control">
                         </div> 
                </div>                

            </div>
  
 
            </div>        
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
                    <button name="update" class="btn btn-primary">Guardar cambios</button>
                </div>          
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--  -->

    <!-- ELIMINAR -->
    <div class="modal fade" id="delete_<?php echo $d->id_tra; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="modal-body">    
                <p class="text-center"><strong>¿Esta seguro de Borrar el registro?</strong></p>
                <h2 style="color:black" class="text-center"><?php echo $d->nombre.' '; ?> </h2>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                
                <a href="eliminar.php?id=<?php echo $d->id_tra; ?>" class="btn btn-primary">Sí, eliminalo</a>
            </div>

        </div>
    </div>
</div>


