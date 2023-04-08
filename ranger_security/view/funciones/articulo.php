<?php

$conexion = mysqli_connect("localhost","root","","ranger_security");

$query = $conexion->query("SELECT * FROM articulo");

echo '<option value="0">Seleccione</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['id_art']. '">' . $row['nomar'] . '</option>' . "\n";
}
