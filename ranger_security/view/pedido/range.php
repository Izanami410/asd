<?php
	$conn=mysqli_connect("localhost", "root", "", "ranger_security");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
	if(ISSET($_POST['search'])){
		
		
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT pedido.idpedido, articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, trabajador.id_tra, trabajador.nombre,trabajador.apellido, trabajador.dni, trabajador.correo, trabajador.telefono, pedido.fechare, pedido.estado,pedido.cantid FROM pedido INNER JOIN articulo ON pedido.id_art = articulo.id_art INNER JOIN trabajador ON pedido.id_tra = trabajador.id_tra WHERE pedido.fechare  BETWEEN '$date1' AND '$date2' GROUP BY pedido.fechare") 


		or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['idpedido']?></td>
		
		<td><?php echo $fetch['nomar']?></td>
		<td><?php echo $fetch['nombre']?></td>
		<td><?php echo $fetch['cantid']?></td>
		<td><?php echo $fetch['fechare']?></td>
		<td>
                <?php    

                if($fetch['estado']==1)  { ?> 
                <form  method="get" action="javascript:activo('<?php echo $fetch['idpedido']; ?>')">
                   
                    <span class="label label-success">Aceptado</span>
                </form>
                <?php  }   else {?> 

                    <form  method="get" action="javascript:inactivo('<?php echo $fetch['idpedido']; ?>')"> 
                        <button type="submit" class="btn btn-danger btn-xs">Pendiente</button>
                     </form>
                        <?php  } ?>                         
            </td>
		
        <td>
        	<a href="#edit_<?php echo $fetch['idpedido']; ?>"title="Editar datos" class="btn btn-primary btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>

        	<?php include('modal.php'); ?>
        </td>
	</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>No hay asistencias en el rango de fechas</center></td>
			</tr>';
		}
	}else{
		$query=mysqli_query($conn, "SELECT pedido.idpedido, articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, trabajador.id_tra, trabajador.nombre,trabajador.apellido, trabajador.dni, trabajador.correo, trabajador.telefono, pedido.fechare, pedido.estado,pedido.cantid FROM pedido INNER JOIN articulo ON pedido.id_art = articulo.id_art INNER JOIN trabajador ON pedido.id_tra = trabajador.id_tra WHERE pedido.fechare  GROUP BY pedido.idpedido") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['idpedido']?></td>
		
		<td><?php echo $fetch['nomar']?></td>
		<td><?php echo $fetch['nombre']?></td>
		<td><?php echo $fetch['cantid']?></td>
		<td><?php echo $fetch['fechare']?></td>
	

		<td>
                <?php    

                if($fetch['estado']==1)  { ?> 
                <form  method="get" action="javascript:activo('<?php echo $fetch['idpedido']; ?>')">
                   
                    <span class="label label-success">Aceptado</span>
                </form>
                <?php  }   else {?> 

                    <form  method="get" action="javascript:inactivo('<?php echo $fetch['idpedido']; ?>')"> 
                        <button type="submit" class="btn btn-danger btn-xs">Pendiente</button>
                     </form>
                        <?php  } ?>                         
            </td>


		
        <td>
        	<a href="#edit_<?php echo $fetch['idpedido']; ?>"title="Editar datos" class="btn btn-primary btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>

        	<?php include('modal.php'); ?>
        </td>
	</tr>
<?php
		}
	}
?>
