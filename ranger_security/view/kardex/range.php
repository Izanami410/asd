<?php
	$conn=mysqli_connect("localhost", "root", "", "ranger_security");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
	if(ISSET($_POST['search'])){
		
		
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT pedido.idpedido, articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, articulo.fere, trabajador.id_tra, trabajador.nombre,trabajador.apellido, trabajador.dni, trabajador.correo, trabajador.telefono, trabajador.fecha,pedido.fechare, pedido.estado,pedido.cantid, GROUP_CONCAT(categoria.id_cat, '..', categoria.nomcat, '..', categoria.descripcion, '..' SEPARATOR '__') AS categoria FROM pedido INNER JOIN articulo ON pedido.id_art = articulo.id_art INNER JOIN trabajador ON pedido.id_tra = trabajador.id_tra INNER JOIN categoria ON categoria.id_cat = articulo.id_cat 

			WHERE pedido.fechare  BETWEEN '$date1' AND '$date2' GROUP BY pedido.idpedido") 


		or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['idpedido']?></td>
		
		<td><?php echo $fetch['nomar']?> </td>
		<td><?php echo $fetch['stock']?> </td>
		<td><?php echo $fetch['nombre']?> <?php echo $fetch['apellido']?> </td>
		<td><?php echo $fetch['cantid']?> </td>
		
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
		$query=mysqli_query($conn, "SELECT pedido.idpedido, articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, articulo.fere, trabajador.id_tra, trabajador.nombre,trabajador.apellido, trabajador.dni, trabajador.correo, trabajador.telefono, trabajador.fecha,pedido.fechare, pedido.estado,pedido.cantid, GROUP_CONCAT(categoria.id_cat, '..', categoria.nomcat, '..', categoria.descripcion, '..' SEPARATOR '__') AS categoria FROM pedido INNER JOIN articulo ON pedido.id_art = articulo.id_art INNER JOIN trabajador ON pedido.id_tra = trabajador.id_tra INNER JOIN categoria ON categoria.id_cat = articulo.id_cat 
			WHERE pedido.fechare  GROUP BY pedido.idpedido") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['idpedido']?></td>
		
		<td><?php echo $fetch['nomar']?> </td>
		<td><?php echo $fetch['stock']?> </td>
		<td><?php echo $fetch['nombre']?> <?php echo $fetch['apellido']?> </td>
		<td><?php echo $fetch['cantid']?> </td>
		
	</tr>
<?php
		}
	}
?>
