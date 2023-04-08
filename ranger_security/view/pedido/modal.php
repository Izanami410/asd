<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $fetch['idpedido']; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Ver pedido</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    

<form action="" class="form-horizontal" autocomplete="off" role="form" method="post">
                <div class="panel-body">
            
            <div class="row" style="margin-top:-30px">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Nombre del trabajador</label>
                            <input name="nombre" readonly="" value="<?php echo $fetch['nombre']; ?>" type="text" class="form-control">
                         </div>
                </div>

               <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Nombre del articulo</label>
                     <input name="nomar" readonly="" value="<?php echo $fetch['nomar']; ?>" type="text" class="form-control">          
                    </div>
                </div>

                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Cantidad</label>
                                <input name="cantid" readonly="" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $fetch['cantid']; ?>" type="text" class="form-control">
                         </div>
                </div>

                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Fecha</label>
                                <input name="fechare" readonly="" value="<?php echo $fetch['fechare']; ?>" type="date" class="form-control">
                         </div>
                </div>

            </div>
 
            </div>        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--  VIEW-->

   