<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $fetch['id_art']; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Editar articulo</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    

<form class="form-horizontal" autocomplete="off" action="mostrar.php?id=<?php echo $fetch['id_art']; ?>"  role="form" method="post">
                <div class="panel-body">
            
            <div class="row" style="margin-top:-30px">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Nombre del articulo</label>
                                <input name="nomar" value="<?php echo $fetch['nomar']; ?>" type="text" class="form-control">
                         </div>

                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Categoria</label>
                     <select id="demo-select2" class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="id_cat" title="Elige una categoria">
        <option value="<?php echo $fetch['id_cat'];?>"  selected=""><?php echo $fetch['nomcat'] ;?></option>
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
        <option value="<?php echo $fetch['id_prove'];?>"  selected=""><?php echo $fetch['nombre'];?></option>
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
                                <textarea name="detalle" value="<?php echo $fetch['detalle']; ?>" type="text" class="form-control"><?php echo $fetch['detalle']; ?></textarea>
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
<!--  --------------------------------------------------------------------->

    <!-- ELIMINAR -->
    <div class="modal fade" id="delete_<?php echo $fetch['id_art']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="modal-body">    
                <p class="text-center"><strong>¿Esta seguro de Borrar el registro?</strong></p>
                <h2 style="color:black" class="text-center"><?php echo $fetch['nomar'].' '; ?> </h2>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                
                <a href="eliminar.php?id=<?php echo $fetch['id_art']; ?>" class="btn btn-primary">Sí, eliminalo</a>
            </div>

        </div>
    </div>
</div>

<!-- -------------------------VIEW STOCK ----------------------------------->
<div class="modal fade" id="view_<?php echo $fetch['id_art']; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Stock del articulo</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    

<form class="form-horizontal" autocomplete="off" role="form" method="post">
                <div class="panel-body">
            
            <div class="row" style="margin-top:-30px">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Stock inicial del articulo</label>
                                <input disabled value="<?php echo $fetch['stock']; ?>" type="text" class="form-control">
                         </div>

                </div>


            </div>
  
 
            </div>        
                       
                    </form>
                </div>
            </div>
        </div>
    </div>