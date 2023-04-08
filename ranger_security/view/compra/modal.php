<!-- EDITAR -->
<div class="modal fade" id="artiModal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Buscar articulos</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <div class="modal-body">
        <div class="container-fluid">
          <?php
function connect(){
return new mysqli("localhost","root","","ranger_security");
}
$con = connect();
$sql = "SELECT articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, categoria.id_cat, categoria.nomcat, categoria.descripcion, proveedor.id_prove, proveedor.ruc, proveedor.nombre, proveedor.correo, proveedor.telef FROM articulo INNER JOIN categoria ON articulo.id_cat=categoria.id_cat INNER JOIN proveedor ON articulo.id_prove =proveedor.id_prove";
$query  =$con->query($sql);
$data =  array();
if($query){
    while($r = $query->fetch_object()){
        $data[] = $r;
    }
}
?>
<?php if(count($data)>0):?>
                    <table class="table" id="myTable3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NOMBRE</th>
                                <th>DETALLE</th>
                                <th>STOCK</th>
                                <th>CATEGORIA</th>
                                
                            </tr>
                        </thead>
                            <tbody>
                                 <?php foreach($data as $d):?>
                              <tr>      
                             <td><?php echo $d->id_art; ?></td>
                             
                             <td><?php echo $d->nomar; ?></td>
                             <td><?php echo $d->detalle; ?></td>
                             <td><?php echo $d->stock; ?></td>
                             <td><?php echo $d->nomcat; ?></td>
                            
                            </tr>      
                             <?php endforeach; ?>

                            <?php else:?>
                            <p class="alert alert-warning"><strong>No hay datos</strong></p>
                            <?php endif; ?>          
                            </tbody>
                        </table>      

        </div> 

</div>

                </div>
            </div>
        </div>
    </div>
<!--  -->

    


