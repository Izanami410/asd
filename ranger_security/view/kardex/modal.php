<!-- DETALLE DE LOS PRODUCTOS -->
<div class="modal fade" id="detalle_<?php echo $d->id_art; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Detalles de los articulos</h4>
                </div>
                <!--Modal body-->
             <div class="modal-body">                
<form action="" class="form-horizontal" autocomplete="off" role="form" method="post">
                <div class="panel-body">
            <div class="row" style="margin-top:-30px;"> 
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Nombre del articulo</label>
                            <input name="nomar" readonly="" value="<?php echo $d->nomar; ?>" type="text" class="form-control">
                         </div>
                </div>
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Inventario inicial</label>
                            <input name="stock" readonly="" value="<?php echo $d->stock; ?>" type="text" class="form-control">
                         </div>
                </div>
                 <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Detalle del articulo</label>
                            <input name="detalle" readonly="" value="<?php echo $d->detalle; ?>" type="text" class="form-control">
                         </div>
                </div>

                    <?php foreach(explode("__", $d->categoria) as $categoriaConcatenados){ 
                        $categoria = explode("..", $categoriaConcatenados)
                         ?> 
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Categoria del articulo</label>
                            <input name="detalle" readonly="" value="<?php echo $categoria[1] ?>" type="text" class="form-control">
                         </div>
                </div>
                    <?php } ?>

                    <?php foreach(explode("__", $d->proveedor) as $proveedorConcatenados){ 
                        $proveedor = explode("..", $proveedorConcatenados)
                         ?>
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Proveedor</label>
                            <input name="detalle" readonly="" value="<?php echo $proveedor[1] ?>" type="text" class="form-control">
                         </div>
                </div>

                    <?php } ?>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Fecha</label>
                            <input name="detalle" readonly="" value="<?php echo $d->fere; ?>" type="text" class="form-control">
                         </div>
                </div>
            </div>
            </div>                
            </form>
                </div>
            </div>
        </div>
    </div>
<!--  ---------------------------DETALLE DE LOS PEDIDOS -------------------------------------->


<div class="modal fade" id="detallepedi_<?php echo $pedido->idpedido; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">DETALLES DE LOS PEDIDOS</h4>
                </div>
                <!--Modal body-->
             <div class="modal-body">                
<form action="" class="form-horizontal" autocomplete="off" role="form" method="post">
                <div class="panel-body">

            <div class="row" style="margin-top:-30px;"> 
                <h4 class="modal-title" style="color:black">Articulos</h4>
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Nombre del articulo</label>
                            <input name="nomar" readonly="" value="<?php echo $pedido->nomar; ?>" type="text" class="form-control">
                         </div>
                </div>

                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Stock inicial del articulo</label>
                            <input name="nomar" readonly="" value="<?php echo $pedido->stock; ?>" type="text" class="form-control">
                         </div>
                </div>

                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Detalle del articulo</label>
                            <input name="nomar" readonly="" value="<?php echo $pedido->detalle; ?>" type="text" class="form-control">
                         </div>
                </div>

                
                <div class="col-sm-6" >
                        <div class="form-group">
                            <label class="control-label">Fecha de entrada del articulo</label>
                            <input name="detalle" readonly="" value="<?php echo $pedido->fere; ?>" type="text" class="form-control">
                         </div>
                </div>
                  
            </div>

            <div class="row" style="margin-top:-30px;">
                <h4 class="modal-title" style="color:black">Categorias</h4>
                <?php foreach(explode("__", $pedido->categoria) as $cateConcatenados){ 
                        $categoria = explode("..", $cateConcatenados)
                         ?> 
                <div class="col-sm-6" >
                        <div class="form-group">
                            <label class="control-label">Categoria del articulo</label>
                            <input name="detalle" readonly="" value="<?php echo $categoria[1] ?>" type="text" class="form-control">
                         </div>
                </div>

                <div class="col-sm-6" >
                        <div class="form-group">
                            <label class="control-label">Descripcion de la categoria</label>
                            <input name="detalle" readonly="" value="<?php echo $categoria[2] ?>" type="text" class="form-control">
                         </div>
                </div>
                    <?php } ?>
            </div>

            <div class="row" style="margin-top:-30px;">
                <h4 class="modal-title" style="color:black">Trabajador</h4>

                <div class="col-sm-6" >
                        <div class="form-group">
                            <label class="control-label">DNI del trabajador</label>
                            <input name="dni" readonly="" value="<?php echo $pedido->dni; ?>" type="text" class="form-control">
                         </div>
                </div>

                <div class="col-sm-6" >
                        <div class="form-group">
                            <label class="control-label">Nombre del trabajador</label>
                            <input name="nombre" readonly="" value="<?php echo $pedido->nombre; ?>" type="text" class="form-control">
                         </div>
                </div>

                <div class="col-sm-6" >
                        <div class="form-group">
                            <label class="control-label">Apellido del trabajador</label>
                            <input name="apellido" readonly="" value="<?php echo $pedido->apellido; ?>" type="text" class="form-control">
                         </div>
                </div>

                <div class="col-sm-6" >
                        <div class="form-group">
                            <label class="control-label">Correo del trabajador</label>
                            <input name="correo" readonly="" value="<?php echo $pedido->correo; ?>" type="text" class="form-control">
                         </div>
                </div>

                <div class="col-sm-6" >
                        <div class="form-group">
                            <label class="control-label">Telefono del trabajador</label>
                            <input name="telefono" readonly="" value="<?php echo $pedido->telefono; ?>" type="text" class="form-control">
                         </div>
                </div>

                <div class="col-sm-6" >
                        <div class="form-group">
                            <label class="control-label">Fecha de entrada del trabajador</label>
                            <input name="fecha" readonly="" value="<?php echo $pedido->fecha; ?>" type="text" class="form-control">
                         </div>
                </div>

            </div>  

                


            </div>                
            </form>
                </div>
            </div>
        </div>
    </div>

   