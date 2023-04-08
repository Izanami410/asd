<?php
	$conn=mysqli_connect("localhost", "root", "", "ranger_security");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
	if(ISSET($_POST['search'])){
		
		
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, categoria.id_cat, categoria.nomcat, proveedor.id_prove, proveedor.ruc, proveedor.nombre, articulo.fere FROM articulo INNER JOIN categoria ON articulo.id_cat = categoria.id_cat INNER JOIN proveedor ON articulo.id_prove = proveedor.id_prove WHERE articulo.fere  BETWEEN '$date1' AND '$date2' GROUP BY articulo.id_art") 


		or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['id_art']?></td>
		
		<td><?php echo $fetch['nomar']?></td>
		<td><?php echo $fetch['stock']?></td>
		<td><?php echo $fetch['nomcat']?></td>
        <td><?php echo $fetch['detalle']?></td> 
        <td><?php echo $fetch['nombre']?></td> 
        <td><?php echo $fetch['fere']?></td>
       
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
		$query=mysqli_query($conn, "SELECT articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, categoria.id_cat, categoria.nomcat, proveedor.id_prove, proveedor.ruc, proveedor.nombre, articulo.fere FROM articulo INNER JOIN categoria ON articulo.id_cat = categoria.id_cat INNER JOIN proveedor ON articulo.id_prove = proveedor.id_prove WHERE articulo.fere  GROUP BY articulo.id_art") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['id_art']?></td>
		
		<td><?php echo $fetch['nomar']?></td>
		<td><?php echo $fetch['stock']?></td>
		<td><?php echo $fetch['nomcat']?></td>
        <td><?php echo $fetch['detalle']?></td> 
        <td><?php echo $fetch['nombre']?></td> 
        <td><?php echo $fetch['fere']?></td>
       
	</tr>
<?php
		}
	}
?>
