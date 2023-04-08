<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $d->id_art; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Editar articulo</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    

<form class="form-horizontal" autocomplete="off" action="editarpro.php?id=<?php echo $d->id_art; ?>"  role="form" method="post">
                <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Nombre del articulo</label>
                                <input name="nomar" value="<?php echo $d->nomar; ?>" type="text" class="form-control">
                         </div>

                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Categoria</label>
                     <select id="demo-select2" class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="id_cat" title="Elige una categoria">
        <option value="<?php echo $d->id_cat;?>"  selected=""><?php echo $d->nomcat ;?></option>
        <?php 
 $dbhost = 'localhost';
 $dbname = 'ranger_security';  
 $dbuser = 'root';                  
 $dbpass = '';                  
 
 try{
  
  $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
  $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 $stmt = $dbcon->prepare('SELECT * FROM categoria');
        $stmt->execute();
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $id_cat; ?>"><?php echo $nomcat; ?></option>
            <?php
        }
        ?>
            ?>
            </select>          
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Proveedor</label>
                     <select id="demo-select2" class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="id_prove" title="Elige un proveedor">
        <option value="<?php echo $d->id_prove;?>"  selected=""><?php echo $d->nombre;?></option>
        <?php 
 $dbhost = 'localhost';
 $dbname = 'ranger_security';  
 $dbuser = 'root';                  
 $dbpass = '';                  
 
 try{
  
  $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
  $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 $stmt = $dbcon->prepare('SELECT * FROM proveedor');
        $stmt->execute();
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $id_prove; ?>"><?php echo $nombre; ?></option>
            <?php
        }
        ?>
            ?>
            </select>          
                    </div>
                </div>


                <div class="col-sm-6">
                        <div class="form-group">
                        <label class="control-label">Detalle</label>                          
                                <textarea name="detalle" value="<?php echo $d->detalle; ?>" type="text" class="form-control"><?php echo $d->detalle; ?></textarea>
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
    <div class="modal fade" id="delete_<?php echo $d->id_art; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="modal-body">    
                <p class="text-center"><strong>¿Esta seguro de Borrar el registro?</strong></p>
                <h2 style="color:black" class="text-center"><?php echo $d->nomar.' '; ?> </h2>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                
                <a href="eliminarpro.php?id=<?php echo $d->id_art; ?>" class="btn btn-primary">Sí, eliminalo</a>
            </div>

        </div>
    </div>
</div>

<!-- STOCK -->
<div class="modal fade" id="stock_<?php echo $d->id_art; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Stock del articulo</h4>
                    
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    

<form class="form-horizontal" autocomplete="off" action="stock.php?id=<?php echo $d->id_art; ?>"  role="form" method="post">
                <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Stock del articulo</label>
                        <input  name="stock" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $d->stock; ?>"  type="text" class="form-control" maxlength ="3"> 
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

    <!-- -----------------------------------------------------CATE-------------------------------------------------- -->

     <div class="modal fade" id="delete_<?php echo $d->id_cat; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="modal-body">    
                <p class="text-center"><strong>¿Esta seguro de Borrar la categoria?</strong></p>
                <h2 style="color:black" class="text-center"><?php echo $d->nomcat.' '; ?> </h2>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                
                <a href="eliminarcate.php?id=<?php echo $d->id_cat; ?>" class="btn btn-primary">Sí, eliminalo</a>
            </div>

        </div>
    </div>
</div>



<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $d->id_cat; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Editar categoria</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    

<form action="editarcate.php?id=<?php echo $d->id_cat; ?>" class="form-horizontal" autocomplete="off" role="form" method="post">
                <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Nombre de la categoria</label>
                                <input name="nomcat" value="<?php echo $d->nomcat; ?>" type="text" class="form-control">
                         </div>
                </div>
                <div class="col-sm-6">
                      <div class="form-group">
                            <label class="control-label">Descripcion</label>
                                <input name="descripcion" value="<?php echo $d->descripcion; ?>" type="text" class="form-control">
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